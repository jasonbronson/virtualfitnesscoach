<?php

/**
 * report_notloggedin actions.
 *
 * @package    virtualgym
 * @subpackage report_notloggedin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class report_notloggedinActions extends sfActions
{
  public function preExecute(){

  	$this->companyname = $this->getUser()->getAttribute('companyname', "NA");
    $this->group_id = $this->getUser()->getAttribute('company', "NA");	
  }
	
	
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    
  	$this->mysql = new mysqlclass();
			 $query = "SELECT email, user_firstname, user_lastname, lastlogin, datediff(now(), lastlogin) as days FROM fitness_users where group_id='{$this->group_id}' order by days desc";
				$res = $this->mysql->mysqlquery($query);
		   
			while($row = mysql_fetch_array($res)){
				$data .= $row['email'].",".$row['lastlogin'].",".$row['user_firstname'].",".$row['user_lastname'].",".$row['days']."|";
				 
			}
			$this->data = $data;
			//return $this->renderText($data);
			
  }
}
