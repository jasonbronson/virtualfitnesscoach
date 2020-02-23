<br><br><br><br><br><br>
<div align=center>
<h1>Dashboard Center</h1>
<table border=0>
<tr>
<td>
<?php

$button_comments = button_to('See comments','admin/seecomments?user_id=0');

if($commentsawaiting > 0 )
      echo "<div align=center><font color=red>You have $commentsawaiting COMMENTS awaiting <a href='/admin.php/admin/seecomments?user_id=0'>See Comments</a> </font></div>";


//echo "<pre>";
//print_r($feedback);

$countreports = count($reports);

if(count($reports) > 0 ){
      echo "<div align=center><br><font color=red>You have $countreports Feedback Given</font> ";

      for($a=0; $a < $countreports; $a++){

        if($reports[$a]['toomuch'] != 0){
          $which = "too much ";
          $details = "Total Calories ".$feedback[$a]['totalcalories']." Suggested Calories ".$feedback[$a]['suggestedcalories']." Food Suggestions ".$feedback[$a]['foodsuggestions'];
        }
        if($reports[$a]['toolittle']!=0){
          $which = "too little ";
          $details = "Total Calories ".$feedback[$a]['totalcalories']." Suggested Calories ".$feedback[$a]['suggestedcalories']." Food Suggestions ".$feedback[$a]['foodsuggestions'];
        }
        if($reports[$a]['tooeasy']!=0){
          $which = "too easy ";
          $details = "Exercise Name: ".$feedback[$a]['exgraphic']." Circuit: ".$feedback[$a]['circuit']." Sets: ".$feedback[$a]['sets']." Reps: ".$feedback[$a]['reps']." Weights: ".$feedback[$a]['weights'];
        }
        if($reports[$a]['toohard']!=0){
          $which = "too hard ";
          $details = "Exercise Name: ".$feedback[$a]['exgraphic']." Circuit: ".$feedback[$a]['circuit']." Sets: ".$feedback[$a]['sets']." Reps: ".$feedback[$a]['reps']." Weights: ".$feedback[$a]['weights'];
        }

    $date = date("m-d-Y h:i A", strtotime($reports[$a]['clickdate']));
//echo "<pre>";
 //   print_r($reports);
    $workoutdate = date("Y-m-d", strtotime($reports[$a]['clickdate']));
    $button_feedback = button_to('Go', 'admin/updateschedule_resistence?user_id='.$reports[$a]['user_id'].'&workoutdate='.$workoutdate);
    $button_resolved = button_to(' Resolved ', 'admin/dashboard?feedbackid='.$reports[$a]['id']);


      if( ($a % 2) == 0)
      $color = "lightblue";
      else
      $color = "white";

        $tmp .= "<tr bgcolor=$color> <td>{$reports[$a]['email']} <b>{$reports[$a]['user_firstname']}</b></td> <td>$which</td> <td>$button_feedback</td> <td>{$date}</td> <td>$button_resolved</td> <td>$details</td></tr>";
      }
}

if($tmp != "")
echo "<br> <br> <table border=0 width=100%> <th>User</th> <th>What</th> <th>&nbsp;</th> <th>Date Clicked</th> <th>Resolve Feedback</th> <th>Details</th>".$tmp."</table>";

if(count($needworkouts) > 0 ){

  echo "<bR><font color=red>The following Users need workouts scheduled ! </font><br>
  <table>
  <tr><td>User Email</td> <td></td> <td>Last set Workout Date</td></tr> ";


  for($a=0; $a< count($needworkouts); $a++){
  
  	if($needworkouts[$a]['lastsetdate'] != "")
  		$lastsetworkout = date("M-d-Y", strtotime($needworkouts[$a]['lastsetdate']));
  		
    echo "<tr><td>{$needworkouts[$a]['email']}</td> <td>".button_to('Show Workout list', "admin/schedulelist?user_id={$needworkouts[$a]['user_id']}")."</td> <td align=center>$lastsetworkout</td></tr>";
  }


  echo "</table>";
  //print_r($needworkouts);

}
?>
</font></div>
</td>
</tr>
</table>

