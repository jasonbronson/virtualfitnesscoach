<?php

/**
 * motivation actions.
 *
 * @package    virtualgym
 * @subpackage motivation
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class motivationActions extends sfActions
{
	public function preExecute(){

		//
		$this->mysql = new mysqlclass();
		$this->exercisecommon = new exercisecommon();
		$this->common = new commonlib();
		$this->header=true;
		$this->swif = $this->getUser()->getAttribute('swif');

	}

	
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
     
  	
  	$res = $this->mysql->mysqlquery("SELECT week, link FROM motivation order by week desc");
		while($row=mysql_fetch_array($res))
			$tmp[] = $row;
		
			$this->row = $tmp;
		
		$this->totalrows = mysql_num_rows($res);
		
		
  	
  }
}
