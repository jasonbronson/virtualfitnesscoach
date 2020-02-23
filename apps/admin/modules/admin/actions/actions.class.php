<?php

/**
 * admin actions.
 *
 * @package    virtualgym
 * @subpackage admin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class adminActions extends sfActions
{

	public function preExecute(){
		$this->mysql = new mysqlclass();
		$this->common = new commonlib();
		$this->company = $this->getUser()->getAttribute('company', "");
		$this->companyname = $this->getUser()->getAttribute('companyname', "NA");
		
	}
	
	public function executeAssessment(){
			
		$this->user_id = $this->getRequestParameter('user_id');
		if($this->user_id == "")
			return $this->renderText("ERROR USER ID REQUIRED");

		$res = $this->mysql->mysqlquery("SELECT * FROM fitness_users as u, assessment as a where u.user_id = a.user_id and a.user_id='{$this->user_id}'");
	    $this->row  = mysql_fetch_array($res, MYSQL_ASSOC);
		
			
		
	}
	
	
	public function executeIndex()
	{
		
	}

	public function executeChangepassword(){
		$mysql = new mysqlclass();

		$this->user_id = $this->getRequestParameter('user_id');
		if($this->user_id == "")
			return $this->renderText("ERROR USER ID REQUIRED");
		$newpassword = strtolower($this->getRequestParameter('newpassword'));
		$timezone = $this->getRequestParameter('timezone');
		$level = $this->getRequestParameter("level");
		$user_firstname = $this->getRequestParameter('user_firstname');
		$user_lastname = $this->getRequestParameter('user_lastname');
		$email = $this->getRequestParameter('email');
		$select_a_question = $this->getRequestParameter('select_a_question');
		$your_answer = $this->getRequestParameter('your_answer');
		$phone = $this->getRequestParameter('phone');
		$birthdate = $this->getRequestParameter('birthdate');
		$find_out = $this->getRequestParameter('find_out');
		$zip = $this->getRequestParameter('zip');
		$group = $this->getRequestParameter('group');
		$gender = $this->getRequestParameter('gender');
		$weight_goal = $this->getRequestParameter('weight_goal');
		$url = base64_encode($this->getRequestParameter('cal_url'));
		
		
		$dailycal[1] = $this->getRequestParameter('dailycal_1');
		//$dailycal[2] = $this->getRequestParameter('dailycal_2');
		//$dailycal[3] = $this->getRequestParameter('dailycal_3');
		$dailycal[2] = $dailycal[1];
		$dailycal[3] = $dailycal[1];


		if($dailycal[1] != "")
		  $this->dailycalories($dailycal, $this->user_id);

		if($_POST){

			if(strlen($newpassword) > 0 ){
				$newpassword = md5($newpassword);
				$setpassword = " user_password='$newpassword',  ";
			}

			$res = $mysql->mysqlquery("update fitness_users set $setpassword timezone = '$timezone',
			user_firstname='$user_firstname',
			user_lastname='$user_lastname',
			email='$email',
			select_a_question='$select_a_question',
			your_answer='$your_answer',
			phone='$phone',
			birthdate='$birthdate',
			find_out='$find_out',
			level='$level',
			zip='$zip',
			group_id='$group',
			gender='$gender',
			weight_goal='$weight_goal',
			cal_url='$url'
			where user_id='{$this->user_id}'");

			if(!$res)
			$this->err = "Error Saving";
			else
			$this->err = "Successful Saving";
			//return $this->forward('admin', 'showuserlist');
		}


		/***********Collect User information ***********/
		$res = $mysql->mysqlquery("SELECT * FROM fitness_users where user_id='{$this->user_id}'");
		$this->row  = mysql_fetch_array($res, MYSQL_ASSOC);


		/**GET TIME ZONES ! */
		$res = $mysql->mysqlquery("SELECT tzone FROM timezones");
		$tmp = array();
		while($tzone_rows = mysql_fetch_array($res, MYSQL_ASSOC)){
			$tmp[] = $tzone_rows['tzone'];
			//print_r($row);
		}

		$this->timezonelist  = $tmp;

		$res = $this->mysql->mysqlquery("select * from usersdailycalories where user_id='{$this->user_id}' order by workouttype");
		while($tmp  = mysql_fetch_array($res, MYSQL_ASSOC))
		$dailycal_rows[] = $tmp;

		$this->dailycal = $dailycal_rows;

		$res = $this->mysql->mysqlquery("SELECT * FROM groups");
		while($tmp  = mysql_fetch_array($res, MYSQL_ASSOC))
		$group_rows[] = $tmp;

		$this->groups = $group_rows;
		
		

	}

	public function executeAutocomplete(){

		foreach($_REQUEST as $key => $value){
			if(strpos($key, "exercisename") !== false ){
				$tmp = $value;

			}
		}
		//$this->logMessage($value."*****");

		if(strlen($tmp)>1)
		$this->exlist = $this->common->getexerciselist($tmp);

		$this->setLayout(false);

	}

	private function dailycalories($dailycal, $userid){
		//dailycal is ARRAY

		$results = $this->mysql->mysqlquery("select * from usersdailycalories where user_id='{$userid}'");
		if(mysql_num_rows($results)> 0)
		$this->mysql->mysqlquery("delete from usersdailycalories where user_id='{$userid}'");
		 
		foreach($dailycal as $type=>$dailycalorie)
		$this->mysql->mysqlquery("INSERT into usersdailycalories set user_id='{$userid}', workouttype='{$type}', dailycalories='{$dailycalorie}'");
		 
	}


	public function executeSeecomments(){
		$mysql = new mysqlclass();

		$res = $mysql->mysqlquery("SELECT c.* FROM fitnessuser_comments as c, fitness_users as u  
		where c.viewedbycoach=0 and c.sendto = 0 and c.activeflag=1 and c.user_id = u.user_id and u.group_id='{$this->company}'");
		while($row  = mysql_fetch_array($res, MYSQL_ASSOC)){
			$tmp[] = $row;
		}
		$this->comments_array = $tmp;

	}

	public function executeStatistics(){
		
		}

	public function executeDetailuserinfo(){
			$this->user_id = $this->getRequestParameter("user_id");
			$this->navigation = $this->getRequestParameter("navigation");

			$mysql = new mysqlclass();

			$res = $mysql->mysqlquery("SELECT * FROM fitness_users where user_id = '$this->user_id'");
			$row  = mysql_fetch_array($res, MYSQL_ASSOC);
			foreach($row as $colname => $value){
				$colname = strtoupper($colname);
				$tmp .= "<$colname>$value</$colname>\n";
			}

			$this->workoutdate = $this->getRequestParameter('workoutdate');
			$this->logMessage($this->workoutdate);
			if($this->workoutdate == ""){
				$this->workoutdate = date("Y-m-d");
			}else{
				//check if we are using navigation
				if($this->getRequestParameter('navigation') == "next"){
					$tmp = strtotime("+1 day", $this->workoutdate);
					$this->workoutdate = $tmp;
				}
				if($this->getRequestParameter('navigation') == "prev"){

				}


			}
			$results .= "<WORKOUTDATE>{$this->workoutdate}</WORKOUTDATE>".$tmp;

			//NOW POPULATE EXERCISE GRID WITH CURRENT DATE !
			$query = "SELECT * FROM fitness_exercise_day where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";
			$res = $mysql->mysqlquery($query);
			$row = mysql_fetch_array($res, MYSQL_ASSOC);
			$type = $row['workouttype'];
			switch($type){
				case 1:
					$data = $this->getresistence();
					break;

			}
			$results .= $data;

			$this->xml = "<RESULTS>\n".$results."\n</RESULTS>";
			return $this->xmlresponder();


		}

	private function getresistence(){

			$mysql = new mysqlclass();
			$res = $mysql->mysqlquery("SELECT * FROM fitness_exercise_resistence  where user_id = '$this->user_id' and workoutdate='{$this->workoutdate}'");

			while($row  = mysql_fetch_array($res, MYSQL_ASSOC)){
				$tmp = "";
				foreach($row as $colname => $value){
					$colname = strtoupper($colname);
					if($colname == "WORKOUTDATE")
					$value = substr($value, 0, 10);

					$tmp .= "<$colname>$value</$colname>\n";
				}
				$data .= "<EXERCISEGRID>".$tmp."</EXERCISEGRID>";
			}

			return $data;


		}




		/*public function executeSearchuserinfo(){
			$user_id = $this->getRequestParameter("userid");
			$email = $this->getRequestParameter("email");
			$username = $this->getRequestParameter("username");
			if($user_id != "")
			$sql = "user_id like '%$user_id%'";
			if($email != "")
			$sql = "email like '%$email%'";
			if($username != "")
			$sql = "user_username like '%$username%'";


			$mysql = new mysqlclass();
			$res = $mysql->mysqlquery("SELECT * FROM fitness_users where $sql");


			while($row  = mysql_fetch_array($res, MYSQL_ASSOC)){
				
				//print_r($row);
				foreach($row as $colname => $value){
					$colname = strtoupper($colname);

					if($colname == "USER_FIRSTNAME")
					$tmp .= "<FULLNAME>{$row['user_firstname']} {$row['user_lastname']}</FULLNAME>\n";
					else
					$tmp .= "<$colname>$value</$colname>\n";
				}

			}
			$this->xml = "<RESULTS>\n".$tmp."\n</RESULTS>";
			//$this->scheduleend = $scheduleend;
			//$this->row = $all_array;



			return $this->xmlresponder();


		}*/

		/*private function xmlresponder(){
			header ("content-type: text/xml");

			return $this->renderText($this->xml);
		}*/


		public function executeNutritionupdate(){

		
		}

	
		/**
		 * Returns all fitness users
		 * 
		 * @return Array 
		 * 
		 */
		private function getUserList(){
			$results = $this->mysql->mysqlquery("SELECT * FROM fitness_users order by user_lastname");
			while($row = mysql_fetch_array($results)){
				$users[] = $row;
			}
			return $users;
		}
		
		
		public function executeCommentsLoadLog(){
			
			
			$this->user_id = $this->getRequestParameter("user_id");
			if($this->user_id == "ALL"){
				
			}else{
				
				$userToCoach = "and u.user_id='{$this->user_id}'";
				$coachToUser = "and c.sendto='{$this->user_id}'";
				
			}
			
			$results = $this->mysql->mysqlquery("
			SELECT c.id, c.user_id, u.user_firstname, u.user_lastname, c.comment, c.commentdate 
					FROM fitnessuser_comments c join fitness_users u on u.user_id = c.user_id
			where c.activeflag=1 $userToCoach
			union
			SELECT c.id, c.user_id, u.user_firstname, u.user_lastname, c.comment, c.commentdate
					 FROM fitnessuser_comments c join fitness_users u on u.user_id = c.sendto
			where c.activeflag=1 $coachToUser 
			order by 1 desc");
			
			while($row = mysql_fetch_array($results)){
				
				$date = date( "m-d-Y h:i A", strtotime($row['commentdate']));
				$comment = $row['comment'];
				if($row['user_id'] == 0){
					$name = "Coach";	
				}else{
					$name = $row['user_firstname']." ".$row['user_lastname'];
				}
				
				echo "<div class='msgln'>$date $name: $comment</div>";
			}
			
			if(mysql_num_rows($results) == 0){
				echo "<div class='msgln'>NO CHAT LOG FOUND</div>";
			}
			
			return sfView::NONE;
			
		}

		public function executeComments(){

			
			$this->userList = $this->getUserList();
			
			$this->user_id = $this->getRequestParameter("user_id");
			$coachComment = $this->getRequestParameter("coachResponse");
			$coachComment = mysql_real_escape_string($coachComment);
			
			if($_POST){
				if($this->user_id !="ALL"){
					//Send to only a single user {$this->user_id}
					$resource = $this->mysql->mysqlquery("INSERT INTO fitnessuser_comments set user_id=0,
							commentdate=now(), comment='{$coachComment}', sendto='{$this->user_id}'");
				}else{
					
					//Send the comment to everyone
					foreach($this->userList as $key=>$user){
						
						$resource = $this->mysql->mysqlquery("INSERT INTO fitnessuser_comments set user_id=0,
								commentdate=now(), comment='{$coachComment}', sendto='{$user['user_id']}'");
					}
					
				}
				
				
				
			
			}
			/*
			$flag = $this->getRequestParameter("flag");
			$id = $this->getRequestParameter("id");
			if($id != ""){
				if($flag == "ACTIVE")
				$flagit = 0;
				else
				$flagit = 1;
				$query = "update fitnessuser_comments set activeflag='$flagit' where id='$id'";
				$res = $mysql->mysqlquery($query);
			}


			if($comments != ""){
				//$comments = htmlentities($comments);
				$comments = addslashes($comments);
				$query = "insert into fitnessuser_comments set user_id='0', commentdate='$commentdate', workouttype='$type', comment='$comments', sendto='$this->user_id'";
				$res = $mysql->mysqlquery($query);
			}


			$query = "SELECT * FROM fitnessuser_comments order by commentdate desc";
			$res = $mysql->mysqlquery($query);
			while($row = mysql_fetch_array($res, MYSQL_ASSOC)){

				if($row['user_id']== 0 && $row['sendto'] == $this->user_id){
					$tmp[] = $row;

					$this->logMessage("TEST {$this->user_id} ".$row['sendto']);
				}elseif($row['user_id']==$this->user_id && $row['sendto'] == 0){
					$tmp[] = $row;
					$this->logMessage("TMP {$this->user_id} ".$row['sendto']);
				}
			}

			$this->usercomments = $tmp;

			$res = $mysql->mysqlquery("SELECT * from fitness_users where user_id='$this->user_id'");
			$this->userinfo = mysql_fetch_array($res);
			*/

		}

		public function executeShowworkoutschedules(){

			$mysql = new mysqlclass();

			$sed = $mysql->mysqlquery("SELECT * FROM fitness_exercise_day,fitness_users where fitness_users.user_id=fitness_exercise_day.user_id and workoutdate >= curdate() order by workoutdate");
			while($tmp = mysql_fetch_array($sed, MYSQL_ASSOC)){


				$row[] = $tmp;

			}
			$this->row = $row;




		}


		public function executeActiveflag(){
			$mysql = new mysqlclass();

			$this->setLayout(false);

			$this->user_id = $this->getRequestParameter("user_id");
			$this->level = $this->getRequestParameter("level");
			$thisuserlevelchange = $this->getRequestParameter("userlevelchange");

			if($thisuserlevelchange == "true"){
				$query = "update fitness_users set level='$this->level' where user_id='$this->user_id'";
				$res = $mysql->mysqlquery($query,"",true);

				$this->logMessage($res."***");

				if($res == 1){
					$this->responsemysql = "OK";
				}else{
					$this->responsemysql = "ERROR";
				}

			}



		}


		public function executeSetschedule(){

			$mysql = new mysqlclass();

			$this->user_id = $this->getRequestParameter('user_id');
			$query = "SELECT * FROM fitness_users where user_id='{$this->user_id}'";

			$res = $mysql->mysqlquery($query);
			$this->row  = mysql_fetch_array($res, MYSQL_ASSOC);

			//var_dump($row);
			$this->exerciselist = $this->common->getexerciselist("");

			/*  $dir = 'uploads/swf/';
			 $this->swif_files = scandir($dir);
			 $this->exgraphic_files = scandir('uploads/graphic/');
			 $this->cardio_files = scandir('uploads/graphic/');
			 */
			$common = new commonlib();
			$files = $common->getfilelists(); //gets graphics, nutrition, and cardio graphic files for scandir function
  		    foreach($files as $key=>$value)
  		    	$this->$key = $value;



			if($this->getRequestParameter('workoutdate')){
				$this->workoutdate = $this->getRequestParameter('workoutdate');

				$query = "SELECT * FROM fitness_exercise_day where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";
				$res = $mysql->mysqlquery($query);
				$this->f_e_d = mysql_fetch_array($res, MYSQL_ASSOC);

				//IF THIS IS A RESISTENCE DAY SCHEDULED SHOW RESISTENCE INFO
				if($this->f_e_d['workouttype'] == 1){
					$this->resistenceinfo = $this->getresistenceinfo($this->user_id, $this->workoutdate);
				}


			}else{
				$this->workoutdate = date("Y-m-d");
			}

			$query = "SELECT * FROM fitness_exercise_minicardio where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";
			$res = $mysql->mysqlquery($query);
			$this->minicardio = mysql_fetch_array($res, MYSQL_ASSOC);





		}

		public function executeSetschedule_cardio(){


		}

		public function executeDeleteuser(){


			$mysql = new mysqlclass();

			$data['user_id'] = $this->getRequestParameter('user_id');

			$query[] = "delete from fitness_exercise_minicardio where user_id='{$data['user_id']}'";
			$query[] = "delete from fitness_exercise_warmupcardio where user_id='{$data['user_id']}'";
			$query[] = "delete from fitness_exercise_day where user_id='{$data['user_id']}'";
			$query[] = "delete from fitness_exercise_rest where user_id='{$data['user_id']}'";
			$query[] = "delete from fitness_exercise_nutrition where user_id='{$data['user_id']}'";
			$query[] = "delete from fitness_exercise_resistence where user_id='{$data['user_id']}'";
			$query[] = "delete from fitness_users where user_id='{$data['user_id']}'";
			$query[] = "delete from fitnessuser_comments where user_id='{$data['user_id']}'";
			$query[] = "delete from feedback where user_id='{$data['user_id']}'";

			foreach($query as $value)
			$response = $mysql->mysqlquery($value, "","true");

			return $this->forward("showuserlist","index");

		}

		public function executeDeleteworkout(){

			$mysql = new mysqlclass();

			$data['user_id'] = $this->getRequestParameter('user_id');
			$data['workoutdate'] = $this->getRequestParameter('workoutdate');
			$data['workouttype'] = $this->getRequestParameter('workouttype');

			switch($data['workouttype']){
				case "3":
					$type="fitness_exercise_rest";
					break;
				case "2":
					$type="fitness_exercise_cardio";
					break;
				case "1":
					$type="fitness_exercise_resistence";

					//remove other cardio info on that day
					$query = "delete from fitness_exercise_minicardio where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'";
					$response = $mysql->mysqlquery($query, "","true");
					$query = "delete from fitness_exercise_warmupcardio where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'";
					$response = $mysql->mysqlquery($query, "","true");

					break;


			}


			$query = "delete from $type where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'";
			$response = $mysql->mysqlquery($query, "","true");

			$query = "delete from fitness_exercise_day where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'";
			$response = $mysql->mysqlquery($query, "","true");

			$query = "delete from fitness_exercise_nutrition where validdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'";
			$response = $mysql->mysqlquery($query, "","true");




			return $this->forward("admin","schedulelist");

		}

		public function executeUpdatecircuitrest(){
			$mysql = new mysqlclass();

			$data['swf'] = $this->getRequestParameter('swif');
			$data['workoutdate'] = $this->getRequestParameter('workoutdate_rest');
			$data['oldworkoutdate'] = $this->getRequestParameter('oldworkoutdate');

			$data['user_id'] = $this->getRequestParameter('user_id');
			$data['message'] = $this->getRequestParameter('message');
			$data['image1'] = $this->getRequestParameter('image1');

			$res = $mysql->mysqlquery("select count(*) as totalrows from fitness_exercise_day where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'");
			$tmp = mysql_fetch_assoc($res);
			if($tmp['totalrows'] == 0){

				//DELETE OLD WORKOUT !
				$query = "delete from fitness_exercise_rest where workoutdate='{$data['oldworkoutdate']}' and user_id='{$data['user_id']}'";
				$response = $mysql->mysqlquery($query, "","true");

				$query = "delete from fitness_exercise_day where workoutdate='{$data['oldworkoutdate']}' and user_id='{$data['user_id']}'";
				$response = $mysql->mysqlquery($query, "","true");

				//DELETE EXISTING DAATA FIRST
				$query = "delete from fitness_exercise_rest where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'";
				$response = $mysql->mysqlquery($query, "","true");

				$query = "delete from fitness_exercise_day where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'";
				$response = $mysql->mysqlquery($query, "","true");


			}
			//INSERTION OF NEW DATA
			$query = "insert into fitness_exercise_rest set image1='{$data['image1']}', workoutdate='{$data['workoutdate']}', user_id='{$data['user_id']}', message='{$data['message']}'";
			$response['fitness_exercise_rest'] = $mysql->mysqlquery($query, "","true");

			$query = "insert into fitness_exercise_day set workouttype='3', workoutdate='{$data['workoutdate']}', user_id='{$data['user_id']}',
			m_swf='{$data['2_swf']}', m1_swf='{$data['1_swf']}', a_swf='{$data['4_swf']}', a1_swf='{$data['3_swf']}', n_swf='{$data['6_swf']}', n1_swf='{$data['5_swf']}'";
			$response['fitness_exercise_day'] = $mysql->mysqlquery($query, "","true");
			/*
			 }else{

			 //UDPATE CURRENT ITEM
			 $query_fitness_exercise_rest = "update fitness_exercise_rest set image1='{$data['image1']}', workoutdate='{$data['workoutdate']}', user_id='{$data['user_id']}', message='{$data['message']}' where user_id='{$data['user_id']}' and workoutdate='{$data['workoutdate']}'";
			 $response['fitness_exercise_rest'] = $mysql->mysqlquery($query_fitness_exercise_rest, "","true");

			 $query_fitness_exercise_day = "update fitness_exercise_day set workouttype='2', welcomeswf='{$data['swf']}', workoutdate='{$data['workoutdate']}' where user_id='{$data['user_id']}' and workoutdate='{$data['workoutdate']}'";
			 $response['fitness_exercise_day'] = $mysql->mysqlquery($query_fitness_exercise_day, "","true");

			 }
			 */

			$this->response1 = $response;
			return $this->savemessage($this->getRequestParameter('user_id'));



		}



		public function executeAddcircuitrest(){
			$mysql = new mysqlclass();

			//$data['swf'] = $this->getRequestParameter('swif');
			for($a=1; $a < 7; $a++)
			$data["{$a}_swf"] = $this->getRequestParameter("{$a}_swif");

			$data['workoutdate'] = $this->getRequestParameter('workoutdate_rest');
			$data['user_id'] = $this->getRequestParameter('user_id');
			$data['message'] = $this->getRequestParameter('message');
			$data['image1'] = $this->getRequestParameter('image1');

			$res = $mysql->mysqlquery("select count(*) as totalrows from fitness_exercise_day where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'");
			$tmp = mysql_fetch_assoc($res);
			if($tmp['totalrows'] > 0){

				$query = "delete from fitness_exercise_rest where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'";
				$response = $mysql->mysqlquery($query, "","true");

				$query = "delete from fitness_exercise_day where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'";
				$response = $mysql->mysqlquery($query, "","true");


			}
			//INSERTION OF NEW DATA
			$query = "insert into fitness_exercise_rest set image1='{$data['image1']}', workoutdate='{$data['workoutdate']}', user_id='{$data['user_id']}', message='{$data['message']}'";
			$response['fitness_exercise_rest'] = $mysql->mysqlquery($query, "","true");

			$query = "insert into fitness_exercise_day set workouttype='3', workoutdate='{$data['workoutdate']}', user_id='{$data['user_id']}',
			m_swf='{$data['2_swf']}', m1_swf='{$data['1_swf']}', a_swf='{$data['4_swf']}', a1_swf='{$data['3_swf']}', n_swf='{$data['6_swf']}', n1_swf='{$data['5_swf']}'";
			$response['fitness_exercise_day'] = $mysql->mysqlquery($query, "","true");
			/*
			 }else{

			 //UDPATE CURRENT ITEM
			 $query_fitness_exercise_rest = "update fitness_exercise_rest set image1='{$data['image1']}', workoutdate='{$data['workoutdate']}', user_id='{$data['user_id']}', message='{$data['message']}' where user_id='{$data['user_id']}' and workoutdate='{$data['workoutdate']}'";
			 $response['fitness_exercise_rest'] = $mysql->mysqlquery($query_fitness_exercise_rest, "","true");

			 $query_fitness_exercise_day = "update fitness_exercise_day set workouttype='2', welcomeswf='{$data['swf']}', workoutdate='{$data['workoutdate']}' where user_id='{$data['user_id']}' and workoutdate='{$data['workoutdate']}'";
			 $response['fitness_exercise_day'] = $mysql->mysqlquery($query_fitness_exercise_day, "","true");

			 }
			 */
			
			//PREPARE DATA FOR CLONE BUTTON
			$this->workoutdate = $this->getRequestParameter('workoutdate_rest');
			$this->user_id = $this->getRequestParameter('user_id');
			
			

			$this->response1 = $response;
			return $this->savemessage($this->getRequestParameter('user_id'));



		}

		public function executeUploadfiles(){

			$type = $this->getRequestParameter('type');
			$remove = $this->getRequestParameter('remove');

			if($remove != ""){
				$removegraphic = $this->getRequestParameter('removegraphic');
				unlink("uploads/graphic/".$removegraphic);
				$removeswif = $this->getRequestParameter('removeswif');
				unlink("uploads/swf/".$removeswif);
				$removenutrition = $this->getRequestParameter('removenutrition');
				unlink("uploads/graphic/nutrition/".$removenutrition);
			}

			if($type == "swf"){

				for($a=1; $a < 5; $a++){
					$fileName = $this->getRequest()->getFileName("swf$a");
					if($fileName == "")
					continue;

					$fileName = strtolower($fileName);
					if(!file_exists("uploads/swf/$fileName")){
						$this->getRequest()->moveFile("swf$a", sfConfig::get('sf_upload_dir').'/swf/'.$fileName);
						$msg .= "UPLOADED SWF FILES SUCCESS".$fileName."<br>";
					}else{
						$msg .= "WARNING GRAPHIC FILE EXISTS ALREADY ".$fileName."<br>";
					}
				}


			}elseif($type=="graphic"){

				for($a=1; $a < 5; $a++){
					$fileName = $this->getRequest()->getFileName("graphic$a");
					if($fileName == "")
					continue;
					$fileName = strtolower($fileName);
					if(!file_exists("uploads/graphic/$fileName")){
						$this->getRequest()->moveFile("graphic$a", sfConfig::get('sf_upload_dir').'/graphic/'.$fileName);
						$msg .= "UPLOADED GRAPHIC FILES SUCCESS ".$fileName."<br>";
					}else{
						$msg .= "WARNING GRAPHIC FILE EXISTS ALREADY ".$fileName."<br>";
					}
				}
			}elseif($type == "nutrition"){

				for($a=1; $a < 5; $a++){
					$fileName = $this->getRequest()->getFileName("graphic$a");
					if($fileName == "")
					continue;
					$fileName = strtolower($fileName);
					if(!file_exists("uploads/graphic/nutrition/$fileName")){
						$this->getRequest()->moveFile("graphic$a", sfConfig::get('sf_upload_dir').'/graphic/nutrition/'.$fileName);
						$msg .= "UPLOADED Nutrition FILES SUCCESS ".$fileName."<br>";
					}else{
						$msg .= "WARNING Nutrition FILE EXISTS ALREADY ".$fileName."<br>";
					}
				}
			}elseif($type == "popup"){

				for($a=1; $a < 5; $a++){
					$fileName = $this->getRequest()->getFileName("graphic$a");
					if($fileName == "")
					continue;
					$fileName = strtolower($fileName);
					if(!file_exists("uploads/graphic/popup/$fileName")){
						$this->getRequest()->moveFile("graphic$a", sfConfig::get('sf_upload_dir').'/graphic/popup/'.$fileName);
						$msg .= "UPLOADED PopUp Video FILES SUCCESS ".$fileName."<br>";
					}else{
						$msg .= "WARNING PopUp Video FILE EXISTS ALREADY ".$fileName."<br>";
					}
				}
			}
			$this->msg = $msg;

			/*$this->swif_files = scandir('uploads/swf/');
			 //$this->exgraphic_files = scandir('uploads/exgraphic/');
			 $this->graphic_files = scandir('uploads/graphic/');

			 $this->nutrition_files = scandir('uploads/graphic/nutrition/');
			 $this->popup_videofiles = scandir('uploads/graphic/popup/');
			 */
			$common = new commonlib();
			$files = $common->getfilelists(); //gets graphics, nutrition, and cardio graphic files for scandir function
  		    foreach($files as $key=>$value)
  		    	$this->$key = $value;


		}


		private function getlinkgraphicslist(){
			$mysql = new mysqlclass();

			$query = "SELECT * FROM linkgraphics";
			$res = $mysql->mysqlquery($query);
			while($row = mysql_fetch_array($res))
			$tmp[] = $row;

			$this->linkgraphicslist = $tmp;
		}

		/**
		 * Links graphics with exercise names list
		 */
		public function executeLinkgraphics(){
			$mysql = new mysqlclass();

			if($this->hasRequestParameter('remove')){

				$query = "delete from linkgraphics where id='{$this->getRequestParameter('remove')}'";
				$res = $mysql->mysqlquery($query);
				$this->removedmsg = "ITEM REMOVED SUCCESSFULLY ! <br>";
			}

			if($this->hasRequestParameter('graphic')){
				$exercisename = $this->getRequestParameter('exercisename');
				$graphic = $this->getRequestParameter('graphic');
				$exercise_id = $this->getRequestParameter('exercise_id');

				$query = "insert into linkgraphics set graphic='{$graphic}', exercisename='{$exercisename}', exercise_id='$exercise_id'";
				$res = $mysql->mysqlquery($query);
			}

			$common = new commonlib();
			$files = $common->getfilelists(); //gets graphics, nutrition, and cardio graphic files for scandir function
  		    foreach($files as $key=>$value)
  		    	$this->$key = $value;
  		    	
			$this->exercise_list = $this->common->getexerciselist("");

			$this->getlinkgraphicslist();
			//  $this->response1 = $response;
			//return $this->savemessage();
		}

		private function filterarray($exclude_array, $graphic_files){

			foreach($exclude_array as $value){
				foreach($graphic_files as $value_gr)
				if($value_gr == $value)
				$tmp[] = $value;
			}

			return $tmp;

		}

		

		public function executeAddcircuitcardio(){

			$mysql = new mysqlclass();

			for($a=1; $a < 7; $a++)
			$data["{$a}_swf"] = $this->getRequestParameter("{$a}_swif");

			//$data['swf'] = $this->getRequestParameter('swif');
			$data['workoutdate'] = $this->getRequestParameter('workoutdate_cardio');
			$data['user_id'] = $this->getRequestParameter('user_id');
			$data['pace'] = $this->getRequestParameter('pace');
			$data['numberofmin'] = $this->getRequestParameter('numberofmin');
			$data['image1'] = $this->getRequestParameter('image1');
			$data['image2'] = $this->getRequestParameter('image2');
			$data['image3'] = $this->getRequestParameter('image3');


			$res = $mysql->mysqlquery("select count(*) as totalrows from fitness_exercise_day where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'");
			$tmp = mysql_fetch_assoc($res);
			//print_r($tmp);
			if($tmp['totalrows'] > 0){
				$query = "delete from fitness_exercise_cardio where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'";
				$res = $mysql->mysqlquery($query, "","true");
				$query = "delete from fitness_exercise_day where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'";
				$res = $mysql->mysqlquery($query, "","true");

			}

			//INSERTION OF NEW DATA
			$query = "insert into fitness_exercise_cardio set image1='{$data['image1']}', image2='{$data['image2']}', image3='{$data['image3']}', numberofmin='{$data['numberofmin']}', maxheartrate='{$data['pace']}', workoutdate='{$data['workoutdate']}', user_id='{$data['user_id']}'";
			$response['fitness_exercise_cardio'] = $mysql->mysqlquery($query, "","true");

			$query = "insert into fitness_exercise_day set workouttype='2',  workoutdate='{$data['workoutdate']}', user_id='{$data['user_id']}',
			m_swf='{$data['2_swf']}', m1_swf='{$data['1_swf']}', a_swf='{$data['4_swf']}', a1_swf='{$data['3_swf']}', n_swf='{$data['6_swf']}', n1_swf='{$data['5_swf']}'";

			$response['fitness_exercise_day'] = $mysql->mysqlquery($query, "","true");

			/* }else{

			//UDPATE CURRENT ITEM
			$query_fitness_exercise_cardio = "update fitness_exercise_cardio set image1='{$data['image1']}', image2='{$data['image2']}', image3='{$data['image3']}', numberofmin='{$data['numberofmin']}', maxheartrate='{$data['pace']}', workoutdate='{$data['workoutdate']}' where user_id='{$data['user_id']}' and workoutdate='{$data['workoutdate']}'";
			$response['fitness_exercise_cardio'] = $mysql->mysqlquery($query_fitness_exercise_cardio, "","true");

			$query_fitness_exercise_day = "update fitness_exercise_day set workouttype='2', welcomeswf='{$data['swf']}', workoutdate='{$data['workoutdate']}' where user_id='{$data['user_id']}' and workoutdate='{$data['workoutdate']}'";
			$response['fitness_exercise_day'] = $mysql->mysqlquery($query_fitness_exercise_day, "","true");

			}*/


			$this->response1 = $response;
			return $this->savemessage($this->getRequestParameter('user_id'));

		}

		public function executeUpdatecircuitcardio(){

			$mysql = new mysqlclass();

			//    $data['swf'] = $this->getRequestParameter('swif');
			$data['workoutdate'] = $this->getRequestParameter('workoutdate_cardio');
			$data['oldworkoutdate'] = $this->getRequestParameter('oldworkoutdate');
			$data['user_id'] = $this->getRequestParameter('user_id');
			$data['pace'] = $this->getRequestParameter('pace');
			$data['numberofmin'] = $this->getRequestParameter('numberofmin');
			$data['image1'] = $this->getRequestParameter('image1');
			$data['image2'] = $this->getRequestParameter('image2');
			$data['image3'] = $this->getRequestParameter('image3');

			for($a=1; $a < 7; $a++)
			$data["{$a}_swf"] = $this->getRequestParameter("{$a}_swif");

			/*ob_start();
			 print_r($data1);
			 $tmp = ob_get_contents();
			 ob_end_clean();
			 $this->logMessage($tmp);
			 */

			//NOT USED YET
			$data['fitness_exercise_day_id'] =  $this->getRequestParameter('fitness_exercise_day_id');

			//exerciseday table


			//$res = $mysql->mysqlquery("select count(*) as totalrows from fitness_exercise_day where workoutdate='{$data['oldworkoutdate']}' and user_id='{$data['user_id']}'");
			//$tmp = mysql_fetch_assoc($res);
			//print_r($tmp);
			//if($tmp['totalrows'] > 0){

			$query_fitness_exercise_cardio = "update fitness_exercise_cardio set image1='{$data['image1']}', image2='{$data['image2']}', image3='{$data['image3']}',
			numberofmin='{$data['numberofmin']}', maxheartrate='{$data['pace']}', workoutdate='{$data['workoutdate']}' where user_id='{$data['user_id']}' and
			workoutdate='{$data['oldworkoutdate']}'";
			$response['fitness_exercise_cardio'] = $mysql->mysqlquery($query_fitness_exercise_cardio, "","true");

			$query_fitness_exercise_day = "update fitness_exercise_day set workouttype='2',  workoutdate='{$data['workoutdate']}',
			m_swf='{$data['2_swf']}', m1_swf='{$data['1_swf']}', a_swf='{$data['4_swf']}', a1_swf='{$data['3_swf']}', n_swf='{$data['6_swf']}',
			n1_swf='{$data['5_swf']}' where user_id='{$data['user_id']}' and workoutdate='{$data['oldworkoutdate']}'";
			$response['fitness_exercise_day'] = $mysql->mysqlquery($query_fitness_exercise_day, "","true");
			 
			//DELETE OLD WORKOUT FIRST
			/*$query = "delete from fitness_exercise_cardio where workoutdate='{$data['oldworkoutdate']}' and user_id='{$data['user_id']}'";
			$res = $mysql->mysqlquery($query, "","true");
			$query = "delete from fitness_exercise_day where workoutdate='{$data['oldworkoutdate']}' and user_id='{$data['user_id']}'";
			$res = $mysql->mysqlquery($query, "","true");

			//DELETE ANYTHING IN ITS PATH
			$query = "delete from fitness_exercise_cardio where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'";
			$res = $mysql->mysqlquery($query, "","true");
			$query = "delete from fitness_exercise_day where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}'";
			$res = $mysql->mysqlquery($query, "","true");*/
			// }

			//INSERTION OF NEW DATA
			/*$query = "insert into fitness_exercise_cardio set image1='{$data['image1']}', image2='{$data['image2']}', image3='{$data['image3']}', numberofmin='{$data['numberofmin']}', maxheartrate='{$data['pace']}', workoutdate='{$data['workoutdate']}', user_id='{$data['user_id']}'";
			$response['fitness_exercise_cardio'] = $mysql->mysqlquery($query, "","true");

			$query = "insert into fitness_exercise_day set workouttype='2',  workoutdate='{$data['workoutdate']}', user_id='{$data['user_id']}',
			m_swf='{$data['2_swf']}', m1_swf='{$data['1_swf']}', a_swf='{$data['4_swf']}', a1_swf='{$data['3_swf']}', n_swf='{$data['6_swf']}', n1_swf='{$data['5_swf']}'";
			$response['fitness_exercise_day'] = $mysql->mysqlquery($query, "","true");
			*/
			/* }else{

			//UDPATE CURRENT ITEM
			$query_fitness_exercise_cardio = "update fitness_exercise_cardio set image1='{$data['image1']}', image2='{$data['image2']}', image3='{$data['image3']}', numberofmin='{$data['numberofmin']}', maxheartrate='{$data['pace']}', workoutdate='{$data['workoutdate']}' where user_id='{$data['user_id']}' and workoutdate='{$data['workoutdate']}'";
			$response['fitness_exercise_cardio'] = $mysql->mysqlquery($query_fitness_exercise_cardio, "","true");

			$query_fitness_exercise_day = "update fitness_exercise_day set workouttype='2', welcomeswf='{$data['swf']}', workoutdate='{$data['workoutdate']}' where user_id='{$data['user_id']}' and workoutdate='{$data['workoutdate']}'";
			$response['fitness_exercise_day'] = $mysql->mysqlquery($query_fitness_exercise_day, "","true");

			}*/

				//PREPARE DATA FOR CLONE BUTTON
			$this->workoutdate = $this->getRequestParameter('workoutdate_cardio');
			$this->user_id = $this->getRequestParameter('user_id');
			

			$this->response1 = $response;
			return $this->savemessage($this->getRequestParameter('user_id'));

		}


		private function savemessage($userid){

			$this->userid = $userid;
			
			
			$this->save = "Success";

			foreach($this->response1 as $key => $value)
			 if($value == "false")
			 	$this->save = "ERROR SAVING ".$key;

			 	$this->logMessage("SAVEMESSAGE METHOD {$this->save}");
			return $this->setTemplate('save');

		}

		public function executeShowmysqllog(){

			//file_get_contents("/www/exercise/log/admin_dev.log")
			$tmp = shell_exec("tail -n 1000 /www/exercise/log/admin_dev.log | grep -i 'mysql error'");
			$tmp_array = explode("\n",$tmp);
			$tmp = "Grep'ing for Mysql Log Errors <br>";

			foreach(array_reverse($tmp_array) as $key => $value){

				$tmp .= $value."<br>";
			}

			return $this->renderText($tmp);

		}




		public function executeUpdatecircuit(){

			$mysql = new mysqlclass();

			/*  ob_start();
			 var_dump($_POST);
			 $out1 = ob_get_contents();
			 ob_end_clean();
			 //$this->addcircuit = $out1;
			 $this->logMessage("*******$out1***********************");
			 */

			for($a=1; $a < 7; $a++)
			$data["{$a}_swf"] = $this->getRequestParameter("{$a}_swif");

			$data['workoutdate'] = $this->getRequestParameter('workoutdate');
			$data['user_id'] = $this->getRequestParameter('user_id');
			$data['fitness_exercise_day_id'] =  $this->getRequestParameter('fitness_exercise_day_id');

			//exerciseday table
			$query = "update fitness_exercise_day set m_swf='{$data['2_swf']}', m1_swf='{$data['1_swf']}', a_swf='{$data['4_swf']}', a1_swf='{$data['3_swf']}', n_swf='{$data['6_swf']}', n1_swf='{$data['5_swf']}', workoutdate='{$data['workoutdate']}', workouttype='1' where id='{$data['fitness_exercise_day_id']}'";

			$res = $mysql->mysqlquery($query);
			if($reponse == "ERROR"){
				return $this->renderText("ERROR OCCURED in Add Circuit module area using method write to Exercise day resistence");
			}



			for($a=0; $a < $_REQUEST['totalrows']; $a++){


				$data['workoutdate'] = $this->getRequestParameter('workoutdate');
				$data['user_id'] = $this->getRequestParameter('user_id');


				$tmp = "resistanceid$a";
				$resistanceid =  $_REQUEST[$tmp];
				$data['id'] = $resistanceid;
				
				$tmp = "exercisename$a";
				$exercisename =  substr($_REQUEST[$tmp], strpos($_REQUEST[$tmp],":") + 1);
				$data['exercisename'] = $exercisename;

				$tmp = "sets$a";
				$sets = $_REQUEST[$tmp];
				$data['sets'] = $sets;

				$tmp = "reps$a";
				$data['reps'] = $_REQUEST[$tmp];


				$tmp = "weights$a";
				$data['weights'] = $_REQUEST[$tmp];

				$tmp = "circuit$a";
				$data['circuit'] = $_REQUEST[$tmp];

				$data['exercise'] = $a;

				$tmp = "sort$a";
				$data['sortnumber'] = $_REQUEST[$tmp];


				//remove item from resistence
				$tmp = "remove$a";
				if($_REQUEST[$tmp] == "on"){
					$reponse = $this->remove_from_resistence($data);
					continue;
				}

				if($data['weights'] != "" || $data['reps'] != "" || $data['sets'] != "" || $data['exercisename'] != "")
				$writedata[] = $data;

			}

			/*   ob_start();
			 var_dump($writedata);
			 $out1 = ob_get_contents();
			 ob_end_clean();
			 $this->logMessage("*******$out1***********************");
			 */
			$reponse = $this->common->write_to_resistence($writedata);
			
			if($reponse == "ERROR"){
				return $this->renderText("ERROR OCCURED in Add Circuit module area using method write_to_resistence ".$reponse);
			}



			$minicardio['image1'] = $this->getRequestParameter('image1');
			$minicardio['image2'] = $this->getRequestParameter('image2');
			$minicardio['image3'] = $this->getRequestParameter('image3');
			$minicardio['user_id'] = $this->getRequestParameter('user_id');
			$minicardio['workoutdate'] = $this->getRequestParameter('workoutdate');
			$minicardio['numberofmin'] = $this->getRequestParameter('numberofmin');
			$minicardio['pace'] = $this->getRequestParameter('pace');

			$this->logMessage("TEST $reponse");
			
			$reponse = $this->write_to_minicardio($minicardio);
			if($reponse == "ERROR"){
				return $this->renderText("ERROR OCCURED in Add Circuit module area using method write_to_minicardio");
			}
			

			$warmup_cardio['image1'] = $this->getRequestParameter('wu_image1');
			$warmup_cardio['image2'] = $this->getRequestParameter('wu_image2');
			$warmup_cardio['image3'] = $this->getRequestParameter('wu_image3');
			$warmup_cardio['user_id'] = $this->getRequestParameter('user_id');
			$warmup_cardio['workoutdate'] = $this->getRequestParameter('workoutdate');
			$warmup_cardio['numberofmin'] = $this->getRequestParameter('wu_numberofmin');
			$warmup_cardio['pace'] = $this->getRequestParameter('wu_pace');

			$reponse = $this->write_to_warmupcardio($warmup_cardio);
			if($reponse == "ERROR"){
				return $this->renderText("ERROR OCCURED in Add Circuit module area using method write_to_warmupcardio");
			}
			/* if($removed != true)
			 $this->totalrows = $totalrows + 1;
			 else
			 $this->totalrows = $totalrows;
			 */

			
			//PREPARE DATA FOR CLONE BUTTON
			$this->workoutdate = $this->getRequestParameter('workoutdate');
			$this->user_id = $this->getRequestParameter('user_id');
			
			
			
			$this->response1 = $response;
			$this->savemessage( $this->getRequestParameter('user_id'));




		}


		public function executeAddcircuit(){

			$mysql = new mysqlclass();

			/*  ob_start();
			 var_dump($_POST);
			 $out1 = ob_get_contents();
			 ob_end_clean();
			 //$this->addcircuit = $out1;
			 $this->logMessage("*******$out1***********************");
			 */

			for($a=1; $a < 7; $a++)
			$data1["{$a}_swf"] = $this->getRequestParameter("{$a}_swif");

			$data1['workoutdate'] = $this->getRequestParameter('workoutdate');
			$data1['user_id'] = $this->getRequestParameter('user_id');

			$query = "select count(*) as totalrows from fitness_exercise_day where user_id='{$data1['user_id']}' and workoutdate='{$data1['workoutdate']}'  ";
			$res = $mysql->mysqlquery($query);
			$rows=mysql_fetch_array($res);

			/*$this->logMessage("Total rows {$totalrows}");
			 ob_start();
			 var_dump($rows);
			 $out1 = ob_get_contents();
			 ob_end_clean();
			 //$this->addcircuit = $out1;
			 $this->logMessage("*******$out1***********************");
			 */
			if($rows['totalrows'] > 0){
				//return $this->renderText("Error You cant add a workout day with a workout already existing for this user for date {$data1['workoutdate']} Please delete the workout first Or Move it to a new day");
				$this->logMessage("WARNING WORKOUT DAY ALREADY EXISTED could be an update or not? ", "debug");
			}

			//exerciseday table
			$response = $this->common->write_to_exerciseday_resistence($data1);
			if($reponse == "ERROR"){
				return $this->renderText("ERROR OCCURED in Add Circuit module area using method write to Exercise day resistence");
			}



			for($a=0; $a < $_REQUEST['totalrows']; $a++){


				$data['workoutdate'] = $this->getRequestParameter('workoutdate');
				$data['user_id'] = $this->getRequestParameter('user_id');

				$tmp = "sort$a";
				$data['sortnumber'] = $_REQUEST[$tmp];


				$tmp = "exercisename$a";
				$exercisename =  substr($_REQUEST[$tmp], strpos($_REQUEST[$tmp],":") + 1);
				$data['exercisename'] = $exercisename;

				$tmp = "sets$a";
				$sets = $_REQUEST[$tmp];
				$data['sets'] = $sets;

				$tmp = "reps$a";
				$data['reps'] = $_REQUEST[$tmp];


				$tmp = "weights$a";
				$data['weights'] = $_REQUEST[$tmp];

				$tmp = "circuit$a";
				$data['circuit'] = $_REQUEST[$tmp];

				$data['exercise'] = $a;


				//remove item from resistence
				$tmp = "remove$a";
				if($_REQUEST[$tmp] == "on"){
					$reponse = $this->remove_from_resistence($data);
					continue;
				}

				if($data['weights'] != "" || $data['reps'] != "" || $data['sets'] != "" || $data['exercisename'] != "")
				$writedata[] = $data;

			}

			/*   ob_start();
			 var_dump($writedata);
			 $out1 = ob_get_contents();
			 ob_end_clean();
			 $this->logMessage("*******$out1***********************");
			 */
			$reponse = $this->common->write_to_resistence($writedata);

			if($reponse == "ERROR"){
				return $this->renderText("ERROR OCCURED in Add Circuit module area using method write_to_resistence ".$reponse);
			}



			$minicardio['image1'] = $this->getRequestParameter('image1');
			$minicardio['image2'] = $this->getRequestParameter('image2');
			$minicardio['image3'] = $this->getRequestParameter('image3');
			$minicardio['user_id'] = $this->getRequestParameter('user_id');
			$minicardio['workoutdate'] = $this->getRequestParameter('workoutdate');
			$minicardio['numberofmin'] = $this->getRequestParameter('numberofmin');
			$minicardio['pace'] = $this->getRequestParameter('pace');

			$reponse = $this->write_to_minicardio($minicardio);
			if($reponse == "ERROR"){
				return $this->renderText("ERROR OCCURED in Add Circuit module area using method write_to_minicardio");
			}

			$warmup_cardio['image1'] = $this->getRequestParameter('wu_image1');
			$warmup_cardio['image2'] = $this->getRequestParameter('wu_image2');
			$warmup_cardio['image3'] = $this->getRequestParameter('wu_image3');
			$warmup_cardio['user_id'] = $this->getRequestParameter('user_id');
			$warmup_cardio['workoutdate'] = $this->getRequestParameter('workoutdate');
			$warmup_cardio['numberofmin'] = $this->getRequestParameter('wu_numberofmin');
			$warmup_cardio['pace'] = $this->getRequestParameter('wu_pace');

			$reponse = $this->write_to_warmupcardio($warmup_cardio);
			if($reponse == "ERROR"){
				return $this->renderText("ERROR OCCURED in Add Circuit module area using method write_to_warmupcardio");
			}
			/* if($removed != true)
			 $this->totalrows = $totalrows + 1;
			 else
			 $this->totalrows = $totalrows;
			 */

			$this->response1 = $response;
			
			$this->workoutdate = $this->getRequestParameter('workoutdate');
			$this->savemessage( $this->getRequestParameter('user_id'));
			//return $this->forward("admin", "showuserlist");
			//return $this->renderText("SAVED");

			//return $this->setTemplate('setschedule');

		}

		private function write_to_warmupcardio($data){
			$this->logMessage("write to WARMUP cardio");
			$mysql = new mysqlclass();
			$res = $mysql->mysqlquery("delete from fitness_exercise_warmupcardio where user_id='{$data['user_id']}' and workoutdate='{$data['workoutdate']}'");

			$query = "insert into fitness_exercise_warmupcardio set user_id='{$data['user_id']}', image1='{$data['image1']}', image2='{$data['image2']}', image3='{$data['image3']}', workoutdate='{$data['workoutdate']}', numberofmin='{$data['numberofmin']}', maxheartrate='{$data['pace']}'  ";

			$res = $mysql->mysqlquery($query,'', "true");
			if($res == "ERROR")
			return "ERROR";


		}

		public function executeHistory(){

			$mdb = new mysqlclass();

			$user_id = $this->getRequestParameter('user_id');
			$exercisename = $this->getRequestParameter('exercisename');
			$exercisename = substr($exercisename, strpos($exercisename, ":")+1);
			$this->exercisename = $exercisename;

			$res = $mdb->mysqlquery("Select * from fitness_exercise_resistence where user_id='$user_id' and exgraphic='$exercisename' order by workoutdate desc");

			while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
				$circuit = $row['circuit'];
				$sets = $row['sets'];
				$reps = $row['reps'];
				$weights = $row['weights'];
				$workoutdate = date("M-d-Y", strtotime(substr($row['workoutdate'], 0, 10)));

				$history .= " <tr><td>$circuit</td> <td>$sets</td> <td>$reps</td> <td>$weights</td> <td>$workoutdate</td> </tr> \n";
			}
			$this->setLayout(false);
			$this->history = $history;
		}

		public function executeExerciseentry(){

			$mdb = new mysqlclass();
			$uploadfiles = new uploadfiles();

			if($this->getRequestParameter('exercisename')){
				$exercisename = addslashes($this->getRequestParameter('exercisename'));
				$exercisefile['exercisefile'] = $this->getRequest()->getFileName('exercisefile');
				$uploadfiles->path = "graphic/";
				$uploadfiles->files_array = $exercisefile;
				$uploadfiles->upload();
				$exercisefile_lowercase = strtolower($exercisefile['exercisefile']);

				$location = $this->getRequestParameter('location');
				$category = $this->getRequestParameter('category');
				$file['popup1video'] = $this->getRequest()->getFileName('popup1video');
				$file['popup2video'] = $this->getRequest()->getFileName('popup2video');
				$file['popup3video'] = $this->getRequest()->getFileName('popup3video');
				$popupdescription = addslashes($this->getRequestParameter('popupdescription'));

				$uploadfiles->path = "graphic/popup/";
				$uploadfiles->files_array = $file;
				$uploadfiles->upload();

				$this->msg = $msg;

				//      $query  = "select * from exercise_list where exercisename='$exercisename' and exercisefile='$exercisefile_lowercase'";

				$query = "insert into exercise_list set exercisename='$exercisename', exercisefile='$exercisefile_lowercase', popupdescription='$popupdescription', location='$location', category_id='$category', popupvideo1='{$file['popup1video']}',popupvideo2='{$file['popup2video']}',popupvideo3='{$file['popup3video']}' ";
				$res = $mdb->mysqlquery($query,"","true");
				if($res == "ERROR")
				echo $res." Occured while inserting into exercise list table";

			}//END OF $_POST



			if($this->getRequestParameter('remove')){
				$id = $this->getRequestParameter('remove');

				$query = "select exercisefile, popupvideo1, popupvideo2, popupvideo3 from exercise_list where id='$id'";
				$res = $mdb->mysqlquery($query);
				$row = mysql_fetch_array($res);

				foreach($row as $key=> $value){
					$files[] = $value;

					if($key=="exercisefile")
					$uploadfiles->path = "graphic";
					else
					$uploadfiles->path = "graphic/popup/";

					$uploadfiles->files_array = $files;
					$uploadfiles->removefiles();
				}

				/*unlink(sfConfig::get('sf_upload_dir').'/graphic/popup/'.$row['popupvideo1']);
				 unlink(sfConfig::get('sf_upload_dir').'/graphic/popup/'.$row['popupvideo2']);
				 unlink(sfConfig::get('sf_upload_dir').'/graphic/popup/'.$row['popupvideo3']);
				 unlink(sfConfig::get('sf_upload_dir').'/graphic/'.$row['exercisefile']);
				 */
				$query = "delete from exercise_list where id='$id' ";
				$res = $mdb->mysqlquery($query);
				if($res == "ERROR")
				echo $res." Occured while delete from exercise list table";


			}



			$res = $mdb->mysqlquery("Select * from exercise_category");

			while($row_cat = mysql_fetch_array($res, MYSQL_ASSOC)){
				$value = $row_cat['categoryname'];
				$name = $row_cat['id'];
				$this->exercisecategory .= " <option value='$name'>$value</option> \n";


			}


			$res = $mdb->mysqlquery("Select * from exercise_list order by category_id");
			$a=0;
			while($row = mysql_fetch_array($res, MYSQL_ASSOC)){

				$value = $row['exercisename'];
				$location = $row['location'];

				$catname = $mdb->mysqlquery("Select * from exercise_category where id='{$row['category_id']}' order by categoryname");
				$catname_rowinfo = mysql_fetch_array($catname, MYSQL_ASSOC);

				$name = $catname_rowinfo['categoryname'];

				$a = $a +1;
				if( ($a % 2) == 0){
					$colorvar = "lightblue";
				}else{
					$colorvar = "white";
				}

				$this->exerciselist .= "
				<tr bgcolor=$colorvar>
				<td>Category:</td><td> $name </td>
				<td>Exercise: </td><td> $value </td>
				<td> Location:</td><td> $location</td>
				<td><a href='?remove={$row['id']}'>Remove $value</a></td> </tr>";
			}

		}



		private function write_to_minicardio($data){

			$this->logMessage("write to minicardio");
			$mysql = new mysqlclass();
			$res = $mysql->mysqlquery("delete from fitness_exercise_minicardio where user_id='{$data['user_id']}' and workoutdate='{$data['workoutdate']}'");

			$query = "insert into fitness_exercise_minicardio set user_id='{$data['user_id']}', image1='{$data['image1']}', image2='{$data['image2']}', image3='{$data['image3']}', workoutdate='{$data['workoutdate']}', numberofmin='{$data['numberofmin']}', maxheartrate='{$data['pace']}'  ";

			$res = $mysql->mysqlquery($query, '', "true");
			if($res == "false")
			return "ERROR";


		}

		public function executeShowworkoutschedulesdetail(){
			$mysql = new mysqlclass();

			$date = $this->getRequestParameter('workoutdate');
			$user_id = $this->getRequestParameter('user_id');

			$sed = $mysql->mysqlquery("SELECT * FROM fitness_exercise_day, fitness_users where fitness_users.user_id=fitness_exercise_day.user_id and workoutdate = '$date' order by workoutdate");
			$exerciseinfo = mysql_fetch_array($sed, MYSQL_ASSOC);
			$this->exerciseinfo = $exerciseinfo;

			switch($exerciseinfo['workouttype']){
				case 1:
					$tablename = "resistence";
					break;
				case 2:
					$tablename = "cardio";
					break;
				case 3:
					$tablename = "rest";
					break;
			}


			$sed = $mysql->mysqlquery("SELECT * FROM  fitness_exercise_$tablename where workoutdate='{$exerciseinfo['workoutdate']}'");

			while($tmp = mysql_fetch_array($sed, MYSQL_ASSOC)){


				$row[] = $tmp;

			}
			$this->row = $row;



		}

		public function executeSchedulelist(){
			$mysql = new mysqlclass();

			$user_id = $this->getRequestParameter('user_id');
			$query = "select * from fitness_exercise_day where user_id='$user_id' order by workoutdate";
			$res = $mysql->mysqlquery($query);

			$tmp_merge=array();
			$tmp=array();

			while( $row = mysql_fetch_array($res, MYSQL_ASSOC)){

				$validdate = date("Y-m-d",strtotime($row['workoutdate']));
				$query_n = "Select count(*) as totalrows from fitness_exercise_nutrition where user_id='$user_id' and validdate = '{$validdate}'";
				$res_n = $mysql->mysqlquery($query_n);
				$row_n = mysql_fetch_array($res_n);
				$tmp_merge = array_merge($row_n,$row);
				$tmp[] = $tmp_merge;
			}
			$this->schedules = $tmp;
			$this->user_id = $user_id;



			
			$this->getusers($user_id); //returns $this->userlist
			$this->row = $this->userlist;

		}

		public function executeMoveexercise(){

			$mysql = new mysqlclass();

			$this->user_id = $this->getRequestParameter('user_id');
			$this->workoutdate = $this->getRequestParameter('workoutdate');
			$this->newtype = $this->getRequestParameter('newtype');

			$this->type = $this->getRequestParameter('type');
			switch($this->type){
				case 1:
					$day = "resistence";
					break;
				case 2:
					$day = "cardio";
					break;
				case 3:
					$day = "rest";
					break;
			}
			switch($this->newtype){
				case 1:
					$newday = "resistence";
					break;
				case 2:
					$newday = "cardio";
					break;
				case 3:
					$newday = "rest";
					break;
			}
			$move = $this->getRequestParameter('move');
			if($move == "true"){
				$this->redirect('admin/updateschedule_'.$day."?user_id=$this->user_id&workoutdate=$this->workoutdate");

			}

			if($move == "destroy"){
				//AT THIS POINT WE NUKE THE DAY and all data with it !
				$query = "delete from fitness_exercise_day where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";
				$res = $mysql->mysqlquery($query);

				$query = "delete from fitness_exercise_$day where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";
				$res = $mysql->mysqlquery($query);

				if($day=="resistence"){
					$query = "delete from fitness_exercise_minicardio where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";
					$res = $mysql->mysqlquery($query);

					$query = "delete from fitness_exercise_warmupcardio where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";
					$res = $mysql->mysqlquery($query);
				}

				$this->logMessage("USER DESTROYED DAY {$this->workoutdate} and user_id {$this->user_id}");
				return $this->redirect("admin/setschedule?workoutdate={$this->workoutdate}&user_id=$this->user_id");

			}


		}



		public function executeUpdateschedule_rest(){
			$mysql = new mysqlclass();

			$this->user_id = $this->getRequestParameter('user_id');
			$this->workoutdate = $this->getRequestParameter('workoutdate');
			$query = "SELECT * FROM fitness_exercise_day where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";
			$res = $mysql->mysqlquery($query);
			$this->exercisedayinfo = mysql_fetch_array($res, MYSQL_ASSOC);

			$common = new commonlib();
			$files = $common->getfilelists(); //gets graphics, nutrition, and cardio graphic files for scandir function
  		    foreach($files as $key=>$value)
  		    	$this->$key = $value;

			//Now get cardio info
			$query = "SELECT * FROM fitness_exercise_rest where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";
			$res = $mysql->mysqlquery($query);
			while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
				$tmp[] = $row;
			}
			$this->cardioinfo = $tmp;



		}

		public function executeDumpmysql(){

			$dump = new mysqldump;
			$dump->init();

		}


		/**
		 * returns userlist array of users info
		 */
		private function getusers($user_id){

			$this->logMessage("getusers private method called ", "debug");
			$mysql = new mysqlclass();
			
			if($user_id != '') //if only retrieve one person info
				$sql = " where user_id = '{$user_id}'";

			$query = "SELECT * FROM fitness_users $sql order by user_lastname";
			$res = $mysql->mysqlquery($query);
			while($users_results = mysql_fetch_array($res, MYSQL_ASSOC))
			$tmp[] = $users_results;

			$this->userlist = $tmp;
			
			if($user_id != "")
				return $tmp;
				
			
			
			
		}

		public function executeClone(){
			$mysql = new mysqlclass();

			$this->user_id = $this->getRequestParameter('user_id');
			$this->workoutdate = $this->getRequestParameter('workoutdate');
			$this->workouttype = $this->getRequestParameter('workouttype');
			$this->nutritiononly = $this->getRequestParameter('nutritiononly');
			$this->newworkoutdate = $this->getRequestParameter('startworkoutdate');
			$this->newuser_id = $this->getRequestParameter('newuser_id');

			
			//GET USERS INFO
			$this->userinfo =  $this->getusers($this->user_id);
			
			$this->getusers(); //returns $this->userlist array
			
			
			//HERE WE CLONE ONLY NUTRITION !
			if($this->nutritiononly == "true"){

				if($this->getRequestParameter('nutritionclone') == "true"){
					$this->logMessage("NUTRITION ONLY CLONING ");


					if($this->newworkoutdate == $this->workoutdate){
						$this->logMessage("You chose to clone a nutrition day but tried to clone the same day on itself !");
						return $this->renderText("You cannot clone a nutrition day on itself !");
					}

					//NOW UPDATE NUTRITION PAGE SWF
					$exday = $mysql->mysqlquery("select * from fitness_exercise_day where user_id='$this->user_id' and workoutdate='{$this->workoutdate}'");
					$row = mysql_fetch_array($exday, MYSQL_ASSOC);

					$response = $mysql->mysqlquery("update fitness_exercise_day set nutritionswf='{$row['nutritionswf']}' where user_id='{$this->newuser_id}' and workoutdate='{$this->newworkoutdate}'");

					$this->clonenutrition();

					return $this->forward('admin','schedulelist');
				}

				return $this->setTemplate('clonenutrition');
			}


			if($this->hasRequestParameter('startworkoutdate')){


				switch($this->workouttype){
					case "1":

						$resistence = $mysql->mysqlquery("delete from fitness_exercise_resistence where user_id='$this->newuser_id' and workoutdate='{$this->newworkoutdate}' ");
						$minicardio = $mysql->mysqlquery("delete from fitness_exercise_minicardio where user_id='$this->newuser_id' and workoutdate='{$this->newworkoutdate}' ");
						$warmupcardio = $mysql->mysqlquery("delete from fitness_exercise_warmupcardio where user_id='$this->newuser_id' and workoutdate='{$this->newworkoutdate}' ");


						//RESISTENCE
						$resistence = $mysql->mysqlquery("select * from fitness_exercise_resistence where user_id='$this->user_id' and workoutdate='{$this->workoutdate}' ");
						while($row = mysql_fetch_array($resistence, MYSQL_ASSOC)){
							$resinsert = "insert into fitness_exercise_resistence set user_id='{$this->newuser_id}', workoutdate='{$this->newworkoutdate}',
							type='{$row['type']}', exgraphic='{$row['exgraphic']}', circuit='{$row['circuit']}',
							sets='{$row['sets']}', reps='{$row['reps']}', weights='{$row['weights']}', exercise='{$row['exercise']}', sortnumber='{$row['sortnumber']}'";
							$inserts .= $resinsert."<br>";
							$mysql->mysqlquery($resinsert);
						}
						//MINICARDIO
						$minicardio = $mysql->mysqlquery("select * from fitness_exercise_minicardio where user_id='$this->user_id' and workoutdate='{$this->workoutdate}' ");
						while($row = mysql_fetch_array($minicardio, MYSQL_ASSOC)){
							$mincardio_insert = "insert into fitness_exercise_minicardio set user_id='{$this->newuser_id}', workoutdate='{$this->newworkoutdate}',
							image1='{$row['image1']}', image2='{$row['image2']}', image3='{$row['image3']}',
							numberofmin='{$row['numberofmin']}', maxheartrate='{$row['maxheartrate']}'";
							$inserts .= $mincardio_insert."<br>";
							$mysql->mysqlquery($mincardio_insert);
						}

						//WArmupCARDIO
						$warmupcardio = $mysql->mysqlquery("select * from fitness_exercise_warmupcardio where user_id='$this->user_id' and workoutdate='{$this->workoutdate}' ");
						while($row = mysql_fetch_array($warmupcardio, MYSQL_ASSOC)){
							$warmupcardio_insert = "insert into fitness_exercise_warmupcardio set user_id='{$this->newuser_id}', workoutdate='{$this->newworkoutdate}',
							image1='{$row['image1']}', image2='{$row['image2']}', image3='{$row['image3']}',
							numberofmin='{$row['numberofmin']}', maxheartrate='{$row['maxheartrate']}'";
							$inserts .= $warmupcardio_insert."<br>";
							$mysql->mysqlquery($warmupcardio_insert);
						}


						break;
					case "2":
						//NOW CREATE A Cardio DAY
						$exday = $mysql->mysqlquery("SELECT * from fitness_exercise_cardio where user_id='$this->user_id' and workoutdate='{$this->workoutdate}' ");
						$row = mysql_fetch_array($exday, MYSQL_ASSOC);
						$insertquery = "insert into fitness_exercise_cardio set user_id='{$this->newuser_id}', workoutdate='{$this->newworkoutdate}', image1='{$row['image1']}', image2='{$row['image2']}', image3='{$row['image3']}', numberofmin='{$row['numberofmin']}', maxheartrate='{$row['maxheartrate']}'";
						$mysql->mysqlquery($insertquery);
						break;

					case "3":
						//NOW CREATE A REST DAY
						$exday = $mysql->mysqlquery("select * from fitness_exercise_rest where user_id='$this->user_id' and workoutdate='{$this->workoutdate}' ");
						$row = mysql_fetch_array($exday, MYSQL_ASSOC);
						$insertquery = "insert into fitness_exercise_rest set user_id='{$this->newuser_id}', workoutdate='{$this->newworkoutdate}', image1='{$row['image1']}', message='{$row['message']}'";
						$mysql->mysqlquery($insertquery);
						break;
				}


				$exday = $mysql->mysqlquery("delete from fitness_exercise_day where user_id='$this->newuser_id' and workoutdate='{$this->newworkoutdate}'");

				//NOW CREATE THAT DAY
				$exday = $mysql->mysqlquery("select * from fitness_exercise_day where user_id='$this->user_id' and workoutdate='{$this->workoutdate}'");
				$row = mysql_fetch_array($exday, MYSQL_ASSOC);

				$exday = "insert into fitness_exercise_day set user_id='{$this->newuser_id}', workoutdate='{$this->newworkoutdate}', workouttype='{$row['workouttype']}', m_swf='{$row['m_swf']}', m1_swf='{$row['m1_swf']}', a_swf='{$row['a_swf']}', a1_swf='{$row['a1_swf']}', n_swf='{$row['n_swf']}', n1_swf='{$row['n1_swf']}'";
				$inserts .= $exday."<br>";
				$mysql->mysqlquery($exday);

				//clone nutrition
				$this->clonenutrition();


				//NOW UPDATE NUTRITION PAGE SWF
				$exday = $mysql->mysqlquery("select * from fitness_exercise_day where user_id='$this->user_id' and workoutdate='{$this->workoutdate}'");
				$row = mysql_fetch_array($exday, MYSQL_ASSOC);

				$response = $mysql->mysqlquery("update fitness_exercise_day set nutritionswf='{$row['nutritionswf']}' where user_id='{$this->newuser_id}' and workoutdate='{$this->newworkoutdate}'");



				$this->finish = "true";
				return $this->forward('admin','schedulelist');
			}



		}

		private function clonenutrition(){
			$this->logMessage("Clone nutrition PRIVATE METHOD ");

			$mysql = new mysqlclass();

			//REMOVE NUTRITION ALREADY THERE
			$results = $mysql->mysqlquery("delete from fitness_exercise_nutrition where user_id='$this->newuser_id' and validdate='{$this->newworkoutdate}'");
			$row = mysql_fetch_array($results, MYSQL_ASSOC);


			//now copy clone one to this date !
			$nuttritionclone = $mysql->mysqlquery("select * from fitness_exercise_nutrition where user_id='$this->user_id' and validdate='{$this->workoutdate}'");
			$this->logMessage("Total Rows are ".mysql_num_rows($nuttritionclone), "debug" );


			while($row = mysql_fetch_array($nuttritionclone, MYSQL_ASSOC)){
				/* ob_start();
				 echo "<pre>";
				 print_r($row);
				 $out1 = ob_get_contents();
				 ob_end_clean();
				 $this->logMessage($out1, "debug");
				 */
				$resinsert = "insert into fitness_exercise_nutrition set user_id='{$this->newuser_id}', validdate='{$this->newworkoutdate}',
				totalcalories='{$row['totalcalories']}', suggestedcalories='{$row['suggestedcalories']}', image1='{$row['image1']}', foodsuggestions='{$row['foodsuggestions']}', sort='{$row['sort']}'";
				//$this->logMessage($resinsert,"debug");
				$mysql->mysqlquery($resinsert);
			}

		}

		public function executeNutrition(){
			$mysql = new mysqlclass();


			if($this->hasRequestParameter('breakfast_totalcal')){

				$user_id = $this->getRequestParameter('user_id');
				$validdate = $this->getRequestParameter('validdate');
				/*$counter = 0;

				$snacklist = array('breakfast', 'snack1', 'lunch', 'snack2', 'dinner', 'snack3');
				foreach($snacklist as $key=>$value){

					$totalcal = $this->getRequestParameter($value.'_totalcal');
					$sugcal = $this->getRequestParameter($value.'_sugcal');
					$foodsug = $this->getRequestParameter($value.'_foodsug');
					$image1 = $this->getRequestParameter($value.'_image1');

					$query = "insert into fitness_exercise_nutrition set user_id='$user_id', totalcalories='$totalcal', suggestedcalories='$sugcal',
					image1='$image1', foodsuggestions='$foodsug', sort='$counter', validdate='$validdate'";
					//echo $query;
					$response = $mysql->mysqlquery($query, "", "true");
					$this->response1 = $response;
					$this->savemessage($user_id);

					$counter= 1+ $counter;
				}
				*/
				//update swf
				$nutritionswif = $this->getRequestParameter('nutritionswif');
				$response_swf = $mysql->mysqlquery("UPDATE fitness_exercise_day set nutritionswf='$nutritionswif' where user_id='$user_id' and workoutdate='$validdate'", "", "true");


				$this->finish = "true";

			}


			/*$query = "SELECT * FROM fitness_users";
			 $res = $mysql->mysqlquery($query);
			 while($users_results = mysql_fetch_array($res, MYSQL_ASSOC))
			 $tmp[] = $users_results;

			 $this->userlist = $tmp;
			 */
			$this->getusers(); //returns $this->userlist array

			$common = new commonlib();
			$files = $common->getfilelists(); //gets graphics, nutrition, and cardio graphic files for scandir function
  		    foreach($files as $key=>$value)
  		    	$this->$key = $value;

		}



		public function executeUpdateschedule_cardio(){

			$mysql = new mysqlclass();

			$this->user_id = $this->getRequestParameter('user_id');
			$this->workoutdate = $this->getRequestParameter('workoutdate');
			$query = "SELECT * FROM fitness_exercise_day where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";
			$res = $mysql->mysqlquery($query);
			$row = mysql_fetch_array($res, MYSQL_ASSOC);
			//$this->selectedswif = $row['welcomeswf'];
			$this->exercisedayinfo = $row;
			/*$dir = 'swif/';
			 $this->swif_files = scandir($dir);

			 $this->exgraphic_files = scandir('exgraphic/');
			 $this->cardio_files = scandir('cardio/');*/
			$common = new commonlib();
			$files = $common->getfilelists(); //gets graphics, nutrition, and cardio graphic files for scandir function
  		    foreach($files as $key=>$value)
  		    	$this->$key = $value;

			//Now get cardio info
			$query = "SELECT * FROM fitness_exercise_cardio where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";
			$res = $mysql->mysqlquery($query);
			while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
				$tmp[] = $row;
			}
			$this->cardioinfo = $tmp;

			$query = "SELECT * FROM fitness_users where user_id='{$this->user_id}'";
			$res = $mysql->mysqlquery($query);
			$row = mysql_fetch_array($res, MYSQL_ASSOC);
			$this->userinfo = $row;

		}

		public function executeUpdateschedule_resistence(){
			$mysql = new mysqlclass();

			$this->user_id = $this->getRequestParameter('user_id');

			$query = "SELECT * FROM fitness_users where user_id='{$this->user_id}'";
			$res = $mysql->mysqlquery($query);
			$this->row  = mysql_fetch_array($res, MYSQL_ASSOC);

			$this->workoutdate = $this->getRequestParameter('workoutdate');
			$query = "SELECT * FROM fitness_exercise_day where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";

			$res = $mysql->mysqlquery($query);
			$row = mysql_fetch_array($res, MYSQL_ASSOC);
			$this->exercisedayinfo = $row;

			// $this->selectedswif = $row['welcomeswf'];

			$this->exerciselist = $this->common->getexerciselist("");

			/* $dir = 'swif/';
			 $this->swif_files = scandir($dir);

			 $this->exgraphic_files = scandir('exgraphic/');
			 $this->cardio_files = scandir('cardio/');
			 */
			$common = new commonlib();
			$files = $common->getfilelists(); //gets graphics, nutrition, and cardio graphic files for scandir function
  		    foreach($files as $key=>$value)
  		    	$this->$key = $value;


			//Now get resistence info
			$query = "SELECT * FROM fitness_exercise_resistence where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}' order by sortnumber";
			$res = $mysql->mysqlquery($query);
			while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
				$tmp[] = $row;
			}
			$this->resistenceinfo = $tmp;

			$query = "SELECT * FROM fitness_exercise_minicardio where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";
			// echo $query;
			$res = $mysql->mysqlquery($query);
			$minicardio_row = mysql_fetch_array($res, MYSQL_ASSOC);
			//print_r($minicardio_row);
			//echo "**".$minicardio_row['numberofmin'];
			$minicardio['numberofmin'] = $minicardio_row['numberofmin'];
			$minicardio['pace'] = $minicardio_row['maxheartrate'];
			$minicardio['image1'] = $minicardio_row['image1'];
			$minicardio['image2'] = $minicardio_row['image2'];
			$minicardio['image3'] = $minicardio_row['image3'];
			//print_r($this->minicardio);
			$this->minicardio = $minicardio;


			$query = "SELECT * FROM fitness_exercise_warmupcardio where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";
			$res = $mysql->mysqlquery($query);
			$warmup_cardio_row = mysql_fetch_array($res, MYSQL_ASSOC);

			$warmup_cardio['numberofmin'] = $warmup_cardio_row['numberofmin'];
			$warmup_cardio['pace'] = $warmup_cardio_row['maxheartrate'];
			$warmup_cardio['image1'] = $warmup_cardio_row['image1'];
			$warmup_cardio['image2'] = $warmup_cardio_row['image2'];
			$warmup_cardio['image3'] = $warmup_cardio_row['image3'];
			$this->warmup_cardio = $warmup_cardio;



		}


		public function executeAjax_exercisenames(){

			/*ob_start();
			 print_r($_REQUEST);
			 $out1 = ob_get_contents();
			 $this->logMessage($out1);
			 ob_end_clean();
			 */

			$letters = $this->getRequestParameter('letters');
			$tmp = $this->common->getexerciselist($letters);

			//print_r($tmp);
			$counter =0;
			foreach($tmp as $key => $value){
				$temp .= "$counter###".$value["categoryname"].":".$value["exercisename"]."|";
				$counter = $counter + 1;
			}
			return $this->renderText($temp);


		}





				
		/*private function delete_resistence($data){
		 $mysql = new mysqlclass();

		 $res = $mysql->mysqlquery("delete from fitness_exercise_day where user_id='{$data['user_id']}' and workoutdate='{$data['workoutdate']}'");
		 if($res == "ERROR")
		 return "ERROR";

		 }*/

		

		public function executeMemberlist(){
			
			 $query = "select * from fitness_users";
				$res = $this->mysql->mysqlquery($query);
		   while($row = mysql_fetch_array($res)){
				$data .= $row['user_id'].",".$row['email'].",".$row['user_firstname'].",".$row['user_lastname'].",".base64_decode($row['cal_url'])."<br>";
				 
			}
			return $this->renderText($data);
			
		}
		
	   public function executeMemberlogindate(){
			
			 $query = "select * from fitness_users";
				$res = $this->mysql->mysqlquery($query);
		   while($row = mysql_fetch_array($res)){
				$data .= $row['email'].",".$row['lastlogin']."<br>";
				 
			}
			return $this->renderText($data);
			
		}
		public function executeBecomeuser(){
			$user_id = $this->getRequestParameter('user_id');
			$this->getUser()->setAttribute('halt_reporting', 'true');	
			$this->getUser()->setAttribute('user_id', $user_id); //set for front page login
			$tmp = "http://".$_SERVER['HTTP_HOST'];
			$this->redirect("$tmp/main.php");
		}
		
 private function remove_from_resistence($data){

    	$mysql = new mysqlclass();

	    $query = "delete from fitness_exercise_resistence where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}' and exercise='{$data['exercise']}' and type='1' and circuit='{$data['circuit']}' and sets='{$data['sets']}' and reps='{$data['reps']}' and weights='{$data['weights']}'  ";

    $res = $mysql->mysqlquery($query);
    if(strpos($res, "ERROR") > 0)
    die("ERROR $res");


  }
    
		

	}
