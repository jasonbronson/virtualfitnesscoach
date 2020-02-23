<?php include_partial('header', array('myarray' => $headermenu)) ?>

<tr>
<td valign=top height=10%>
<font size=+1 color=red><?php echo $msg ?></font>
</td>
 <tr>
 <td valign=top>

<table border="0" width="800px">
<tr>
<td width=15%>Group Name</td>
<td><?php echo $row[0]['groupname']; ?></td>
</tr>
<tr> 
<td>Location</td>
<td><?php echo $row[0]['location']; ?></td> 
</tr>
<tr>
<td>City</td>
<td><?php echo $row[0]['city']; ?></td>
</tr>
<tr> 
<td>State</td>   
<td><?php echo $row[0]['statecode']; ?></td>
</tr>
<tr>
<td>Description</td>
<td><?php echo $row[0]['description']; ?></td>
</tr>

<tr>
<td>Join</td>
<td><form method=post><input type=hidden name=id value='<?php echo $row[0]['id'] ?>'><input type=submit name=join value='Join Group'></form></td>
</tr>

</table>

<br><br>

<?php if($_REQUEST['id'] != '' || $type == 'new') echo "<a href='".url_for('connectwithothers/connectionlist')."'>Return to Group List</a>";?>


</td>
</tr>
</table>