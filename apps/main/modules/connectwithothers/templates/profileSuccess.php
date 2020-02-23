<?php include_partial('header', array('myarray' => $headermenu)) ?>
<tr>
<td valign=top>
<?php  echo $msg ?>
<form method=post>
<table border="0">
<tr>
<td>Forum Username</td>
<td><input type=text name='username' value='<?php echo $params['username'] ?>'></td>
</tr>

<tr>
<td>Profile Description</td>
<td>
<textarea name=description rows=5 cols=40><?php echo $params['description'] ?></textarea>
</td>
</tr>

<tr>
<td>Contact me as new messages get posted </td>
<td align=center>
  &nbsp;&nbsp;&nbsp;  
<br>
<input type=checkbox name='messages' <?php if($params['messages']=="on") echo "checked" ?>>
</td>
</tr>

<tr>
<td>&nbsp;</td>
<td align=center>
  <br>
  <input type=submit value='Save'>
</td>
</tr>
</table>
</form>

<br>
Groups you belong to: <br>
<table border='0' width='500px'>
<?php
foreach($groupdata_array as $value)
	echo "<tr><td width='75%'>".$value['groupname']."</td> <td><form method='POST'><input type='hidden' name='group_id' value='{$value['id']}'><input type='submit' name='submit' value='Remove from group'></form></td></tr>";
?>

</table>


</td>
</tr>
</table>