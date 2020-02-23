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

		//
		$this->mysql = new mysqlclass();  
	    $this->exercisecommon = new exercisecommon();
		$this->common = new commonlib();
		$this->header=true;
	    
	}
	
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
   
		 
		$userid = $this->getUser()->getAttribute("user_id");

		$res = $this->mysql->mysqlquery("SELECT * FROM fitness_users where user_id='$userid'");

		//while($row = mysql_fetch_array($res))
		//$user_array[] = $row;
		$row = mysql_fetch_array($res);
		$this->user = $row;
		
		
		$res = $this->mysql->mysqlquery("SELECT * FROM events where group_id='{$row['group_id']}' order by eventdate desc");
		while($row = mysql_fetch_array($res))
		$row_array[] = $row;

		$this->row = $row_array;



		if($user_array[0]['zip'] != ''){
			//IF WE HAVE A ZIP !
			$res = $this->mysql->mysqlquery("SELECT * FROM zipcodes where zip='{$user_array[0]['zip']}'");
			while($row = mysql_fetch_array($res))
			$zip_array[] = $row;
			//city and statecode
			$this->zip = $zip_array;
		}
		 
		 
	
  }
}
