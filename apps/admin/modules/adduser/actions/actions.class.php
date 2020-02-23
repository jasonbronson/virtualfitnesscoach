<?php

/**
 * adduser actions.
 *
 * @package    virtualgym
 * @subpackage adduser
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class adduserActions extends sfActions
{
	
  public function preExecute(){

  	$this->mysql =  new mysqlclass();
  	
  	
  }
	
	
  public function executeIndex()
  {
    		
		$this->password = strtolower($this->getRequestParameter("password"));
		$this->firstname = $this->getRequestParameter("firstname");
		$this->lastname = $this->getRequestParameter("lastname");
		$this->level = $this->getRequestParameter("level");
		$this->email = strtolower($this->getRequestParameter("email"));
		$this->select_a_question = $this->getRequestParameter("select_a_question");
		$this->your_answer = $this->getRequestParameter("your_answer");
		$this->phone = $this->getRequestParameter("phone");
		$this->birthdate = $this->getRequestParameter("birthdate");
		$this->find_out = $this->getRequestParameter("find_out");
		$this->group = $this->getRequestParameter('group');
		$tzone = $this->getRequestParameter('timezone');
        
		$dailycal[1] = $this->getRequestParameter('dailycalories');
        $dailycal[2] = $dailycal[1];
		$dailycal[3] = $dailycal[1];
		
		
		if($dailycal[1] != "")
		  $this->dailycalories($dailycal, $this->user_id);
		  
		#TIME ZONE !
		$res = $this->mysql->mysqlquery("SELECT tzone FROM timezones where tzone like 'America%';");
		$tmp = array();
		while($tzone_rows = mysql_fetch_array($res, MYSQL_ASSOC)){
			$tmp[] = $tzone_rows['tzone'];
			//print_r($row);
		}
		$this->timezonelist  = $tmp;
		#END TIMEZONE


		$res = $this->mysql->mysqlquery("SELECT * FROM groups");
		while($tmp  = mysql_fetch_array($res, MYSQL_ASSOC))
		$group_rows[] = $tmp;
		
		$this->groups = $group_rows;
		

		if($_POST){

			/*foreach($_POST as $key=> $value)
			 if($value==""){
			 $this->errmsg = "ALL FIELDS ARE REQUIRED !";
			 return;
			 }*/
			 $array = array("group", "dailycalories", "email", "firstname", "lastname", "password");
			 foreach($array as $value)
			if($this->getRequestParameter($value) == ""){
				$this->errmsg = " $value is required field";
				return;
			}
			
			/*$res = $this->mysql->mysqlquery("SELECT count(*) as totalrows FROM fitness_users where email = '$this->email'");
			 $row  = mysql_fetch_array($res, MYSQL_ASSOC);

			 if($row['totalrows'] > 0){
			 $this->errmsg = "<font color=red>This username/email is already taken ! Please use another</font>";
			 return;
			 }*/

			$password = md5($this->password);
			$update_res = $this->mysql->mysqlquery("INSERT INTO fitness_users set
			timezone='$tzone',
			user_password='$password',
			user_firstname='{$this->firstname}',
			user_lastname='{$this->lastname}',
			level='{$this->level}',
			email='{$this->email}',
			select_a_question='{$this->select_a_question}',
			your_answer='{$this->your_answer}',
			phone='{$this->phone}',
			birthdate='{$this->birthdate}',
			find_out='{$this->find_out}',
			signupdate=now(),
	  		group_id='{$this->group}'
      		");

	  if(!$update_res)
	  	  $this->errmsg = "ERROR {$this->email} CANNOT BE ADDED check logs";
	  		else
	  	  $this->errmsg = "USER {$this->email} ADDED ";
	  	  //return $this->renderText("USER ADDED !");
		}
	
		

  	
  }
  
	private function dailycalories($dailycal, $userid){
		//dailycal is ARRAY

		$results = $this->mysql->mysqlquery("select * from usersdailycalories where user_id='{$userid}'");
		if(mysql_num_rows($results)> 0)
			$this->mysql->mysqlquery("delete from usersdailycalories where user_id='{$userid}'");
		 
		foreach($dailycal as $type=>$dailycalorie)
			$this->mysql->mysqlquery("INSERT into usersdailycalories set user_id='{$userid}', workouttype='{$type}', dailycalories='{$dailycalorie}'");
		 
	}
}
