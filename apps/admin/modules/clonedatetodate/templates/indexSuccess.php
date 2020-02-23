<style type="text/css">
@import url(/css/calendar-blue.css);
</style>
<style>
 @import url(/css/dropdown.css);
</style>

<style>
.clonedatetodate_list ol li {
  list-style: none;
  padding: 20px;
  margin: 8px;
}
.clonedatetodate_list{
	border-width: 0px;
	border-style: solid;
	border-color: red;
	width: 400px;
	text-align: left;
	color: black;
}
</style>

<script type="text/javascript" src="/js/ajax.js"></script>
<script type="text/javascript" src="/js/ajax-dynamic-list.js"></script>

<!-- import the calendar script -->
<script type="text/javascript" src="/js/calendar.js"></script>
<!-- import the language module -->
<script type="text/javascript" src="/js/lang/calendar-en.js"></script>
<script type="text/javascript" src="/js/calendar-setup.js"></script>

<div align="center">
	<h1>Clone DATE to DATE of a Users Workout Schedule to a New User</h1>
	
<div align="center" class="clonedatetodate_list">
<?php
//EXECUTE PARAMS
echo form_tag('clonedatetodate/index');
?>
<ol>
<li><label for="">Clone Date FROM:</label> <input type=text id=workoutdate_from name='workoutdate_from' value='' maxlength=10 size=10 readonly>
          <input type="reset" id="calendarbutton1" value=" ... " onclick="return showCalendar('workoutdate_from', '%Y-%m-%d');">
          <script type="text/javascript">
            Calendar.setup(
              {
                inputField  : "workoutdate_from",         // ID of the input field
                ifFormat    : "%Y-%m-%d",    // the date format
                button      : "calendarbutton1"       // ID of the button
              }
            );
          </script>
          </li>
          
<li><label for="">Clone Date TO:</label> <input type=text id=workoutdate_to name='workoutdate_to' value='' maxlength=10 size=10 readonly>
          <input type="reset" id="calendarbutton2" value=" ... " onclick="return showCalendar('workoutdate_to', '%Y-%m-%d');">
          <script type="text/javascript">
            Calendar.setup(
              {
                inputField  : "workoutdate_to",         // ID of the input field
                ifFormat    : "%Y-%m-%d",    // the date format
                button      : "calendarbutton2"       // ID of the button
              }
            );
          </script>
          </li>
          
<li><label for="">Clone FROM User:</label> 
<input type=text name='clonefromuser' id='clonefromuser' onkeyup="ajax_showOptions(this,'getUsers',event, '/admin.php/clonedatetodate/ajax_getusers')" size=40 value='' autocomplete="off">
<input type=hidden name='clonefromuser_hidden' id='clonefromuser_hidden'>
<?php /*foreach($userlist as $key => $value){
              $tmp .= "<option value='{$value['user_id']}'>".$value['user_lastname']." ".$value['user_firstname']."</option>";
           }

           echo "<select name=user_id>$tmp</select>";*/
          ?>
          
       </li>   
<li><label> Clone to User:</label>
    <?php
/*
    $tmp = "";
    foreach($userlist as $key => $value){
              $tmp .= "<option value='".$value['user_id']."'>".$value['user_lastname']." ".$value['user_firstname']."</option>";
           }

           echo "<select name=newuser_id>$tmp</select>";*/
          ?>
<input type=text name='clonetouser' id='clonetouser' onkeyup="ajax_showOptions(this,'getUsers',event, '/admin.php/clonedatetodate/ajax_getusers')" size=40 value='' autocomplete="off">
<input type=hidden name='clonetouser_hidden' id='clonetouser_hidden'>
          
</li>
          
<li><label>Begin Clone on this Day</label> <input type=text id=startworkoutdate name='startworkoutdate' value='<?php echo $workoutdate; ?>' maxlength=10 size=10 readonly>
          <input type="reset" id="calendarbutton3" value=" ... " onclick="return showCalendar('startworkoutdate', '%Y-%m-%d');">
          <script type="text/javascript">
            Calendar.setup(
              {
                inputField  : "startworkoutdate",         // ID of the input field
                ifFormat    : "%Y-%m-%d",    // the date format
                button      : "calendarbutton3"       // ID of the button
              }
            );
          </script></li>

<li><label>**Warning Cannot be Reversed **</label>
<input type=submit name=submit value='Clone'> </li>
</ol>
<?php echo $err ?>
</form>
</div>
</div>