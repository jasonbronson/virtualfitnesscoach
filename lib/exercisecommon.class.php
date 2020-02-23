<?php

/**
 * This class contains common library calls between modules
 */

/**
 * 
 *
 */
class exercisecommon{

	
	public function __construct(){
		$this->mysql = new mysqlclass();
		
	}
	
	private function whichswf($user_id){
		$res = $this->mysql->mysqlquery("SELECT * FROM fitness_users where user_id='{$user_id}'");
		$row = mysql_fetch_array($res);

		if(trim($row['timezone']) != "")
		$timezone = trim($lastlogin_results['timezone']);
		else
		$timezone = "America/New_York";

		date_default_timezone_set("$timezone");
		$current_hour = date("H");


		if($current_hour >= "6" and $current_hour <= "12") //6am
		if($row['totallogins'] >1)
		return 2;
		else
		return 1;

		if($current_hour >= "12" and $current_hour <= "16") //noon
		if($row['totallogins'] >1)
		return 4;
		else
		return 3;

		if($current_hour >= "16" and $current_hour <= "23") //5pm
		if($row['totallogins'] >1)
		return 6;
		else
		return 5;


		//select count of logins per timeframe

		//return swf number
	}
	
	public function getexercisetype($userid, $workoutdate){
		
				$query = "SELECT * FROM fitness_exercise_day where user_id='{$userid}' and workoutdate = '$workoutdate'";
		$res = $this->mysql->mysqlquery($query);
		$row = mysql_fetch_assoc($res);
		//store sessions
		$_SESSION['workouttype'] = $row['workouttype'];
		return $row;
				
	}
	public function getuserdailycalories($userid, $workouttype){
		
			$query = "SELECT * FROM usersdailycalories where user_id='{$userid}' and workouttype='$workouttype'";
		$res = $this->mysql->mysqlquery($query);
		$row = mysql_fetch_assoc($res);
		return $row['dailycalories'];	
	}
	
	/**
	 * returns the exercise day based on userid and workout date
	 */
	public function getexerciseday($userid, $viewdateworkout, $type){
		$this->logMessage("USERID:$userid Viewdateworkout:$viewdateworkout", "info");
		$query = "SELECT * FROM fitness_exercise_day where user_id='{$userid}' and workoutdate = '$viewdateworkout'";


		$res = $this->mysql->mysqlquery($query);
		$row = mysql_fetch_assoc($res);
		//var_dump($row);
		$workouttype['type'] = $row['workouttype'];

		$swf_number = $this->whichswf($userid);

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

		/*if($workouttype['swif'] == "")
		  $workouttype['swif'] = $this->defaultswf($workouttype['type'], $swf_number);
*/
		if($type == "")
			$type = $_REQUEST['type'];
		
		switch($type){
			case 4:
				$workouttype['swif'] = $row['nutritionswf'];
				break;
			case 5:
				$workouttype['swif'] = "progressreport.swf";
				break;
			case 6:
			    $workouttype['swif'] = "motivation.swf";
				break;
			case 7:
				$workouttype['swif'] = "education.swf";
				break;
			case 8:
				$workouttype['swif'] = "1.swf";
				break;
			case 9:
				$workouttype['swif'] = "2.swf";
				break;
			case 10:
				$workouttype['swif'] = "3.swf";
				break;
		}
		

		//var_dump($workouttype);

		$this->logMessage("{$workouttype['swif']} WORKOUTTYPE VAR", "info");

		return $workouttype;

	}
	

	private function logMessage($msg){
		
		 $logger = sfLogger::getInstance();
		 $logger->log($msg);
	}
	
	
} 