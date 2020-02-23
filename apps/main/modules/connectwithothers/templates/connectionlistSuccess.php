<?php include_partial('header', array('myarray' => $headermenu)) ?>

<tr>
<td valign=top height=10%>

	<img src="/nutrition/Connect/smile.jpg" align=right>
<br>
Search for your location below to search for people to exercise with, find exercise interest groups and more.
<?php if($_REQUEST['id'] != '' || $type == 'new') echo "<a href='?none=true'>Return to Group List</a>";?>

<br>
<?php if($_REQUEST['type'] != "new"): ?>
Don't see your location create a workout group. <input type=button value='Create *NEW* Group' onclick="window.location='<?php echo url_for('connectwithothers/connectionlist'); ?>?type=new'"></a>
<br> 
<?php endif; ?>

<?php

//ADD NEW GROUP HERE !
if($_REQUEST['type']  == "new"){

include_partial('connectwithothers_add', array("msg"=>$msg, "city"=>$city, "params"=>$params, "states"=>$states));

return;	
}


//SHOW LISTINGS !

//print_r($row);
//die();
/*if($list == true){
   foreach($row as $key=>$value){
		echo "<a href=\"?id={$row[0]['id']}\">{$row[0]['title']} - {$row[0]['city']}, {$row[0]['state']}</a><br>";
	}
	
}else{
	foreach($row as $key=>$value){
	  echo "<a href=\"?id={$row[0]['id']}&type=show\">{$row[0]['title']} - {$row[0]['city']}, {$row[0]['state']} Additional Details</a> <br>";
	}
}
	*/

?>
</tr>
 <tr>
 <td valign=top>
 <?php 
 /*$count = count($row[0]);
  if($count > 0){
  	print_r($row);
  }*/
  //echo $row[0]
 ?>
 
 <!--  form method=post>
 <table border=0>
 <tr> <td colspan=4>Search Groups By Zip Code</td>  </tr>
 <tr> <td>Zip Code</td> <td><input type=text name=zip></td> </tr>
 <tr><td></td> <td><input type=submit value='Search'</td></tr>
 </table>
 </form-->
 
 <table border=0 cellpadding=9 cellspacing=0>
 <tr><td>Group Name</td> <td>Location</td> <td>City</td> <td>Description</td> <td>&nbsp;</td> <td>Total Members in Group</td></tr>
 <?php 
 	for($a=0; $a < count($row); $a++){
 		$details = "".url_for('connectwithothers/connectiondetails')."?id=".$row[$a]['id'];
 		$totalmembers = $row[$a]['totalmembers'];
 	  echo "<tr align=left> <td>".$row[$a]['groupname']."</td> <td>".$row[$a]['location']."</td> <td>".$row[$a]['city']."</td> <td>".substr($row[$a]['description'],0,20)."...</td>  <td><a href='$details'>Details</a></td> <td>$totalmembers</td> </tr>";
 	} 
 ?>
 </table>
 
 </td>
 </tr>
 <tr> <td></td> </tr>
 </table>
 
 
  <!-- td>
Left Click to Zoom and then click the icon to see groups in that state
<br>
  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="500" height="297" align="top">
<param name="movie" value="us/us.swf?data_file=us/senate.xml" />
<param name="quality" value="high" />
<param name="bgcolor" value="#FFFFFF" />
<embed src="/us/us.swf?data_file=/us/senate.xml" quality="high" bgcolor="#FFFFFF"  width="500" height="297" name="Clickable World Map" align="top" 
type="application/x-shockwave-flash" 
pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
</object>
</td-->
  