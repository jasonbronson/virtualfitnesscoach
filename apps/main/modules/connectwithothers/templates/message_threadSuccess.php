<?php include_partial('header', array('myarray' => $headermenu)) ?>
<tr>
<td valign=top>
<font color=red><?php echo $msg ?></font>

<table border='0'>
<tr><td>Message</td>  <td>&nbsp;</td></tr>
<?php

if(count($row) == 0)
	die("NO MESSAGES IN THREAD");

foreach($row as $msg_value){
	$datetime = date("M d Y h:i A", strtotime($msg_value['date_time']));
	$url = url_for('connectwithothers/message_reply')."?message_id=".$msg_value['message_id'];
		echo "<tr><td>{$msg_value['message']} <br> Sent on {$datetime} by {$msg_value['username']}  <a href='$url'>Reply </a></td>  </tr><tr><td colspan=2><hr></td></tr>";
	
}

	
?>
</table>
