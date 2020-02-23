<div align=center>
<br><br>
<br><br>
<br><br>

<?php echo form_tag('admin/events', 'multipart=true') ?>
Event Name: <input type=text name=event_name> <br>
Event Zip: <input type=text name=event_zip size=6> <br>
Event Date: (format 2009-09-23 HH:MM:SS) <input type=text name=event_date size=6> <br>
Event Type <select name=event_type>
                   <option value="1" selected>Webinars</option>
                   <option value="2">Chat Room</option>
                   <option value="3">Events Within 25 Miles</option>
                   </select> <br>
Event Description: <textarea name="event_description" rows="4" cols="80"></textarea>
                   <br>
<input type=submit name=submit value="Save Event">
</form>

<div align=left>
<?php

 echo "<table border=0 width=100%><tr><td>Event Date</td> <td>Event</td> <td>Event Type</td> <td>Event Other</td> <td>Event Other2</td> <td>Zip</td> <td>Remove</td></tr>";
 
 $url = url_for('admin/events');
 for($a =0; $a < count($row); $a++){
 	
 	echo "<tr><td>".date("M d Y h:i A", strtotime($row[$a]['eventdate']))."</td> <td> {$row[$a]['event']} </td> <td> {$row[$a]['event_type']} </td> <td> {$row[$a]['event_other']} </td> <td> {$row[$a]['event_other2']}</td> <td>{$row[$a]['zip']}</td> <td><a href='$url?remove={$row[$a]['id']}'>REMOVE</a></td></tr>";
 }
 echo "</table>";

 // echo "Category: $name Exercise: $value Location: $location  <a href='?remove={$row['id']}'>Remove $value</a><br>";

?>