<style type="text/css">
<!--
.imgbk {
background-image: url(/images/login.gif);

}
-->
</style>

<div align=center>
<?php
if($linktologin == true){
  echo $err."<br>";
  echo button_to('Login', 'default/index');
  return;
}

?>

<?php //echo form_tag('default/forgotpassword'); ?>
<form name='resetpassword' action='/main.php/default/forgotpassword' method=post>
<table border=0 width=280px bordercolor=black cellspacing=0 cellpadding=9>
<th class=imgbk  height=57px colspan=3>Virtual Fitness Coach</th>
<tr>
<td align=center>Email:</td><td> <input type='text' name='email' value='<?php echo $email ?>' maxlength=80></td>
</tr>
<tr>
<td align=center>New Password:</td><td> <input type='password' name='newpassword' value='<?php echo $newp ?>' maxlength=80></td>
</tr>
<tr>
<td align=center>Confirm Password:</td><td> <input type='password' name='confirmpassword' value='<?php echo $confp ?>' maxlength=80></td>
</tr>

<tr>
<td colspan=4 align=center><input type='submit' name=send value='Reset Password'></td>
</tr>
</table>
</form>
<b><?php echo $err; ?></b>

</div>