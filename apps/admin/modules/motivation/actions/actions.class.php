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
		$this->companyname = $this->getUser()->getAttribute('companyname', "NA");
	}
	
	public function postExecute(){
		
		$res = $this->mysql->mysqlquery("select * from motivation order by week desc");
		// where group_id='{$this->group_id}'
		
		while($row = mysql_fetch_array($res)){
			$tmp[] = $row;	
		}
		$this->row = $tmp;
		
	}
	
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    
  	$this->group_id = $this->getUser()->getAttribute('company', "NONE");
  	$this->mysql = new mysqlclass();
  	
		if($_POST){
			$week = $this->getRequestParameter('week');
			$link = addslashes($this->getRequestParameter('link'));
			if( ! is_numeric($week) ){
				$this->err = "Video Number must be numeric ";
				return;
			}
			
			$res = $this->mysql->mysqlquery("select * from motivation where week='$week'"); //and group_id='{$this->group_id}'");
			if(mysql_num_rows($res) > 0)
				$res = $this->mysql->mysqlquery("update motivation set link='$link' where week='$week'"); //and group_id='{$this->group_id}'");
				else
				$res = $this->mysql->mysqlquery("insert into motivation set week='$week', link='$link'"); //group_id='{$this->group_id}'");
				
				
			
		}
		
		
  }
}
