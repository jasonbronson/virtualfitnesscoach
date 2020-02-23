<?php use_helper('Javascript') ?>
<head>
<style type="text/css">@import url(/css/calendar-blue.css);</style>

</head>
<!-- import the calendar script -->
<script type="text/javascript" src="/js/calendar.js"></script>

<!-- import the language module -->
<script type="text/javascript" src="/js/lang/calendar-en.js"></script>
<script type="text/javascript" src="/js/calendar-setup.js"></script>


<style>
@import url(/css/dropdown.css);
</style>


<script type="text/javascript" src="/js/ajax.js"></script>
<script type="text/javascript" src="/js/ajax-dynamic-list.js"></script>

<script>
function launchhistory(numcircuit){
  //alert(numcircuit);
  var tmp = 'exercisename' + numcircuit;
  var exercisename = document.getElementById(tmp).value;
  //alert(exercisename);
  window.open("<?php echo '/admin.php/admin/history/user_id/'.$user_id.'/exercisename/'; ?>" + exercisename);
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
      <th colspan=3><font size=+2><?php echo ucwords($row['user_firstname']." ".$row['user_lastname']); ?></font></th>
      <tr align=center>
        <td colspan=3><font size=+1> Change this Workout Day to:
         <?php echo form_tag('admin/moveexercise', array('style'=>'margin:0;padding:0; display:inline;', 'post'=>'true')) ?>
        <input type=hidden name=user_id value='<?php echo $user_id ?>'>
        <input type=hidden name=type value='1'>
        <input type=hidden name=newtype value='2'>
        <input type=hidden id=workoutdate name='workoutdate' value='<?php echo $workoutdate; ?>'>
        <input type="submit" name="workout" value="Cardio" onclick="return Confirm();">
        </form>
        &nbsp; &nbsp;
        <?php echo form_tag('admin/moveexercise', array('style'=>'margin:0;padding:0; display:inline;', 'post'=>'true')) ?>
        <input type=hidden name=user_id value='<?php echo $user_id ?>'>
        <input type=hidden name=type value='1'>
        <input type=hidden id=workoutdate name='workoutdate' value='<?php echo $workoutdate; ?>'>
        <input type=hidden name=newtype value='3'>
        <input type="submit" name="workout" value="Rest" onclick="return Confirm();">
        </form>
        </font>
        </td>
      </tr>
      
    </table>
<br><br>
    <div id=resistence style="display: block"><?php
    echo form_tag('admin/updatecircuit');


    //MINI CARDIO
    for($a=1; $a < 4; $a++){
      //THREE SETS OF IMAGES !

      //${"p_item{$item}"} = "value of this var";
      //echo $tmp."*****";
      
    	//if($minicardio["image$a"] == $value)
      	
      	
      foreach($cardio_files as $key => $value){
		//echo $minicardio["image$a"]." ".$value."<br>";
		
      	if(trim($minicardio["image$a"]) == trim($value))
          ${"cardio_list$a"} .= "<option value='$value' selected>$value</option>";
        else
          ${"cardio_list$a"} .= "<option value='$value'>$value</option>";
      }

    }


    //WARMUP CARDIO
    for($a=1; $a < 4; $a++){
      //THREE SETS OF IMAGES !

      foreach($cardio_files as $key => $value){

        if($warmup_cardio["image$a"] == $value)
        ${"warmup_cardio_list$a"} .= "<option value='$value' selected>$value</option>";
        else
        ${"warmup_cardio_list$a"} .= "<option value='$value'>$value</option>";

      }

    }

    //print_r($resistenceinfo);
    //print_r($minicardio);


    ?>

    <table border=0 width=75%>
      <tr align=center>
        <td colspan=4>
        <h1>Resistence Workout</h1>
        </td>
      </tr>
    </table>

<table border=1 width=34% cellpadding=3 cellspacing=0>
<tr><td>
    <table>
      <tr>
        <td colspan=3 align=center><font size=+1>Mini Cardio</font></td>
      </tr>
      <tr>
        <td><input type=hidden name=user_id value='<?php echo $user_id ?>'>
        <input type=hidden name=totalrows value='45'> Number of Minutes <input
          type=text name=numberofmin
          value='<?php echo  $minicardio['numberofmin'] ?>' size=4></td>
        <td>Pace <input type=text name=pace
          value='<?php echo $minicardio['pace'] ?>' size=4></td>
          <td>&nbsp;</td>
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
    </table>
  </td>
  </tr>
</table>

    <br>
    <br>
   <table border=1 width=34% cellpadding=3 cellspacing=0>
  <tr><td>
    <table>
      <tr>
        <td colspan=3 align=center><font size=+1>Warm Up Cardio</font></td>
      </tr>
      <tr>
        <td>Number of Minutes <input type=text name=wu_numberofmin
          value='<?php echo $warmup_cardio['numberofmin'] ?>' size=4></td>
        <td>Pace <input type=text name=wu_pace
          value='<?php echo  $warmup_cardio['pace'] ?>' size=4></td>
      </tr>
      <tr>
        <td>Cardio Image #1 <select name=wu_image1>
        <?php echo $warmup_cardio_list1 ?>
        </select></td>
        <td>Cardio Image #2 <select name=wu_image2>
        <?php echo $warmup_cardio_list2 ?>
        </select></td>
        <td>Cardio Image #3 <select name=wu_image3>
        <?php echo $warmup_cardio_list3 ?>
        </select></td>
      </tr>
    </table>
  </td>
  </tr>
</table>

    <br>
    <br>

    <table border=0 width=100%>
      <tr>
        <td>Workout Date <input type=text id=workoutdate_id name='workoutdate' value='<?php echo $workoutdate; ?>' maxlength=10 size=10 readonly>
         <input	type="reset" id="calendarbutton" value=" ... " onclick="return showCalendar('workoutdate_id', '%Y-%m-%d');">
          <script type="text/javascript">
            Calendar.setup(
              {
                inputField  : "workoutdate_id",         // ID of the input field
                ifFormat    : "%Y-%m-%d",    // the date format
                button      : "calendarbutton"       // ID of the button
              }
            );
    </script></td>
        <td>
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

        </td>
      </tr>
    </table>
    <br>
    <br>

    <table border=1 width=100%>

    <?php

    //print_r($exgraphic_files);



    for($a=0; $a < 45; $a++){

      //echo $resistenceinfo[$a]['exgraphic'];
      /*
      $sets = ${"sets$a"};
      $weights = ${"weights$a"};
      $reps = ${"reps$a"};
      $removerow = ${"removerow$a"};*/
      //$sets = $sess['sets'][$a];

      foreach($exgraphic_files as $key => $value){
        if($value == $resistenceinfo[$a]['exgraphic'])
        $graphiclist = "<option value='$value' selected>$value</option>";
        else
        $graphiclist = "<option value='$value'>$value</option>";
      }

      if( ($a % 2) == 0)
      $color = "lightblue";
      else
      $color = "white";



      $selectitems = "";
     // $exercise_auto_complete = "";
       //use_helper('Javascript');

     /* for($b=0; $b < count($exerciselist); $b++){

        if($exerciselist[$b]['exercisename'] == $resistenceinfo[$a]['exgraphic']){
          //$selectitems .= "<option value=\"{$exerciselist[$b]['exercisename']}\" selected>{$exerciselist[$b]['categoryname']} {$exerciselist[$b]['exercisename']}</option>";
          $exercise_auto_complete = input_auto_complete_tag("exercisename$a",$exerciselist[$b]['location']."-".$exerciselist[$b]['categoryname'].":".$exerciselist[$b]['exercisename'] , 'admin/autocomplete',array('autocomplete' => 'off'), array('use_style' => 'off'));
//echo $resistenceinfo[$a]['exgraphic']."***".$exerciselist[$b]['exercisename'];

      }*/

     /* if($exercise_auto_complete == "")
      $exercise_auto_complete = input_auto_complete_tag("exercisename$a", '', 'admin/autocomplete',array('autocomplete' => 'off'), array('use_style' => 'off'));
*/

      //<select id=\"countrySelectDropdown$a\" acdropdown=true style=\"width:300px;\" autocomplete_complete=\"false\" autocomplete_onselect=\"alertSelected\" name=exercisename$a>

      //$historyuserlink = link_to('History of User', 'admin/history?user_id='.$user_id."exercisename=", array('target'=>'_new'));

      $historyuserlink = "<a href='#' onclick=\"launchhistory($a); \">History of User</a>";

      for($b=0; $b < count($exerciselist); $b++){
        if($exerciselist[$b]['exercisename'] == $resistenceinfo[$a]['exgraphic'])
          $catname = $exerciselist[$b]['categoryname'];

      }

      if($resistenceinfo[$a]['exgraphic']!="")
       $exercisename = $catname.":".$resistenceinfo[$a]['exgraphic'];
        else
       $exercisename = "";

      echo "
      <tr bgcolor='$color'>
      <td>
      $historyuserlink
      </td>
      <td>Circuit #<input type=text size=4 id='circuit_$a' name=circuit$a value='{$resistenceinfo[$a]['circuit']}'></td>
	
      <td>
      Exercise:
        <input type=text name='exercisename$a' id='exercisename$a' onkeyup=\"ajax_showOptions(this,'getExercisenames',event, '/admin.php/admin/ajax_exercisenames')\" size=40 value='{$exercisename}'>
      <input type=button value='C' name=clearexname onClick=\"getElementById('exercisename$a').value='';\">
      </div>
      </td>
      <td>
      <input type=hidden name=resistanceid$a value='{$resistenceinfo[$a]['id']}'>
      Sets <input type=text name=sets$a value='{$resistenceinfo[$a]['sets']}' size=4>
      </td>
      <td>
      Reps <input type=text name=reps$a value='{$resistenceinfo[$a]['reps']}' size=4>
      </td>
      <td>
      Resistence <input type=text name=weights$a value='{$resistenceinfo[$a]['weights']}' size=4>
      </td>
      <td>Sort<input type=text size=4 name=sort$a value='{$resistenceinfo[$a]['sortnumber']}'></td>
      <td align=center> REMOVE <input type=checkbox name=remove$a> </td>
      </tr>
      ";

    }

    ?>
      <tr>
        <td colspan=3><input type=submit name=addrow value='Add Row'
          disabled></td>
      </tr>
      <tr>
        <td width=100% colspan=3>
        <div id="newrow">

        </td>
        </div>
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
    echo submit_tag('Save'); ?>
    </form>


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
