<?php

/**
 * default actions.
 *
 * @package    virtualgym
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class defaultActions extends sfActions
{

	public function preExecute(){
		$this->mysql = new mysqlclass();
		$this->common = new commonlib();
	}

	/**
	 * Executes index action
	 *
	 */
	public function executeIndex()
	{

		 
		$userid = $this->getUser()->getAttribute('user_id');
		if($userid != "" ){
			 
			//DO NOT RECORD / REPORT HERE This is from the ADMIN app as become user !
			$commonlib = new commonlib();
			$check = $commonlib->checklogin($username, $password, $userid);

			if($check['passed'] == true){
				//check that thier level is above a zero
				if($check['level'] < 0)
				   return $this->renderText("Your Account is disabled");

				if($check['totalusers'] == 1){
					$this->getUser()->setAttribute('email', $username);
					$this->getUser()->setAttribute('user_name', $check['user_firstname']." ".$check['user_lastname']);
					$this->getUser()->setAttribute('user_id', $check['user_id']);
					$this->getUser()->setAttribute('level', $check['level']);
					$this->getUser()->setAttribute('company_group_id', $check['company_group_id']);
					$this->forward("index","index");
				}else{
					//must be group login
					$this->getUser()->setAttribute('email', $username);
					return $this->forward('default', 'grouplogin');
				}
			}
		}

				//THIS IS A NORMAL LOGIN BELOW
				$username = strtolower($this->getRequestParameter('username'));
				$password = strtolower($this->getRequestParameter('password'));

				if($_POST){
					if ( isset( $username ) && isset( $password ) ) {

						$commonlib = new commonlib();
						$check = $commonlib->checklogin($username, $password);

						if($check['passed'] == true){

							//check that thier level is above a zero
							if($check['level'] < 0)
							return $this->renderText("Your Account is disabled");


							if($check['totalusers'] == 1){

								$this->getUser()->setAttribute('email', $username);
								$this->getUser()->setAttribute('user_name', $check['user_firstname']." ".$check['user_lastname']);
								$this->getUser()->setAttribute('user_id', $check['user_id']);
								$this->getUser()->setAttribute('level', $check['level']);
								$this->getUser()->setAttribute('company_group_id', $check['company_group_id']);

								$this->recordlogin();

								//reporting
								$this->common->reporting("login", $check['user_id']);

							}else{
								//must be group login
								$this->getUser()->setAttribute('email', $username);
								return $this->forward('default', 'grouplogin');
							}


							//LOGIN SUCCESSFUL
							$this->forward("index", "index");
							return;
						}else{
							$this->logMessage("Warning User Login {$_REQUEST['username']} {$_REQUEST['password']} failed ","ERR");
							$this->err = "<br><br>LOGIN FAILED ! <br></b>";
						}

					}

				}



			}

			public function executeGrouplogin(){
				 
				 
				 
				 
				if($_POST['grouplogin']){
					//$familymembers_array = explode(",", substr($this->getRequestParameter('familymembers'), 0, -1));
					//foreach($familymembers_array as $value){
					//if($this->getRequestParameter($value) == 'on')
						//	$user_id = $value; //user who is logging in
						//}

						$user_id = $this->getRequestParameter('user_id');
						$host = $_SERVER['HTTP_HOST'];
						if($user_id == "")
						return $this->redirect("http://$host/main.php/default/grouplogin");

						$this->getUser()->setAttribute('user_id', $user_id);
						$query = "SELECT * FROM `fitness_users` where user_id='$user_id'";
						$res = $this->mysql->mysqlquery($query);
						$row = mysql_fetch_assoc( $res );

						$this->getUser()->setAttribute('email', $row['email']);
						$this->getUser()->setAttribute('user_name', $row['user_firstname']." ".$row['user_lastname']);
						$this->getUser()->setAttribute('user_id', $row['user_id']);
						$this->getUser()->setAttribute('level', $row['level']);
						$this->getUser()->setAttribute('company_group_id', $row['company_group_id']);

						//reporting
						$this->common->reporting("login", $row['user_id']);

						$this->recordlogin();
						return $this->forward('index', 'index');


				}
				 
				 
				//GET LIST OF MEMBERS
				$email = $this->getUser()->getAttribute('email');
				$query = "SELECT * FROM `fitness_users` where email='{$email}'";

				$res = $this->mysql->mysqlquery($query);
				while($row = mysql_fetch_assoc( $res )){
					$tmp[] = $row;
				}
				$this->row = $tmp;
				 
				//CALENDAR EMAIL FILENAME !
				$this->file_email = str_replace("@", "_", $email);

			}

			public function executeCalendar(){
				$this->email = $this->getRequestParameter('email');
				 
			}

			public function executeForgotpassword()
			{

				if($_POST){

					$mysql = new mysqlclass();

					$email = $this->getRequestParameter('email');
					$this->email = addslashes($email);

					$this->newp = $this->getRequestParameter('newpassword');
					$this->confp = $this->getRequestParameter('confirmpassword');

					if($this->newp != $this->confp){
						$this->err = "New Password and Confirm Password DO NOT MATCH";
						return;
					}

					$query = "select * from fitness_users where email = '{$this->email}'";

					$res = $mysql->mysqlquery($query);
					if(mysql_num_rows($res) == 0){
						$this->err = "No such Email Address exists";
						return;
					}
					$row = mysql_fetch_array($res);

					$passhashed = md5(strtolower($this->newp));
					$res = $mysql->mysqlquery("update fitness_users set user_password='{$passhashed}' where email='{$this->email}'");

					$headers = 'From: webmaster@virtualfitnesscoach.com' . "\r\n" .
    		     'Reply-To: webmaster@virtualfitnesscoach.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

					mail($row['email'],"Virtual Fitness Coach Password Reset ","Your Password for Virtual Fitness Coach was reset to $this->newp ", $headers);

					$this->err = "Password was sent to your Email Address and has been reset ! ";
					$this->linktologin = true;

				}



			}
			private function recordlogin(){

					
				//SINCE THEY LOGGED IN RECORD IT !

				$user_id = $this->getUser()->getAttribute('user_id');
				if($user_id == ""){
					$this->logMessage("ERROR: record login has no user_id in session variables");
					return;
				}
				 

				$res = $this->mysql->mysqlquery("select * from fitness_users where user_id='{$user_id}'");
				$lastlogin_results = mysql_fetch_array($res);
				$totallogins = $lastlogin_results['totallogins'] + 1;

				#Last Login HOUR by user
				$lastlogin_hour = date("H", strtotime($lastlogin_results['lastlogin']));
				#currenthour
				if(trim($lastlogin_results['timezone']) != "")
				$timezone = ($lastlogin_results['timezone']);
				else
				$timezone = "America/New_York";


				date_default_timezone_set("$timezone");
				$currenthour = date("H");
				$this->logMessage("******* Time zone set to $timezone .. Hour is $currenthour  Time echo is ".date("H:i"));

				$dateformatted = date("Y-m-d H:i:s");
				//RECORD THIER CURRENT LOGIN !
				$query = "update fitness_users set lastlogin='{$dateformatted}', totallogins='{$totallogins}' where user_id='{$user_id}'";
				$res = $this->mysql->mysqlquery($query);



				//$this->logMessage("*************HOURS STAMP   lastHour: $lastlogin_hour CurrentHour: $currenthour");

				if($currenthour >= "00" and $currenthour < "12"){ //falls between 6am and 11:59am
					if($lastlogin_hour > "12")//if lastlogin was not in the morning
					$query = "update fitness_users set totallogins='1' where user_id='{$user_id}'";
				}

				if($currenthour >= "12" and $currenthour < "16"){//falls between noon and 4:59pm
					if($lastlogin_hour < "12" or $lastlogin_hour > "16") //if last login was not in the afternoon
					$query = "update fitness_users set totallogins='1' where user_id='{$user_id}'";

				}

				if($currenthour >= "16" and $currenthour <= "23"){ //falls between 5pm and midnight
					if($lastlogin_hour < "16") //if last login was not at night !
					$query = "update fitness_users set totallogins='1' where user_id='{$user_id}'";
				}

				$res = $this->mysql->mysqlquery($query);


			}

		}