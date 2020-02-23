<?php

/**
 * connectwithothers actions.
 *
 * @package    virtualgym
 * @subpackage connectwithothers
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class connectwithothersActions extends sfActions
{

	public function preExecute(){

		//
		$this->mysql = new mysqlclass();
		$this->exercisecommon = new exercisecommon();
		$this->common = new commonlib();
		$this->header = true;
		$this->company_group_id = $this->getUser()->getAttribute("company_group_id", 0);
	}


	public function executeIndex(){
		$this->header = true;
			/*NOT USED ANYMORE*/
		return $this->forward('connectwithothers', 'connectionlist');
		
		$userid = $this->getUser()->getAttribute("user_id");
		$this->type = $this->getRequestParameter("type");

		if($this->type == "show")
		$this->setTemplate('connectwithothers_show');

		if(!$_REQUEST['id']){
			$this->list = true;

			//GET LISTING
			$res = $this->mysql->mysqlquery("SELECT * FROM connectwithothers_list ");
			while($row = mysql_fetch_array($res)){
				$data = $this->common->getcitystate($row['zip']);
				$row = array_merge($row, $data);
				$row_array[] = $row;
			}
			$this->row = $row_array;


		}else{

			//do not show list !
			$this->list = false;

			$id = $_REQUEST['id'];
			$res = $this->mysql->mysqlquery("SELECT * FROM connectwithothers_events where connectlist_id='$id' ");
			while($row = mysql_fetch_array($res))
			$row_array[] = $row;
			$this->row = $row_array;


			$res = $this->mysql->mysqlquery("SELECT * FROM zipcodes where zip='{$row_array[0]['zip']}'");
			$row = mysql_fetch_array($res);
			$this->city = $row['city'];
			$this->state = $row['state'];

		}

		/*
		 $res = $this->mysql->mysqlquery("SELECT * FROM fitness_users where user_id='$userid'");

		 while($row = mysql_fetch_array($res))
		 $user_array[] = $row;

		 $this->user = $user_array;

		 */
			
			
	}

	public function executeProfile(){

		
		$this->headermenu = "show";
		$user_id = $this->getUser()->getAttribute('user_id');
		if($user_id == "")
		return $this->redirect('/default');

		if($_POST){
			//Capture Remove of group
			$group_id = $this->getRequestParameter('group_id', '');
			if($group_id != ''){
				$res = $this->mysql->mysqlquery("DELETE from connectwithothers_usergroup where user_id='$user_id' and group_id='$group_id'");
			}
		}


		if($_POST && $this->getRequestParameter('group_id', '') == ""){
			$params_array = array("username", "description", "messages");
			foreach($params_array as $value){
				${$value} = addslashes($this->getRequestParameter($value));
				$params[$value] = ${$value};
				$sql .= "$value='${$value}',";
		}
		$this->params = $params; //used to render variables back to template
			
		$sql = substr($sql, 0, -1); //remove comma
			
		$res = $this->mysql->mysqlquery("select * from connectwithothers_profiles where username='$username' and  user_id != '$user_id'");
		if(mysql_num_rows($res) == 0){
			$res = $this->mysql->mysqlquery("select * from connectwithothers_profiles where user_id='$user_id'");
			if(mysql_num_rows($res) == 0)
			$this->mysql->mysqlquery("insert into connectwithothers_profiles set $sql, user_id='$user_id'");
			else
			$this->mysql->mysqlquery("update connectwithothers_profiles set $sql where user_id='$user_id'");

			$this->msg = "Profile Saved ";
		}else{
			$this->msg = "Username already exists please choose a different one";
			return;
		}
			
			
	}


	$res = $this->mysql->mysqlquery("select * from connectwithothers_profiles where user_id='$user_id'");
	$this->params = mysql_fetch_array($res);

	$res = $this->mysql->mysqlquery("select * from connectwithothers_usergroup where user_id='$user_id'");
	while($row = mysql_fetch_array($res)){
		$group_id = $row['group_id'];
		$usergroup_res = $this->mysql->mysqlquery("select * from connectwithothers_group where id='$group_id' and company_group_id='{$this->company_group_id}'");
		$tmp_array = mysql_fetch_array($usergroup_res);
		$groupdata_array[] = $tmp_array;
	}
	$this->groupdata_array = $groupdata_array;


}

 public function executeMessage_reply(){
	
	
	$this->headermenu = "show";
	$user_id = $this->getUser()->getAttribute('user_id');
	if($user_id == "")
	 return $this->redirect('/default');
 	
	$this->message_id = $this->getRequestParameter('message_id');
	$res = $this->mysql->mysqlquery("SELECT * FROM connectwithothers_messages where message_id='{$this->message_id}'");
	$this->row = mysql_fetch_array($res);
	 
	 
	if($_POST){
		$message = addslashes($this->getRequestParameter('message'));	
		$thread_id = $this->getRequestParameter('thread_id');
		$res = $this->mysql->mysqlquery("insert into connectwithothers_messages set company_group_id='{$this->company_group_id}', group_id='{$this->row['group_id']}', message='$message', user_id='$user_id', thread_id='$thread_id', date_time=now()");
		return $this->redirect('connectwithothers/message_thread?thread_id='.$thread_id);
	}
	 
	
	
	
 }



 public function executeMessage_thread(){
	
	
	$this->headermenu = "show";
	$user_id = $this->getUser()->getAttribute('user_id');
	if($user_id == "")
	 return $this->redirect('/default');
 	
	 $thread_id = $this->getRequestParameter('thread_id');

	 //
	$res = $this->mysql->mysqlquery("SELECT * FROM connectwithothers_messages as a, connectwithothers_profiles as b where a.user_id=b.user_id  
									  and thread_id='$thread_id' order by a.date_time desc");
	while($row = mysql_fetch_array($res)){
		$tmp[] = $row;
	}
	$this->row = $tmp;
	
	
 }


 public function executeMessages(){

	
	$this->headermenu = "show";
	$user_id = $this->getUser()->getAttribute('user_id');
	if($user_id == "")
	return $this->redirect('/default');

	if($this->getRequestParameter('thread_id')!='')
		return $this->forward('connectwithothers', 'message_thread');

	if($this->getRequestParameter('message_id')!='')
		return $this->forward('connectwithothers', 'message_reply');	
	
	
	if($_POST){
		$params_array = array("message", "group_id");
		foreach($params_array as $value){
			${$value} = addslashes($this->getRequestParameter($value));
			$params[$value] = ${$value};
			$sql .= "$value='${$value}',";
	}
	
	$tmp_res = $this->mysql->mysqlquery("SELECT max(thread_id) + 1 as thread_id FROM connectwithothers_messages"); 
		$thread_count_row = mysql_fetch_array($tmp_res);
	
	$this->mysql->mysqlquery("insert into connectwithothers_messages set $sql user_id='$user_id', thread_id='{$thread_count_row['thread_id']}', date_time=now()");
	$this->msg = "Message Sent";
	}


	//GET GROUPS BELONG TO AND MESSAGES IN GROUPS
	$res = $this->mysql->mysqlquery("select a.id, groupname, group_id from connectwithothers_group as a, connectwithothers_usergroup as b 
									  where a.id = b.group_id and b.user_id='$user_id'  and a.company_group_id='{$this->company_group_id}'");
	while($row = mysql_fetch_array($res)){
		$tmp[] = $row;
	
		/*$res_groupmsg = $this->mysql->mysqlquery("select m.*, p.* from connectwithothers_messages as m, connectwithothers_profiles as p
		where m.group_id='{$row['id']}' and p.user_id = m.user_id
		order by date_time limit 10");
		while($row_msg = mysql_fetch_array($res_groupmsg)){
			$msg_array[] = $row_msg;
		}*/
		$group_id = $row['group_id'];
	   $res_groupmsg = $this->mysql->mysqlquery("SELECT m.*, p.*, g.groupname FROM connectwithothers_messages as m, 
	   connectwithothers_profiles as p, connectwithothers_group as g  
		where p.user_id = m.user_id and g.id = m.group_id and m.group_id='$group_id'  and g.company_group_id='{$this->company_group_id}'
		group by thread_id order by m.date_time desc");
			while($row_msg = mysql_fetch_array($res_groupmsg)){
			$msg_array[] = $row_msg;
			}
		
		
	}
	
	
	
	
	$res = $this->mysql->mysqlquery("select * from connectwithothers_usergroup where user_id='{$user_id}'");
	if(mysql_num_rows($res) == 0)
		$this->allowedmessages = " disabled";
	
	$this->row = $tmp;
	$this->msg_data = $msg_array;
	$this->msg_count = count($msg_array);
	
	



	}

	public function executeConnectiondetails(){


		
		$this->headermenu = "show";
		$id = $this->getRequestParameter("id");

		if($_POST){
			$user_id = $this->getUser()->getAttribute('user_id');
			if($user_id == "")
			return $this->redirect('/default');

			$res = $this->mysql->mysqlquery("select * from connectwithothers_usergroup where user_id='$user_id' and group_id='$id'");
			if(mysql_num_rows($res) == 0)
			$res = $this->mysql->mysqlquery("INSERT INTO connectwithothers_usergroup set group_id='$id', user_id='$user_id'");
			//else
			//$res = $this->mysql->mysqlquery("update connectwithothers_usergroup set group_id='$id' where user_id='$user_id' ");

			$this->msg = "You've successfully joined this group to remove go to your profile section";
		}

		$res = $this->mysql->mysqlquery("SELECT * FROM connectwithothers_group where id='$id' and company_group_id='{$this->company_group_id}' ");
		while($row = mysql_fetch_array($res)){
			$tmp[] = $row;
		}
		$this->row = $tmp;


	}

	public function executeConnectionlist(){

		
		$this->headermenu = "show";
	  
		if($_POST){
			$params_array = array("location", "description", "city", "statecode", "meeting_datetime", "groupname");
			foreach($params_array as $value){
				${$value} = addslashes($this->getRequestParameter($value));
				$params[$value] = ${$value};
				$sql .= "$value='${$value}',";
				}
		$this->params = $params; //used to render variables back to template

		
		//$sql = substr($sql, 0, -1); //remove comma
		$sql .= "company_group_id='{$this->company_group_id}'";	
		
		$res = $this->mysql->mysqlquery("select * from connectwithothers_group where groupname='$groupname' and company_group_id='{$this->company_group_id}'");
		
		if(mysql_num_rows($res) == 0){
			$res = $this->mysql->mysqlquery("insert into connectwithothers_group set $sql");
			//now add this user to the group
			$group_id = mysql_insert_id($this->mysql->link);
			$user_id = $this->getUser()->getAttribute('user_id');
			$res = $this->mysql->mysqlquery("insert into connectwithothers_usergroup set user_id='$user_id', group_id='$group_id'");
			
			$this->msg = "Group created";
			return $this->redirect('connectwithothers/connectionlist');
		}else{
			$this->msg = "Group name already exists";
		}
			
	}



	$res = $this->mysql->mysqlquery("SELECT *, (select count(group_id) from connectwithothers_usergroup where group_id=a.id  and company_group_id='{$this->company_group_id}') as totalmembers
			FROM connectwithothers_group as a where company_group_id='{$this->company_group_id}' order by groupname"); //order by date_time");
	while($row = mysql_fetch_array($res)){
		$tmp[] = $row;
	}
	$this->row = $tmp;

	
	//GET STATECODE FOR ZIPS !
	$res = $this->mysql->mysqlquery("select statecode from connectwithothers_group where company_group_id='{$this->company_group_id}' limit 1");
		$row = mysql_fetch_array($res);
		$statecode = $row['statecode']; //used to get zips only from the statecode !
   
	$res = $this->mysql->mysqlquery("select distinct(state), statecode FROM zipcodes order by state");
		$tmp2[] = array("");
	   while($row = mysql_fetch_array($res)){
		$tmp2[] = $row;
		}
		$this->states = $tmp2;
	
	
		


	}
	public function executeGetcity(){
		
		$statecode = $this->getRequestParameter('_value');
		$res = $this->mysql->mysqlquery("SELECT distinct(city) FROM zipcodes where statecode='$statecode' order by city");
		while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
			$city = $row['city'];
			$tmp2[] = array($city => $city);
		}
		
		
        $tmp = json_encode( $tmp2 );
		return $this->renderText($tmp); 

	
	}

}
