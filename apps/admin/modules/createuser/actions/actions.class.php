<?php

/**
 * createuser actions.
 *
 * @package    virtualgym
 * @subpackage createuser
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class createuserActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    //$this->forward('default', 'module');

  }
  public function executeCreatenewuser(){

    if($_POST){
    $mysql = new mysqlclass();

    $a['username'] = $this->getRequestParameter('username');
    $a['password'] = $this->getRequestParameter('password');
    $a['firstname'] = $this->getRequestParameter('firstname');
    $a['lastname'] = $this->getRequestParameter('lastname');
    $a['email'] = $this->getRequestParameter('email');
    $a['level'] = '0';
    $a['timezone'] = $this->getRequestParameter('timezone');

    foreach($a as $key => $value){
      if($value == ""){
        return $this->renderText("<ERROR_DETAILS>$key is null</ERROR_DETAILS>");
      }

    }

    //Timezone check
    $res = $mysql->mysqlquery("select * from timezones where tzone='{$a['timezone']}'");
    $totalrows = mysql_num_rows($res);
    if($totalrows < 1){
      return $this->renderText("<ERROR_DETAILS>Timezone does not match current list</ERROR_DETAILS>");
    }

    if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $a['email'])){
      return $this->renderText("<ERROR_DETAILS>Email Address is not Valid</ERROR_DETAILS>");
    }

    if(strlen($a['password']) < 5){
      return $this->renderText("<ERROR_DETAILS>Password must be 5 Characters Minimum</ERROR_DETAILS>");
    }



    $res = $mysql->mysqlquery("select * from fitness_users where user_username='{$a['username']}'");
    $totalrows = mysql_num_rows($res);
    if($totalrows > 0){
      return $this->renderText("<ERROR_DETAILS>User already exits in database</ERROR_DETAILS>");
    }

    $password = md5(strtolower($a['password']));

    $res = $mysql->mysqlquery("insert into fitness_users set
    user_username='{$a['username']}',
    user_password='{$a['password']}',
    user_firstname='{$a['firstname']}',
    user_lastname='{$a['lastname']}',
    email='{$a['email']}',
    level='{$a['level']}',
    timezone='{$a['timezone']}'

    ", "", true);

    if($res == "true"){
      return $this->renderText("<SUCCESS_DETAILS>User was created</SUCCESS_DETAILS>");
    }else{
      return $this->renderText("<ERROR_DETAILS>User creation failed error logged to log files</ERROR_DETAILS>");
    }


    }


  }

}
