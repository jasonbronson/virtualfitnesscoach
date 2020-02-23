<?php

/**
 * nutritioncalories actions.
 *
 * @package    virtualgym
 * @subpackage nutritioncalories
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class flexnutritionActions extends sfActions
{

  public function preExecute(){
	
  	$this->mysql = new mysqlclass();
	$this->exercisecommon = new exercisecommon();
  }
	
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    
  	
  	
  }
  
  public function executeFirstswfload(){
  	//load the swf on nutrition load
  	$userid = $this->getUser()->getAttribute('user_id', 'NA');
  	$query = "SELECT * FROM fitness_exercise_day where user_id='$userid' and workoutdate=curdate()";
  	$res = $this->mysql->mysqlquery($query);
	$row = mysql_fetch_array($res);
	$this->swf = "/uploads/nutrition_swf/".$row['nutritionswf'];	
	
	$this->getResponse()->setContentType('text/xml');
	$this->setLayout(false);
  	
  }
  
  public function executeLoadcalories(){
  	
  	$userid = $this->getUser()->getAttribute('user_id', 'NA');
  	$workouttype = $this->exercisecommon->getexercisetype($userid, date("Y-m-d"));
  	//die(print_r($workouttype));
  	$dailycalories = $this->exercisecommon->getuserdailycalories($userid, $workouttype['workouttype']);
  	
  	$res = $this->mysql->mysqlquery("SELECT * FROM nutritioncal_workouttype where dailycaltype='$dailycalories' and type='{$workouttype['workouttype']}'");
		   $this->row = mysql_fetch_array($res);
		
		   if($workouttype['nutritionswf'] == "")
		     $this->swf = "/uploads/nutrition_swf/nutrition_default.swf";
		   	else
		     $this->swf = "/uploads/nutrition_swf/".$workouttype['nutritionswf'];
				
	$this->getResponse()->setContentType('text/xml');
	$this->setLayout(false);  	
  }
  
  
	public function executeNutritioncal(){

		$mysql = new mysqlclass();

		$userid = $this->getUser()->getAttribute('user_id', 'NA');
  		$workouttype = $this->exercisecommon->getexercisetype($userid, date("Y-m-d"));
  	//die(print_r($workouttype));
  		$dailycal = $this->exercisecommon->getuserdailycalories($userid, $workouttype['workouttype']);
  	
			
  		
  		//Build your own param
  		$byo = $this->getRequestParameter('byo');
		
		if($byo == ""){
			$mealtype = array("bm", "lm", "dm", "bs", "ls", "ds");
		}else{
			switch($byo){
				case "b":
					$mealtype = array("bb1", "bb2", "bb3", "bb4");
				break;	
				case "l":
					$mealtype = array("bl1", "bl2", "bl3", "bl4");
				break;	
				case "d":
					$mealtype = array("bd1", "bd2", "bd3", "bd4");
				break;	
			}
			
		}
			
			
		foreach($mealtype as $type){
			switch($type){
				case "bm":
					$xml_type = "breakfast";
					break;
				case "lm":
					$xml_type = "lunch";
					break;
				case "dm":
					$xml_type = "dinner";
					break;
				case "bs":
					$xml_type = "snack1";
					break;
				case "ls":
					$xml_type = "snack2";
					break;
				case "ds":
					$xml_type = "snack3";
					break;
				case "bb1":
					$xml_type = "b1";
					break;
				case "bb2":
					$xml_type = "b2";
					break;
				case "bb3":
					$xml_type = "b3";
					break;
				case "bb4":
					$xml_type = "b4";
					break;		
				case "bl1":
					$xml_type = "b1";
					break;
				case "bl2":
					$xml_type = "b2";
					break;
				case "bl3":
					$xml_type = "b3";
					break;
				case "bl4":
					$xml_type = "b4";
					break;				
				case "bd1":
					$xml_type = "b1";
					break;
				case "bd2":
					$xml_type = "b2";
					break;
				case "bd3":
					$xml_type = "b3";
					break;	
				case "bd4":
					$xml_type = "b4";
					break;	
			}

			$row = "";
			$data = "";
			$uploadpath = "/uploads/nutrition/";
			$swfpath = "/uploads/nutrition_swf/";
			
			  		//MUST CHOOSE THE DAILY CALORIES FROM 
  		    $query2 = "SELECT * FROM nutritioncal_workouttype where dailycaltype='$dailycal' and type='{$workouttype['workouttype']}'";
			$res2 = $this->mysql->mysqlquery($query2);
			$row2 = mysql_fetch_array($res2);
			
			$query = "SELECT * FROM nutrition_cal where type='$type' and dailycal='{$row2['totalcalories']}' limit 7";
			$res = $this->mysql->mysqlquery($query);
			//<title><![CDATA[{$row['title']}]]></title>
			while($row = mysql_fetch_array($res)){
				//echo $row['title']."**<BR>";\
				$serving = str_replace("|", "\n", $row['portion']);
				$data .= "<itemdata> <type>$type</type> <id>{$row['id']}</id> <title><![CDATA[{$row['title']}]]></title> <imgsource>$uploadpath{$row['image']}</imgsource> <serving><![CDATA[{$serving}]]></serving> <cal>{$row['calories']}</cal> <swf>$swfpath{$row['swf']}</swf> <available>yes</available> </itemdata>\n";
			}

			$alldata .= "<$xml_type> $data </$xml_type>";

		}





		//die();
		//die($alldata);
		//<itemdata> <title></title> <imgsource></imgsource> <serving></serving> <cal></cal> <swf></swf> <available>yes</available> </itemdata>
		header("content-type: text/xml");

		$xml = "<root> $alldata </root>";
		$this->setLayout(false);
		return $this->renderText($xml);



	}
  
		public function executeNutritioncal_createmeal(){


		$mysql = new mysqlclass();

		$mealtype = array("bb1", "bb2", "bb3", "bb4", "bl1","bl2","bl3","bl4","bd1","bd2","bd3","bd4");

		foreach($mealtype as $type){


			/*if(strpos($type, "bb") !== false){
			 $xml_type = "bb";
			 }
			 if(strpos($type, "bl") !== false){
			 $xml_type = "bl";
			 }
			 if(strpos($type, "bd") !== false){
			 $xml_type = "bd";
			 }*/
			$xml_type = $type;

			$row = "";
			$data = "";
			$query = "SELECT * FROM nutrition_cal where type='$type' limit 7";
			$res = $this->mysql->mysqlquery($query);
			//<title><![CDATA[{$row['title']}]]></title>
			while($row = mysql_fetch_array($res)){
				//echo $row['title']."**<BR>";\
				$serving = str_replace("|", "\n", $row['portion']);
				$data .= "<itemdata> <title><![CDATA[{$row['title']}]]></title> <imgsource>{$row['image']}</imgsource> <serving><![CDATA[{$serving}]]></serving> <cal>{$row['calories']}</cal> <swf>{$row['swf']}</swf> <available>yes</available> </itemdata>\n";
				//$data .= "<itemdata> <title>TEST</title> <imgsource></imgsource> <serving></serving><available>yes</available> </itemdata>\n";
			}

			$alldata .= "<$xml_type> $data </$xml_type>";

		}


		//die();
		//die($alldata);
		//<itemdata> <title></title> <imgsource></imgsource> <serving></serving> <cal></cal> <swf></swf> <available>yes</available> </itemdata>
		header("content-type: text/xml");

		$xml = "<root> $alldata </root>";
		$this->setLayout(false);
		return $this->renderText($xml);


	}
	
  
  
  
}
