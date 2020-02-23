<?php include_partial('header', array('myarray' => $headermenu)) ?>
<tr>
<td valign=top>
<font color=red><?php echo $msg ?></font>
<form method=post>
<h1>Create New Message to a Group</h1>
<table border=0>
<tr>
<td>Groups</td>
<td><select name='group_id'>
<?php 

//print_r($row);
	foreach($row as $value)
	echo "<option value='{$value['id']}'>{$value['groupname']}</option>";
?>
</select></td>
</tr>

<tr>
<td>Message Details</td>
<td><textarea cols=50 rows=5 name=message></textarea></td>
</tr>

<tr>
<td>&nbsp;</td>
<td><input type=submit value='Send' <?php echo $allowedmessages ?>></td>
</tr>

</table>
</form>


<br>
Group Threads
<br>
<table border='0'>
<tr><td>Message</td>  <td>User</td> <td>&nbsp;</td></tr>
<?php

if($msg_count == 0)
	echo "The group has no messages please join a group first before trying to send messages !";
else
foreach($msg_data as $msg_value){
	
	if($msg_value['group_id'] != $group_id){
	  	$group_name = $msg_value['groupname'];
		$hr = "$group_name<hr width=200px>";
		$group_id = $msg_value['group_id'];
	}else{
	    $group_id = $msg_value['group_id'];
	    $group_name = "**";
	}
	
	$datetime = date("M d Y h:i A", strtotime($msg_value['date_time']));
	if($header_date != date("M d Y", strtotime($msg_value['date_time']))){
		$header_date = date("M d Y", strtotime($msg_value['date_time']));
		$header = "<tr><td colspan=5><table border=0 bgcolor='#EEEEEE' width='600px'><tr><td colspan=9>$header_date</td></table> </td></tr>";
		
	}else{
		$header = "";
	}
	
	   $url = url_for('connectwithothers/messages');
		echo "$header <tr><td>{$msg_value['message']}</td>  <td><b>{$msg_value['username']}</b></td> <td><a href='$url?thread_id={$msg_value['thread_id']}'>View Thread</a></td></tr> <tr><td>$groupname $hr</td></tr>";
	
}

	
?>
</table>


</td>
</tr>
</table> 