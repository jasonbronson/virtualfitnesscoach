<head>
<style type="text/css">
@import url(/css/calendar-blue.css);
</style>

</head>
<!-- import the calendar script -->
<script
  type="text/javascript" src="/js/calendar.js"></script>
<!-- import the language module -->
<script
  type="text/javascript" src="/js/lang/calendar-en.js"></script>
<script
  type="text/javascript" src="/js/calendar-setup.js"></script>
.
<div align=center><?php echo form_tag('admin/nutritionupdate');?>
<input type=hidden name=user_id value='<?php echo $user_id ?>'>
<input type=hidden name=update value='true'>
<h1>Nutrition for : <?php echo $userinfo['user_username'];

if($finish == "true"){
  die("NUTRITION SAVED ");

}


//print_r($userlist);
echo "<!--select name='user_id'>";

for($a=0; $a < count($userlist); $a++)
echo "<option value='".$userlist[$a]['user_id']."'>{$userlist[$a]['user_username']}";

echo "</select-->";

?></h1>

<table border=0>

<tr>
<td>Nutrition Date</td>
<td>
 <input type=text id=validdate name='validdate' value='<?php echo $workoutdate; ?>' maxlength=10 size=10 readonly>
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
</td>
</tr>
<tr>
<td>

Swif File
<?php
foreach($nutrition_files as $key => $value){
      if($key > 1){
        if($exerciseday['nutritionswf'] == $value)
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

</td>
</tr>
</table>

<table border=0 width=80%>

<?php

//$totalrows = count($nutritioninfo);
for($a=0; $a< 6; $a++){

$image_list = "";

  foreach($nutrition_files as $key => $value){
    if($value == $nutritioninfo[$a]['image1'])
     $image_list .= "<option value='$value' selected>$value</option>";
    else
     $image_list .= "<option value='$value'>$value</option>";


  }

 switch($a){
   case 0:
    $type="Breakfast";
    break;
    case 1:
    $type="Snack 1";
    break;
    case 2:
    $type="Lunch";
    break;
    case 3:
    $type="Snack 2";
    break;
    case 4:
    $type="Dinner";
    break;
    case 5:
    $type="Snack 3";
    break;


 }

      if( ($a % 2) == 0){
        $colorvar = "lightblue";
      }else{
        $colorvar = "white";
      }
echo "
  <tr  bgcolor=$colorvar>
  <td>$type</td>
  <td>Total Calories <input type=text name='totalcal$a' size=4 value='{$nutritioninfo[$a]['totalcalories']}'></td>
  <td>Suggested Calories <input type=text name='sugcal$a' size=4  value='{$nutritioninfo[$a]['suggestedcalories']}'></td>
  <td>Food Suggestions <textarea name='foodsug$a' cols=30 rows=4 >{$nutritioninfo[$a]['foodsuggestions']}</textarea> </td>
  <td>Image <select name='image$a'>$image_list </select> </td>
  </tr>
   ";
}
?>
</table>
<br>
<input type=submit name=submit value='   SAVE   '>
</form>