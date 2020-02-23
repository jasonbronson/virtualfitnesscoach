<?php use_helper('Javascript') ?>
<head>
<style type="">
.RedBtn{
background-color: #FF6633;
border-color: #FF0000;
color: #FFFFFF;
}
</style>
</head>

<div align=center>. <?php
 ?>

<h1> </h1>
<table border=0 width=80%>
  <tr align=center>
    <td colspan=9><font size=+1>Workout Schedule List for <?php echo ucwords($userlist[0]['user_firstname']." ".$userlist[0]['user_lastname']); ?></font></td>
</tr>
<tr><td>
<?php echo button_to('Create New Workout', 'admin/setschedule?user_id='.$user_id) ?>

<br><br></td></tr>
<?php

//echo "<pre>";
//print_r($schedules);

$a=0;

foreach($schedules as $key => $value){

  $a = $a +1;
  if( ($a % 2) == 0){
        $colorvar = "lightblue";
      }else{
        $colorvar = "white";
      }


//   echo $value[0]['workoutdate'];
   switch($value['workouttype']){
     case "1":
       $type= "Resistence Day";
       $modulename = "_resistence";
       break;
     case "2":
       $type= "Cardio Day";
       $modulename = "_cardio";
       break;
     case "3":
       $type= "Rest Day";
       $modulename = "_rest";
       break;
   }

   $workoutdate = substr($value['workoutdate'], 0, 10);
   if($workoutdate != "0000-00-00")
       $value['workoutdate'] = date("M-d-Y", strtotime(substr($workoutdate, 0, 10)));
  else
      $value['workoutdate'] = $workoutdate;

   $change =  button_to("Update Workout", "admin/updateschedule$modulename?user_id=$user_id&workoutdate=$workoutdate");
   $update_nutrition =  button_to("Update Nutrition", "nutritionupdate/index?user_id=$user_id&validdate=$workoutdate");
   $clone =  button_to("Clone Entire Workout", "admin/clone?user_id=$user_id&workoutdate=$workoutdate&workouttype={$value['workouttype']}");
   $deleteday =  button_to("DELETE Workout", "admin/deleteworkout?user_id=$user_id&workoutdate=$workoutdate&workouttype={$value['workouttype']}", array( "class" => "RedBtn", "confirm"=>"You cannot Reverse this and it is Dangerous !\n Are you Sure?") );

   if($value['totalrows']>0)
     $n_disable = "";
     else
     $n_disable = "disabled";

   $clonenutrition =  button_to("Clone Nutrition Only", "admin/clone?nutritiononly=true&user_id=$user_id&workoutdate=$workoutdate&workouttype={$value['workouttype']}", array("$n_disable"=>$n_disable));


   echo "<tr bgcolor=$colorvar><td>$type</td>
   <td>{$value['workoutdate']}</td>
   <td>$change</td>
   <td>$update_nutrition</td>
   <td>$clone</td>
   
   <td>$deleteday</td>
   </tr>";



  }

?>


        </td>
      </tr>
    </table>

</form>


</div>
