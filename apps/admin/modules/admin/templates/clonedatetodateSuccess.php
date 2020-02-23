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
<h1>Clone DATE to DATE of a Users Workout Schedule to a New User</h1>
<?php

//EXECUTE PARAMS
echo form_tag('admin/clonedatetodate');
?>
<table border=0>
<tr>
<td>Clone Date FROM: <input type=text id=workoutdate_from name='workoutdate_from' value='' maxlength=10 size=10 readonly>
          <input type="reset" id="calendarbutton1" value=" ... " onclick="return showCalendar('workoutdate_from', '%Y-%m-%d');">
          <script type="text/javascript">
            Calendar.setup(
              {
                inputField  : "workoutdate_from",         // ID of the input field
                ifFormat    : "%Y-%m-%d",    // the date format
                button      : "calendarbutton1"       // ID of the button
              }
            );
          </script></td>
</tr>
<tr>
<td>Clone Date TO:<input type=text id=workoutdate_to name='workoutdate_to' value='' maxlength=10 size=10 readonly>
          <input type="reset" id="calendarbutton2" value=" ... " onclick="return showCalendar('workoutdate_to', '%Y-%m-%d');">
          <script type="text/javascript">
            Calendar.setup(
              {
                inputField  : "workoutdate_to",         // ID of the input field
                ifFormat    : "%Y-%m-%d",    // the date format
                button      : "calendarbutton2"       // ID of the button
              }
            );
          </script></td>
</tr>
<tr>
    <td> Clone FROM User: <?php foreach($userlist as $key => $value){
              $tmp .= "<option value='{$value['user_id']}'>".$value['user_lastname']." ".$value['user_firstname']."</option>";
           }

           echo "<select name=user_id>$tmp</select>";
          ?></td>
</tr>
<tr>
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

Begin Clone on this Day <br> <input type=text id=startworkoutdate name='startworkoutdate' value='<?php echo $workoutdate; ?>' maxlength=10 size=10 readonly>
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

<tr>
<td colspan=2 align=center><br>
<br>**Warning Cannot be Reversed **
<input type=submit name=submit value='Clone'> </td></tr>
</form>

