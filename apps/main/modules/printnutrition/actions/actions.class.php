<?php

/**
 * printnutrition actions.
 *
 * @package    virtualgym
 * @subpackage printnutrition
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class printnutritionActions extends sfActions
{

	public function preExecute(){

		$this->mysql = new mysqlclass();
		$this->exercisecommon = new exercisecommon();
		$this->common = new commonlib();
	}


	/**
	 * Executes index action
	 *
	 */
	public function executeIndex()
	{
		
		$userid = $this->getUser()->getAttribute('user_id', 'NA');
		
		$this->common->reporting("printnutrition", $userid);
		
		//$this->forward('default', 'module');

		/*foreach($_REQUEST as $key => $value)
		 $tmp .= "$key.' '.$value";
		  
		 die($tmp);*/
		  	
  	    $workouttype = $this->exercisecommon->getexercisetype($userid, date("Y-m-d"));
		$dailycalories = $this->exercisecommon->getuserdailycalories($userid, $workouttype['workouttype']);
		
		$breakfast = $this->getRequestParameter("breakfast");
		
		 if(strpos($breakfast, "|") !== false){
		 	$b_array = explode("|", $breakfast);	
		 	$custom = true;
		 	foreach($b_array as $value)
		 		$b[] = $value;
		 }else{
			    $b = $breakfast;
		 }
		$this->b = $b;
		 
		$this->s1 = $this->getRequestParameter("snack1");
		
		/********* LUNCH **********/
		$lunch = $this->getRequestParameter("lunch");
		
		if(strpos($lunch, "|") !== false){
		 	$b_array = explode("|", $lunch);	
		 	$custom = true;
		 	foreach($b_array as $value)
		 		$l[] = $value;
		 }else{
			    $l = $lunch;
		 }
		$this->l = $l;
		
		$this->s2 = $this->getRequestParameter("snack2");
		
		/********* DINNER **********/
		$dinner = $this->getRequestParameter("dinner");
		if(strpos($dinner, "|") !== false){
		 	$b_array = explode("|", $dinner);	
		 	$custom = true;
		 	foreach($b_array as $value)
		 		$d[] = $value;
		 }else{
			    $d = $dinner;
		 }
		 $this->d = $d;
		
		$this->s3 = $this->getRequestParameter("snack3");
		
		
				
		 $query = "SELECT * FROM nutrition_cal where dailycal='$dailycalories'";
		 $res = $this->mysql->mysqlquery($query);
		 while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
		 	$id = $row['id'];
		 	$tmp[$id] = $row;
		 }
		 	
		$this->row = $tmp;
		//echo "<pre>";
		//print_r($tmp);
		//die();
		


	}

	

}
