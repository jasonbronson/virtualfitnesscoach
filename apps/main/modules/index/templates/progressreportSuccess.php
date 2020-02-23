<style>
.test
{
position: absolute;
top: 20px;
left: 30px;
}

</style>
<?php
if($err != ""){
  echo $err;

}


?>

<script>
function show( which){

   if(which == "main"){
    document.getElementById('results').style.display="none";
    document.getElementById('main').style.display="block";
    }
   if(which == "results"){
    document.getElementById('results').style.display="block";
    document.getElementById('main').style.display="none";

    }

}
</script>

<div align="center">
<table border="0" width="25%">
<!--  tr>
<td><a href='#' onclick="show('main')">Main</a></td>
<td><a href='#' onclick="show('pushups')">Pushups</a></td>
<td><a href='#' onclick="show('weights')">Weight</a></td>
<td></td>
</tr>-->
</table>
</div>



<div id="main" align="center">
<table border="0" width="80%">
<tr align=center>
<td><b>Today</b></td>
<td><b>3 Months</b></td>
<td><b>12 Months</b></td>
</tr>

<tr align=center>
<td> <?php
$dir = "siloets";

if($todaygraphic == "")
	$todaygraphic = "defaultphoto.jpg";
	 

echo "<img src='/$dir/$todaygraphic'> ";
?>
</td>

<td>
<?php
if($threemonthsgraphic == "")
	$threemonthsgraphic = "defaultphoto.jpg";

echo "<img src='/$dir/$threemonthsgraphic'> ";
?>
</td>

<td>
<?php
if($ninemonthsgraphic == "")
	$ninemonthsgraphic = "defaultphoto.jpg";

echo "<img src='/$dir/$ninemonthsgraphic'> ";
?>
</td>
</tr>
<tr align="center">
<td colspan="4">
<br>
<input type='button' name='updateresults1' id='updateresults1' value='Update Your Results' onclick="show('results')">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='button' name='updateresults2' id='updateresults2' value='See All Results' onclick="show('results')">
</td>
</tr>
</table>

<br><br>

<table border="0" width="80%">
<tr align="center" valign='middle'>
<td>
<?php
//?name=Total Pushups&type=pushups
?>
<img class="graph" src="<?php echo url_for('index/graph'.$graph1); ?>" /></td>
</tr>
<tr align="center"  valign='middle'>
<td><img class="graph" src="<?php echo url_for('index/graph'.$graph2); ?>" /></td>
</tr>

</table>

</div>
<div id="results" align="center"  style="display:none;">

<?php echo form_tag('index/Progress_report_saveresults', 'method=post');

$type_array = array("Weight" => "weight", "Pushups"=> "pushups", "Step Test" => "steptest", "Hips" => "hips", "Resting Heart Rate"=> "restingheartrate", "Thighs" => "thighs", "Waist"=> "waist", "Chest"=> "chest");

?>

<?php
	if($progress_error == ""):
?>
<table border="0" width="50%" cellpadding=5>
<tr><th colspan="3">Input your Current Progress Results Every 7 Days 
<br>Next Update in <?php if($row[0]['nextupdate'] > 0) echo $row[0]['nextupdate']; else echo " <font color=red>(DUE NOW) 0</font>"; ?> Day(s)</th></tr>

<?php

foreach($type_array as $name=>$value){
echo "
<tr>
<td align=right>$name</td>
<td><input type='text' name='$value' value='{$row[0][$value]}'></td>
</tr>";
}

?>
<tr>
<td></td>
</tr>
<tr>
<td align=right><input type="submit" name="submit" value="Save Results"></td>
<td align=left><input type="button" name="cancelresults" value="Cancel" onclick="show('main')"></td>
</tr>
</table>
<?php
else:
echo '<td><input type="button" name="cancelresults" value="Go Back" onclick="show(\'main\')"></td> <td>'.$progress_error.'</td>';
endif;

?>

</form>
<!-- GRAPHS -->
<br><br>
<table border="0" width="80%">

<?php

foreach($type_array as $name => $value):
//if($row[0][$value] != ""):
?>
<tr align="center" valign='middle'>
<td><img class="graph" src="<?php echo url_for("index/graph?name=$name&type=$value"); ?>" /></td>
</tr>
<?php
//endif;

endforeach;
?>

</table>


</div>



</form>