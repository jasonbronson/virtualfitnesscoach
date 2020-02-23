<div align=center>
<br><br>
<br><br>
<br><br>

<?php echo form_tag('admin/exerciseentry', 'multipart=true') ?>
Exercise Name: <input type=text name=exercisename> <br>
Location (Gym or Home) <select name=location>
                   <option name="gym" selected>Gym</option>
                   <option name="home">Home</option>
                   </select> <br>
Exercise Graphic File: <input type=file name=exercisefile> <br>
Popup Video1: <input type=file name=popup1video> <br>
Popup Video2: <input type=file name=popup2video> <br>
Popup Video3: <input type=file name=popup3video> <br>
Popup Description: <textarea name="popupdescription" rows="4" cols="80"></textarea>
                   <br>
Exercise Category: <select name=category>
<?php

 echo $exercisecategory;
?>
</select> <br><br>
<input type=submit name=submit value="Save Exercise">

</form>

<div align=left>
<?php

 echo "<table border=0 width=100%><th>".$msg."</th>".$exerciselist."</table>";

 // echo "Category: $name Exercise: $value Location: $location  <a href='?remove={$row['id']}'>Remove $value</a><br>";

?>