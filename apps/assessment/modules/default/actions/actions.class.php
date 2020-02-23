<?php

/**
 * default actions.
 *
 * @package    virtualgym
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class defaultActions extends sfActions
{

  public function executeCreateuser(){

	
	$this->postform = false;
				
      //CHECK IF FROM CREATE USER
      if($this->create_user()){
      	$this->setTemplate('index');
      }else{
      	$this->setTemplate('error');
      }
  }


  private function create_user()
  {


    $mysql = new mysqlclass();

    //$a['username'] = $this->getRequestParameter('username');
    $a['password'] = $this->getRequestParameter('password');
    $a['confirm_password'] = $this->getRequestParameter('confirm_password');
    $a['firstname'] = $this->getRequestParameter('first_name');
    $a['lastname'] = $this->getRequestParameter('last_name');
    $a['country'] = $this->getRequestParameter('country');
    $a['gender'] = $this->getRequestParameter('gender');
    $a['phone'] = $this->getRequestParameter('phone');
    $a['find_out'] = $this->getRequestParameter('find_out');
    $a['select_a_question'] = $this->getRequestParameter('select_a_question');
    $a['your_answer'] = $this->getRequestParameter('your_answer');
    $a['birthdate'] = $this->getRequestParameter('bday')."/".$this->getRequestParameter('bmonth')."/".$this->getRequestParameter('byear');
    $a['email'] = strtolower($this->getRequestParameter('email_address'));
    $a['level'] = '0';
    $a['timezone'] = $this->getRequestParameter('timezone');
    $a['company_id'] = $this->getRequestParameter('company_id');
    
/*
    if($this->getRequestParameter('usercreationpassword') != md5("virtual fitness coach")){
    	$this->err = "Could not complete user creation encrypt key has failed";	
    	return false;
    }
  */  
    //save for auto login form after creation
    $this->userpassword = $a['password'];
    $this->username = $a['email'];
	
    /*foreach($a as $key => $value){
      if($value == ""){
        $this->logMessage("ERROR: $key is null ! \n\n");
       // return $this->renderText("<ERROR_DETAILS>$key is null</ERROR_DETAILS>");
      }

    }*/

    //Timezone check
    $res = $mysql->mysqlquery("select * from timezones where tzone='{$a['timezone']}'");
    $totalrows = mysql_num_rows($res);
    if($totalrows < 1){
      $this->logMessage("ERROR: Timezone does not match ! \n\n");
      //return $this->renderText("<ERROR_DETAILS>Timezone does not match current list</ERROR_DETAILS>");
    }

    if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $a['email'])){
      $this->logMessage("ERROR: Email address not valid \n\n");
      //return $this->renderText("<ERROR_DETAILS>Email Address is not Valid</ERROR_DETAILS>");

    }

    if($a['password'] != $a['confirm_password']){
      $this->logMessage("ERROR: passwords dont match \n\n");
      //return $this->renderText("PASSWORDS DONT MATCH");
    }
    if(strlen($a['password']) < 5){
      //return $this->renderText("<ERROR_DETAILS>Password must be 5 Characters Minimum</ERROR_DETAILS>");
      //return "Password must be 5 Characters";
    }
    

    //filter out any apostrophe chars
    $a['firstname'] = str_replace("'", "", $a['firstname']);
    $a['lastname'] = str_replace("'", "", $a['lastname']); 

    $res = $mysql->mysqlquery("select * from fitness_users where email='{$a['email']}' and user_firstname='{$a['firstname']}' and user_lastname='{$a['lastname']}'");
    $totalrows = mysql_num_rows($res);
    if($totalrows > 0){
      $this->logMessage("ERROR: user already exists \n\n");
      mail("newmember@virtualfitnesscoach.com", "User exists error", "A user was attempted to be created from VFC website but an error occured because this user already exists in the database system, please correct this error $email");
      $this->err = "ERROR: User already exits in database ";
      return false;
      //return "User Exists";
    }

    $password = md5(strtolower($a['password']));

    foreach($a as $key => $value){
      $a[$key] = addslashes($value);
    }


    $sql =
    "insert into fitness_users set
    user_username='{$email}',
    user_password='{$password}',
    user_firstname='{$a['firstname']}',
    user_lastname='{$a['lastname']}',
    email='{$a['email']}',
    level='{$a['level']}',
    timezone='{$a['timezone']}',
    country='{$a['country']}',
    phone='{$a['phone']}',
    birthdate='{$a['birthdate']}',
    find_out='{$a['find_out']}',
    select_a_question ='{$a['select_a_question']}',
    your_answer ='{$a['your_answer']}',
    lastlogin=now(),
    signupdate=now(),
    group_id='{$a['company_id']}'
     ";

    $res = $mysql->mysqlquery($sql, "", true);

    $this->logMessage("SQL WAS:  $sql \n\n");

    if($res == "true"){
      $this->logMessage("SUCCESS ! \n\n");
      mail("jasonbronson@gmail.com, newmember@virtualfitnesscoach.com", "VirtualFitnesscoach.com CREATEUSER SUCCESS ! ","$sql");
      $this->err = "User {$a['username']} was created";
	  return true;
    }else{
      $this->logMessage("ERROR: USER CREATION FAILED ! \n\n");
      mail("jasonbronson@gmail.com", "VFC CREATEUSER FAILED ! ","$sql");
      mail("newmember@virtualfitnesscoach.com", "User creation SQL error", "A user was attempted to be created from VFC website but an error occured \n SQL STATEMENT WAS: $sql please contact JASONBRONSON");
      $this->err = "We failed to process creating you into our system please allow us to do this manuelly within 2 business hours or sooner you will be contacted very shortly sorry for the issue.";
      return false;
    }







  }


}
