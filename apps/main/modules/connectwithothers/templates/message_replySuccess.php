<?php include_partial('header', array('myarray' => $headermenu)) ?>
<tr>
<td valign=top>
<font color=red><?php echo $msg ?></font>

<form method=post action='<?php echo ''.url_for('connectwithothers/message_reply'); ?>'> 
<table border=0>
<tr>
<td>Reply to Thread</td>
</tr>

<tr>
<td>Message Details</td>
<td><textarea cols=50 rows=5 name=message></textarea></td>
</tr>

<tr>
<td>&nbsp;</td>
<td>
<input type=hidden name=thread_id value='<?php echo $row['thread_id'] ?>'>
<input type=hidden name=message_id value='<?php echo $row['message_id'] ?>'>
<input type=submit value='Send'></td>
</tr>

</table>
</form>
