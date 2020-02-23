<style type="text/css">
<!--
.imgbk {
background-image: url(/images/login.gif);
}
.login {
  
  float: left;
  width:405px;
  border-color: green;
  border-width: 3px;
  border-style: solid;
  height: 400px;
}
.swf {
  width: 405px;
  float: left;
  height: 405px;
  border-color: blue;
  border-width: 3px;
  border-style: solid;
}
.calendar{
  float: left;
  border-color: red;
  border-width: 0px;
  border-style: solid;
  text-align: center;
  margin-right: auto;
  margin-left: auto;
  height: 600px;
}
-->
</style>

<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=1,menubar=1,resizable=1,width=1200,height=500,left = 440,top = 0');");
}
// End -->
</script>



<div align=center>
<table border="0">
<tr>
<td>

<h1>Family Login</h1>
<br><br>
<form action='/main.php/default/grouplogin' method='post'>
<table border=0 width=300px bordercolor=black cellspacing=0 cellpadding=9>
<?php


$counter = 0;
	foreach($row as $value){
		/*if($counter == 0)
			$s = "selected";
			else
			$s = "";
		*/
		//print_r($value);
		//$allusers .= "{$value['user_id']},";
		if(strlen($value['cal_url']) > 5){
			$cal_url = base64_decode($value['cal_url']);
		}
		/*if($value['cal_url'] != ''){
			$cal = base64_decode($value['cal_url']);
			$cal = "<input type='button' name='calendar' value='Print {$value['user_firstname']}s Weekly Calendar' onClick=\"javascript:popUp('{$cal}')\"> ";
		}*/
		echo " <tr> <td align=center>Family Member: </td>
		<td colspan=0 align=left>  <input type='radio' name='user_id' value='{$value['user_id']}'> {$value['user_firstname']}</td> </tr>";
		$counter = $counter +1;
	}
//	print_r($value);

?>
<input type=hidden name='familymembers' value='<?php echo $allusers ?>'>
<input type=hidden name='grouplogin' value='true'>
<tr>
<td colspan=4 align=center><input type='submit' name=send value='Login'></td>
</tr>
</table>
</form>

</td>
<td>


<object width="400" height="400">
<param name="movie" value="/uploads/family_welcome_default.swf">
<embed src="/uploads/family_welcome_default.swf" width="400" height="400"></embed>
</object>
</td>
</tr>

<tr>
<td colspan=2>
<b><?php echo $err; ?></b>
<input type='button' name='calendar' value='Print Weekly Calendar' onClick="javascript:popUp('<?php echo $cal_url ?>')">
<?php 
//DOWNLOAD DALES CALENDAR

	$lines = file($cal_url);
foreach ($lines as $line_num => $line) {
    echo $line;
} 

?>
</td>
</tr>
</table>


</div>
<!-- img src='/familycalendar/<?php echo $file_email ?>.jpg'-->
<!--  table border=0>
<tr>
<td><input type='button' name='calendar' value='Print Weekly Calendar' onClick="javascript:popUp('<?php echo $cal_url ?>>')"></td>
<td><iframe src='<?php echo $cal_url ?>' width=900 height=400></iframe></td>
</tr>
</table-->
