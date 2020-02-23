<?php use_helper('Javascript') ?><head>
<style type="text/css">@import url(/css/calendar-blue.css);</style>

</head>
<!-- import the calendar script -->
<script type="text/javascript" src="/js/calendar.js"></script>

<!-- import the language module -->
<script type="text/javascript" src="/js/lang/calendar-en.js"></script>
<script type="text/javascript" src="/js/calendar-setup.js"></script>




<div align=center>. <?php

 ?>

<style>
@import url( /css/dropdown.css );
</style>

</script> <script src="/js/mobrowser.js"></script> <script
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


 <div id=cardio style="display: block">

    <?php
echo form_tag('admin/addcircuitcardio');


foreach($swif_files as $key => $value){
  if($key > 1){
    if($selectedswif == $value)
      $swffiles .= "<option value='$value' selected>$value</option>";
     else
      $swffiles .= "<option value='$value'>$value</option>";
  }
}

$swiflist = "<select name=swif>
         <option value=''></option>
         $swffiles
         </select>";


foreach($cardio_files as $key => $value){
      $cardio_list .= "<option value='$value'>$value</option>";
  }
?>
    <table border=1 width=75%>
      <tr>
        <td colspan=3>&nbsp;</td>
      </tr>
      <tr align=center>
        <td colspan=4>Cardio Workout</td>
      </tr>
      <tr>
        <td><input type=hidden name=workouttype value="cardio">Number of Minutes <input type=text name=numberofmin></td>
        <td>Pace <input type=text name=pace></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
           <td>Cardio Image #1 <select name=image1><?php echo $cardio_list ?></select></td>
           <td>Cardio Image #2 <select name=image2><?php echo $cardio_list ?></select></td>
           <td>Cardio Image #3 <select name=image3><?php echo $cardio_list ?></select></td>
      </tr>
      <tr>
      <td align=center>Swif to Show <?php echo $swiflist ?></td>
      <td> Workout Date
          <input type=text id=workoutdate name='workoutdate' value='<?php echo $workoutdate; ?>' maxlength=10 size=10 readonly>
          <input type="reset" id="calendarbutton" value=" ... " onclick="return showCalendar('workoutdate', '%Y-%m-%d');">
      </td>
      </tr>
      <tr>
      <td colspan=3 align=center><input type=submit name=save value='Save'></td>
     </tr>
   </table>
    </form>
</div>