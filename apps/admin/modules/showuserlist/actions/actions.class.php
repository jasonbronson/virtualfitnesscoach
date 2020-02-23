<?php

/**
 * showuserlist actions.
 *
 * @package    virtualgym
 * @subpackage showuserlist
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class showuserlistActions extends sfActions
{
  public function preExecute(){

  	$this->companyname = $this->getUser()->getAttribute('companyname', "NA");
  	$this->company = $this->getUser()->getAttribute('company', "NA");
  	
  }
	

	
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    
  	
			$mysql = new mysqlclass();

			
				$this->sort = $this->getRequestParameter('sort');
				$this->direction = $this->getRequestParameter('direction');
				switch($this->sort){
					case "lastname":
						if($this->direction == "desc")
							$additional_sql = "order by u.user_lastname desc";
							else
							$additional_sql = "order by u.user_lastname";
					break;
					case "setschedule":
						if($this->direction == "desc")
							$additional_sql = "order by workoutdate desc";
							else
							$additional_sql = "order by workoutdate";
					break;	
					default:
					$additional_sql = "order by u.user_lastname";
					break;	
				}
					
				
			
			
$query = "SELECT u.*, (SELECT workoutdate FROM fitness_exercise_day as e WHERE u.user_id = e.user_id 
and u.group_id = '{$this->company}' order by e.workoutdate desc limit 1) 
as workoutdate FROM fitness_users as u where u.group_id='{$this->company}' 
			 $additional_sql";

			$res = $mysql->mysqlquery($query);
			while($row  = mysql_fetch_array($res, MYSQL_ASSOC)){
				$all_array[] = $row;
				
			}
			
  $res = $mysql->mysqlquery("select user_id from assessment");
			while($row  = mysql_fetch_array($res, MYSQL_ASSOC)){
				$tmp = $row['user_id'];
				$assessment[$tmp] = ""; 
			}

			$this->assessment = $assessment;
			/*foreach($this->userlist as $key => $row){
				$all_array[] = $row;

				$sed = $mysql->mysqlquery("SELECT * FROM fitness_exercise_day where user_id='{$row['user_id']}' order by workoutdate desc limit 1");
				$tmp =  mysql_fetch_array($sed, MYSQL_ASSOC);
				if($tmp['workoutdate'] != "")
				$scheduleend[]['workoutdate'] = date("m/d/Y" , strtotime($tmp['workoutdate']));
				else
				$scheduleend[]['workoutdate'] = "WARNING NO WORKOUT SET";
			}
			$this->scheduleend = $scheduleend;*/
			$this->row = $all_array;

			//return $this->setLayout('adminmenu');
			//  return $this->setTemplate('showmenu');
  	
  	
  }
}
