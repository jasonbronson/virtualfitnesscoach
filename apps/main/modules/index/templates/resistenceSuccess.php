<style>
body {
  scrollbar-arrow-color: #FFFBF7;
  scrollbar-3dlight-color: #FFFCF9;
  scrollbar-darkshadow-color: #660000;
  scrollbar-face-color: #51638b;
  scrollbar-highlight-color: #E0D5D5;
  scrollbar-shadow-color: #660000;
}
</style>
<?php

echo "<br><br> ";
//var_dump($row);

$circuitflag=1;
$totalrows = count($row);
$lastrow = $totalrows -1;

$warmup_orig_circuit = $row[0]['circuit'];
$aftercircuit_orig_circuit = $row[0]['circuit'];

for($a = 0; $a < $totalrows; $a++){

  $exclude = array(".gif","_",".jpg",".png",".jpeg");
  $graphicname = str_replace($exclude,' ',$row[$a]['exgraphic']);

  if($row[$a]['circuit'] == $circuitflag){
    $circuitheader = "<tr align=center bgcolor='#000000'><td><font color='white' size='+2'>Circuit {$row[$a]['circuit']}</font></td></tr>";
    $circuitflag = $circuitflag +1;
  }else{
    $circuitheader = "";
  }

 $b = $a+1;

  if($a==0){ // || $warmup_orig_circuit != $row[$a]['circuit']){


  //WARMUP CARDIO
    $numofmin = $warmupcardio_array[0]['numberofmin'];
    $heartrate = $warmupcardio_array[0]['maxheartrate'];

    $image1 = $warmupcardio_array[0]['image1'];
    $image2 = $warmupcardio_array[0]['image2'];
    $image3 = $warmupcardio_array[0]['image3'];

    //REMOVED THIS PER MEL Nov 2nd 2008
    //for Circuit {$row[$a]['circuit']}
    echo "
    <br><br>
    <table border=0 width=100% bgcolor=#E6E6E6>
    <tr>
    <th>Warm Up Cardio </th>
    </tr>
    </table>
    <table border=0 width=100% bgcolor=#E6E6E6>
    <tr>
    <td valign=bottom><img src='/uploads/graphic/{$image1}' width=100px hieght=80px> <br> ".str_replace($exclude,' ',$image1)."</td>
    <td valign=center>-OR-</td>
    <td valign=bottom><img src='/uploads/graphic/{$image2}' width=100px hieght=80px> <br> ".str_replace($exclude,' ',$image2)."</td>
    <td valign=center>-OR-</td>
    <td valign=bottom><img src='/uploads/graphic/{$image3}' width=100px hieght=80px> <br> ".str_replace($exclude,' ',$image3)."</td>
    <td valign=center align=center> Number of Minutes: $numofmin <br><br><br> % of Max Heart Rate: $heartrate </td>
    </tr>
    </tr>
    </tr>
    </table>";


        $warmup_orig_circuit = $row[$a]['circuit'];
  }


echo "
  <table border=0 width=100%>
  <th colspan=6 align=center>
  <table border=1 width=150px>
    $circuitheader
    </table>
  </th>
  <tr align=center>
  <td rowspan=0 width=200px>
    <a href='/main_dev.php/index/popup?exgraphic={$row[$a]['exgraphic']}' target='_new'><img src='/uploads/graphic/{$row[$a]['exercisefile']}' border=0></a>
    <br>{$graphicname}
  </td>
  <td>{$row[$a]['sets']} sets of {$row[$a]['reps']} reps using {$row[$a]['weights']} lbs.</td>

  <td>Exercise Feedback <br>
  <table border=0>
  <tr>
  <td>
  <form>
     <input type=hidden name=user_id value='{$row[$a]['user_id']}'>
     <input type=hidden name=searchdate value='{$row[$a]['workoutdate']}'>
     <input type=hidden name=tooeasy value='true'>
     <input type=hidden name=what value='{$row[$a]['id']}'>
     <input type=submit name=feedback_tooeasy value='Too Easy'>
  </form>

  </td>
   <td>

  <form>
     <input type=hidden name=user_id value='{$row[$a]['user_id']}'>
     <input type=hidden name=searchdate value='{$row[$a]['workoutdate']}'>
     <input type=hidden name=toohard value='true'>
     <input type=hidden name=what value='{$row[$a]['id']}'>
 <input type=submit name=feedback_toohard value='Too Hard'></form>
   </td>
   </tr>
   </table>

  </td>
  </tr>
  </table>
  <table border=0 width=100%>
  <tr><td>&nbsp;</td></tr>
  <tr>
  <td colspan=7><hr size='1' width='90%'/></td>
  </tr>
  </table>
  <br>

";



 /*if($a == $lastrow){
  //  echo "COUNTER FLAG HERE !".$circuitcounter. " * ".$row[$a]['circuit'];
    $circuitcounter = $circuitcounter + 1;

  }*/


//echo " ** $a $lastrow **";
  //if($a == $lastrow || $showaftercircuit == "true"){




if($aftercircuit_orig_circuit != $row[$b]['circuit'] || $a == $lastrow){ //if this is the last row then its got to be end of circuit


   // if($a == $lastrow)
    //  echo "LASTROW";

     //if($orig_circuit != $row[$b]['circuit'] )
     //echo "Orig cirut not = this circuit";

   //echo "******* {$orig_circuit} **** {$row[$b]['circuit']}***";




 /* if($a == $lastrow || $row[$a]['circuit'] != 1){
    $aftercircuit = $row[$a]['circuit']; //last row dont subtract it
    echo "REACHED DONT SUBSTRACT $orig_circuit";
  }else{
    $aftercircuit = $row[$a]['circuit'] - 1;
    echo "REACHED SUBTRACT $orig_circuit";
  }*/


    echo "
    <table border=0 width=100% bgcolor=#E6E6E6>
      <tr>
        <th>After Circuit {$aftercircuit_orig_circuit} - Cardio</th>
      </tr>
    </table>
    ";


/*
    $query_minicardio = "SELECT * FROM fitness_exercise_minicardio where showdate=curdate() and userid='{$userid}' and circuit='{$circuitcounter}'";

    $results_minicardio = mysql_query( $query_minicardio , $db );
    $results_minicardio = mysql_fetch_assoc($results_minicardio);
*/
//echo "<pre>";
  //  var_dump($minicardio_array);
    $numofmin = $minicardio_array[0]['numberofmin'];
    $heartrate = $minicardio_array[0]['maxheartrate'];
    $image1 = $minicardio_array[0]['image1'];
    $image2 = $minicardio_array[0]['image2'];
    $image3 = $minicardio_array[0]['image3'];

    echo "
    <table border=0 width=100% bgcolor=#E6E6E6>
    <tr>
    <td valign=bottom><img src='/uploads/graphic/{$image1}' width=100px hieght=80px> <br> ".str_replace($exclude,' ',  $image1)."</td>
    <td valign=center>-OR-</td>
    <td valign=bottom><img src='/uploads/graphic/{$image2}' width=100px hieght=80px> <br>  ".str_replace($exclude,' ',  $image2)."</td>
    <td valign=center>-OR-</td>
    <td valign=bottom><img src='/uploads/graphic/{$image3}' width=100px hieght=80px> <br>  ".str_replace($exclude,' ',  $image3)."</td>
    <td valign=center align=center> Number of Minutes: $numofmin <br><br><br> % of Max Heart Rate: $heartrate </td>
    </tr>
    </tr>
    </tr>
    </table>


";

    $aftercircuit_orig_circuit = $row[$b]['circuit'];

  }



  if($row[$a]['circuit'] != $circuitcounter){
    //echo "COUNTER FLAG HERE !".$circuitcounter. " * ".$row[$a]['circuit'];
    $circuitcounter = $circuitcounter + 1;
    $showaftercircuit = "true";
    if($a != 0)
      $showcircuit = "true";

  }else{
    $showaftercircuit = "false";

  }



}
?>