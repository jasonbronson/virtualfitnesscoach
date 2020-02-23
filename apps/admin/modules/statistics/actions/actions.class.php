<?php

/**
 * statistics actions.
 *
 * @package    virtualgym
 * @subpackage statistics
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class statisticsActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $mysql = new mysqlclass();

		$this->user_id = $this->getRequestParameter("user_id");

		if($_POST){


			$this->c1_weight = $this->getRequestParameter("c1_weight");
			$this->c1_chest = $this->getRequestParameter("c1_chest");
			$this->c1_waist = $this->getRequestParameter("c1_waist");
			$this->c1_arms = $this->getRequestParameter("c1_arms");
			$this->c1_thighs = $this->getRequestParameter("c1_thighs");
			$this->c1_hips = $this->getRequestParameter("c1_hips");
			$this->c1_restingheartrate = $this->getRequestParameter("c1_restingheartrate");
			$this->c1_steptest = $this->getRequestParameter("c1_steptest");
			$this->c1_pushups = $this->getRequestParameter("c1_pushups");
			$this->c1_comments = addslashes($this->getRequestParameter("c1_comments"));

			$this->c2_weight = $this->getRequestParameter("c2_weight");
			$this->c2_chest = $this->getRequestParameter("c2_chest");
			$this->c2_waist = $this->getRequestParameter("c2_waist");
			$this->c2_arms = $this->getRequestParameter("c2_arms");
			$this->c2_thighs = $this->getRequestParameter("c2_thighs");
			$this->c2_hips = $this->getRequestParameter("c2_hips");
			$this->c2_restingheartrate = $this->getRequestParameter("c2_restingheartrate");
			$this->c2_steptest = $this->getRequestParameter("c2_steptest");
			$this->c2_pushups = $this->getRequestParameter("c2_pushups");
			$this->c2_comments = addslashes($this->getRequestParameter("c2_comments"));

			$this->c3_weight = $this->getRequestParameter("c3_weight");
			$this->c3_chest = $this->getRequestParameter("c3_chest");
			$this->c3_waist = $this->getRequestParameter("c3_waist");
			$this->c3_arms = $this->getRequestParameter("c3_arms");
			$this->c3_thighs = $this->getRequestParameter("c3_thighs");
			$this->c3_hips = $this->getRequestParameter("c3_hips");
			$this->c3_restingheartrate = $this->getRequestParameter("c3_restingheartrate");
			$this->c3_steptest = $this->getRequestParameter("c3_steptest");
			$this->c3_pushups = $this->getRequestParameter("c3_pushups");
			$this->c3_comments = addslashes($this->getRequestParameter("c3_comments"));

			$res = $mysql->mysqlquery("SELECT * from statistics where user_id='$this->user_id' and statistics_type='1' order by id desc");
			if(mysql_num_rows($res)>0){

				$row = mysql_fetch_array($res);
				
				$updatequery = "update statistics set weight='{$this->c1_weight}', chest='{$this->c1_chest}', waist='{$this->c1_waist}',
				arms='{$this->c1_arms}', thighs='{$this->c1_thighs}', hips='{$this->c1_hips}',  restingheartrate='{$this->c1_restingheartrate}',
				steptest='{$this->c1_steptest}', pushups='{$this->c1_pushups}', comments='{$this->c1_comments}', datetime=now()
				where id='{$row['id']}'";
				$res = $mysql->mysqlquery($updatequery);
			}else{

				$insertquery = "insert into statistics set weight='{$this->c1_weight}', chest='{$this->c1_chest}', waist='{$this->c1_waist}',
				arms='{$this->c1_arms}', thighs='{$this->c1_thighs}', hips='{$this->c1_hips}',  restingheartrate='{$this->c1_restingheartrate}',
				steptest='{$this->c1_steptest}', pushups='{$this->c1_pushups}', comments='{$this->c1_comments}', user_id='{$this->user_id}',
				statistics_type='1', datetime=now()";
				$res = $mysql->mysqlquery($insertquery);

			}
/*
			$res = $mysql->mysqlquery("SELECT * from statistics where user_id='$this->user_id' and statistics_type='2'");
			if(mysql_num_rows($res)>0){

				$updatequery = "update statistics set weight='{$this->c2_weight}', chest='{$this->c2_chest}', waist='{$this->c2_waist}',
				arms='{$this->c2_arms}', thighs='{$this->c2_thighs}', hips='{$this->c2_hips}',  restingheartrate='{$this->c2_restingheartrate}',
				steptest='{$this->c2_steptest}', pushups='{$this->c2_pushups}', comments='{$this->c2_comments}'
				where user_id='{$this->user_id}' and statistics_type='2'";
				$res = $mysql->mysqlquery($updatequery);
			}else{

				$insertquery = "insert into statistics set weight='{$this->c2_weight}', chest='{$this->c2_chest}', waist='{$this->c2_waist}',
				arms='{$this->c2_arms}', thighs='{$this->c2_thighs}', hips='{$this->c2_hips}',  restingheartrate='{$this->c2_restingheartrate}',
				steptest='{$this->c2_steptest}', pushups='{$this->c2_pushups}', comments='{$this->c2_comments}', user_id='{$this->user_id}',
				statistics_type='2'";
				$res = $mysql->mysqlquery($insertquery);


			}

			$res = $mysql->mysqlquery("SELECT * from statistics where user_id='$this->user_id' and statistics_type='3'");
			if(mysql_num_rows($res)>0){

				$updatequery = "update statistics set weight='{$this->c3_weight}', chest='{$this->c3_chest}', waist='{$this->c3_waist}',
				arms='{$this->c3_arms}', thighs='{$this->c3_thighs}', hips='{$this->c3_hips}',  restingheartrate='{$this->c3_restingheartrate}',
				steptest='{$this->c3_steptest}', pushups='{$this->c3_pushups}', comments='{$this->c3_comments}'
				where user_id='{$this->user_id}' and statistics_type='3'";
				$res = $mysql->mysqlquery($updatequery);

			}else{
				$insertquery = "insert into statistics set weight='{$this->c3_weight}', chest='{$this->c3_chest}', waist='{$this->c3_waist}',
				arms='{$this->c3_arms}', thighs='{$this->c3_thighs}', hips='{$this->c3_hips}',  restingheartrate='{$this->c3_restingheartrate}',
				steptest='{$this->c3_steptest}', pushups='{$this->c3_pushups}', comments='{$this->c3_comments}', user_id='{$this->user_id}',
				statistics_type='3'";
				$res = $mysql->mysqlquery($insertquery);


			}

			 */
			//SILOETS
			$type_array = array(1,2,3); //1=fat 2=normal 3=skinny
			foreach($type_array as $type){
				switch($type){
					case 1:
						$name = $this->getRequestParameter('fat');
						break;
					case 2:
						$name = $this->getRequestParameter('normal');
						break;
					case 3:
						$name = $this->getRequestParameter('skinny');
						break;
				}

				$res = $mysql->mysqlquery("SELECT * from siloets where user_id='$this->user_id' and type='$type'");
				if(mysql_num_rows($res)>0){
					$row = mysql_fetch_array($res);
					$id = $row['id'];
					$updatequery = "update siloets set name='$name' where id='$id' and user_id='$this->user_id'";
					$res = $mysql->mysqlquery($updatequery);

				}else{
					$insertquery = "insert into siloets set user_id='{$this->user_id}', type='$type', name='$name'";
					$res = $mysql->mysqlquery($insertquery);
				}
			}
			 
			 
			
			//THIS UPDATES PRIORITY GRAPHS
			
					$res = $mysql->mysqlquery("DELETE from progress_report_graphs where user_id='$this->user_id'");
					/*if(mysql_num_rows($res)>0){
						$row = mysql_fetch_array($res);
						$id = $row['id'];
						$updatequery = "update progress_report_graphs set priority='$priority' where id='$id'";
						$res = $mysql->mysqlquery($updatequery);
	
					}else{*/
					
					$p1 = $this->getRequestParameter('priority1');
						$insertquery = "insert into progress_report_graphs set type='$p1', priority='1', user_id='{$this->user_id}'";
						$res = $mysql->mysqlquery($insertquery);

					$p2 = $this->getRequestParameter('priority2');	
						$insertquery = "insert into progress_report_graphs set type='$p2', priority='2', user_id='{$this->user_id}'";
						$res = $mysql->mysqlquery($insertquery);
					//}
			
			
			

			}//END OF POST

			$res = $mysql->mysqlquery("SELECT * from statistics, fitness_users where statistics.user_id='{$this->user_id}' and statistics.user_id= fitness_users.user_id order by statistics.datetime desc limit 1");
			while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
				$tmp[] = $row;
				//print_r($row);
			}
			$this->statistics = $tmp;

			$res = $mysql->mysqlquery("SELECT * from siloets where user_id='{$this->user_id}' order by type");
			while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
				$siloets[] = $row;
				//print_r($row);
			}
			$this->siloets = $siloets;
			
			$query = "SELECT * FROM progress_report_graphs where user_id='{$this->user_id}' order by priority";
			$res = $mysql->mysqlquery($query);
			while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
				$priority_graphs[] = $row;
				
			}
			
			$this->priority_graphs = $priority_graphs;
  	
  }
}
