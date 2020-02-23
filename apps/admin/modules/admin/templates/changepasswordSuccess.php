.
<br><br>
<?php
echo form_tag('admin/changepassword');
?>
<div align=center>

<table>
<tr><td>New Password</td> <td> <input type=text name=newpassword value=''></td></tr>
<tr><td>Current Password</td> <td> ENCRYPTED CANNOT BE SHOWN</td></tr>
<tr>
<td>
  <input type=hidden name=user_id value='<?php echo $user_id ?>'>
Time Zone </td>
<td>
<select name=timezone>
<option value=''></option>
    <?php
    //print_r($timezonelist);
    foreach($timezonelist as $value){
    $value = trim($value);
    if($value == $row['timezone'])
        echo "<option value='$value' selected>$value</option>";
      else
        echo "<option value='$value'>$value</option>";
    }
    ?>
      </select>
</td></tr>

<tr><td>First Name</td> <td> <input type=text name=user_firstname value='<?php echo $row['user_firstname'] ?>'></td></tr>
<tr><td>Last Name</td> <td> <input type=text name=user_lastname value='<?php echo  $row['user_lastname']  ?>'></td></tr>
<tr><td>Email Address</td> <td> <input type=text name=email value='<?php echo  $row['email']  ?>' size=40></td></tr>
<tr><td>Forgot Password Question</td> <td> <input type=text name=select_a_question value='<?php echo  $row['select_a_question']  ?>' size=40></td></tr>
<tr><td>Forgot Password Answer</td> <td> <input type=text name=your_answer value='<?php echo  $row['your_answer']  ?>' size=40></td></tr>
<tr><td>Phone</td> <td> <input type=text name=phone value='<?php echo  $row['phone']  ?>'></td></tr>
<tr><td>Birth Date</td> <td> <input type=text name=birthdate value='<?php echo  $row['birthdate']  ?>'></td></tr>
<tr><td>How you Found us?</td> <td> <input type=text name=find_out value='<?php echo  $row['find_out']  ?>'></td></tr>
<tr><td>Last Login</td> <td> <?php echo  $row['lastlogin']  ?></td></tr>
<tr><td>Signup Date</td> <td> <?php echo  $row['signupdate']  ?></td></tr>
<tr><td>Zip</td> <td> <input type=text name=zip value='<?php echo  $row['zip']  ?>'></td></tr>

<tr><td>Male / Female</td>
<td>
<select name=gender>
<?php

  $fm_array = array("M"=>"male", "F"=>"female");
	foreach($fm_array as $key => $value)
		if($key == $row['gender'])
          echo "<option value='$key' selected>$value</option>";
          else
         echo "<option value='$key'>$value</option>";
?>
</select>
</td>
</tr>

<tr><td>Weight Gain or Loss</td>
<td>
<select name=weight_goal>
<?php

 $wg_array = array("U"=>"Gain Weight", "D"=>"Weight Loss");
	foreach($wg_array as $key => $value)
		if($key==$row['weight_goal'])
          echo "<option value='$key' selected>$value</option>";
          else
          echo "<option value='$key'>$value</option>";

?>
</select>
</td>
</tr>

<tr>
<td>Calendar URL</td>
<td><input type=text name='cal_url' value='<?php echo base64_decode($row['cal_url']) ?>'></td>
</tr>

<tr><td>User Login Level</td>
<td>
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
</select>
</td>
</tr>

<tr><td>Daily Calories Goal Resistance</td> <td> 
<select name=dailycal_1>
<option></option>
<?php 


$x=1000;
	for($a=1; $a<22; $a++){
		if($dailycal[0]['dailycalories'] == $x)
		  echo "<option selected>$x</option>";
		  else
		  echo "<option>$x</option>";
		$x= $x + 100;
	}
?>
</select>
</td></tr>

<!--  tr><td>Daily Calories Goal Cardio</td> <td> 
<select name=dailycal_2>
<option></option>
<?php 
$x=1000;
	for($a=1; $a<22; $a++){
		if($dailycal[1]['dailycalories'] == $x)
		  echo "<option selected>$x</option>";
		  else
		  echo "<option>$x</option>";
		$x= $x + 100;
	}
?>
</select>
</td></tr>

<tr><td>Daily Calories Goal RestDay</td> <td> 
<select name=dailycal_3>
<option></option>
<?php 
$x=1000;
	for($a=1; $a<22; $a++){
		if($dailycal[2]['dailycalories'] == $x)
		  echo "<option selected>$x</option>";
		  else
		  echo "<option>$x</option>";
		$x= $x + 100;
	}
?>
</select>
</td></tr-->

<tr><td>Group </td> <td> 
<select name=group>
<option></option>
<?php 

   foreach($groups as $value){
   		if($row['group_id'] == $value['group_id'])
   			echo "<option value='{$value['group_id']}' selected>{$value['group_name']}</option>";
   		else
		    echo "<option value='{$value['group_id']}'>{$value['group_name']}</option>";
		}
?>
</select>
</td></tr>


<tr><td></td> <td> <input type=submit value='Change Profile'></td></tr>
</table>
<h1><b><?php echo $err ?></b></h1>
</form>
</div>