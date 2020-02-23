<br><br>
<br><br>
<div align=center>
<h1>Show Workout Detail for <?php echo ucwords($exerciseinfo['user_username']);

 switch($row[0]['type']){
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
?></h1>
<br>
<?php echo link_to('Go BACK', 'admin/showworkoutschedules' ) ?>
<table border=0 width=80%>
  <tr>
    <th>Workout Type is <?php echo $type ?> on <?php echo date("m-d-Y", strtotime($row[0]['workoutdate'] )) ?></th>
  </tr>
</table>
<?php
//echo "<pre>";
//print_r($row);


if($row[0]['type'] == 1){

  echo "<table border=1>
      <tr>
      <td>Graphic Name</td>
      <td>Circuit</td>
      <td>Sets</td>
      <td>Reps</td>
      <td>Weights</td>
      <td>Exercise</td>
      </tr>
  ";
    for($a=0; $a < count($row); $a++ ){
      //USER INFO FROM DATABASE
    /*  $name = $row[$a]['user_firstname']." ".$row[$a]['user_lastname'];
      $user_id =$row[$a]['user_id'];
*/
      //BUTTONS
      //$submit =  button_to('Set New Schedule', 'admin/setschedule?user_id='.$id);
    //  $updateschedule = button_to('Update a Schedule', "admin/updateschedule$modulename?user_id=$user_id&workoutdate=$workoutdate" );
   //$change =  button_to("View Details ", "admin/showworkoutschedulesdetail?user_id=$user_id&workoutdate={$row[$a]['workoutdate']}");

       echo "<tr align=center>
        <td>{$row[$a]['exgraphic']}</td>
        <td>{$row[$a]['circuit']}</td>
        <td>{$row[$a]['sets']}</td>
        <td>{$row[$a]['reps']}</td>
        <td>{$row[$a]['weights']}</td>
        <td>{$row[$a]['exercise']}</td>

     </tr>";

  }
  echo "</table>";
}//end of type 1

?>

</table>
