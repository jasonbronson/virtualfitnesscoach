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
<h1>Clone Nutrition Only to another Day</h1>
<?php
//EXECUTE PARAMS
echo form_tag('admin/clone');
?>
<table border=0>
<tr>
    <td>

    Clone to User:
    <?php

    $tmp = "";
    foreach($userlist as $key => $value){
              $tmp .= "<option value='".$value['user_id']."'>".$value['user_firstname']." ".$value['user_lastname']."</option>";
           }

           echo "<select name=newuser_id>$tmp</select>";
          ?></td>


</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
<td>
<input type=hidden name=workoutdate value='<?php echo $workoutdate ?>'>
<input type=hidden name=workouttype value='nutrition'>
<input type=hidden name=nutritiononly value='true'>
<input type=hidden name=nutritionclone value='true'>
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

