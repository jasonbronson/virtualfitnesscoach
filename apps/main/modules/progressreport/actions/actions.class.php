<?php

/**
 * progressreport actions.
 *
 * @package    virtualgym
 * @subpackage progressreport
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class progressreportActions extends sfActions
{
	
  public function preExecute(){

		//
		$this->mysql = new mysqlclass();  
	    $this->exercisecommon = new exercisecommon();
		$this->common = new commonlib();
		$this->header = true;
	    $this->swif = $this->getUser()->getAttribute('swif');
	}	
	
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
   

		$mysql = new mysqlclass();
		$user_id = $this->getUser()->getAttribute('user_id');
		$query = "SELECT *, (7 - datediff(now(), datetime)) as nextupdate FROM statistics where user_id='$user_id' and statistics_type='1' order by datetime desc limit 1";
		$res = $this->mysql->mysqlquery($query);
		if(mysql_num_rows($res)==0){
			$this->err = "Progress Data not available yet";
			return;
		}

		while($row = mysql_fetch_array($res)){
			$tmp[] = $row;
		}

		$this->row = $tmp;

		/*
		 $query = "SELECT datediff(now(), datetime) as lastupdate FROM statistics where user_id = '$user_id' order by datetime desc limit 1";
		 $res = $this->mysql->mysqlquery($query);
		 $row = mysql_fetch_array($res);
		 if($row['lastupdate'] >= 30 || $row['lastupdate'] == ""){ //must be over 30 days since last time progress report update was done
		 //reset error
		 $this->getUser()->setAttribute('progress_error', '');

		 }else{
		 $howlong = 30 - $row['lastupdate'];

		 $this->getUser()->setAttribute('progress_error', "Statistics can be entered every 30 days, please wait another $howlong days before updating again");
		 }
		 */
		$this->progress_error = $this->getUser()->getAttribute('progress_error', '');

		//THIS WILL SHOW ONLY THE FIRST TWO priority GRAPHS SET BY THE ADMIN Control panel for user
		$query = "SELECT * FROM progress_report_graphs where user_id='$user_id'";
		$res = $this->mysql->mysqlquery($query);

		while($row = mysql_fetch_array($res)){
			
			if($row['priority'] == 1)
			  $this->graph1 = $this->progress_report_priority($row['type']);

			if($row['priority'] == 2)
			  $this->graph2 = $this->progress_report_priority($row['type']);
		}
		//Failsafe if no graphs are chosen for the user
		if($this->graph1 == "")
			$this->graph1 = $this->progress_report_priority(2);
		
		if($this->graph2 == "")
			$this->graph2 = $this->progress_report_priority(3);
		
		

		//type 1 == today   2==3months etc...
		$query = "SELECT * FROM siloets where user_id='$user_id' order by type asc";
		$res = $this->mysql->mysqlquery($query);
		while($row_tmp = mysql_fetch_array($res)){
					$siloets[] = $row_tmp;	
		}
		
		    $this->todaygraphic = $siloets[0]['name'];
			$this->threemonthsgraphic = $siloets[1]['name'];
			$this->ninemonthsgraphic = $siloets[2]['name'];

 
		//searchdate for form post 	
		$this->searchdate = $this->getRequestParameter('searchdate'); 
  	
  }
  
