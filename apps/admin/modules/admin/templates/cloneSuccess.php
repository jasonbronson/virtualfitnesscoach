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
<h1>Clone <?php echo $userinfo[0]['user_firstname']." ".$userinfo[0]['user_lastname'] ?> existing Workout Schedule  <?php echo date("M d Y", strtotime($workoutdate)); ?></h1>
<?php
if($finish == "true"){

   //echo "Clone Data Completed !";
/*print_r($clone_data);
  $totalrows=count($clone_data);

  for($a=0; $a < $totalrows;  $a++){
    foreach($clone_data[$a] as $key => $value)
    echo "<td> <input type=text name='{$key}' value='$value'></td>";

  }
*/
  echo link_to('Continue here', 'admin/showuserlist')."<br><br>";
  // echo $inserts;

  echo "CLONE SUCCESS";
exit;
}


//EXECUTE PARAMS
echo form_tag('admin/clone');
?>
<table border=0>
<!-- tr>
<td>Clone Date From: <input type=text id=workoutdate1 name='workoutdate1' value='<?php echo $workoutdate; ?>' maxlength=10 size=10 readonly>
          <input type="reset" id="calendarbutton1" value=" ... " onclick="return showCalendar('workoutdate1', '%Y-%m-%d');">
          <script type="text/javascript">
            Calendar.setup(
              {
                inputField  : "workoutdate1",         // ID of the input field
                ifFormat    : "%Y-%m-%d",    // the date format
                button      : "calendarbutton1"       // ID of the button
              }
            );
          </script></td>
</tr>
<tr>
<td>Clone Date TO:<input type=text id=workoutdate2 name='workoutdate2' value='<?php echo $workoutdate; ?>' maxlength=10 size=10 readonly>
          <input type="reset" id="calendarbutton2" value=" ... " onclick="return showCalendar('workoutdate2', '%Y-%m-%d');">
          <script type="text/javascript">
            Calendar.setup(
              {
                inputField  : "workoutdate2",         // ID of the input field
                ifFormat    : "%Y-%m-%d",    // the date format
                button      : "calendarbutton2"       // ID of the button
              }
            );
          </script></td>
</tr-->
<tr>
    <!-- td> Clone FROM User: <?php foreach($exerciselist as $key => $value){
              $tmp .= "<option value='".$value['user_id']."'>".$value['user_lastname']." ".$value['user_firstname']."</option>";
           }

           echo "<select name=user_id>$tmp</select>";
          ?></td-->

    <td>

    Clone to User:
    <?php

    $tmp = "";
    foreach($userlist as $key => $value){
              $tmp .= "<option value='".$value['user_id']."'>".$value['user_lastname']." ".$value['user_firstname']."</option>";
           }

           echo "<select name=newuser_id>$tmp</select>";
          ?></td>


</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
<td>
<input type=hidden name=workoutdate value='<?php echo $workoutdate ?>'>
<input type=hidden name=workouttype value='<?php echo $workouttype ?>'>
<input type=hidden name=user_id value='<?php echo $user_id ?>'>

Clone to Day <input type=text id=startworkoutdate name='startworkoutdate' value='<?php echo $workoutdate; ?>' maxlength=10 size=10 readonly>
          <input type="reset" id="calendarbutton3" value=" ... " onclick="return showCalendar('startworkoutdate', '%Y-%m-%d');">
          <script type="text/javascript">
            Calendar.setup(
              {
                inputField  : "startworkoutdate",         // ID of the input field
                ifFormat    : "%Y-%m-%d",    // the date format
                button      : "calendarbutton3"       // ID of the button
              }
            );
          </script></td>
</tr>

<tr><td colspan=2 align=center><input type=submit name=submit value='Clone'></td></tr>
</form>

