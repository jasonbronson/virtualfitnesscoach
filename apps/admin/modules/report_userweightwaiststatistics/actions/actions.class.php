<?php

/**
 * report_userweightwaiststatistics actions.
 *
 * @package    virtualgym
 * @subpackage report_userweightwaiststatistics
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class report_userweightwaiststatisticsActions extends sfActions
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
		$res = $this->mysql->mysqlquery("select u.user_firstname, u.user_lastname, u.user_id, s.weight, s.waist, s.datetime, 
		(select min(waist) from statistics where user_id = u.user_id  limit 1) as min_waist,
		(select max(waist) from statistics where user_id = u.user_id  limit 1) as max_waist,
		(select min(weight) from statistics where user_id = u.user_id  limit 1) as min_weight, 
		(select max(weight) from statistics where user_id=u.user_id) as max_weight,  
		(select min(datetime) from statistics where user_id = u.user_id) as min_date, 
		(select max(datetime) from statistics where user_id = u.user_id) as max_date
		
		from statistics as s, fitness_users as u 
where u.user_id = s.user_id and u.group_id='{$this->group_id}'  
group by u.user_id");
		while($row = mysql_fetch_array($res)){
			$tmp[] = $row;	
		}
		$this->row = $tmp;
		
  }
}
