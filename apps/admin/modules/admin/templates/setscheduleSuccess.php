<?php use_helper('Javascript') ?>
<head>
<style type="text/css">
@import url(/css/calendar-blue.css);
</style>

 <style>
 @import url(/css/dropdown.css);
</style>


</head>
<!-- import the calendar script -->
<script type="text/javascript" src="/js/calendar.js"></script>

<!-- import the language module -->
<script type="text/javascript" src="/js/lang/calendar-en.js"></script>
<script type="text/javascript" src="/js/calendar-setup.js"></script>

<script type="text/javascript" src="/js/ajax.js"></script>
<script type="text/javascript" src="/js/ajax-dynamic-list.js"></script>

<script language="javascript">
function changetype(type){

  if(type == 'cardio'){
  document.getElementById(type).style.display = 'block';
  document.getElementById('rest').style.display = 'none';
  document.getElementById('resistence').style.display = 'none';
  }

  if(type == 'rest'){
  document.getElementById(type).style.display = 'block';
  document.getElementById('cardio').style.display = 'none';
  document.getElementById('resistence').style.display = 'none';

  }


  if(type == 'resistence'){
  document.getElementById(type).style.display = 'block';
  document.getElementById('cardio').style.display = 'none';
  document.getElementById('rest').style.display = 'none';

  }



}

</script>

<script src="/js/mobrowser.js"></script>
<script src="/js/modomevent3.js"></script> <script src="/js/modomt.js"></script>
<script src="/js/modomext.js"></script> <script src="/js/tabs2.js"></script>
<script src="/js/getobject2.js"></script> <script src="/js/xmlextras.js"></script>
<script src="/js/acdropdown.js"></script> <!-- syntax highlight -->
<script language="javascript" src="/js/shCore.js"></script>
<script language="javascript" src="/js/shBrushXML.js"></script>
<script language="javascript">
function alertSelected()
{
  document.getElementById( 'selectedCountry' ).innerHTML = this.sActiveValue
}

function launchhistory(numcircuit){

  var tmp = 'exercisename' + numcircuit;
  var exercisename = document.getElementById(tmp).value;
  //alert(exercisename);
  window.open("<?php echo '/admin.php/admin/history/user_id/'.$user_id.'/exercisename/'; ?>" + exercisename);

//  var p = document.getElementById("exercisename" + tmp).value;
  //alert(p);

//  var link = "http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin.php/admin/history?user_id=<?php echo $user_id; ?>&exercisename=" + p;
//  window.open(link,'History of User', 'width=1300,height=700,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,copyhistory=yes,resizable=yes');

}
</script>

