<style type="text/css">
<!--
.imgbk {
background-image: url(/images/login.gif);
background-repeat: no-repeat;

}
#loginform{
	border-width: 1px;
	border-style: solid;
	border-color: black;
	width: 310px;
	margin-left: auto;
    margin-right: auto;	
}


-->
</style>

<div align=center id="loginform">
<form action='' name='loginform' method='POST'>
<table border=0 width=310px bordercolor=black cellspacing=0 cellpadding=9>
<th class=imgbk  height=54px colspan=3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Virtual Fitness Coach Members</th>
<tr>
<td>Email:</td><td colspan=0> <input type='text' name='username' value='' maxlength=80></td>
</tr>
<tr>
<td>Password:</td><td> <input type='password' name='password' value='' maxlength=80></td>
</tr>
<tr>
<td colspan=4 align=center><input type='submit' name=send value='Login'></td>
</tr>
</table>
</form>
<br>
<div align=center><a href='/main.php/default/forgotpassword'>Forgot Password ?</a></div>
<b><?php echo $err; ?></b>

</div>