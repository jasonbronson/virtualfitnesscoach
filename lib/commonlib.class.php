<?php

class commonlib {

  public function filterdata($tmp){

    $tmp = mysql_escape_string( $tmp );
    $tmp = htmlentities($tmp);

    return $tmp;

  }
  
  public function getexerciselist($selectone){

			$mysql = new mysqlclass();

			if($selectone != "")
			$sql = "AND exercise_category.categoryname like '$selectone%' ";

			$query = "SELECT exercise_category.id as catid, exercise_category.categoryname, exercise_list.id, exercise_list.exercisename, exercise_list.location
			FROM exercise_list, exercise_category where exercise_category.id = exercise_list.category_id $sql order by categoryname, exercisename";
			$res = $mysql->mysqlquery($query);

			while( $row = mysql_fetch_array($res, MYSQL_ASSOC)){

				$tmp[] = $row;
			}
			return $tmp;

		}
  
  public function getresistenceinfo($user_id, $date){
			$mysql = new mysqlclass();

			$query = "SELECT * FROM fitness_exercise_resistence where user_id='$user_id' and workoutdate='$date'";
			$res = $mysql->mysqlquery($query);

			while( $row = mysql_fetch_array($res, MYSQL_ASSOC)){

				$tmp[] = $row;
			}
			return $tmp;

		}

  
  
  public function write_to_exerciseday_resistence($data){

			$mysql = new mysqlclass();

			$res = $mysql->mysqlquery("select count(*) as totalrows from fitness_exercise_day where user_id='{$data['user_id']}' and workoutdate='{$data['workoutdate']}'");
			$tmp = mysql_fetch_assoc($res);



			if($tmp['totalrows'] > 0){
				$query = "delete from fitness_exercise_day where  user_id='{$data['user_id']}' and workoutdate='{$data['workoutdate']}' and workouttype='1'";
				$res = $mysql->mysqlquery($query);
			}

			$query = "insert into fitness_exercise_day set user_id='{$data['user_id']}', workoutdate='{$data['workoutdate']}', workouttype='1',
			m_swf='{$data['1_swf']}', m1_swf='{$data['2_swf']}', a_swf='{$data['3_swf']}', a1_swf='{$data['4_swf']}', n_swf='{$data['5_swf']}', n1_swf='{$data['6_swf']}'";

			//else{

			//$query = "update fitness_exercise_day set m_swf='{$data['1_swf']}', m1_swf='{$data['2_swf']}', a_swf='{$data['3_swf']}', a1_swf='{$data['4_swf']}', n_swf='{$data['5_swf']}', n1_swf='{$data['6_swf']}', workoutdate='{$data['workoutdate']}', workouttype='1' where user_id='{$data['user_id']}'";

			//}

			$res = $mysql->mysqlquery($query);
			if($res == "ERROR")
			return "ERROR";

		}

  
  
  public function write_to_exerciseday_nutrition($data){

			$mysql = new mysqlclass();


			$res = $mysql->mysqlquery("select count(*) as totalrows from fitness_exercise_nutrition where  user_id='{$data[0]['user_id']}' and validdate='{$data[0]['validdate']}'");
			$tmp = mysql_fetch_assoc($res);
			$this->logMessage("write_to_exerciseday_nutrition total rows was {$tmp['totalrows']}","debug");
			//echo "<pre>";
			//print_r($data);
			if($tmp['totalrows'] > 0){
				$query = "delete from fitness_exercise_nutrition where user_id='{$data[0]['user_id']}' and validdate='{$data[0]['validdate']}'";
				//echo $query."<br>";
				$res = $mysql->mysqlquery($query);
			}

			for($a=0; $a< count($data); $a++){
				$query = "insert into fitness_exercise_nutrition set user_id='{$data[$a]['user_id']}', validdate='{$data[$a]['validdate']}',
				totalcalories='{$data[$a]['totalcal']}', suggestedcalories='{$data[$a]['sugcal']}', image1='{$data[$a]['image']}',
				foodsuggestions='{$data[$a]['foodsug']}', sort='$a'";
				//echo $query."<br>";
				$res = $mysql->mysqlquery($query);
			}

			if($res == "ERROR")
			return "ERROR";

		}

