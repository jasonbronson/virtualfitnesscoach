<?php

/**
 * events actions.
 *
 * @package    virtualgym
 * @subpackage events
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class eventsActions extends sfActions
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
    
			$mysql = new mysqlclass();

			if($_REQUEST['remove']){

				$remove = $this->getRequestParameter('remove');
				$res = $mysql->mysqlquery("delete from events where id='$remove'");

			}
			 
			 
			if($_POST){
				//if adding new event
				$eventname = addslashes($this->getRequestParameter('event_name'));
				$eventzip = $this->getRequestParameter('event_zip');
				$eventtype = $this->getRequestParameter('event_type');
				$eventdate = $this->getRequestParameter('event_date');
				$eventdescription = addslashes($this->getRequestParameter('event_description'));

				$query = "INSERT INTO events set eventdate='$eventdate', event='$eventdescription', event_type='$eventtype', event_other='$eventname', zip='$eventzip', group_id='{$this->group_id}' ";
				$res = $mysql->mysqlquery($query);
				 
			}
			 
			 
			$query = "SELECT * FROM events where group_id='{$this->group_id}'";

			$res = $mysql->mysqlquery($query);
			while($row = mysql_fetch_array($res)){
				$tmp[] = $row;
				 
			}
			$this->row = $tmp;
			 
  	
  }
}