<style>
div.selectContainer {
  display: block;
  float: left;
  clear: none;
  height: 35px;
  background-image: url(/i/blbg.png);
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

div.selectContainer div.acinputContainer {
  margin: 7px 2px 0px 2px;
  border-color: #fff;
}

* html div.selectContainer div.acinputContainer {
  margin: 6px 2px 0px 2px;
}

div.selectContainer div.left {
  display: block;
  float: left;
  clear: none;
  width: 7px;
  height: 35px;
  background-image: url(/i/leftb.png);
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

div.selectContainer div.right {
  display: block;
  float: left;
  clear: none;
  width: 7px;
  height: 35px;
  background-image: url(/i/rightb.png);
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}
</style>



<table border=0 width=75%>
  <tr align=center>
    <td><br>
    <table border=0 width=75%>
      <th colspan=3>Resistance Workout <font size=+2><?php echo ucwords($row['user_firstname']." ".$row['user_lastname']); ?></font></th>
      <tr align=center>
        <td colspan=3>
        <input type="radio" name="workout" value="resistence" onClick="changetype('resistence')" CHECKED> Resistence
        <input type="radio"  name="workout" value "cardio" onClick="changetype('cardio');"> Cardio
        <input type="radio" name="workout" value="rest"  onClick="changetype('rest');"> Rest
        </td>
      </tr>
    </table>




    <div id=cardio style="display: none">
    <?php
    echo form_tag('admin/addcircuitcardio');

    $swffiles = "";
       foreach($swif_files as $key => $value){
      if($key > 1){
        if("generic_initial_cardio_welcome.swf" == $value)
        $swffiles .= "<option value='$value' selected>$value</option>";
        else
        $swffiles .= "<option value='$value'>$value</option>";
      }
    }

    $swiflist = "<select name=swif>
    <option value=''></option>
    $swffiles
    </select>";


    $cardio_list = "";
    foreach($cardio_files as $key => $value){
      $cardio_list .= "<option value='$value'>$value</option>";
    }
    ?>
    <table border=0 width=75%>
      <tr align=center>
        <td colspan=4>Cardio Workout</td>
      </tr>
      <tr>
        <td><input type=hidden name=workouttype value="cardio">
        <input type=hidden name=user_id value='<?php echo $user_id ?>'>
        Number of Minutes <input type=text name=numberofmin>
        </td>
        <td colspan=2>Pace <input type=text name=pace></td>
      </tr>
      <tr>
        <td>Cardio Image #1 <select name=image1>
    <?php 
   
    foreach($cardio_files as $key => $value){
    	if($value == "recumbent_bike.jpg")
      		echo "<option value='$value' selected>$value</option>";
      		else
      		echo "<option value='$value'>$value</option>";
    } 
    
    ?>
        </select></td>
        <td>Cardio Image #2 <select name=image2>
        <?php
foreach($cardio_files as $key => $value){
    	if($value == "stairmaster.jpg")
      		echo "<option value='$value' selected>$value</option>";
      		else
      		echo "<option value='$value'>$value</option>";
    } 
        ?>
        </select></td>
        <td>Cardio Image #3 <select name=image3>
        <?php 
foreach($cardio_files as $key => $value){
    	if($value == "walking.jpg")
      		echo "<option value='$value' selected>$value</option>";
      		else
      		echo "<option value='$value'>$value</option>";
    } 
        ?>
        </select></td>
      </tr>
      <tr>
        <td colspan=2 align=center>

        F-Morning Visit Swf File <?php echo "<select name=1_swif><option value=''></option>$swffiles</select>"; ?><br>
        Morning Swf File <?php echo "<select name=2_swif><option value=''></option>$swffiles</select>"; ?><br>

        F-Afternoon Visit Swf File <?php echo "<select name=3_swif><option value=''></option>$swffiles</select>"; ?><br>
        Afternoon Swf File <?php echo "<select name=4_swif><option value=''></option>$swffiles</select>"; ?><br>

        F-Night Visit Swf File <?php echo "<select name=5_swif><option value=''></option>$swffiles</select>"; ?><br>
        Night Swf File <?php echo "<select name=6_swif><option value=''></option>$swffiles</select>"; ?><br>


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
    </div> <!-- END OF DIV BLOCK FOR CARDIO -->



    <div id=rest style="display: none">
    <?php
    echo form_tag('admin/addcircuitrest');

$swffiles = "";
    foreach($swif_files as $key => $value){
      if($key > 1){
        if("rest_day_ohio.swf" == $value)
        $swffiles .= "<option value='$value' selected>$value</option>";
        else
        $swffiles .= "<option value='$value'>$value</option>";
      }
    }
    
    

    $swiflist = "<select name=swif>
    <option value=''></option>
    $swffiles
    </select>";

  $cardio_list = "";
    foreach($cardio_files as $key => $value){
      $cardio_list .= "<option value='$value'>$value</option>";
    }
    ?>
    <table border=0 width=75%>
      <tr>
        <td colspan=3><input type=hidden name=workouttype value="rest"> <input type=hidden name=user_id value='<?php echo $user_id ?>'></td>
      </tr>
      <tr align=center>
        <td colspan=4>Rest Day</td>
      </tr>
      <tr>
        <td>Rest Image <select name=image1>
        <?php 

        foreach($cardio_files as $key => $value){
    	if($value == "hammock.jpg")
      		echo "<option value='$value' selected>$value</option>";
      		else
      		echo "<option value='$value'>$value</option>";
    } 
        ?>
        </select></td>
      </tr>
      <tr>
        <td><textarea name=message rows=5 cols=90></textarea></td>
      </tr>
      <tr>
      <td>

        F-Morning Visit Swf File <?php echo "<select name=1_swif><option value=''></option>$swffiles</select>"; ?><br>
        Morning Swf File <?php echo "<select name=2_swif><option value=''></option>$swffiles</select>"; ?><br>

        F-Afternoon Visit Swf File <?php echo "<select name=3_swif><option value=''></option>$swffiles</select>"; ?><br>
        Afternoon Swf File <?php echo "<select name=4_swif><option value=''></option>$swffiles</select>"; ?><br>

        F-Night Visit Swf File <?php echo "<select name=5_swif><option value=''></option>$swffiles</select>"; ?><br>
        Night Swf File <?php echo "<select name=6_swif><option value=''></option>$swffiles</select>"; ?><br>


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
    </div><!-- END OF DIV BLOCK FOR REST -->

    <div id=resistence style="display: block"><?php
    echo form_tag('admin/addcircuit');


$swffiles = "";
    foreach($swif_files as $key => $value){
      if($key > 1){
        if("generic_initial_resistance_welcome.swf" == $value)
        $swffiles .= "<option value='$value' selected>$value</option>";
        else
        $swffiles .= "<option value='$value'>$value</option>";
      }
    }

    $swiflist = "<select name=swif>
    <option value=''></option>
    $swffiles
    </select>";

$cardio_list = "";
    foreach($cardio_files as $key => $value){
    	$cardio_list .= "<option value='$value'>$value</option>";
    	
    }



    //print_r($minicardio);



    ?>



    <table border=1 width=34% cellpadding=3 cellspacing=0>
  <tr><td>
  <table>
      <tr>
        <td colspan=3 align=center><font size=+1>Mini Cardio</font></td>
      </tr>
      <tr>
        <td><input type=hidden name=workouttype value="resistence">
         <input type=hidden name=user_id value='<?php echo $user_id ?>'>
         <input type=hidden name=totalrows value='45'> Number of Minutes <input
          type=text name=numberofmin
          value='<?php echo $numberofmin ?>' size=4></td>
        <td>Pace <input type=text name=pace value='<?php echo $pace ?>'
          size=4></td>
      </tr>
      <tr>
        <td>Cardio Image #1 <select name=image1>
        <?php 
        foreach($cardio_files as $key => $value){
    	if($value == "recumbent_bike.jpg")
      		echo "<option value='$value' selected>$value</option>";
      		else
      		echo "<option value='$value'>$value</option>";
    } 
        ?>
        </select></td>
        <td>Cardio Image #2 <select name=image2>
        <?php  
        foreach($cardio_files as $key => $value){
    	if($value == "stairmaster.jpg")
      		echo "<option value='$value' selected>$value</option>";
      		else
      		echo "<option value='$value'>$value</option>";
    } 
        ?>
        </select></td>
        <td>Cardio Image #3 <select name=image3>
        <?php 

        foreach($cardio_files as $key => $value){
    	if($value == "walking.jpg")
      		echo "<option value='$value' selected>$value</option>";
      		else
      		echo "<option value='$value'>$value</option>";
    } 
        ?>
        </select></td>
      </tr>
    </table>
    </td>
    </tr>
    </table>


    <table border=1 width=34% cellpadding=3 cellspacing=0>
  <tr><td>
  <table>
      <tr>
        <td colspan=3 align=center><font size=+1>Warm Up Cardio</font></td>
      </tr>
      <tr>
        <td>Number of Minutes <input type=text name=wu_numberofmin
          value='<?php echo $numberofmin ?>' size=4></td>
        <td>Pace <input type=text name=wu_pace value='<?php echo $pace ?>'
          size=4></td>
      </tr>
      <tr>
        <td>Cardio Image #1 <select name=wu_image1>
        <?php 
foreach($cardio_files as $key => $value){
    	if($value == "recumbent_bike.jpg")
      		echo "<option value='$value' selected>$value</option>";
      		else
      		echo "<option value='$value'>$value</option>";
    } 
        ?>
        </select></td>
        <td>Cardio Image #2 <select name=wu_image2>
        <?php 
foreach($cardio_files as $key => $value){
    	if($value == "stairmaster.jpg")
      		echo "<option value='$value' selected>$value</option>";
      		else
      		echo "<option value='$value'>$value</option>";
    } 
        ?>
        </select></td>
        <td>Cardio Image #3 <select name=wu_image3>
        <?php 
foreach($cardio_files as $key => $value){
    	if($value == "walking.jpg")
      		echo "<option value='$value' selected>$value</option>";
      		else
      		echo "<option value='$value'>$value</option>";
    } 
        ?>
        </select></td>
      </tr>
    </table>
</td>
    </tr>
    </table>


    <table border=1 width=90% cellpadding=3 cellspacing=0>
  <tr><td>
  <table>
      <tr align=center>
        <td width=20%>Workout Date <input type=text id=workoutdate name='workoutdate'
          value='<?php echo $workoutdate; ?>' maxlength=10 size=10 readonly>
        <input type="reset" id="calendarbutton" value=" ... "
          onclick="return showCalendar('workoutdate', '%Y-%m-%d');"> <script
          type="text/javascript">
  Calendar.setup(
    {
      inputField  : "workoutdate",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "calendarbutton"       // ID of the button
    }
  );
</script></td>
        <td>

        F-Morning Visit Swf File <?php echo "<select name=1_swif><option value=''></option>$swffiles</select>"; ?><br>
        Morning Swf File <?php echo "<select name=2_swif><option value=''></option>$swffiles</select>"; ?><br>

        F-Afternoon Visit Swf File <?php echo "<select name=3_swif><option value=''></option>$swffiles</select>"; ?><br>
        Afternoon Swf File <?php echo "<select name=4_swif><option value=''></option>$swffiles</select>"; ?><br>

        F-Night Visit Swf File <?php echo "<select name=5_swif><option value=''></option>$swffiles</select>"; ?><br>
        Night Swf File <?php echo "<select name=6_swif><option value=''></option>$swffiles</select>"; ?><br>

</td>
      </tr>
    </table>
</td>
    </tr>
    </table>



    <table border=1 width=100%>

    <?php

    //print_r($exgraphic_files);
    foreach($exgraphic_files as $key => $value)
    $graphiclist = "<option value='$value'>$value</option>";



    for($a=0; $a < 45; $a++){

      /*
       $sets = ${"sets$a"};
       $weights = ${"weights$a"};
       $reps = ${"reps$a"};
       $removerow = ${"removerow$a"};*/
      //$sets = $sess['sets'][$a];


      if( ($a % 2) == 0)
      $color = "lightblue";
      else
      $color = "white";


/*
      for($b=0; $b < count($exerciselist); $b++){
        if($exerciselist[$b]['exercisename'] == $resistenceinfo[$b]['exgraphic'])
        $selectitems .= "<option value=\"{$exerciselist[$b]['exercisename']}\" selected>{$exerciselist[$b]['categoryname']} {$exerciselist[$b]['exercisename']}</option>";
        else
        $selectitems .= "<option value=\"{$exerciselist[$b]['exercisename']}\">{$exerciselist[$b]['categoryname']} {$exerciselist[$b]['exercisename']}</option>";
      }
*/


      //<select id=\"countrySelectDropdown$a\" acdropdown=true style=\"width:300px;\" autocomplete_complete=\"false\" autocomplete_onselect=\"alertSelected\" name=exercisename$a>
      $link = "<a href='#' onclick=\"launchhistory($a); \">History of User</a>";
      //$link = link_to('History of User', 'admin/history?user_id='.$user_id, array('target'=>'_new'));

 //use_helper('Javascript');
   //   $exercise_auto_complete = input_auto_complete_tag("exercisename$a", '', 'admin/autocomplete',array('autocomplete' => 'off'), array('use_style' => 'off'));
$sortnum = $a+1;
      echo "
      <tr bgcolor='$color'>
      <td>
      $link
      </td>
      <td>Circuit#<input type=text size=4 name=circuit$a value='{$resistenceinfo[$a]['circuit']}'></td>
      <td>
      Exercise:
      <input type=text name='exercisename$a' id='exercisename$a' onkeyup=\"ajax_showOptions(this,'getExercisenames',event, '/admin.php/admin/ajax_exercisenames')\" size=40 value='".$value1['exercisename']."'>
      <input type=button value='C' name=clearexname onClick=\"getElementById('exercisename$a').value='';\">
      </div>
      </td>



      <td>
      Sets <input type=text name=sets$a value='{$resistenceinfo[$a]['sets']}' size=4>
      </td>
      <td>
      Reps <input type=text name=reps$a value='{$resistenceinfo[$a]['reps']}' size=4>
      </td>
      <td>
      Resistence <input type=text name=weights$a value='{$resistenceinfo[$a]['weights']}' size=4>
      </td>

      <td>Sort<input type=text size=4 name=sort$a value='{$sortnum}'></td>
      </tr>
      ";

    }

    ?>
      <tr>
        <td colspan=3><input type=submit name=addrow value='Add Row'
          disabled></td>
      </tr>


      <?php


      /*echo link_to_remote(
       'Add Row', array(
       'update' => 'newrow',
       'url'    => 'admin/addrow?rowid='.$tmp
       ));*/
      ?>


      </td>
      </tr>
    </table>

    <?php
    echo submit_tag('Save & Finish / Clone'); ?>
    </form>

    </div>
  <!-- END OF DIV BLOCK FOR resistance -->

    <!--table border=1 name=myTable id=myTable>
<tr>
</tr>
</table>
<form>
--> <?php
//echo $addcircuit."**************";
//echo javascript_tag( "function addcircuit() { alert('hi'); ".update_element_function('circuitlist', array('content'  => "<strong>Data processing complete</strong>"))."}" );
?>

</table>

</td>
</tr>
</table>

</div>
</form>
</div>
