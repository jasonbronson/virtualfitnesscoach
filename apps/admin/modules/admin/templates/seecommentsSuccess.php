.
<div align=center>

Current Time on the Server is <?php echo date("m-d-Y h:i A"); ?><br><br>


 <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
      id="chatprogram" width="820" height="750"
      codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">
      <param name="movie" value="/chatprogram-debug/chatprogram.swf" />
      <param name="quality" value="high" />
      <param name="bgcolor" value="#869ca7" />
      <param name="allowScriptAccess" value="sameDomain" />
      <embed src="/chatprogram-debug/chatprogram.swf" quality="high" bgcolor="#869ca7"
        width="820" height="750" name="chatprogram" align="middle"
        play="true"
        loop="false"
        quality="high"
        allowScriptAccess="sameDomain"
        type="application/x-shockwave-flash"
        pluginspage="http://www.adobe.com/go/getflashplayer">
      </embed>
  </object>



<?php return ?>



<table border=1 cellspacing=3 cellpadding=2>
<th>Comment</th>
<th>Workout Type</th>
<th>Date</th>
<th></th>

<?php
//print_r($comments_array);
for($a=0; $a< count($comments_array); $a++){

   switch($comments_array[$a]['workouttype']){
      case 1:
        $workouttype = "resistence";
        break;
      case 2:
        $workouttype = "cardio";
        break;
      case 3:
        $workouttype = "rest";
        break;
      case 4:
        $workouttype = "Nutrition";
        break;

    }

  $id = $comments_array[$a]['user_id'];
  $button = button_to('Go Directly to Comments', 'admin/comments?user_id='.$id);
  $date = date("m-d-Y h:i A", strtotime($comments_array[$a]['commentdate']));
  echo "<tr>
        <td>{$comments_array[$a]['comment']}</td>
        <td> {$workouttype}</td>
          <td> {$date} ServerTime</td>
      <td>$button</td>
          </tr>";
}

?>
</table>