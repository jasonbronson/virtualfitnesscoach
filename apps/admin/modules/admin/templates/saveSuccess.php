<br><br>
<h1>
<?php

if($save=="Success"){

  echo button_to('Clone this Day', 'admin/clone?user_id='.$userid.'&workoutdate='.$workoutdate)." <br><br>Save was successful <br><br>";
  echo link_to('RETURN to ScheduleList for User','admin/schedulelist?user_id='.$userid);
  
}else{
  echo "ERROR Saving Please see log files for further details and write down time and date or error to have jason search it";

}

?>
</h1>