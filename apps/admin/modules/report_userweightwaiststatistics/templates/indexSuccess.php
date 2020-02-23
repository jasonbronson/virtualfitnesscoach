<div align=center>
<h1>User Weight / Waist Statistics Report for company <?php echo $companyname ?></h1>
<br>
<table border=0 width=80% cellspacing=2 cellpadding=6>
  <tr>
    <th>Name</th>
    <th>Start Weight</th>
    <th>Current Weight</th>
    <th>Start Waist</th>
    <th>Current Waist</th>
    <th>Start Date</th>
    <th>Current Date</th>
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
	  
	  $min_date= date("m/d/Y", strtotime($row[$a]['min_date']));
	  $max_date= date("m/d/Y", strtotime($row[$a]['max_date']));
	  
	 /* if($userisolated == false)
      $statistics = button_to("View $fullname Only", "admin/report_userstatistics?user_id=$id", array( "class" => "bluebtn"));
	  */
       echo "<tr align=center bgcolor=$colorvar>
        <td>$fullname</td>
        <td>{$row[$a]['max_weight']}</td>
        <td>{$row[$a]['min_weight']}</td>
       
        <td>{$row[$a]['max_waist']}</td>
        <td>{$row[$a]['min_waist']}</td>
       
        <td>{$min_date}</td>
        <td>{$max_date}</td>
       
       
          </tr>";

  }

?>

</table>