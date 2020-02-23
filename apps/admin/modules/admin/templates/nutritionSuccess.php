<head>
<style type="text/css">
@import url(/css/calendar-blue.css);
</style>

</head>
<!-- import the calendar script -->
<script type="text/javascript" src="/js/calendar.js"></script>
<!-- import the language module -->
<script type="text/javascript" src="/js/lang/calendar-en.js"></script>
<script type="text/javascript" src="/js/calendar-setup.js"></script>
.
<div align=center>
<?php echo form_tag('admin/nutrition'); ?>

<input type=hidden name=user_id value='<?php echo $user_id ?>'>
<h1> Nutrition for :
<?php

if($finish == "true"){
  die("NUTRITION SAVED ");
}


//print_r($userlist);
echo "<select name='user_id'>";

 for($a=0; $a < count($userlist); $a++)
      echo "<option value='".$userlist[$a]['user_id']."'>{$userlist[$a]['email']}";

echo "</select>";

?>
</h1>

Swif File
<?php
foreach($nutrition_files as $key => $value){
      if($key > 1){
        if($selectedswif == $value)
        $swffiles .= "<option value='$value' selected>$value</option>";
        else
        $swffiles .= "<option value='$value'>$value</option>";
      }
    }

    echo "<select name=nutritionswif>
    <option value=''></option>
    $swffiles
    </select>";
    
    
?>
<br>
Nutrition Date <input type=text id=validdate name='validdate' value='<?php echo $validdate; ?>' maxlength=10 size=10 readonly>
          <input type="reset" id="calendarbutton1" value=" ... " onclick="return showCalendar('workoutdate1', '%Y-%m-%d');">
          <script type="text/javascript">
            Calendar.setup(
              {
                inputField  : "validdate",         // ID of the input field
                ifFormat    : "%Y-%m-%d",    // the date format
                button      : "calendarbutton1"       // ID of the button
              }
            );
          </script>
<br>
<?php return; ?>
<table border=0 width=80%>
<tr bgcolor=lightblue>

<td>Breakfast</td>
<td>Total Calories <input type=text name='breakfast_totalcal' size=4></td>
<td>Suggested Calories <input type=text name='breakfast_sugcal' size=4></td>
<td>Food Suggestions <textarea name=breakfast_foodsug cols=30 rows=4></textarea> </td>
<td>Image <select name=breakfast_image1> <?php foreach($nutrition_files as $key => $value) echo "<option value='$value'>$value</option>"; ?> </select> </td>
</tr>

<tr>
<td>Snack 1</td>
<td>Total Calories <input type=text name='snack1_totalcal' size=4></td>
<td>Suggested Calories <input type=text name='snack1_sugcal' size=4></td>
<td>Food Suggestions <textarea name=snack1_foodsug cols=30 rows=4></textarea> </td>
<td>Image <select name=snack1_image1> <?php foreach($nutrition_files as $key => $value) echo "<option value='$value'>$value</option>"; ?> </select> </td>
</tr>

<tr  bgcolor=lightblue>
<td>Lunch</td>
<td>Total Calories <input type=text name='lunch_totalcal' size=4></td>
<td>Suggested Calories <input type=text name='lunch_sugcal' size=4></td>
<td>Food Suggestions <textarea name=lunch_foodsug cols=30 rows=4></textarea> </td>
<td>Image <select name=lunch_image1> <?php foreach($nutrition_files as $key => $value) echo "<option value='$value'>$value</option>"; ?> </select> </td>
</tr>

<tr>
<td>Snack 2</td>
<td>Total Calories <input type=text name='snack2_totalcal' size=4></td>
<td>Suggested Calories <input type=text name='snack2_sugcal' size=4></td>
<td>Food Suggestions <textarea name=snack2_foodsug cols=30 rows=4></textarea> </td>
<td>Image <select name=snack2_image1> <?php foreach($nutrition_files as $key => $value) echo "<option value='$value'>$value</option>"; ?> </select> </td>
</tr>

<tr  bgcolor=lightblue>
<td>Dinner</td>
<td>Total Calories <input type=text name='dinner_totalcal' size=4></td>
<td>Suggested Calories <input type=text name='dinner_sugcal' size=4></td>
<td>Food Suggestions <textarea name=dinner_foodsug cols=30 rows=4></textarea> </td>
<td>Image <select name=dinner_image1> <?php foreach($nutrition_files as $key => $value) echo "<option value='$value'>$value</option>"; ?> </select> </td>
</tr>
<tr>

<td>Snack 3</td>
<td>Total Calories <input type=text name='snack3_totalcal' size=4></td>
<td>Suggested Calories <input type=text name='snack3_sugcal' size=4></td>
<td>Food Suggestions <textarea name=snack3_foodsug cols=30 rows=4></textarea> </td>
<td>Image <select name=snack3_image1> <?php foreach($nutrition_files as $key => $value) echo "<option value='$value'>$value</option>"; ?> </select> </td>
</tr>
</table>
<br>
<input type=submit name=submit value='   SAVE   '>
</form>
