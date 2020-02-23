<?php

/**
 * dashboard actions.
 *
 * @package    virtualgym
 * @subpackage dashboard
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class dashboardActions extends sfActions
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
            //DASHBOARD
			$mysql = new mysqlclass();

			$feedbackid = $this->getRequestParameter('feedbackid');
			if($feedbackid != ""){
				$res = $mysql->mysqlquery("update feedback set resolved='1' where id = '$feedbackid' ");
			}

			$res = $mysql->mysqlquery("SELECT count(*) as totalrows FROM fitnessuser_comments as c, fitness_users as u 
			where c.viewedbycoach='0' and c.sendto = 0 and c.activeflag=1 and commentdate >= DATE_SUB(CURDATE(), INTERVAL 4 DAY) and u.group_id='{$this->group_id}'");
			$row = mysql_fetch_array($res);
			if($row['totalrows']>0){
				$this->commentsawaiting = $row['totalrows'];
			}

			$res = $mysql->mysqlquery("SELECT * FROM feedback as f, fitness_users as u where f.user_id = u.user_id and f.resolved=0 and u.group_id='{$this->group_id}'");
			while($row = mysql_fetch_array($res)){
				$report_array[] = $row;

				$sql="";

			 /*if($row['toomuch'] != 0 || $row['toolittle']!=0)
				$sql = "select * from fitness_exercise_nutrition where id='{$row['what']}' ";*/
				
			if($row['tooeasy']!=0 || $row['toohard']!=0)
				$sql = "select * from fitness_exercise_resistence where id='{$row['what']}' ";
				


				$feedback_results = $mysql->mysqlquery($sql);
				$feedback_row = mysql_fetch_array($feedback_results);
				$feedback_array[] = $feedback_row;
			}

			$this->reports = $report_array;
			$this->feedback = $feedback_array;


			$res = $mysql->mysqlquery("SELECT *, (select workoutdate from fitness_exercise_day as e where e.user_id=u.user_id 
			order by workoutdate desc limit 1) as lastsetdate from fitness_users as u where u.group_id='{$this->group_id}' order by lastsetdate");
			while($row = mysql_fetch_array($res)){
				$today = date("Y-m-d");
				if(strtotime($row['lastsetdate']) < strtotime($today)) 
				   $needworkouts[] = $row;
			}

			$this->needworkouts = $needworkouts;

			
			//return $this->setTemplate('showmenu');

  	
  }
}
