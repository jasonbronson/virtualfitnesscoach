
.
<div align=center>
<?php


echo form_tag('admin/adduser'); ?>
<table border=0 width=30%>
<tr><td>First Name</td> <td> <input type=text name=firstname value='<?php echo $firstname ?>'></td></tr>
<tr><td>Last Name</td> <td> <input type=text name=lastname value='<?php echo  $lastname  ?>'></td></tr>
<tr><td>Email Address</td> <td> <input type=text name=email value='<?php echo  $email  ?>' size=40></td></tr>
<tr><td>Password</td> <td> <input type=text name=password value='<?php echo  $password  ?>' size=40></td></tr>
<tr><td>Forgot Password Question</td> <td> <input type=text name=select_a_question value='<?php echo  $select_a_question  ?>' size=40></td></tr>
<tr><td>Forgot Password Answer</td> <td> <input type=text name=your_answer value='<?php echo  $your_answer  ?>' size=40></td></tr>
<tr><td>Phone</td> <td> <input type=text name=phone value='<?php echo  $phone  ?>'></td></tr>
<tr><td>Birth Date</td> <td> <input type=text name=birthdate value='<?php echo  $birthdate  ?>'> Format must be 11/2/1960</td></tr>
<tr><td>How you Found us?</td> <td> <input type=text name=find_out value='<?php echo  $find_out  ?>'></td></tr>

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

<tr><td>Daily Calories Goal Cardio</td> <td> 
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
</td></tr>


<tr><td>Group </td> <td> 
<select name=group>
<option></option>
<?php 

   foreach($group as $value){
   		if($value['group_id'] == 3)
		  echo "<option value='{$value['group_id']}' selected>{$value['group_name']}</option>";
		  else
		  echo "<option value='{$value['group_id']}'>{$value['group_name']}</option>";
		}
?>
</select>
</td></tr>


<tr><td>Time Zone</td>
<td> <select name=timezone>
<option value=''></option>
    <?php
    //print_r($timezonelist);
    foreach($timezonelist as $value){
    	$value = trim($value);
    	$stripamerica_value = str_replace("America/", "", trim($value));
    
    if($value == "America/New_York") //$timezone)
        echo "<option value='$value' selected>$stripamerica_value</option>";
      else
        echo "<option value='$value'>$stripamerica_value</option>";
    }
    ?>
      </select></td></tr>
</table>


<br>
<input type=submit name=Submit value='Add User'>

<h1><b><?php echo $errmsg; ?></b></h1>
</form>
</div>