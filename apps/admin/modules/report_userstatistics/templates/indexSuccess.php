<div align=center>
<h1>User Statistics Report for company <?php echo $companyname ?></h1>
<br>
<table border=0 width=80% cellspacing=2 cellpadding=6>
  <tr>
    <th>Name</th>
    <th>Weight</th>
    <th>Chest</th>
    <th>Waist</th>
    <th>Arms</th>
    <th>Thighs</th>
    <th>Hips</th>
    <th>Resting Heart Rate</th>
    <th>Step Test</th>
    <th>Pushups</th>
    <th>Date Updated</th>
    <th></th>
  </tr>

<?php

    for($a=0; $a < count($row); $a++ ){

      if( ($a % 2) == 0){
        $colorvar = "lightblue";
      }else{
        $colorvar = "white";
      }


      
      $datetime = date("M-d-Y", strtotime($row[$a]['datetime']));
	  $fullname = $row[$a]['user_firstname']." ".$row[$a]['user_lastname'];
	  $id = $row[$a]['user_id'];
	  
	  if($userisolated == false)
      $statistics = button_to("View $fullname Only", "report_userstatistics/index?user_id=$id", array( "class" => "bluebtn"));
	  
       echo "<tr align=center bgcolor=$colorvar>
        <td>$fullname</td>
        <td>{$row[$a]['weight']}</td>
        <td>{$row[$a]['chest']}</td>
        <td>{$row[$a]['waist']}</td>
        <td>{$row[$a]['arms']}</td>
        <td>{$row[$a]['thighs']}</td>
        <td>{$row[$a]['hips']}</td>
        <td>{$row[$a]['restingheartrate']}</td>
        <td>{$row[$a]['steptest']}</td>
        <td>{$row[$a]['pushups']}</td>
        <td>$datetime</td>
        <td>$statistics</td>
          </tr>";

  }

?>

</table>