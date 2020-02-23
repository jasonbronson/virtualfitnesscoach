<?php

/**
 * clonedatetodate actions.
 *
 * @package    virtualgym
 * @subpackage clonedatetodate
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class clonedatetodateActions extends sfActions
{
	
  public function preExecute(){
	$this->mysql = new mysqlclass();
  	$this->company = $this->getUser()->getAttribute('company', "");
	$this->companyname = $this->getUser()->getAttribute('companyname', "NA");
  }
  	
	
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    		
		   $common = new commonlib();

		//PREPARE TO CLONE
		$workoutdate_from = $this->getRequestParameter('workoutdate_from');
		$workoutdate_to = $this->getRequestParameter('workoutdate_to');
		$startworkoutdate = $this->getRequestParameter('startworkoutdate');
		$newuser_id = $this->getRequestParameter('clonetouser_hidden');
		$user_id = $this->getRequestParameter('clonefromuser_hidden');


		if($_POST){
			if($workoutdate_from == $workoutdate_to){
				$this->err = "ERROR This is not designed for one day !";
				return;
			}

			/*if($user_id == $newuser_id)
			 return $this->renderText("This is not designed for cloning to the same user its very dangerous this way First clone to a temp user then clone from temp to this user ! go back to correct");
			 */
			if($workoutdate_from == "" || $workoutdate_to == "" || $startworkoutdate == "" ){
				$this->err = "ERROR Workout dates are missing";
				return;
			}

			$clone_query = "SELECT * FROM fitness_exercise_day where user_id='$user_id' and workoutdate >= '$workoutdate_from' and workoutdate <= '$workoutdate_to' order by workoutdate";
			$resclone = $this->mysql->mysqlquery($clone_query);

			//!
			$newworkoutdate = $startworkoutdate;

			while($data = mysql_fetch_array($resclone)){
				$selectworkoutdate = str_replace(" 00:00:00","",$data['workoutdate']);

				//REMOVE DATA FIRST
				$this->mysql->mysqlquery("DELETE from fitness_exercise_day where user_id='{$newuser_id}' and  workoutdate='{$newworkoutdate}'");

				$this->mysql->mysqlquery("INSERT into fitness_exercise_day set user_id='{$newuser_id}', workouttype='{$data['workouttype']}',  nutritionswf='{$data['nutritionswf']}', workoutdate='{$newworkoutdate}', m_swf='{$data['m_swf']}', m1_swf='{$data['m1_swf']}', a_swf='{$data['a_swf']}', a1_swf='{$data['a1_swf']}', n_swf='{$data['n_swf']}', n1_swf='{$data['n1_swf']}'");

				switch($data['workouttype']){
					case 1:
						//INSERT RESISTANCE
						$res_1 = $this->mysql->mysqlquery("SELECT * FROM fitness_exercise_resistence where user_id='$user_id' and workoutdate = '$selectworkoutdate'");
						//REMOVE DATA FIRST
						$this->mysql->mysqlquery("DELETE from fitness_exercise_resistence where user_id='{$newuser_id}' and  workoutdate='{$newworkoutdate}'");


						while($resistance_row = mysql_fetch_array($res_1)){
							foreach($resistance_row as $key=>$value)
							$resistance_row[$key] = addslashes($value);

							$this->mysql->mysqlquery("INSERT into fitness_exercise_resistence set user_id='{$newuser_id}', workoutdate='{$newworkoutdate}', type='{$resistance_row['type']}', exgraphic='{$resistance_row['exgraphic']}', circuit='{$resistance_row['circuit']}', sets='{$resistance_row['sets']}', reps='{$resistance_row['reps']}', weights='{$resistance_row['weights']}', exercise='{$resistance_row['exercise']}', sortnumber='{$resistance_row['sortnumber']}'");
						}
						//MINICARDIO
						$res_minic = $this->mysql->mysqlquery("SELECT * FROM fitness_exercise_minicardio where user_id='$user_id' and workoutdate = '$selectworkoutdate'");
						//REMOVE DATA FIRST
						$this->mysql->mysqlquery("DELETE from fitness_exercise_minicardio where user_id='{$newuser_id}' and  workoutdate='{$newworkoutdate}'");


						while($minic_row = mysql_fetch_array($res_minic)){
							foreach($minic_row as $key=>$value)
							$minic_row[$key] = addslashes($value);


							$this->mysql->mysqlquery("INSERT into fitness_exercise_minicardio set user_id='{$newuser_id}', workoutdate='{$newworkoutdate}', image1='{$minic_row['image1']}', image2='{$minic_row['image2']}', image3='{$minic_row['image3']}', numberofmin='{$minic_row['numberofmin']}', maxheartrate='{$minic_row['maxheartrate']}'");
						}
						//WARMUPCARDIO
						$res_warmupcardio = $this->mysql->mysqlquery("SELECT * FROM fitness_exercise_warmupcardio where user_id='$user_id' and workoutdate = '$selectworkoutdate'");
						//REMOVE DATA FIRST
						$this->mysql->mysqlquery("DELETE from fitness_exercise_warmupcardio where user_id='{$newuser_id}' and  workoutdate='{$newworkoutdate}'");


						while($warmupcardio_row = mysql_fetch_array($res_warmupcardio)){
							foreach($warmupcardio_row as $key=>$value)
							$warmupcardio_row[$key] = addslashes($value);


							$this->mysql->mysqlquery("INSERT into fitness_exercise_warmupcardio set user_id='{$newuser_id}', workoutdate='{$newworkoutdate}', image1='{$warmupcardio_row['image1']}', image2='{$warmupcardio_row['image2']}', image3='{$warmupcardio_row['image3']}', numberofmin='{$warmupcardio_row['numberofmin']}', maxheartrate='{$warmupcardio_row['maxheartrate']}'");
						}


						break;
					case 2:
						//CARDIO
						$res_2 = $this->mysql->mysqlquery("SELECT * FROM fitness_exercise_cardio where user_id='$user_id' and workoutdate = '$selectworkoutdate'");
						//REMOVE DATA FIRST
						$this->mysql->mysqlquery("DELETE from fitness_exercise_cardio where user_id='{$newuser_id}' and  workoutdate='{$newworkoutdate}'");


						while($cardio_row = mysql_fetch_array($res_2)){
							foreach($cardio_row as $key=>$value)
							$cardio_row[$key] = addslashes($value);


							$this->mysql->mysqlquery("INSERT into fitness_exercise_cardio set user_id='{$newuser_id}', workoutdate='{$newworkoutdate}', image1='{$cardio_row['image1']}', image2='{$cardio_row['image2']}', image3='{$cardio_row['image3']}', numberofmin='{$cardio_row['numberofmin']}', maxheartrate='{$cardio_row['maxheartrate']}'");
						}
						break;
					case 3:
						//REST
						$res_3 = $this->mysql->mysqlquery("SELECT * FROM fitness_exercise_rest where user_id='$user_id' and workoutdate = '$selectworkoutdate'");
						//REMOVE DATA FIRST
						$this->mysql->mysqlquery("DELETE from fitness_exercise_rest where user_id='{$newuser_id}' and  workoutdate='{$newworkoutdate}'");

						while($rest_row = mysql_fetch_array($res_3)){
							foreach($rest_row as $key=>$value)
							$rest_row[$key] = addslashes($value);



							$this->mysql->mysqlquery("INSERT into fitness_exercise_rest set user_id='{$newuser_id}', workoutdate='{$newworkoutdate}', image1='{$rest_row['image1']}', message='{$rest_row['message']}'");
						}
						break;
				}

				//NUTRITION EITHER WAY !
				$res_nutrition = $this->mysql->mysqlquery("SELECT * FROM fitness_exercise_nutrition where user_id='$user_id' and validdate = '$selectworkoutdate'");

				//REMOVE DATA FIRST
				$this->mysql->mysqlquery("DELETE from fitness_exercise_nutrition where user_id='{$newuser_id}' and  validdate='{$newworkoutdate}'");

				while($nutrition_row = mysql_fetch_array($res_nutrition)){
					foreach($nutrition_row as $key=>$value)
					$nutrition_row[$key] = addslashes($value);


					$this->mysql->mysqlquery( "INSERT into fitness_exercise_nutrition set user_id='{$newuser_id}', validdate='{$newworkoutdate}', totalcalories='{$nutrition_row['totalcalories']}', suggestedcalories='{$nutrition_row['suggestedcalories']}', image1='{$nutrition_row['image1']}', foodsuggestions='{$nutrition_row['foodsuggestions']}', sort='{$nutrition_row['sort']}' ");
				}

				//before loop ADVANCE ONE MORE DAY
				$newworkoutdate = date("Y-m-d", strtotime("$newworkoutdate + 1 DAY") );

			}


			//return $this->forward('showuserlist','index');
			$this->err= "<h1>CLONE WAS SUCCESSFUL</h1>";
		}

		/*$res = $this->mysql->mysqlquery("SELECT * FROM fitness_users");
		while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
			$tmp[] = $row;
		}
		$this->userlist  = $tmp;
		*/
		
		
		$this->userlist = $common->getusers("");
  	    
  }
  
	public function executeAjax_getusers(){

			/*ob_start();
			 print_r($_REQUEST);
			 $out1 = ob_get_contents();
			 $this->logMessage($out1);
			 ob_end_clean();
			 */

			$letters = $this->getRequestParameter('letters');
			$query = "SELECT *, concat(user_firstname,' ', user_lastname) as fullname from fitness_users 
			where  group_id='{$this->group_id}' and user_firstname like '$letters%' or user_lastname like '$letters%' or email like '$letters%' ";
			$res = $this->mysql->mysqlquery($query);

			while( $row = mysql_fetch_array($res, MYSQL_ASSOC)){
				
				$temp .= $row["user_id"]."###".$row["fullname"]." ".$row["email"]."|";
			}
			
			return $this->renderText($temp);


	}
  
  
}
