<?php

/**
 * report_userstatistics actions.
 *
 * @package    virtualgym
 * @subpackage report_userstatistics
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class report_userstatisticsActions extends sfActions
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
    $user_id= $this->getRequestParameter('user_id');
		if($user_id != ""){
			$sql = " and s.user_id='$user_id' order by s.datetime desc";
			$this->userisolated = true;
		}else{
			$sql = " group by u.user_id";	
		}
		
		
		$res = $this->mysql->mysqlquery("select * from statistics as s, fitness_users as u
			where u.user_id = s.user_id and u.group_id='{$this->group_id}' $sql ");
		while($row = mysql_fetch_array($res)){
			$tmp[] = $row;	
		}
		$this->row = $tmp;
  }
}
