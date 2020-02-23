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
		
		if($this->getRequestParameter('noheader') == "true"){
			$this->getUser()->setAttribute('noheader', 'true');
			$this->noheader = true;
		}elseif($this->getUser()->getAttribute('noheader') == "true"){
			$this->noheader = true;
		}
		
		$this->postform = true;
		
	}
	
	
	/**
	 * Executes index action
	 *
	 */
	public function executeIndex()
	{
		
		
		$user_id = $this->getUser()->getAttribute('user_id', 'NA');
		if($user_id == ""){
			die("ERROR NOT LOGGED IN");
		}
		$page_params[1] = array("appearance_goal", "cardiovascular_goal","fat_reduction_goal","flexibility_goal","health_goal" ,"definition_goal" ,"muscular_endurance_goal","muscular_size_goal" ,"strength_goal","power_goal","self_esteem_goal" ,"speed_goal" ,"sports_goal","stress_goal","toning_goal","weight_goal","posture" ,"other_goal" ,"other_goal_details","how_going_to_make_you_feel","other_specific_fitness_goals");
		$page_params[2] = array("age","sex","person_height","weight","pregnant","orthopedic_problems_injuries","medical_conditions","names_of_medications" ,"physicians_restriction","physicians_restriction_advise","smoke","smoke_quantity","occupation","activity_level","current_exercise","past_exercise" ,"recent_weight_training_exercises" ,"cardio_fitness","experience", "exercise");
		$page_params[3] = array("resting_heart_rate");
		$page_params[4] = array("measure_chest", "measure_arm", "measure_thigh", "measure_waist", "measure_hips");
		$page_params[5] = array("regular_pushups", "modified_pushups", "pushups_against_table", "pushups_against_wall", "why_i_cant_do_pushups");
		$page_params[6] = array("fitness_test_beats_per_minute", "fitness_test_minutes_stepping", "fitness_test_inches_high", "why_i_cant_do_stepups");
		$page_params[7] = array("prefer_to_exercise_on_monday","prefer_to_exercise_on_tuesday","prefer_to_exercise_on_wednesday","prefer_to_exercise_on_thursday","prefer_to_exercise_on_friday","prefer_to_exercise_on_saturday","prefer_to_exercise_on_sunday","other_activities_with_program","exercise_at_fitness_facility","exercise_at_home","exercise_outside" ,"no_equipment_available" ,"free_weights_available" ,"weight_machines_available" ,"resistance_tubes_available","cardio_equipment_available","bicycle_available" ,"aerobic_videos_available" ,"i_have_no_preferences_for_activities" ,"include_free_weights" ,"include_weight_machines","include_resistance_tubes" ,"include_walking" ,"include_jogging" ,"include_running" ,"include_hiking" ,"include_aerobic_classes" ,"include_bicycling" ,"include_stationary_bike" ,"include_stair_machine" ,"include_elliptical" ,"include_treadmill" ,"include_spinning" ,"include_rowing_machine" ,"include_swimming", "type_of_free_weights_i_own");
		$page_params[8] = array("obstacle_intimidated_or_embarrassed","obstacle_holidays_and_vacations","obstacle_travel","obstacle_work_demands","obstacle_finding_time","obstacle_dont_see_results" ,"obstacle_family_obligations" ,"obstacle_no_support","obstacle_exercise_not_enjoyable" ,"obstacle_exercise_is_boring" ,"obstacle_tired_or_fatigued" ,"obstacle_forget_goal" ,"obstacle_exercise_alone" ,"obstacle_deficient_exercise_setting","obstacle_bad_weather" ,"obstacle_none", "my_accomplishments", "tough_coach", "tender_coach", "tender_and_tough_coach");
		$page_params[9] = array("six_am_time","seven_am_time","eight_am_time","nine_am_time","ten_am_time","eleven_am_time","tweleve_pm_time","one_pm_time","two_pm_time","three_pm_time","four_pm_time","five_pm_time","six_pm_time","seven_pm_time","eight_pm_time","nine_pm_time","ten_pm_time","eleven_pm_time","tweleve_am_time","one_am_time","two_am_time","three_am_time","four_am_time","five_am_time", "protein_likes", "dairy_likes", "fruit_likes", "vegies_likes", "starches_likes", "protein_dislikes", "dairy_dislikes", "fruit_dislikes", "vegies_dislikes", "starches_dislikes", "alcohol_consumption", "sweet_drinks_consumption", "starches_consumption", "whole_milk_consumption", "sweets_consumption", "fast_food_consumption", "fruit_consumption", "vegies_consumption", "water_consumption", "lean_meat_consumption2", "afterbreakfast_still_hungry", "afterbreakfast_satisfied", "afterbreakfast_full_or_bloated", "afterlunch_still_hungry", "afterlunch_satisfied", "afterlunch_full_or_bloated",  "afterdinner_still_hungry", "afterdinner_satisfied", "afterdinner_full_or_bloated");
				
		
		$this->pagenum = $this->getRequestParameter('pagenumber', '1');
		$testspassed = true;
		$tmp_array = array();
		if($_POST){ //SAVE DATA
			
			foreach($page_params[$this->pagenum] as $key){
				
				if($this->getRequestParameter($key) == "")
					$tmp = "";
					 else
					$tmp = $_POST[$key];
				
				$tmp_array[$key] = $tmp;
				$this->{$key} = $tmp;
				
				if($this->pagenum == "4"){
					
					if(strlen($tmp) > 0 && is_numeric(trim($tmp)) != TRUE){
					  $testspassed = false;
					}
				}
				
			}
			
			if($testspassed == false){
				        
				 	    $this->error = "All entries must be numbers example a Chest size of 34 1/2 inches should be entered as 34.5 or 34 1/4 should be entered as 34.2 <br>";
						$this->setTemplate("page".$this->pagenum);
					  	return;
			}
			
			$this->recordstats();
			
			$resource = $this->mysql->mysqlquery("SELECT * FROM assessment where user_id='$user_id'");
			$userdata_exists = mysql_num_rows($resource);
			$row = mysql_fetch_array($resource);
			//decrypt old array data now into an array var
			$data = base64_decode($row['data']);
			$old_pagedata_array = unserialize($data);
			//merge new data overright the old stuff
			$old_pagedata_array[$this->pagenum] = $tmp_array;
			//serialze the data back for mysql storage
			$data = base64_encode(serialize($old_pagedata_array));
			
			
			
			if($userdata_exists > 0)
			  $resource = $this->mysql->mysqlquery("UPDATE assessment set data='$data', date_time=NOW() where user_id='$user_id'");
				else
			  $resource = $this->mysql->mysqlquery("INSERT into assessment set data='$data', date_time=NOW(), user_id='$user_id'");
			//session_destroy();
			/*$page_array = $this->getUser()->getAttribute('pagearray');
			if(is_array($page_array)){
				$page_array = array_merge($page_array, $tmp_array);

			}else{
				$page_array = $tmp_array;
			}
			
			$this->getUser()->setAttribute('pagearray', $page_array);
			 */

		  $this->pagenum = $this->pagenum + 1;	  
			  
		}
			//must be moving through pages
			$resource = $this->mysql->mysqlquery("SELECT * FROM assessment where user_id='$user_id'");
			$row = mysql_fetch_array($resource);
			//decrypt old array data now into an array var
			$pagedata_array = unserialize(base64_decode($row['data']));
			
			$pagedata_loop = $pagedata_array[$this->pagenum];
			//$pagedata_array = $this->getUser()->getAttribute('pagearray');
			foreach($pagedata_loop as $key => $value){
				$this->{$key} = $value;
			}
			
		
		
		
		/*echo "-----";
			print_r($page_array);
			print_r($pagedata_loop);
		echo "*****";
		*/
		//proceed to next page
		
		
		if($this->pagenum == "1"){
			$this->setTemplate('index');
		}else{
			
			$page = 'page'.$this->pagenum;
			$this->setTemplate($page);
		}
		

		
	
		switch($this->pagenum){
			case 1:
				$this->assessswf = "assess1.swf";
				$this->width = "250";
				$this->height = "400";
			break;
			case 2:
				$this->assessswf = "assess2.swf";
				$this->width = "250";
				$this->height = "400";
			break;
			case 3:
				$this->assessswf = "assess3.swf";
				$this->width = "600";
				$this->height = "630";
			break;
			case 4:
				$this->assessswf = "assess3b.swf";
				$this->width = "300";
				$this->height = "700";
			break;
			case 5:
				$this->assessswf = "assess3c.swf";
				$this->width = "370";
				$this->height = "700";
			break;
			case 6:
				$this->assessswf = "assess3d.swf";
				$this->width = "500";
				$this->height = "700";
			break;
			case 7:
				$this->assessswf = "assess4.swf";
				$this->width = "250";
				$this->height = "400";
			break;
			case 8:
				$this->assessswf = "assess5.swf";
				$this->width = "250";
				$this->height = "400";
			break;
			case 9:
				$this->assessswf = "assess6.swf";
				$this->width = "250";
				$this->height = "400";
			break;	
			
		}
		 
		 
		 
	}
	
	
	private function recordstats(){
		
		
	   
		$user_id = $this->getUser()->getAttribute('user_id', 'NA');		
				 
		$resource = $this->mysql->mysqlquery("SELECT * FROM statistics where user_id='$user_id' order by id asc limit 1");
			$userdata_exists = mysql_num_rows($resource);
			if($userdata_exists > 0){
				$exists = true;
				$this->row_userstatdata = mysql_fetch_array($resource);
			}else{
				$exists = false;
			}
		
				
		switch($this->pagenum){
			case 2:
				    $weight = $this->getRequestParameter("weight");
					$this->writestats(" weight='$weight' ", $exists, $user_id);
				break;
			case 3:
				$resting_heart_rate = $this->getRequestParameter("resting_heart_rate");
				$this->writestats(" restingheartrate='$resting_heart_rate' ", $exists, $user_id);
				break;
			case 4:
				$array = array ("measure_chest", "measure_arm", "measure_thigh", "measure_waist", "measure_hips");
				foreach($array as $value){
					${$value} = $this->getRequestParameter($value);
					
				}
				
				$this->writestats(" chest='$measure_chest', arms='$measure_arm', thighs='$measure_thigh', hips='$measure_hips', waist='$measure_waist'  ", $exists, $user_id);
				
				
				break;
			case 5:
				$array = array("regular_pushups", "modified_pushups", "pushups_against_table", "pushups_against_wall");
				
				if($this->getRequestParameter("pushups_against_wall") != "")
				  $pushups = $this->getRequestParameter("pushups_against_wall");
				
				if($this->getRequestParameter("pushups_against_table") != "")
				  $pushups = $this->getRequestParameter("pushups_against_table");
				
				if($this->getRequestParameter("modified_pushups") != "")
				  $pushups = $this->getRequestParameter("modified_pushups");
				
				if($this->getRequestParameter("regular_pushups") != "")
				  $pushups = $this->getRequestParameter("regular_pushups");
				
				$this->writestats(" pushups='$pushups' ", $exists, $user_id);
				
				break;
			case 6:
				$fitness_test_beats_per_minute = $this->getRequestParameter("fitness_test_beats_per_minute");
				$this->writestats(" steptest='$fitness_test_beats_per_minute' ", $exists, $user_id);
				break;
			case 9:
				mail("jasonbronson@gmail.com, newmember@virtualfitnesscoach.com", "Assessment Completed user_id #$user_id", "Assessment finished for user_id #$user_id");
				break;
		}
				
				
		
	}
	private function writestats($sql, $exists = false, $user_id){
		 if($exists)
			$resource = $this->mysql->mysqlquery("UPDATE statistics set $sql where user_id='$user_id' and id='{$this->row_userstatdata['id']}'");
			 else
			$resource = $this->mysql->mysqlquery("INSERT INTO statistics set datetime=now(), user_id='$user_id', $sql ");
		
	}
	
}
