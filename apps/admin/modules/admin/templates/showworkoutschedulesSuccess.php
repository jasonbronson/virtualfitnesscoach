<br><br>
<br><br>
<div align=center>
<h1>Show Workout's Scheduled from Today to Future (All Users)</h1>
<br>
<table border=1 width=80%>
  <tr>
    <th>Username</th>
    <th>Workout Date</th>
    <th>Workout Type</th>

  </tr>

<?php

    for($a=0; $a < count($row); $a++ ){

     $workoutdate = date("m-d-Y" , strtotime($row[$a]['workoutdate']));

      //last scheduled workout date
      $lastsetdate = $scheduleend[$a]['workoutdate'];
//print_r($row);

      //USER INFO FROM DATABASE
      $name = $row[$a]['user_firstname']." ".$row[$a]['user_lastname'];
      $user_id =$row[$a]['user_id'];

    switch($row[$a]['workouttype']){
      case 1:
        $type="Resistence Day";
      //  $modulename = "_resistence";
      break;
      case 2:
        $type="Cardio Day";
       // $modulename = "_cardio";
      break;
      case 3:
        $type="Rest Day";
      //  $modulename = "_rest";
      break;

    }

      //BUTTONS
      //$submit =  button_to('Set New Schedule', 'admin/setschedule?user_id='.$id);
    //  $updateschedule = button_to('Update a Schedule', "admin/updateschedule$modulename?user_id=$user_id&workoutdate=$workoutdate" );
   $change =  button_to("Print Workout Day ", "admin/showworkoutschedulesdetail?user_id=$user_id&workoutdate={$row[$a]['workoutdate']}");

       echo "<tr align=center>
       <td>$name</td>
       <td>$workoutdate</td>
       <td>$type</td>
     <td>$change</td>
     </tr>";

  }

?>

</table>
