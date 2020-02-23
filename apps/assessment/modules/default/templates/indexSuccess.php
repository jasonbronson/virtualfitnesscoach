
<form action='/main.php/default/index' method='post'>
<input type="hidden" name="username" value="<?php echo $username ?>">
<input type="hidden" name="password" value="<?php echo $userpassword ?>">
<font size="+1">Your account was successfully created. Please continue on to assessment form here 
<input type="submit" name="submit" value="Login Click Here"><br>
Please write down this information for future use <br>
Username / Login Name : <?php echo $username ?><br>
Password : <?php echo $userpassword ?>
</font>
</form> 
