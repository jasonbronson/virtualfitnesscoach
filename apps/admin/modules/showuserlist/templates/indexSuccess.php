<style type="">
.RedBtn{
background-color: #FF6633;
border-color: #FF0000;
color: #FFFFFF;
}

.bluebtn{
background-color: #3333CC;
border-color: #3355CC;
color: #FFFFFF;
}
</style>


<br><br>
<br><br>
<div align=center>
<h1>User List Schedule</h1>
<br>

<?php

/*print_r($assessment);
die();
*/
	$lastnamearrow = "<a href='?sort=lastname&direction=asc'><img src='/images/uparrow.png' width='10' height='10'>";
	if($sort == "lastname"){	
		if($direction == "desc")
		$lastnamearrow = "<a href='?sort=lastname&direction=asc'><img src='/images/uparrow.png' width='10' height='10'>";
		else
		$lastnamearrow = "<a href='?sort=lastname&direction=desc'><img src='/images/downarrow.png' width='10' height='10'>";
	}
	
	$setschedulearrow = "<a href='?sort=setschedule&direction=asc'><img src='/images/uparrow.png' width='10' height='10'>";
	if($sort == "setschedule"){	
		if($direction == "desc")
		$setschedulearrow = "<a href='?sort=setschedule&direction=asc'><img src='/images/uparrow.png' width='10' height='10'>";
		else
		$setschedulearrow = "<a href='?sort=setschedule&direction=desc'><img src='/images/downarrow.png' width='10' height='10'>";
	}
		
	

?>

<table border=0 width=80% cellspacing=2 cellpadding=6>
  <tr>
    <th>Customer ID </th>
    <th>Email / Name <?php echo $lastnamearrow ?> </th>
    <th>Auth Level</th>
    <th>Sign up Date </th>
    <th>Last Set Schedule <?php echo $setschedulearrow ?></a></th>
    <th>Set Schedule</th>
    <th>Show Schedule</th>
    <th>Become User</th>
    <th>User Comments</th>
    <th>Change Profile</th>
    <th>Assessment</th>
    <th>Statistics</th>
    <th>Remove User (dangerous)</th>
  </tr>

<?php

    for($a=0; $a < count($row); $a++ ){

      if( ($a % 2) == 0){
        $colorvar = "lightblue";
      }else{
        $colorvar = "white";
      }


      if($row[$a]['signupdate'] != "0000-00-00 00:00:00"){
          $signupdate = date("M-d-Y", strtotime($row[$a]['signupdate']));
      }else{
          $signupdate = "";
      }

      //last scheduled workout date
      //$lastsetdate = $scheduleend[$a]['workoutdate'];
      if($row[$a]['workoutdate'] != "")
      	$lastsetdate = date("m/d/Y", strtotime($row[$a]['workoutdate']));
      	else
      	$lastsetdate == "WARNING NO WORKOUT SET";
//print_r($row);

      //USER INFO FROM DATABASE
      $id = $row[$a]['user_id'];
      //$level = $row[$a]['level'];
      $name = $row[$a]['user_username'];
	  $fullname = $row[$a]['user_firstname']." ".$row[$a]['user_lastname'];
      if($lastsetdate == "WARNING NO WORKOUT SET"){
        $disable_update = "disabled";
      }else{
        $disable_update = "";
        if( strtotime($lastsetdate) < strtotime(date("m/d/Y")) )
          $OLD = "<font color=red>";
          else
          $OLD= "";
      }

      

      //BUTTONS
      $submit =  button_to('Create Workouts', 'admin/setschedule?user_id='.$id);
      $updateschedule = button_to('Show All Workouts', 'admin/schedulelist?user_id='.$id, array($disable_update=>''));
      //$activebutton = button_to(''.$level_type, 'admin/activeflag?user_id='.$id.'&level='.$level, array("target"=>"_new", "popup"=>"true"));
      $becomeuserbutton = button_to('Become User', 'admin/becomeuser?user_id='.$id, array("target"=>"_new", "popup"=>"true"));
      $commentsbutton = button_to("Comments", 'admin/comments?user_id='.$id);
      $changepasswordbutton = button_to("Change Profile", 'admin/changepassword?user_id='.$id);
      $deleteday =  button_to("DELETE USER", "admin/deleteuser?user_id=$id", array( "class" => "RedBtn", "confirm"=>"You cannot Reverse this and it is Dangerous !\n Do you realize it will wipe every comment, workout and existing data for this user? \n Are you Sure?") );
      $statistics = button_to("Statistics", "statistics/index?user_id=$id", array( "class" => "bluebtn"));
	  
      if (array_key_exists($id, $assessment)) 
      	$disable_assessment = "";
      	else
      	$disable_assessment = "disabled";
      
      $assessmentbutton = button_to("Assessment", "admin/assessment?user_id=$id", array( $disable_assessment=>''));
	  
       echo "<tr align=center bgcolor=$colorvar>
       <td>{$row[$a]['user_id']}</td>
       <td>{$row[$a]['email']} <br>($fullname)</td>
        <td>{$level_type}</td>
        <td>{$signupdate}</td>
        <td>$OLD {$lastsetdate}</font></td>
         <td>$submit </td>
         <td>$updateschedule</td>
         <td>$becomeuserbutton</td>
         <td>$commentsbutton</td>
          <td>$changepasswordbutton</td>
          <td>$assessmentbutton</td>
          <td>$statistics</td>
          <td> $deleteday</td>
          </tr>";

  }

?>

</table>
