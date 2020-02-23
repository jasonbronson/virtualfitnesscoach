<?php

/**
 * nutritionupdate actions.
 *
 * @package    virtualgym
 * @subpackage nutritionupdate
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class nutritionupdateActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    	//select * from fitness_exercise_nutrition

			$mysql = new mysqlclass();
			$this->common = new commonlib();
			
			$this->user_id = $this->getRequestParameter('user_id');
			$this->workoutdate = $this->getRequestParameter('validdate');

			//UPDATE
			if($this->getRequestParameter('update') == "true"){

				//$data['validdate'] = $_REQUEST['validdate'];
				for($a = 0; $a< 6; $a++){
					$tmp['totalcal'] = $_REQUEST['totalcal'.$a];
					$tmp['sugcal'] = $_REQUEST['sugcal'.$a];
					$tmp['foodsug'] = $_REQUEST['foodsug'.$a];
					$tmp['image'] = $_REQUEST['image'.$a];
					$tmp['user_id']= $this->user_id;
					$tmp['validdate']= $this->workoutdate;
					$data[] = $tmp;

				}
				$this->common->write_to_exerciseday_nutrition($data);

				$nutritionswif = $this->getRequestParameter('nutritionswif');
				$response_swf = $mysql->mysqlquery("UPDATE fitness_exercise_day set nutritionswf='$nutritionswif' where workoutdate='$this->workoutdate' and user_id='{$this->user_id}'", "", "true");


				//$this->setLayout(true);
				return $this->forward("admin","schedulelist");

			}


			//Now get nutrition info
			$query = "SELECT * FROM fitness_exercise_nutrition where user_id='{$this->user_id}' and validdate='{$this->workoutdate}' order by sort";
			$res = $mysql->mysqlquery($query);
			while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
				$tmp[] = $row;
			}
			$this->nutritioninfo = $tmp;

			$query = "SELECT * FROM fitness_exercise_day where user_id='{$this->user_id}' and workoutdate='{$this->workoutdate}'";
			$res = $mysql->mysqlquery($query);
			$row = mysql_fetch_array($res, MYSQL_ASSOC);

			$this->exerciseday = $row;


			$query = "SELECT * FROM fitness_users where user_id='{$this->user_id}'";
			$res = $mysql->mysqlquery($query);
			$row = mysql_fetch_array($res,MYSQL_ASSOC);
			$this->userinfo = $row;
			//$this->selectedswif = $row['welcomeswf'];
			//$this->exerciselist = $this->getexerciselist();
			
			$files = $this->common->getfilelists(); //gets graphics, nutrition, and cardio graphic files for scandir function
  		    foreach($files as $key=>$value)
  		    	$this->$key = $value;
  }
}