		public function write_to_resistence($data){

			/*ob_start();
			print_r($data);
			$out2 = ob_get_contents();
			$this->logMessage($out2);
			ob_end_clean();
			return;*/
			
			$mysql = new mysqlclass();
			
			for($a=0; $a< count($data); $a++){
				
				if($data[$a]['id'] != ""){
					$res = $mysql->mysqlquery("select count(*) as totalrows from fitness_exercise_resistence where id='{$data[$a]['id']}'");
					$tmp = mysql_fetch_assoc($res);
				}else{
				  $tmp['totalrows'] = 0; //DONT RUN SQL QUERY WHEN WE DONT NEED TO :)
				}
					
				  if($tmp['totalrows'] > 0){
					$query = "update fitness_exercise_resistence set user_id='{$data[$a]['user_id']}', exercise='{$data[$a]['exercise']}', type='1', circuit='{$data[$a]['circuit']}', sets='{$data[$a]['sets']}', reps='{$data[$a]['reps']}', weights='{$data[$a]['weights']}', workoutdate='{$data[$a]['workoutdate']}', exgraphic='{$data[$a]['exercisename']}', sortnumber='{$data[$a]['sortnumber']}' where id='{$data[$a]['id']}'";
					$res = $mysql->mysqlquery($query);
				  }else{
					$query = "insert into fitness_exercise_resistence set user_id='{$data[$a]['user_id']}', exercise='{$data[$a]['exercise']}', type='1', circuit='{$data[$a]['circuit']}', sets='{$data[$a]['sets']}', reps='{$data[$a]['reps']}', weights='{$data[$a]['weights']}', workoutdate='{$data[$a]['workoutdate']}', exgraphic='{$data[$a]['exercisename']}', sortnumber='{$data[$a]['sortnumber']}'";
					$res = $mysql->mysqlquery($query);
				  }
			}

		}

		public function remove_from_resistence($data){

			$mysql = new mysqlclass();

			$query = "delete from fitness_exercise_resistence where workoutdate='{$data['workoutdate']}' and user_id='{$data['user_id']}' and exercise='{$data['exercise']}' and type='1' and circuit='{$data['circuit']}' and sets='{$data['sets']}' and reps='{$data['reps']}' and weights='{$data['weights']}'  ";

			$res = $mysql->mysqlquery($query);
			if(strpos($res, "ERROR") > 0)
			die("ERROR $res");


		}
  
  
  public function getfilelists(){

			$exclude_array = array(".jpg", ".jpeg", ".gif",".bmp",".png");
			$files['exgraphic_files'] = scandir('uploads/graphic/');
			//$this->exgraphic_files = $this->filterarray($exclude_array, $exgraphic_files);
			//$this->cardio_files = scandir('uploads/graphic/');
			$files['cardio_files'] = scandir('uploads/graphic/');
			//$this->filterarray($exclude_array, $exgraphic_files);
			$files['nutrition_files'] = scandir('uploads/nutrition_swf/');
			$files['popupvideo_files'] = scandir('uploads/graphic/popup/');
			$files['swif_files'] = scandir('uploads/swf/');

			/* ob_start();
			 print_r($this->nutrition_files);
			 $out1 = ob_get_contents();
			 ob_end_clean();
			 */
			return $files;
			//$this->logMessage("getfilelists method called $out1 ","debug");


  }
  
  
  public function getusers($user_id){

			
		$mysql = new mysqlclass();
			
			if($user_id != '') //if only retrieve one person info
				$sql = " where user_id = '{$user_id}'";

			$query = "SELECT * FROM fitness_users $sql";
			$res = $mysql->mysqlquery($query);
			while($users_results = mysql_fetch_array($res, MYSQL_ASSOC))
			$tmp[] = $users_results;

			return $tmp;
			
			
  }
  
  
  public function getcitystate($zip){
	$mysql = new mysqlclass();	       
  	$res = $mysql->mysqlquery("SELECT * FROM zipcodes where zip='{$zip}'");
				$row = mysql_fetch_array($res);
				$data['city'] = $row['city'];
				$data['state'] = $row['state'];
		
		return $data;
	}

