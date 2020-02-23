<?php

/**
 * education actions.
 *
 * @package    virtualgym
 * @subpackage education
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class educationActions extends sfActions
{
  
	public function preExecute(){

		$this->mysql = new mysqlclass();  
	    $this->exercisecommon = new exercisecommon();
		$this->header = true;
		$this->common = new commonlib();
	}
	
	
	public function executeIndex()
  {
    
  	/*$res = $this->mysql->mysqlquery("SELECT * FROM connectwithothers_list ");
				while($row = mysql_fetch_array($res)){
					$row_array[] = $row;			 
				}
				$this->row = $row_array;
  	*/
  }
  public function executeAjax_recordswf()
  {
  	//$this->logMessage('LOADED SWF');
  	
  	$user_id = $this->getUser()->getAttribute('user_id');
  	$type = $this->getRequestParameter('type');
  	if($type=="E")
  		$which = "ExerciseTutorial";
  		else
  		$which = "NutritionTutorial";
  		
  	$this->common->reporting($which, $user_id);
  	
  	return sfView::NONE;//return nothing
  }
  
}
