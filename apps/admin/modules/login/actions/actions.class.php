<?php

/**
 * login actions.
 *
 * @package    virtualgym
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class loginActions extends sfActions
{

	public function postExecute(){
		  	$this->companyname = $this->getUser()->getAttribute('companyname', "NA");
	}
	
	
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    //var_dump($_POST);
		if($this->getRequestParameter('username','')){

			$username = $this->getRequestParameter('username','');
			$password = $this->getRequestParameter('password','');

			$commonlib = new commonlib();

			$username = $commonlib->filterdata($username);
			$password = $commonlib->filterdata($password);

			$logininfo = $commonlib->checklogin($username, $password);

			$level = $logininfo['level'];
			$passed = $logininfo['passed'];
			//$this->logMessage("PASS {$level}");
			if($passed == true && $level > 0){
				//$this->setTemplate('');
				
				return $this->forward('login','choosecompany');
			}else{
				$this->err = "true";
			}

		}

		$this->setLayout(false);
  	
  }
  
  public function executeChoosecompany(){
  	
  	$mysql = new mysqlclass();
  	$res = $mysql->mysqlquery("select * from groups");
  	while($row = mysql_fetch_array($res)){
  		$groupsArray[] = $row;
  	}
  	$this->groups = $groupsArray;
  	
  	
  	//if($_POST){
   		 
  		 $company = $this->getRequestParameter('company');
  		 $companyname = $this->getRequestParameter('companyname');
  		 if($company != ""){	
  		 	
  		 	$this->getUser()->setAttribute('company', $company);
  		 	$this->getUser()->setAttribute('companyname', $companyname);
  		 }

  		//return $this->forward('admin','dashboard');
  	//}
  }
  public function executeLogout(){
  	
  	session_destroy();
  	$this->redirect('login/index');
  }
  
}
