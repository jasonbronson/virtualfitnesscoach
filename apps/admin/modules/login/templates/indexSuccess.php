<style type="text/css">
<!--
.imgbk {
background-image: url(/images/login.gif);

}
-->
</style>

<div align=center>
<form action='' name='loginform' method='POST'>
<table border=1 width=280px bordercolor=black cellspacing=0 cellpadding=9>
<th class=imgbk  height=57px colspan=3>Administration Area</th>
<tr>
<td colspan=4 align=center>Username: <input type='text' name='username' value='' maxlength=80></td>
</tr>

<tr>
<td colspan=4 align=center>Password: <input type='password' name='password' value='' maxlength=80></td>
</tr>
<tr>
<td colspan=4 align=center><input type='submit' name=send value='Login'></td>
</tr>
</table>
</form>
<?php
if($err == true)
echo "<br><h1>Incorrect Login </h1>";

?>
</div>