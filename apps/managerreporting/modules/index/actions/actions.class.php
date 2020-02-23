<?php

/**
 * index actions.
 *
 * @package    virtualgym
 * @subpackage index
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class indexActions extends sfActions
{
	

  public function preExecute(){

		$this->mysql = new mysqlclass();

  }
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
  		
    $year = date("Y");
	$month = date("m");
	$this->daysinmonth = cal_days_in_month  ( CAL_GREGORIAN, $month, $year );
	$startdate_year = date("Y-01-01");
	$enddate_year =  date("Y-12-31");
	$totalexercises = 0;
	$totaltutorial = 0;
	//echo $daysinmonth;
	
	
	//GET Total Participants LOGIN AVG
   $res = $this->mysql->mysqlquery("select * from fitness_users order by user_id"); //add group id !
   $totalusers = mysql_num_rows($res);
   
   $date_value[0] = "2009-10-31";
   $date_value[1] = "2009-12-01"; //end of month
   
  	while($row = mysql_fetch_array($res)){
  		$user_totalrows = 0;
  		$count = 0;
  		$timeloggedin_month_avg = 0;
  		$exercises = 0;
  		$totalrows = 0;
	    //foreach($dates[0] as $date_value){
	   	
  		//Weight Loss
	   	$weightloss = $this->getweightloss($row['user_id'], $date_value[0], $date_value[1]); //, "timeloggedin", "2009-09-31", "2009-11-01");
	   	$all_weightloss = $weightloss +$all_weightloss;  
	   	
	   	$this->totalmembers = mysql_num_rows($res);
	   	
	    //AVERAGE TIME LOGGED IN
	   	$timeloggedin_month_avg = $this->gettime($row['user_id'], "timeloggedin", $date_value[0], $date_value[1]);
	   	$total_timeloggedin_month_avg = $timeloggedin_month_avg + $total_timeloggedin_month_avg;
	   	
	   	//die($timeloggedin_month_avg." ".$row['user_id']);
	   	
	   		//YEAR TO DATE
	   		$tmp = $this->getavg($row['user_id'], "login", $startdate_year, $enddate_year);
	   		$ytd_logins = $ytd_logins + $tmp; 
	   		
	   		//TIME YEAR TO DATE
	   		$user_ytd_time =  $this->gettime($row['user_id'], "timeloggedin", $startdate_year, $enddate_year);
			$ytd_all_timeloggedin = $user_ytd_time + $ytd_all_timeloggedin;
		
			//get exercise visits YEAR TO DATE
	   	  	$user_ytd_exercises = $this->getexercises($row['user_id'], $startdate_year, $enddate_year);
	   	  	$ytd_totalexercises = $user_ytd_exercises + $ytd_totalexercises;
			
	   	  	//get nutrition visits YEAR TO DATE
	   	  	$user_ytd_nutrition = $this->getnutrition($row['user_id'], $startdate_year, $enddate_year);
	   	  	$ytd_totalnutrition = $user_ytd_nutrition + $ytd_totalnutrition; 
	   	  	
	   	  	//get FAQ YEAR TO DATE
	   	  	$user_ytd_faq_array = $this->getfaq($row['user_id'], $startdate_year, $enddate_year);
	   	  	$ytd_total_nutrition = $user_ytd_faq_array['nutrition'] + $ytd_total_nutrition; 
	   	  	$ytd_total_exercise = $user_ytd_faq_array['exercise'] + $ytd_total_exercise;

	   	  	//get motivation visits YEAR TO DATE
	   	  	$user_ytd_motivation = $this->getmotivation($row['user_id'], $startdate_year, $enddate_year);
	   	  	$ytd_totalmotivation = $user_ytd_motivation + $ytd_totalmotivation; 
	   	  	
	   	  	//get tutorial vists YEAR TO DATE
	   	  	/*$user_ytd_tutorial = $this->gettutorial($row['user_id'], $startdate_year, $enddate_year);
	   	  	$ytd_totaltutorial = $ytd_totaltutorial + $user_ytd_tutorial;  
	   	  	*/
	    	//BY LOGINS PER MONTH CALCULATIONS
		    $totalrows = $this->getavg($row['user_id'], "login", $date_value[0], $date_value[1]);
		    $this->totalrows = $totalrows;
	    
	   		//get exercise visits
	   	  	$exercises = $this->getexercises($row['user_id'], $date_value[0], $date_value[1]);
	   	  	$totalexercises = $exercises + $totalexercises;
	   	  	
	   	  	//get nutrition visits
	   	  	$nutrition = $this->getnutrition($row['user_id'], $date_value[0], $date_value[1]);
	   	  	$totalnutrition = $nutrition + $totalnutrition; 
	   	  	
	   	  	/*
	   	  	//get tutorial visits
	   	  	$tutorial = $this->gettutorial($row['user_id'], $date_value[0], $date_value[1]);
	   	  	$totaltutorial = $tutorial + $totaltutorial; 
	   	  	*/
	   	  	//get EXERCISE OR EDUCATION FAQ CLICKS
	   	  	$faq_array = $this->getfaq($row['user_id'], $date_value[0], $date_value[1]);
	   	  	$total_nutrition = $faq_array['nutrition'] + $total_nutrition; 
	   	  	$total_exercise = $faq_array['exercise'] + $total_exercise;
	   	  	
	   	  	//get motivation visits
	   	  	$motivation = $this->getmotivation($row['user_id'], $date_value[0], $date_value[1]);
	   	  	$totalmotivation = $motivation + $totalmotivation; 

	   	  	$weightloss_ytd = $this->getweightloss_ytd($row['user_id']);
	   	  	$ytd_totalweightloss = $ytd_totalweightloss + $weightloss_ytd;
	    
	    
	    //$totallogins = "";
	   		if($totalrows < 6){
	   				$logins_per_month[0] = 1 + $logins_per_month[0];
	   				$timeloggedin_per_month[0] = $timeloggedin_month_avg + $timeloggedin_per_month[0];
	   				$daysbetweenlogins[0] = ($totalrows / 30) + $daysbetweenlogins[0];
	   				$exercises_byloginspermonth[0] = $exercises + $exercises_byloginspermonth[0];
	   				$nutrition_byloginspermonth[0] = $nutrition + $nutrition_byloginspermonth[0];
	   				$tutorial_byloginspermonth[0] = $tutorial + $tutorial_byloginspermonth[0];
	   				$faqnutrition_byloginspermonth[0] = $faq_array['nutrition'] + $faqnutrition_byloginspermonth[0]; 
	   				$faq_exercise_byloginspermonth[0] = $faq_array['exercise'] + $faq_exercise_byloginspermonth[0];
	   				$motivation_byloginspermonth[0] = $motivation + $motivation_byloginspermonth[0]; 
	   				$weightloss_byloginspermonth[0] = $weightloss + $weightloss_byloginspermonth[0];   
	   				//$totallogins = 0;
	   		}elseif($totalrows > 5 && $totalrows < 11){
	   				
					$logins_per_month[1] = 1 + $logins_per_month[1];
					$timeloggedin_per_month[1] = $timeloggedin_month_avg + $timeloggedin_per_month[1];
					$daysbetweenlogins[1] = ($totalrows / 30) + $daysbetweenlogins[1];
					$exercises_byloginspermonth[1] = $exercises + $exercises_byloginspermonth[1];
					$nutrition_byloginspermonth[1] = $nutrition + $nutrition_byloginspermonth[1];
					$tutorial_byloginspermonth[1] = $tutorial + $tutorial_byloginspermonth[1];
					$faqnutrition_byloginspermonth[1] = $faq_array['nutrition'] + $faqnutrition_byloginspermonth[1];
					$faq_exercise_byloginspermonth[1] = $faq_array['exercise'] + $faq_exercise_byloginspermonth[1];
					$motivation_byloginspermonth[1] = $motivation + $motivation_byloginspermonth[1];
					$weightloss_byloginspermonth[1] = $weightloss + $weightloss_byloginspermonth[1];
					//$totallogins = 1;
	   		}elseif($totalrows > 10 && $totalrows < 21){
				    $logins_per_month[2] = 1 + $logins_per_month[2];
				    $timeloggedin_per_month[2] = $timeloggedin_month_avg + $timeloggedin_per_month[2];
				    $daysbetweenlogins[2] = ($totalrows / 30) + $daysbetweenlogins[2];
				    $exercises_byloginspermonth[2] = $exercises + $exercises_byloginspermonth[2];
				    $nutrition_byloginspermonth[2] = $nutrition + $nutrition_byloginspermonth[2];
				    $tutorial_byloginspermonth[2] = $tutorial + $tutorial_byloginspermonth[2];
				    $faqnutrition_byloginspermonth[2] = $faq_array['nutrition'] + $faqnutrition_byloginspermonth[2];
				    $faq_exercise_byloginspermonth[2] = $faq_array['exercise'] + $faq_exercise_byloginspermonth[2];
				    $motivation_byloginspermonth[2] = $motivation + $motivation_byloginspermonth[2];
				    $weightloss_byloginspermonth[2] = $weightloss + $weightloss_byloginspermonth[2];
				    //$totallogins = 2;
	   		}elseif ($totalrows > 20 && $totalrows < 31){
					$logins_per_month[3] = 1 + $logins_per_month[3];
					$timeloggedin_per_month[3] = $timeloggedin_month_avg + $timeloggedin_per_month[3];
					$daysbetweenlogins[3] = ($totalrows / 30) + $daysbetweenlogins[3];
					$exercises_byloginspermonth[3] = $exercises + $exercises_byloginspermonth[3];
					$nutrition_byloginspermonth[3] = $nutrition + $nutrition_byloginspermonth[3];
					$tutorial_byloginspermonth[3] = $tutorial + $tutorial_byloginspermonth[3];
					$faqnutrition_byloginspermonth[3] = $faq_array['nutrition'] + $faqnutrition_byloginspermonth[3];
					$faq_exercise_byloginspermonth[3] = $faq_array['exercise'] + $faq_exercise_byloginspermonth[3];
					$motivation_byloginspermonth[3] = $motivation + $motivation_byloginspermonth[3];
					$weightloss_byloginspermonth[3] = $weightloss + $weightloss_byloginspermonth[3];
					//$totallogins = 3;
	   		}elseif($totalrows > 30){
					$logins_per_month[4] = 1 + $logins_per_month[4];
					$timeloggedin_per_month[4] = $timeloggedin_month_avg + $timeloggedin_per_month[4];
					$daysbetweenlogins[4] = ($totalrows / 30) + $daysbetweenlogins[4];
					$exercises_byloginspermonth[4] = $exercises + $exercises_byloginspermonth[4];
					$nutrition_byloginspermonth[4] = $nutrition + $nutrition_byloginspermonth[4];
					$tutorial_byloginspermonth[4] = $tutorial + $tutorial_byloginspermonth[4];
					$faqnutrition_byloginspermonth[4] = $faq_array['nutrition'] + $faqnutrition_byloginspermonth[4];
					$faq_exercise_byloginspermonth[4] = $faq_array['exercise'] + $faq_exercise_byloginspermonth[4];
					$motivation_byloginspermonth[4] = $motivation + $motivation_byloginspermonth[4];
					$weightloss_byloginspermonth[4] = $weightloss + $weightloss_byloginspermonth[4];
					//$totallogins = 4;
	   			
	   		}
	    	
	   		//calculates the all participants logins
	    	$avg_totalrows = $totalrows + $avg_totalrows;
	    	//set for each user below
	   		$user_totalrows = $totalrows;
	   		
	   		
	   		//Now get logins per month but seperate weeks by array index 0 = week 1   4 == week 4
	   		//$logins_per_month[$count] = $totalrows + $logins_per_month[$count];
	   		//$count = $count + 1;
	   				//}
		//die($tutorial."**");
		
		//$YEAR_TO_DATE_LOGINS = $this->getavg($row['user_id'], "login", $startdate_year, $enddate_year);
		
		
		$number_of_days_between_logins = ($user_totalrows / 30);
		/*if($number_of_days_between_logins == 0)
			$number_of_days_between_logins = 31;
		*/
		$avg_user_login[$row['user_id']] = array(
		           "avg_user_login" => $user_totalrows, 
		           "name" => $row['user_firstname']." ".$row['user_lastname'], 
				   "year_to_date_logins" => $ytd_logins,
				   "timelogin_avg" => number_format( ($timeloggedin_month_avg / 60), 2 ),
				   "timeloggedin" => $YEAR_TO_DATE_TIMELOGGEDIN,
				   "exercises" => $exercises,
				   "ytd_exercises" => $user_ytd_exercises,
				   "nutrition" => $nutrition,
			       "ytd_nutrition" => $user_ytd_nutrition,
				   "faq_nutrition" => $faq_array['nutrition'],
			       "faq_exercise" => $faq_array['exercise'],
			       "ytd_faq_nutrition" => $user_ytd_faq_array['nutrition'],
				   "ytd_faq_exercise" => $user_ytd_faq_array['exercise'],
		           "motivation"=> $user_ytd_motivation,
		           "ytd_motivation" => $ytd_totalmotivation,
				   "numberofdaysbetweenlogins" => $number_of_days_between_logins,
				   "weightloss" => $weightloss,
				   "weightloss_ytd" => $weightloss_ytd,
				   "faq_education" => $faq_array['nutrition'],
				   "faq_exercise" => $faq_array['exercise'],
				   "loginamount" => $totallogins
		);
  	}
  	
  	
  	//die($ytd_all_timeloggedin."**");
  	$this->all_ytd_apr_daysbetweenlogins  = ($totalrows / 52);
  	$this->all_apr_daysbetweenlogins = ($totalrows / 30);
  	$this->all_exercisevisits = ($totalexercises /4);
  	$this->all_ytd_exercisevisits = ($ytd_totalexercises / 52);
  	$this->all_ytd_totalnutrition = ($ytd_totalnutrition / 52);
  	$this->all_nutritionvisits =  ($total_nutrition / 4);	
  	$this->all_faq_nutrition = ($total_nutrition / 30);
  	$this->all_faq_exercise = ($total_exercise / 30);
  	$this->all_ytd_faq_nutrition = ($ytd_total_nutrition / 52);
  	$this->all_ytd_faq_exercise = ($ytd_total_exercise / 52);
  	$this->all_motivation = ($totalmotivation / 30);
  	$this->all_ytd_motivation = ($ytd_totalmotivation / 52);
  	$this->all_weightloss = $all_weightloss;
  	$this->all_ytd_weightloss = $ytd_totalweightloss;
  	
  	
  	$this->year_to_date_totaltimeloggedin = $ytd_all_timeloggedin;
  	$this->total_timeloggedin_month_avg = $total_timeloggedin_month_avg;
  	$this->timeloggedin = $timeloggedin_array; 
	$this->totaluseravglogin = $avg_totalrows;
	$this->avg_user_login = $avg_user_login;
	$this->logins_per_month = $logins_per_month;
	$this->year_to_date_logins = $ytd_logins;
	
	$this->daysbetweenlogins = $daysbetweenlogins;
	$this->timeloggedin_per_month = $timeloggedin_per_month;
	$this->exercises_byloginspermonth = $exercises_byloginspermonth;
	$this->nutrition_byloginspermonth = $nutrition_byloginspermonth;
	$this->tutorial_byloginspermonth = $tutorial_byloginspermonth;
	$this->motivation_byloginspermonth = $motivation_byloginspermonth;
	$this->faqnutrition_byloginspermonth = $faqnutrition_byloginspermonth;
	$this->faqexercise_byloginspermonth = $faq_exercise_byloginspermonth;
	$this->weightloss_byloginspermonth = $weightloss_byloginspermonth;
	/*print_r($faqnutrition_byloginspermonth);
	die();
	*/
  }
  
  
  private function getavg($user_id, $data, $startdate, $enddate){
  	
  	
	  
	  $res = $this->mysql->mysqlquery("select count(*) from reporting where user_id='$user_id' and data='$data' and occured between '{$startdate}' and '{$enddate}'");
		//while($row = mysql_fetch_array($res)){
			//$tmp[] = $row;	
		//}
		$row = mysql_fetch_array($res);
		$totalrows = $row[0];

		//$tmp = (31/ $totalrows);
		//$this->logMessage("LOGINIS: $user_id $totalrows $tmp");
		//print_r($tmp);
		//$this->row = $tmp;
		return $totalrows;
	
  	
  }
  
 private function gettime($user_id, $data, $startdate, $enddate){
  	
  	
	  $tmp = array();
	  $res = $this->mysql->mysqlquery("select sum(totaltime) from reporting where user_id='$user_id' and data='$data' and occured between '{$startdate}' and '{$enddate}'");
		//while($row = mysql_fetch_array($res)){
			//$tmp[] = $row;	
		//}
		$row = mysql_fetch_array($res);
		$totalrows = $row[0];
		 
		//print_r($tmp);
		//$this->row = $tmp;
		return $totalrows;
	
  	
  }
  
  private function getexercises($user_id, $startdate, $enddate){
  	
  	//$data = array("loadresistance", "loadrest", "loadcardio");
  	  //foreach($data as $value){
  		$res = $this->mysql->mysqlquery("select * from reporting where 
  		user_id='$user_id' and occured between '{$startdate}' and '{$enddate}' and
  		(data = 'loadresistance' OR data = 'loadrest' OR data = 'loadcardio') ");
		  /*while($row = mysql_fetch_array($res)){
			$totalrows = $row[0] + $totalrows;	
		  }*/
		
  	  //}
  	  
  	  return mysql_num_rows($res);
  }
  
  private function getnutrition($user_id, $startdate, $enddate){
  	
  	
  		$res = $this->mysql->mysqlquery("select * from reporting where 
  		user_id='$user_id' and occured between '{$startdate}' and '{$enddate}' and
  		data = 'loadnutrition' ");
		 
  	  
  	  return mysql_num_rows($res);
  }
  

 private function getfaq($user_id, $startdate, $enddate){
  	
  		$res = $this->mysql->mysqlquery("select * from reporting where 
  		user_id='$user_id' and occured between '{$startdate}' and '{$enddate}' and
  		data = 'NutritionTutorial' ");
		$tutorial['nutrition'] = mysql_num_rows($res);
		
		$res = $this->mysql->mysqlquery("select * from reporting where 
  		user_id='$user_id' and occured between '{$startdate}' and '{$enddate}' and
  		data = 'ExerciseTutorial' ");
		
  		$tutorial['exercise'] = mysql_num_rows($res);
  		
  	  
  	  return $tutorial;
  }
  
 private function gettutorial($user_id, $startdate, $enddate){
  	
  	
  		$res = $this->mysql->mysqlquery("select * from reporting where 
  		user_id='$user_id' and occured between '{$startdate}' and '{$enddate}' and
  		data like 'loadpopup%' ");
		 
  	  
  	  return mysql_num_rows($res);
  }
  
 private function getmotivation($user_id, $startdate, $enddate){
  	
  	
  		$res = $this->mysql->mysqlquery("select * from reporting where 
  		user_id='$user_id' and occured between '{$startdate}' and '{$enddate}' and
  		data = 'loadmotivation' ");
		 
  	  
  	  return mysql_num_rows($res);
  }
   
  private function getyeartodatelogins_byeachmonth(){
  	
  	 $startdate_year = date("Y-01-01");
	 $enddate_year =  date("Y-12-31");
	
	  $tmp = array("");
	  $res = $this->mysql->mysqlquery("select count(*) from reporting where data='login' and occured between '{$startdate}' and '{$enddate}'");
		//while($row = mysql_fetch_array($res)){
			//$tmp[] = $row;	
		//}
		$row = mysql_fetch_array($res);
		$totalrows = $row[0];
		 
		//print_r($tmp);
		//$this->row = $tmp;
		return $totalrows;
  	
  	
  }
  
  private function getweightloss($user_id, $startdate, $enddate){
  	
  	
  	$res = $this->mysql->mysqlquery("SELECT max(weight) as max, min(weight) as min  FROM statistics where user_id='$user_id' and datetime between '{$startdate}' and '{$enddate}'" );
		//while($row = mysql_fetch_array($res)){
			//$tmp[] = $row;	
		//}
		$row = mysql_fetch_array($res);
		$weight = $row['max'] - $row['min'];
		 
		//print_r($tmp);
		//$this->row = $tmp;
		return $weight;
  	
  }
  
  private function getweightloss_ytd($user_id){
  	
  	
  	
  	$res = $this->mysql->mysqlquery("SELECT weight as weight_start FROM statistics where user_id='$user_id' order by datetime limit 1" );
		//while($row = mysql_fetch_array($res)){
			//$tmp[] = $row;	
		//}
		$row_start = mysql_fetch_array($res);
		
	$res = $this->mysql->mysqlquery("SELECT weight as weight_end FROM statistics where user_id='$user_id' order by datetime desc limit 1" );
		$row = mysql_fetch_array($res);
		
		$weight = $row_start['weight_start'] - $row['weight_end'];
		 
		//print_r($tmp);
		//$this->row = $tmp;
		return round($weight, PHP_ROUND_HALF_UP);
  	
  }
  
  
  
  
}
