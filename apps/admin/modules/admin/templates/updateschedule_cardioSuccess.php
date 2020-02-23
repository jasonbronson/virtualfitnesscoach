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



 <script src="/js/mobrowser.js"></script> <script
  src="/js/modomevent3.js"></script> <script src="/js/modomt.js"></script>
<script src="/js/modomext.js"></script> <script src="/js/tabs2.js"></script>
<script src="/js/getobject2.js"></script> <script src="/js/xmlextras.js"></script>
<script src="/js/acdropdown.js"></script> <!-- syntax highlight --> <script
  language="javascript" src="/js/shCore.js"></script> <script
  language="javascript" src="/js/shBrushXML.js"></script> <script
  language="javascript">
function alertSelected()
{
  document.getElementById( 'selectedCountry' ).innerHTML = this.sActiveValue
}
</script>
.

<table border=0 width=75%>
      <th colspan=3><font size=+2><?php echo ucwords($userinfo['user_firstname']." ".$userinfo['user_lastname']); ?></font></th>
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
        <input type=hidden name=type value='2'>
        <input type=hidden id=workoutdate name='workoutdate' value='<?php echo $workoutdate; ?>'>
        <input type=hidden name=newtype value='3'>
        <input type="submit" name="workout" value="Rest" onclick="return Confirm();">
        </form>
        </td>
      </tr>
    </table>

<?php
    echo form_tag('admin/updatecircuitcardio');



  for($a=1; $a < 4; $a++){
      //THREE SETS OF IMAGES !
  foreach($cardio_files as $key => $value){
        if($cardioinfo[0]["image$a"] == $value){
         ${"cardio_list$a"} .= "<option value='$value' selected>$value</option>";

          }else{
         ${"cardio_list$a"} .= "<option value='$value'>$value</option>";

        }
      }

    }

    /*foreach($cardio_files as $key => $value){
      $cardio_list .= "<option value='$value'>$value</option>";
    }*/
   // print_r($cardioinfo);
    ?>
    <table border=1 width=75%>
      <tr align=center>
        <td colspan=4>Cardio Workout</td>
      </tr>
      <tr>
        <td><input type=hidden name=workouttype value="cardio">
        <input type=hidden name=user_id value='<?php echo $user_id ?>'>
        Number of Minutes <input type=text name=numberofmin value='<?php echo $cardioinfo[0]['numberofmin'] ?>'>
        </td>
        <td colspan=2>Pace <input type=text name=pace  value='<?php echo $cardioinfo[0]['maxheartrate'] ?>'></td>
      </tr>
      <tr>
        <td>Cardio Image #1 <select name=image1>
        <?php echo $cardio_list1 ?>
        </select></td>
        <td>Cardio Image #2 <select name=image2>
        <?php echo $cardio_list2 ?>
        </select></td>
        <td>Cardio Image #3 <select name=image3>
        <?php echo $cardio_list3 ?>
        </select></td>
      </tr>
      <tr>
        <td colspan=2 align=center>
     <?php
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

  <input type=hidden name="fitness_exercise_day_id" value="<?php echo $exercisedayinfo['id']; ?>">
  <input type=hidden name="oldworkoutdate" value="<?php echo $workoutdate ?>">

        </td>
        <td>Workout Date <input type=text id=workoutdate_cardio name='workoutdate_cardio' value='<?php echo $workoutdate; ?>' maxlength=10 size=10 readonly>
          <input type="reset" id="calendarbutton_cardio" value=" ... " onclick="return showCalendar('workoutdate_cardio', '%Y-%m-%d');">
          <script type="text/javascript">
            Calendar.setup(
              {
                inputField  : "workoutdate_cardio",         // ID of the input field
                ifFormat    : "%Y-%m-%d",    // the date format
                button      : "calendarbutton_cardio"       // ID of the button
              }
            );
          </script></td>
      </tr>
      <tr>
        <td colspan=3 align=center><input type=submit name=save value='Save'></td>
      </tr>
    </table>
    </form>
