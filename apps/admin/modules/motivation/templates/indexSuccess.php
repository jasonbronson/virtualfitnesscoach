<div align=center>
<br><br>
<br><br>
<br><b><h1>Viewing Motivation only for company <?php echo $companyname ?></h1></b><br>

<h1><font color="red"><?php echo $err ?></font></h1>
<table>
<?php echo form_tag('motivation/index') ?>
<tr><td>Motivation Link</td> <td><textarea name=link rows='4' cols='55'></textarea> </td> </tr>
<tr><td>Video Number</td> <td><input type=text name=week size=6></td></tr>
<tr><td colspan='2' align='center'><input type=submit name=submit value="Save Motivation"></td></tr>
</form>

<div align=center>
<?php

 echo "<table border=0 width=50%><tr><td>Video # </td> <td>Link</td> </tr>";
 
 
 for($a =0; $a < count($row); $a++){
 	
 	echo "<tr><td><h1> {$row[$a]['week']}</h1></td> <td> {$row[$a]['link']} </td>  </tr>";
 }
 echo "</table>";

 // echo "Category: $name Exercise: $value Location: $location  <a href='?remove={$row['id']}'>Remove $value</a><br>";

?>