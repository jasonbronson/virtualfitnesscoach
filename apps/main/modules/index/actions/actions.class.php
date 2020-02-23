<?php

/**
 * index actions.
 *
 * @package    virtualgym
 * @subpackage index
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class indexActions extends sfActions
{

	public function preExecute(){

		//
		$this->mysql = new mysqlclass();  
	    $this->exercisecommon = new exercisecommon();
		$this->common = new commonlib();
		
	 
	}
	
	


	


	/**
	 * Executes index action
	 *
	 */
	public function executeIndex()
	{
		
			$this->header = true;
		
		//get user info session
		$userid = $this->getUser()->getAttribute('user_id', 'NA');
		
		
		
		//if type is requested !
		if($this->getRequestParameter('type')){
			//set date session if in url else set cur date
			$this->getUser()->setAttribute('searchdate', $this->getRequestParameter('date', date("Y-m-d")));

			$viewdateworkout = $this->getRequestParameter('date', date("Y-m-d"));

			$exerciseday_results = $this->exercisecommon->getexerciseday($userid, $viewdateworkout);
			$type = $this->getRequestParameter('type');

			$this->logMessage("TYPE $type REQUESTED ");
		}else{
			//defaults to today if not given
			$viewdateworkout = date("Y-m-d");
			//get exercise type for this viewdateworkout
			$exerciseday_results = $this->exercisecommon->getexerciseday($userid, $viewdateworkout);
			$type = $exerciseday_results['type'];
			$this->logMessage("TYPE NOT REQUESTED SHOW DEFAULT Getexeriseday returned type ".$exerciseday_results['type']);
		}


		$futuredays_array = array();
		$this->futuredays_array = $this->getfuture_exerciseday($userid);

		//DATE TO PASS TO TEMPLATES
		$this->viewdateworkout = $viewdateworkout;

		//USER to use in template
		$this->user_id = $userid;

		//set the SWIF FILE
		$this->swif = $exerciseday_results['swif'];
		$this->getUser()->setAttribute('swif', $this->swif); //if forwarding

		
		//check if assessment has been done yet?
		$res = $this->mysql->mysqlquery("SELECT * FROM assessment where user_id='$userid'");
		if(mysql_num_rows($res) == 0)
			$type = "a";
		
		
		switch ($type) {
			case "a":
				$this->common->reporting("assessment", $userid);
				$this->worktype_num = $type;
			break;
			case 1:
				$this->worktype_name="Resistance";
				$this->worktype_num = $type;
				$this->workout1 = "Cardio";
				$this->workout2 = "Rest";
				$this->typenum1 = 2;
				$this->typenum2 = 3;
				$this->common->reporting("loadresistance", $userid);
				break;
			case 2:
				$this->worktype_name="Cardio";
				$this->worktype_num = $type;
				$this->workout1 = "Resistence";
				$this->workout2 = "Rest";
				$this->typenum1 = 1;
				$this->typenum2 = 3;
				$this->common->reporting("loadcardio", $userid);
				break;
			case 3:
				$this->worktype_name="Rest";
				$this->worktype_num = $type;
				$this->workout1 = "Cardio";
				$this->workout2 = "Resistence";
				$this->typenum1 = 2;
				$this->typenum2 = 1;
				$this->common->reporting("loadrest", $userid);
				break;
			case  4:
				$this->worktype_name="Nutrition";
				$this->worktype_num = $type;
				$this->workout1 = "Cardio";
				$this->workout2 = "Resistence";
				$this->typenum1 = 2;
				$this->typenum2 = 1;
				$this->common->reporting("loadnutrition", $userid);
				break;
			case  5:
				$this->worktype_name="Progress Report";
				$this->worktype_num = $type;

				//$this->workout1 = "Cardio";
				//$this->workout2 = "Resistence";
				$this->typenum1 = 2;
				$this->typenum2 = 1;
				$this->common->reporting("loadprogressreport", $userid);
				 $this->forward('progressreport', 'index');
				break;
			case 6: //motivation
				$this->worktype_num = $type;
				$this->common->reporting("loadmotivation", $userid);
				 $this->forward('motivation', 'index');
				break;

			case 7: //education
				$this->worktype_num = $type;
				$this->common->reporting("loadeducation", $userid);
				 $this->forward('education', 'index');
				break;

			case 8:
				$this->worktype_num = $type;
				break;

			case 9:
				$this->worktype_num = $type;
				 $this->forward('connectwithothers', 'index');
				break;

			case 10:
				$this->common->reporting("loadevents", $userid);
				$this->worktype_num = $type;
				 $this->forward('events', 'index');
				break;
		}

		//$this->logMessage("{$this->worktype_num} WORK TYPE NUM", "info");

		
	}

	


	public function executePopup()
	{
		
		
		
		
		$exgraphic = $this->getRequestParameter('exgraphic');
		$res = $this->mysql->mysqlquery("SELECT * FROM exercise_list where exercisename='$exgraphic'");
		$row=mysql_fetch_array($res);
		$this->row = $row;

	    $userid = $this->getUser()->getAttribute('user_id');
		$this->common->reporting("loadpopup:$exgraphic", $userid);
	}



	

	

	public function executeFlexgetusercomments(){
		$mysql = new mysqlclass();

		//$user_id = $this->getUser()->getAttribute('user_id', 'NA');
		$user_id = $this->getRequestParameter('userid');

		if($user_id != ""){

			$query = "SELECT * FROM fitnessuser_comments where activeflag='1' and user_id='{$user_id}' or sendto='{$user_id}' and activeflag='1' order by commentdate limit 20";
			$res = $this->mysql->mysqlquery($query);
			while($row = mysql_fetch_array($res)){
				$firstdate = date("m/d/Y ", strtotime($row['commentdate']));
				if($firstdate != $olddate)
				$xml .= "$firstdate \n";

				$timeconverted = date("H:i A", strtotime($row['commentdate']));
				$comment = $row['comment'];
				if($row['sendto'] == $user_id)
				$who = "Coach";
				else
				$who = "USER";

				//Me 12:42 can i increase the resistence
				$xml .= "$who $timeconverted $comment\n";
				$olddate = $firstdate;
			}
		}

		header('Content-Type: text/xml');
		return $this->renderText("<returntext>$xml</returntext>");

	}

	public function executeFlexuser_selectbox(){
		$mysql = new mysqlclass();


		$query = "SELECT * FROM fitness_users order by email ";
		$res = $this->mysql->mysqlquery($query);

		$selectlist .= "<SELECTITEM code=''>Choose</SELECTITEM>\n";

		while($row = mysql_fetch_array($res)){

			$selectlist .= "<SELECTITEM code='".$row['user_id']."'>".$row['email']." ".$row['user_firstname']." ".$row['user_lastname']."</SELECTITEM>\n";
		}



		header('Content-type: application/xml');


		$this->xmlcode = "<USERSELECT>\n$selectlist</USERSELECT>";
		return $this->renderText($this->xmlcode);


	}


	public function executeFlexchecklastusermessages(){
		$mysql = new mysqlclass();

		//$user_id = $this->getUser()->getAttribute('user_id', 'NA');
		$query = " SELECT user_id, commentdate FROM fitnessuser_comments where sendto='0' and activeflag='1'
     	and user_id != 0 and commentdate > date_sub(now(), interval 4 day) order by commentdate desc limit 200";

		$res = $this->mysql->mysqlquery($query);

		while($row = mysql_fetch_array($res)){

			if( array_search($row['user_id'] ,$user_array) === FALSE){
				$query = "SELECT * FROM fitness_users where user_id='{$row['user_id']}'";
				$res2 = $this->mysql->mysqlquery($query);
				$userinfo = mysql_fetch_array($res2);
				$commentdate = date("m/d/Y H:i", strtotime($row['commentdate']));
				$lastmessagesfrom .=  "{$userinfo['email']} {$userinfo['user_firstname']} {$userinfo['user_lastname']}  $commentdate \n\n";
			}

			$user_array[] = $row['user_id'];
		}

		header('Content-Type: text/xml');

		return $this->renderText("<returntext>LAST MESSAGES FROM:\n $lastmessagesfrom</returntext>");



	}

	public function executeFlexcheckmessagecomments(){
		$mysql = new mysqlclass();
		$user_id = $this->getUser()->getAttribute('user_id', 'NA');
		$query = "SELECT commentdate, date_sub(now(), interval 1 minute) as now FROM fitnessuser_comments where activeflag='1' and user_id='0' and sendto='{$user_id}' or user_id='{$user_id}' and sendto='0' and activeflag='1' order by commentdate desc limit 1";
		$res = $this->mysql->mysqlquery($query);

		header('Content-Type: text/xml');

		$row  = mysql_fetch_array($res);
		$curtime = date("His", strtotime($row['now']));
		$lastmessagetime = date("His", strtotime($row['commentdate']));

		if($lastmessagetime > $curtime ){
			$this->logMessage("YES *****$lastmessagetime ** $curtime****");
			return $this->renderText("<returntext>YES</returntext>");
		}else{
			$this->logMessage("NO *******$lastmessagetime *  $curtime***");
			return $this->renderText("<returntext>NO</returntext>");
		}


	}

	public function executeFlexgetcoachcomments(){
		$mysql = new mysqlclass();

		$user_id = $this->getUser()->getAttribute('user_id', 'NA');

		$query = "SELECT * FROM fitnessuser_comments where activeflag='1' and user_id='0' and sendto='{$user_id}' or user_id='{$user_id}' and sendto='0' and activeflag='1' order by commentdate desc limit 20";
		$res = $this->mysql->mysqlquery($query);
		while($row = mysql_fetch_array($res)){
			$firstdate = date("m/d/Y ", strtotime($row['commentdate']));

			if($firstdate != $olddate)
			$xml .= "$firstdate \n";


			$timeconverted = date("H:i A", strtotime($row['commentdate']));
			$comment = $row['comment'];
			if($row['sendto'] == $user_id)
			$who = "Coach";
			else
			$who = "Me";

			//Coach 12:42 how is your workout going
			$xml .= "$who $timeconverted $comment\n";
			$olddate = $firstdate;
		}

		header('Content-Type: text/xml');
		return $this->renderText("<returntext>$xml</returntext>");

	}
	public function executeFlexsavecoachcomments(){
		$mysql = new mysqlclass();

		$chatinput = $this->getRequestParameter('chatinput');
		$user_id = $this->getRequestParameter('userid');
		$type = $this->getRequestParameter('type');

		$comment = addslashes($chatinput);
		$res = $this->mysql->mysqlquery("insert into fitnessuser_comments set user_id='0', commentdate=CURRENT_TIMESTAMP(), comment='$comment', workouttype='$type', activeflag='1', sendto='{$user_id}' ");

		$xml = "<returntext>$chatinput</returntext>";

		header('Content-Type: text/xml');
		return $this->renderText($xml);
	}


	public function executeFlexsavecomments(){
		$mysql = new mysqlclass();

		$chatinput = $this->getRequestParameter('chatinput');
		$user_id = $this->getUser()->getAttribute('user_id', 'NA');
		$type = $this->getRequestParameter('type');

		$comment = addslashes($chatinput);
		$res = $this->mysql->mysqlquery("insert into fitnessuser_comments set user_id='{$user_id}', commentdate=CURRENT_TIMESTAMP(), comment='$comment', workouttype='$type', activeflag='1', sendto='0' ");

		$xml = "<returntext>$chatinput</returntext>";

		header('Content-Type: text/xml');
		return $this->renderText($xml);
	}
	
	public function executeCommentsLoadLog(){
		$this->user_id = $this->getRequestParameter("user_id");
		
		$userToCoach = "and u.user_id='{$this->user_id}'";
		$coachToUser = "and c.sendto='{$this->user_id}'";
			
		$results = $this->mysql->mysqlquery("
				SELECT c.id, c.user_id, u.user_firstname, u.user_lastname, c.comment, c.commentdate
				FROM fitnessuser_comments c join fitness_users u on u.user_id = c.user_id
				where c.activeflag=1 $userToCoach
				union
				SELECT c.id, c.user_id, u.user_firstname, u.user_lastname, c.comment, c.commentdate
				FROM fitnessuser_comments c join fitness_users u on u.user_id = c.sendto
				where c.activeflag=1 $coachToUser
				order by 1 asc");
					
				while($row = mysql_fetch_array($results)){
		
				$date = date( "m-d-Y h:i A", strtotime($row['commentdate']));
						$comment = $row['comment'];
				if($row['user_id'] == 0){
					$name = "Coach";
				}else{
					$name = "Me";
				}
		
				echo "<div class='msgln'>$date $name: $comment</div>";
				}
					
				if(mysql_num_rows($results) == 0){
				echo "<div class='msgln'>NO CHAT LOG FOUND</div>";
			}
		
			return sfView::NONE;
	}

	public function executeComments(){
		$mysql = new mysqlclass();

		$this->user_id = $this->getUser()->getAttribute('user_id', 'NA');
		$comment = $this->getRequestParameter('response');
		
		if($_POST){
			$comment = mysql_real_escape_string($comment);
			$resource = $mysql->mysqlquery("INSERT INTO fitnessuser_comments set user_id='{$this->user_id}',
						commentdate=now(), comment='{$comment}', sendto=0");
				
			}


	}


	public function executeResistence(){

		$mysql = new mysqlclass();


		$user_id = $this->getRequestParameter('user_id','');
		$searchdate = $this->getRequestParameter('searchdate','');

		$what = $this->getRequestParameter('what');

		$toomuch = $this->getRequestParameter('tooeasy');
		if($toomuch == "true"){
			$this->logMessage("TOO MUCH CLICKED ");
			$res = $this->mysql->mysqlquery("insert into feedback set tooeasy='1', user_id='{$user_id}', clickdate=CURRENT_TIMESTAMP, what='$what'");
		}
		$toolittle = $this->getRequestParameter('toohard');
		if($toolittle == "true"){
			$this->logMessage("TOO LITTLE CLICKED ");
			$res = $this->mysql->mysqlquery("insert into feedback set toohard='1', user_id='{$user_id}', clickdate=CURRENT_TIMESTAMP, what='$what'");
		}



		$query = "SELECT * FROM fitness_exercise_resistence where user_id={$user_id} and workoutdate = '$searchdate' order by circuit,sortnumber";
		$res = $this->mysql->mysqlquery($query);

		$all_array = array();

		while($row  = mysql_fetch_array($res, MYSQL_ASSOC)){

			//print_r($row);
			$exname = $row['exgraphic'];

			$query2 = "SELECT * FROM exercise_list where exercise_list.exercisename='$exname'";
			$results = $this->mysql->mysqlquery($query2);
			$graphic_row = mysql_fetch_array($results);
			$row['exercisefile'] = $graphic_row['exercisefile'];

			if(array_search  ( $row['circuit'], $circuitnumbers ) === FALSE )
			$circuitnumbers[] = $row['circuit'];


			$all_array[] = $row;
		}
		//GRAPHIC array
		$this->graphiclist = $graphic_array;


		//ROW DATA
		$this->row = $all_array;

		//NEED unique circuit numbers
		$this->circuitnumber = $circuitnumbers;

		//NOW GET MIN cardio
		$this->minicardio_array = $this->minicardio($searchdate);

		//NOW GET WARMUP cardio
		$this->warmupcardio_array = $this->warmupcardio($searchdate);


		//var_dump($this->minicardio());



		return $this->setTemplate("resistence");


	}

	private function warmupcardio($searchdate){


		$mysql = new mysqlclass();
		$userid = $this->getRequestParameter('user_id','');
		$query = "SELECT * FROM fitness_exercise_warmupcardio where workoutdate='$searchdate' and user_id='{$userid}'";
		$res = $this->mysql->mysqlquery($query);

		$counter =1;
		while($row  = mysql_fetch_array($res, MYSQL_ASSOC)){
			//$all_array[$counter] = $row;
			//$counter = $counter +1;
			$all_array[] = $row;
		}

		return $all_array;


	}

	private function minicardio($searchdate){


		$mysql = new mysqlclass();
		$userid = $this->getRequestParameter('user_id','');
		$query = "SELECT * FROM fitness_exercise_minicardio where workoutdate='$searchdate' and user_id='{$userid}'";
		$res = $this->mysql->mysqlquery($query);

		$counter =1;
		while($row  = mysql_fetch_array($res, MYSQL_ASSOC)){
			//$all_array[$counter] = $row;
			//$counter = $counter +1;
			$all_array[] = $row;
		}

		return $all_array;


	}

	public function executeCardio(){

		$mysql = new mysqlclass();

		$userid = $this->getRequestParameter('user_id','');
		$searchdate = $this->getRequestParameter('searchdate','');
		$query = "SELECT * FROM fitness_exercise_cardio where user_id='$userid' and workoutdate='$searchdate'";


		$res = $this->mysql->mysqlquery($query);
		$row  = mysql_fetch_array($res, MYSQL_ASSOC);
		$this->row = $row;

		return $this->setTemplate("cardio");

	}



	public function executeRest(){

		$mysql = new mysqlclass();

		$userid = $this->getRequestParameter('user_id','');
		$searchdate = $this->getRequestParameter('searchdate','');
		$query = "SELECT * FROM fitness_exercise_rest where user_id='$userid' and workoutdate='$searchdate'";

		$res = $this->mysql->mysqlquery($query);
		$row  = mysql_fetch_array($res, MYSQL_ASSOC);
		//$this->row = $row;


		$this->image1 = $row['image1'];
		$this->message = $row['message'];
		return $this->setTemplate("rest");

	}



	public function executeLogout(){
		
		$userid = $this->getUser()->getAttribute('user_id');
		$this->common->reporting("logout", $userid);
		
		$this->getUser()->setAttribute('user_id', ""); //destroy user id
		session_destroy();
		return $this->redirect("default/index");

	}

	private function defaultswf($type, $swf_number){

		switch($type){
			case 1: //Resistence

				switch($swf_number){
					case 1:
						$workouttype['swif'] = "resist_morning_return.swf";
						break;
					case 2:
						$workouttype['swif'] = "resist_morning_first.swf";
						break;
					case 3:
						$workouttype['swif'] = "resist_afternoon_first.swf";
						break;
					case 4:
						$workouttype['swif'] = "resist_afternoon_return.swf";
						break;
					case 5:
						$workouttype['swif'] = "resist_evening_first.swf";
						break;
					case 6:
						$workouttype['swif'] = "resist_evening_return.swf";
						break;
				}


				break;
					case 2: //cardio
						switch($swf_number){
							case 1:
								$workouttype['swif'] = "cardio_morning_return.swf";
								break;
							case 2:
								$workouttype['swif'] = "cardio_morning_first.swf";
								break;
							case 3:
								$workouttype['swif'] = "cardio_afternoon_first.swf";
								break;
							case 4:
								$workouttype['swif'] = "cardio_afternoon_return.swf";
								break;
							case 5:
								$workouttype['swif'] = "cardio_evening_first.swf";
								break;
							case 6:
								$workouttype['swif'] = "cardio_evening_return.swf";
								break;
						}

						break;
							case 3: //rest
								switch($swf_number){
									case 1:
										$workouttype['swif'] = "rest_morning_return.swf";
										break;
									case 2:
										$workouttype['swif'] = "rest_morning_first.swf";
										break;
									case 3:
										$workouttype['swif'] = "rest_afternoon_first.swf";
										break;
									case 4:
										$workouttype['swif'] = "rest_afternoon_return.swf";
										break;
									case 5:
										$workouttype['swif'] = "rest_evening_first.swf";
										break;
									case 6:
										$workouttype['swif'] = "rest_evening_return.swf";
										break;
								}

								break;


		}




		return $workouttype['swif'];
	}
	/**
	 * Returns exercise day by date !
	 */
	/*private function getexerciseday($userid, $viewdateworkout){
		$this->logMessage("USERID:$userid Viewdateworkout:$viewdateworkout", "info");

		$mysql = new mysqlclass();
		$query = "SELECT * FROM fitness_exercise_day where user_id='{$userid}' and workoutdate = '$viewdateworkout'";


		$res = $this->mysql->mysqlquery($query);
		$row = mysql_fetch_assoc($res);
		//var_dump($row);
		$workouttype['type'] = $row['workouttype'];

		$swf_number = $this->whichswf($userid);
		$swf_number = 1; //REMOVE THIS ITS FOR THE DEMO !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		

		switch($swf_number){
			case 1:
				$workouttype['swif'] = $row['m1_swf'];
				break;
			case 2:
				$workouttype['swif'] = $row['m_swf'];
				break;
			case 3:
				$workouttype['swif'] = $row['a1_swf'];
				break;
			case 4:
				$workouttype['swif'] = $row['a_swf'];
				break;
			case 5:
				$workouttype['swif'] = $row['n1_swf'];
				break;
			case 6:
				$workouttype['swif'] = $row['n_swf'];
				break;

		}

		if($workouttype['swif'] == "")
		$workouttype['swif'] = $this->defaultswf($workouttype['type'], $swf_number);

		if($_REQUEST['type'] == 4)
		$workouttype['swif'] = $row['nutritionswf'];

		if($_REQUEST['type'] == 5)
		$workouttype['swif'] = "progressreport.swf";

		if($_REQUEST['type'] == 6)
		$workouttype['swif'] = "motivation.swf";

		if($_REQUEST['type'] == 7)
		$workouttype['swif'] = "education.swf";

		if($_REQUEST['type'] == 8)
		$workouttype['swif'] = "1.swf";

		if($_REQUEST['type'] == 9)
		$workouttype['swif'] = "2.swf";

		if($_REQUEST['type'] == 10)
		$workouttype['swif'] = "3.swf";
		//var_dump($workouttype);

		$this->logMessage("{$workouttype['swif']} WORKOUTTYPE VAR", "info");

		return $workouttype;

	}*/

	
	private function getfuture_exerciseday($userid){
		//Get next two days in future
		$query = "SELECT * FROM fitness_exercise_day where user_id='{$userid}' and workoutdate > curdate() order by workoutdate limit 2 ";
		$mysql = new mysqlclass();
		$res = $this->mysql->mysqlquery($query);
		while($row = mysql_fetch_assoc($res)){
			//var_dump($row);
			$workoutdate_dayname = strtotime($row['workoutdate']);
			$tmp['dayname'][] = date("l", $workoutdate_dayname);
			$tmp['date'][] = substr($row['workoutdate'], 0, 10);

			switch ($row['workouttype']) {
				case 1:
					$tmp['type_name'][] = "Resistence";
					break;
				case 2:
					$tmp['type_name'][] = "Cardio";
					break;
				case 3:
					$tmp['type_name'][] = "Rest";
					break;

			}
			$tmp['type_num'][] = $row['workouttype'];


		}
		return $tmp;

	}





	private function getusercomment($userid, $workouttype, $workoutdate){

		if($workoutdate=="")
		   $workoutdate = "commentdate=curdate()";
		 else
		   $workoutdate = "commentdate='$workoutdate'";


		$query = "SELECT * FROM fitnessuser_comments where activeflag != 0 and sendto='{$userid}' and $workoutdate and workouttype='{$workouttype}'";
		$mysql = new mysqlclass();
		$res = $this->mysql->mysqlquery($query);
		while($row = mysql_fetch_assoc($res))
		$comments[] = $row['comment'];

		return $comments;

	}


	public function executeSendchat(){

		$mysql = new mysqlclass();

		$chatinput = $this->getRequestParameter('chatinput');
		$user_id = $this->getUser()->getAttribute('user_id', 'NA');
		$type = $this->getRequestParameter('type');

		$comment = addslashes($chatinput);
		$res = $this->mysql->mysqlquery("insert into fitnessuser_comments set user_id='{$user_id}', commentdate=CURRENT_TIMESTAMP(), comment='$comment', workouttype='$type', activeflag='1', sendto='0' ");




	}

	public function executeGetchat(){
		$mysql = new mysqlclass();

		//$user_id = $this->getUser()->getAttribute('user_id', 'NA');
		$user_id = $this->getRequestParameter('userid');

		if($user_id != ""){

			$query = "SELECT * FROM fitnessuser_comments where activeflag='1' and user_id='{$user_id}' or sendto='{$user_id}' and activeflag='1'";
			$res = $this->mysql->mysqlquery($query);
			while($row = mysql_fetch_array($res)){
				$firstdate = date("m/d/Y ", strtotime($row['commentdate']));
				if($firstdate != $olddate)
				$xml .= "$firstdate \n";

				$timeconverted = date("H:i A", strtotime($row['commentdate']));
				$comment = $row['comment'];
				if($row['sendto'] == $user_id)
				$who = "Coach";
				else
				$who = "USER";

				//Me 12:42 can i increase the resistence
				$xml .= "$who $timeconverted $comment\n";
				$olddate = $firstdate;
			}
		}

		return $this->renderText($xml);


	}

	public function executeCommentsv2(){



	}
	
	public function executeAjax_report(){

	/*$mysql = new mysqlclass();*/
  	 
  	       /* $query = "SELECT datediff(now(), occured) as lastreport FROM `reporting` where data='{$data}' and user_id='{$user_id}' ";
     		$res = $mysql->mysqlquery($query);
     		if(mysql_num_rows($res) > 0){
     			$row = mysql_fetch_array($res);
     			if($row['lastreport'] == 0)
	     				return;
     		}*/
  	  /* 
  	 $date = date("Y-m-d");
  	     $query = "SELECT *, UNIX_TIMESTAMP('2009-10-19 01:00') as lastupdate, UNIX_TIMESTAMP('2009-10-19 01:02') as now FROM reporting where data='test' and user_id='101' and occured like '$date%'";
  	       $res = $mysql->mysqlquery($query);
  	       
  	       $row = mysql_fetch_array($res);
  	       //print_r($row);
  	       //echo $row['lastupdate'];
  	       $total_seconds = $row['now'] - $row['lastupdate']; 
  	       if($total_seconds < 121)
  	       	echo "Under 2 minutes ";
  	       	 else
  	       	echo "Over 2 minutes ";
  	       
  	       	die($total_seconds."**");
  	       
  	       if(mysql_num_rows($res) == 0){
  	           $query = "INSERT INTO `reporting` set data='test', user_id='101', occured=now()";
            	$res = $mysql->mysqlquery($query);
  	       }else{
			
  	       	  $query = "UPDATE `reporting` set occured=now() where data='test' and user_id='101'";
            	$res = $mysql->mysqlquery($query);
  	       	
  	       }*/
		$user_id = $this->getRequestParameter('userid');
		$this->common->reporting('timeloggedin', $user_id);
		return $this->renderText("OK");
	}


}