public function executeProgress_report_saveresults(){

		$type_array = array("Weights" => "weight", "Pushups"=> "pushups", "Step Test" => "steptest", "Hips" => "hips",
    "Resting Heart Rate"=> "restingheartrate", "Thighs" => "thighs", "Waist"=> "waist", "Chest"=> "chest");

	/*	$notfilled = false;
		foreach($type_array as $value){
			//$tmp = preg_replace('/[^a-zA-Z0-9\s]/', '', $this->getRequestParameter($value));
			$tmp = $this->getRequestParameter($value);
			//echo $value." -- ".$tmp."<bR>";
			
			if($tmp == "")
			$notfilled = true;

			$$value = $tmp;
		}
		if($notfilled == true)
		 return $this->renderText("ERROR Fill All fields out Click back button");
*/
		//die("WORKS");
		foreach($type_array as $value){
			$$value =  $this->getRequestParameter($value);
		}

		$mysql = new mysqlclass();

		$user_id = $this->getUser()->getAttribute('user_id');
		if($user_id == "")
		  return $this->renderText("ERROR NOT LOGGED IN PLEASE CLOSE BROWSER AND LOGIN");

		    $query = "SELECT datediff(now(), datetime) as lastupdate, id FROM statistics where user_id = '$user_id' order by datetime desc limit 1";
		 $res = $this->mysql->mysqlquery($query);
		 $row = mysql_fetch_array($res);
		 if($row['lastupdate'] >= 7 || $row['lastupdate'] == ""){ 
			//now insert new data
			$res = $this->mysql->mysqlquery("insert into statistics set user_id='$user_id', weight='$weight', hips='$hips', restingheartrate='$restingheartrate',
			    thighs='$thighs', pushups='$pushups', steptest='$steptest', waist='$waist', chest='$chest', datetime=now(), statistics_type='1'");
			if(!$res)
		  		$this->getUser()->setAttribute('progress_error', mysql_error($res));
		
		 }else{
		 	
		 	foreach($type_array as $value){
		 		$tmp = $this->getRequestParameter($value);
		 		if($tmp != "")
		 			$sql_update .= " $value = '$tmp',";
				
			}	
			$sql_update = substr($sql_update, 0, -1);
			
			$res = $this->mysql->mysqlquery("update statistics set $sql_update where user_id='$user_id' and id='{$row['id']}' ");
		 
		 }
		 
		$searchdate =  $this->getRequestParameter("searchdate");
		return $this->redirect('progressreport/index?user_id='.$user_id.'&searchdate='.$searchdate);

	}
	
private function graph_actualprogressdata(){
		
		
		
/*		
$datay = array();
$datax = array();
$ts = "123";
$n=15; // Number of data points
for($i=0; $i < $n; ++$i ) {
    $datax[$i] = $ts+$i*700000; 
    $datay[$i] = "61"+$i;
}
		list($tickPositions,$minTickPositions) = DateScaleUtils::GetTicks($datax);
$grace = 800;
$xmin = $datax[0]-$grace;
$xmax = $datax[$n-1]+$grace;

	$graph = new Graph(400,200);
$graph->SetScale('intlin',0,0,$xmin,$xmax);
$graph->title->Set('Basic example with manual ticks');
$graph->title->SetFont(FF_ARIAL,FS_NORMAL,12);
$graph->xaxis->SetPos('min');
$graph->xaxis->SetTickPositions($tickPositions,$minTickPositions);
$graph->xaxis->SetLabelFormatString('My',true);
$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,9);
$graph->xgrid->Show();
$p1 = new LinePlot($datay,$datax);
$p1->SetColor('red');
$graph->Add($p1);

		$sessionid = session_id();
		$tmp = "/tmp/$sessionid.png";
		$graph->Stroke($tmp);
		return $tmp;
	*/	
		
		
		
		
		
		
		
		
		
		$user_id = $this->getUser()->getAttribute('user_id', 'NA');
		$sql = "SELECT *, DATE_FORMAT(datetime, \"%c\") as df FROM statistics where user_id='$user_id' and statistics_type='1' order by datetime ";
		$mysql = new mysqlclass();

		$res = $this->mysql->mysqlquery($sql);
		$type = $this->type;
		//die($type."***");
		$max = 0;
		while($row = mysql_fetch_array($res)){
			$value = $row[$type];
			$tmp_array[] = $value;
			
		}
		
		
		//Pad out the weeks (4weeks * 9 months == 36 weeks) 
		//We need to determine by each week where they are at
		if(count($tmp_array) < 36){
			for($a=count($tmp_array)+1; $a < 37; $a++){
				$tmp_array[$a] = "";
			}
		}
		
		
		//echo count($tmp_array);
		//die();
		//print_r($tmp_array);
		//die();
		
		$l2datay = $tmp_array;

		//Oct 235
		//jan 370
		//Apr 500
		
	    $graph = new Graph(500,240,"auto");
		$graph->SetScale("textlin", $this->minscale, $this->maxscale);
		
		//$graph->SetScale('intlin');
	    
		$graph->SetMargin(50,50,60,50);
		
        $graph->xaxis->hide();
        $graph->yaxis->hide();
        $graph->SetFrame(false);
		
		$l2plot = new LinePlot($l2datay);
		$l2plot->SetWeight(2);
		$l2plot->SetColor("blue");
		
		$l2plot->SetLegend("Actual");
		
		$graph->Add($l2plot);
		
		$graph->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
		
		
		$graph->SetColor('white');
		$graph->SetTitleBackground('white');
		$graph->SetMarginColor('white');
		
		//set legend
		$graph->legend->Pos(.07, .15, "right", "top");

		// Draw
		//$appdir = sfConfig::get(sf_upload_dir."/progressgraphs");
		
		$sessionid = session_id();
		$tmp = "/tmp/$sessionid.png";
		$graph->Stroke($tmp);
		return $tmp;
		
		
	}
	
/**
	 * Creates the prediction graph for a user
	 */
	public function executeGraph(){
		
		$name = $this->getRequestParameter('name');
		$title = $this->getRequestParameter('title', 'Progress Report');
		$currentresult = $this->getRequestParameter('currentresult', 'Current Result');
		$prediction = $this->getRequestParameter('prediction', 'Prediction');
		//$userid = $this->getRequestParameter('userid', '');
		$user_id = $this->getUser()->getAttribute('user_id', 'NA');
		$this->type = $this->getRequestParameter('type');
		
		$sql = "SELECT * FROM statistics where user_id='$user_id' and statistics_type='1' and {$this->type} != '' order by datetime limit 1";

		$mysql = new mysqlclass();
		
		if($this->type ==""){
			$this->logMessage("ERROR: NO GRAPH IMAGE BECAUSE TYPE was not passed as a parameter ");
			return sfView::NONE;
		}	
		
		//GET MAX MIN VALUES
		$sql_minmax = "SELECT max({$this->type}) as max, min({$this->type}) as min 
		FROM statistics where user_id='$user_id' and statistics_type='1' and {$this->type} != ''";
		
		$res_minmax = $this->mysql->mysqlquery($sql_minmax);
		$row_minmax = mysql_fetch_array($res_minmax);
		
		$res = $this->mysql->mysqlquery($sql);
		$row = mysql_fetch_array($res);

		if($row['increase_decrease'] == 2){
		 $this->increase_decrease = "";  //GAIN WEIGHT
		 $this->maxscale = $row_minmax['max'] + 30;
		 $this->minscale = $row_minmax['min'] - 30;
		}else{
		 $this->increase_decrease = "-"; //lose weight
		 $this->maxscale = $row_minmax['max'] + 30;
		 $this->minscale = $row_minmax['min']  - 30;
		}
		
		
		
		//die($this->maxscale." ".$this->minscale);
		
		$this->logMessage("TYPE INCREASE_DESCREASE $this->increase_decrease");

		
		switch($this->type){
			case "weight":
				$rate = "{$this->increase_decrease}12";
				break;
			case "pushups":
				$rate = "30"; //"130";
				break;
			case "chest":
				$rate = "{$this->increase_decrease}10";
				break;
			case "waist":
				$rate = "{$this->increase_decrease}15";
				break;
				/*case "arms":

				$rate = $this->increase_decrease."07";
				break;*/
			case "thighs":
				$rate = "$this->increase_decrease}09";
				break;
			case "hips":
				$rate = "{$this->increase_decrease}09";
				break;
			case "restingheartrate":
				$rate = "-10";
				break;
			case "steptest":
				$rate = "-20"; //percent
				break;
		}

		//print_r($row);
		//die($row[$type]);

		if($row[$this->type] < 1){
			$this->logMessage("NO GRAPH IMAGE BECAUSE ROW {$this->type} has value of *{$row[$this->type]}* ");
			$graph = new Graph(200,50,"auto");
			$graph->SetScale("textlin", 1, 1);
			//$graph->xaxis->SetTickLabels(array(0,1));
			//$graph->SetImgFormat('png',60);
			$graph->SetMargin(-9);
			$l1plot=new LinePlot(array(0,1));
			$l1plot->SetLegend("NOT ENOUGH DATA AVAILABLE");
			$graph->Add($l1plot);
			$graph->SetFrame(false);
			//$graph->SetBackgroundImage("/www/virtualgym/web/images/fat.gif", BGIMG_COPY, "auto");
			$graph->Stroke();
			return sfView::NONE;
		}	
		
		$rate = $rate / 100;
		$three = ($row[$this->type] * (($rate / 12) * 3)) + $row[$this->type];
		$six   = ($row[$this->type] * (($rate / 12) * 6)) + $row[$this->type];
		$nine  = ($row[$this->type] * (($rate / 12) * 9)) + $row[$this->type];
		//echo "{$row[$type]}, $three, $six, $nine";
		//die();
		
		$l1datay = array($row[$this->type], $three, $six, $nine); //prediction
//die($row[$this->type]." ".$nine);

		//$l1datay = array("156", "155", "154", "153");
		
		$startdate = date("M-Y", strtotime($row['datetime']));
		//31 days
		$threem = date("M-Y", $this->date_calc(93, $startdate));
		$sixm =  date("M-Y",$this->date_calc(186, $startdate));
		$nine =  date("M-Y", $this->date_calc(280, $startdate));

		$datax = array($startdate, $threem, $sixm, $nine); //$gDateLocale->GetShortMonth();

		
		// Create the graph.
		$graph = new Graph(500,240,"auto");
		$graph->SetScale("textlin", $this->minscale, $this->maxscale);
		$graph->SetMargin(50,50,60,50);
		//$graph->yaxis->hide();
       //$graph->xaxis->hide();
       //$graph->yaxis->hide();
       $graph->SetFrame(false);
		//$graph->SetShadow();
	   $graph->xaxis->SetTickLabels($datax);

		// Create the linear error plot
		$l1plot=new LinePlot($l1datay);
		$l1plot->SetColor("red");
		$l1plot->SetWeight(2);
		//$l1plot->legend->Pos(.05, .04, "right", "top");
		$l1plot->SetLegend("$prediction");
        

		//$l2plot = new LinePlot($l2datay);
		//$l2plot->SetWeight(2);
		//$l2plot->SetColor("blue");
		//$l2plot->SetFillColor("black");
		//$l2plot->SetLegend("Actual");

		// Add the plots to the graph

		$graph->Add($l1plot);
		//$graph->Add($l2plot);
		
		$graph->title->Set("$title");
		$graph->yaxis->title->Set("$name");
		$graph->yaxis->SetTitleMargin(37);

		$graph->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
		
		$graph->SetColor('white');
		$graph->SetTitleBackground('white');
		$graph->SetMarginColor('white');
		

		//set legend
		$graph->legend->Pos(.05, .04, "right", "top");
		$imagename = $this->graph_actualprogressdata();		
		$graph->SetBackgroundImage($imagename, BGIMG_COPY, "auto");
		
		//set scaling
		
		// Draw
		$graph->Stroke();
		return sfView::NONE;

	}
  
  
	private function progress_report_priority($type){
		//die($type);
		switch($type){
			case 1: //pushups
				return "?name=Total Pushups&type=pushups";
				break;
			case 2:
				return "?name=Weight&type=weight";
				break;
			case 3:
				return "?name=Step Test&type=steptest";
				break;
			case 4:
				return "?name=Hips&type=hips";
				break;
			case 5:
				return "?name=Resting Heart Rate&type=restingheartrate";
				break;
			case 6:
				return "?name=Thighs&type=thighs";
				break;	
			case 7:
				return "?name=Waist&type=waist";
				break;	
			case 8:
				return "?name=Chest&type=chest";
				break;		
		}


	}
  

  private function date_calc($number_of_days, $date){

		return ($number_of_days * 86400) + strtotime($date);

	}
	
}