  public function reporting($data, $user_id){
  	
  	if(sfContext::getInstance()->getUser()->getAttribute('halt_reporting', 'false') == "true"){
  		$this->logMessage("halt reporting attribute set NOT REPORTING DATA");
  		return;
  	}
  	
  	 $mysql = new mysqlclass();
  	 
  	       /* $query = "SELECT datediff(now(), occured) as lastreport FROM `reporting` where data='{$data}' and user_id='{$user_id}' ";
     		$res = $mysql->mysqlquery($query);
     		if(mysql_num_rows($res) > 0){
     			$row = mysql_fetch_array($res);
     			if($row['lastreport'] == 0)
	     				return;
     		}*/
  	   
  	     $date = date("Y-m-d");
  	     $query = "SELECT *, UNIX_TIMESTAMP(occured) as lastupdate, UNIX_TIMESTAMP(now()) as now FROM reporting where data='{$data}' and user_id='{$user_id}' and occured like '$date%'";
  	     $res = $mysql->mysqlquery($query);
		 $row = mysql_fetch_array($res);
  	       //print_r($row);
  	       //echo $row['lastupdate'];
  	     if($data == "timeloggedin"){
  	     	  $interval = 30;
  	     	  $total_seconds = $row['now'] - $row['lastupdate']; 
  	     		if($total_seconds < 121)
  	     			$totaltime = $total_seconds + $row['totaltime'];
  	     	 			else
  	     		    $totaltime = $interval + $row['totaltime'];
  	     }else{
  	     
  	     	  if($row['totaltime'] == "")
  	     	   $totaltime = 10;
  	     	  else
		 	   $totaltime = 10 + $row['totaltime'];
  	     }
  	     		    
  	     		    
  	     if(mysql_num_rows($res) == 0){
  	           $query = "INSERT INTO `reporting` set data='{$data}', user_id='{$user_id}', occured=now(), totaltime='10'";
            	$res = $mysql->mysqlquery($query);
  	       }else{
				
  	       	  $query = "UPDATE `reporting` set occured=now(), totaltime='$totaltime' where id='{$row['id']}' and data='$data'";
            	$res = $mysql->mysqlquery($query);
  	       	
  	       }
  	 
  	
  }
  

  public function checklogin($username, $password, $user_id = ''){

            $mysql = new mysqlclass();

            $username = mysql_escape_string($username);
            $username = htmlentities($username);
			
            if($user_id != '')
             $query = "SELECT * FROM `fitness_users` where user_id='{$user_id}'";
            	else
             $query = "SELECT * FROM `fitness_users` where email='{$username}'";
            
            $res = $mysql->mysqlquery($query);

            $row = mysql_fetch_assoc( $res );
            $totalusers = mysql_num_rows($res);

            //$this->logMessage("LOG PASSWORDS: $username | $password ");
			
            //If user came from admin then pass or check password if normal login
            if ( $row['user_password'] ==  md5( strtolower($password ) ) || $user_id != ''){
                $info['passed'] = true;
            }else{
                $info['passed'] = false;
            }

            //$tmp = md5( strtolower($password) );
            //$this->logMessage("USERS PASS ENCRYPTED {$row['user_password']} {$tmp} ");

            $info['level'] = $row['level'];
            $info['user_id'] = $row['user_id'];
            $info['user_firstname'] = $row['user_firstname'];
            $info['user_lastname'] = $row['user_lastname'];
			$info['totalusers'] = $totalusers;
			
            $this->logMessage("PASSED.... TRUE/FALSE 1 == TRUE BOOLEAN {$info['passed']}");
            return $info;
  }
  
  



private function logMessage($message, $mode = "debug"){

    sfContext::getInstance()->getLogger()->debug($message, $debug);
  }


}

