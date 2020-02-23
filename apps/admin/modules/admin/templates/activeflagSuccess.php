<?php

/*if($responsemysql == "OK"){
  echo "CHANGE Processed immediatly please close this window and reload your main window";
  die();
}else{
  echo "<h1><font color=red>Problem updating to that level ! please try again</font></h1> <br>";

}*/
?>

This will Change a users level which will allow login or not based upon the level you set.<br>
<?php

echo form_tag('admin/activeflag');
?>
<select name=level>
<?php
switch($level){
  case 0:
    $basic = "selected";
    break;
  case ($level > 0):
    $manager = "selected";
    break;
  case ($level < 0):
    $disabled = "selected";
    break;
}
?>
<option value='0' <?php echo $basic ?>>Basic User (able to login)</option>
<option value='9' <?php echo $manager ?>>Manager Level (create workouts and more)</option>
<option value='-1' <?php echo $disabled ?>>Disabled user (no login allowed)</option>
</select><br>
<input type=hidden name=user_id value='<?php echo $user_id ?>'>
<input type=hidden name=userlevelchange value='true'>
<input type=submit name=changelevel value=Change>
</form>

