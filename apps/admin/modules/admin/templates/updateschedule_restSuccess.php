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

<table border=0 width=75%>
      <th colspan=3><font size=+2><?php echo ucwords($row['user_firstname']." ".$row['user_lastname']); ?></font></th>
      <tr align=center>
        <td colspan=3><h1> Change this Workout Day to: </h1>
         <?php echo form_tag('admin/moveexercise', array('style'=>'margin:0;padding:0; display:inline;', 'post'=>'true')) ?>
        <input type=hidden name=user_id value='<?php echo $user_id ?>'>
        <input type=hidden name=type value='2'>
        <input type=hidden name=newtype value='1'>
        <input type=hidden id=workoutdate name='workoutdate' value='<?php echo $workoutdate; ?>'>
        <input type="submit" name="workout" value="Resistence" onclick="return Confirm();">
        </form>
        &nbsp; &nbsp;   &nbsp; &nbsp;
        <?php echo form_tag('admin/moveexercise', array('style'=>'margin:0;padding:0; display:inline;', 'post'=>'true')) ?>
        <input type=hidden name=user_id value='<?php echo $user_id ?>'>
        <input type=hidden name=type value='<?php echo $exercisedayinfo['workouttype'] ?>'>
        <input type=hidden id=workoutdate name='workoutdate' value='<?php echo $workoutdate; ?>'>
        <input type=hidden name=newtype value='2'>
        <input type="submit" name="workout" value="Cardio" onclick="return Confirm();">
        </form>
        </td>
      </tr>
    </table>

 <?php
    echo form_tag('admin/addcircuitrest');

  $cardio_list = "";
    foreach($cardio_files as $key => $value){
      if($value == $cardioinfo[0]['image1'])
      $cardio_list .= "<option value='$value' selected>$value</option>";
      else
      $cardio_list .= "<option value='$value'>$value</option>";
    }
    ?>
    <table border=0 width=75%>
      <tr>
        <td colspan=3>
        <input type=hidden name=workouttype value="rest">
        <input type=hidden name=user_id value='<?php echo $user_id ?>'>
         <input type=hidden name="oldworkoutdate" value="<?php echo $workoutdate ?>">
        </td>
      </tr>
      <tr align=center>
        <td colspan=4><h1>Rest Day</h1></td>
      </tr>
      <tr>
        <td>Rest Image <select name=image1>
        <?php echo $cardio_list ?>
        </select></td>
      </tr>
      <tr>
        <td><textarea name=message rows=5 cols=90><?php echo $cardioinfo[0]['message'] ?></textarea></td>
      </tr>
      <tr>
      <td>
      <?php

      //print_r($exercisedayinfo);

        foreach($exercisedayinfo as $key => $value){
        if(strpos($key, "swf")!==false){
          foreach($swif_files as $swfvalue)
            if($value == $swfvalue)
                $swffiles[$key] .= "<option value='$swfvalue' selected>$swfvalue</option>";
                else
                $swffiles[$key] .= "<option value='$swfvalue'>$swfvalue</option>";
        }
         // echo $key.":".$value."<br>";

    }
      ?>

        F-Morning Visit Swf File <?php echo "<select name=1_swif><option value=''></option>{$swffiles['m1_swf']}</select>"; ?><br>
        Morning Swf File <?php echo "<select name=2_swif><option value=''></option>{$swffiles['m_swf']}</select>"; ?><br>

        F-Afternoon Visit Swf File <?php echo "<select name=3_swif><option value=''></option>{$swffiles['a1_swf']}</select>"; ?><br>
        Afternoon Swf File <?php echo "<select name=4_swif><option value=''></option>{$swffiles['a_swf']}</select>"; ?><br>

        F-Night Visit Swf File <?php echo "<select name=5_swif><option value=''></option>{$swffiles['n1_swf']}</select>"; ?><br>
        Night Swf File <?php echo "<select name=6_swif><option value=''></option>{$swffiles['n_swf']}</select>"; ?><br>


</td>
      </tr>
      <tr>
      <td>Rest Date <input type=text id=workoutdate_rest name='workoutdate_rest' value='<?php echo $workoutdate; ?>' maxlength=10 size=10 readonly>
          <input type="reset" id="calendarbutton_rest" value=" ... " onclick="return showCalendar('workoutdate_rest', '%Y-%m-%d');">
          <script type="text/javascript">
            Calendar.setup(
              {
                inputField  : "workoutdate_rest",         // ID of the input field
                ifFormat    : "%Y-%m-%d",    // the date format
                button      : "calendarbutton_rest"       // ID of the button
              }
            );
          </script></td>
      </tr>
      <tr>
        <td colspan=3 align=center><input type=submit name=save value='Save'></td>
      </tr>
    </table>
    </form>
