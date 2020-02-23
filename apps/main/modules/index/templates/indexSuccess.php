<?php
//require_once $sf_web_dir.'/homepage/assessment/header_asm.php';
$sf_web_dir = sfConfig::get('sf_web_dir'); //also used below for nutrition include !
//include_once ($sf_web_dir.'/nutrition/menu.php');
?>
<div align="left">
<table border="0" width="70%">
<tr>
<?php

//echo $worktype_num."************";

  if($worktype_num < 4 && $viewdateworkout == date("Y-m-d") && $worktype_num != "a"){
    echo "<td align='left'><font size='+2'>Today's Workout is <font color='#cf1519'>{$worktype_name}</font>.</font></td>";
  }
  if($worktype_num == 4 && $viewdateworkout == date("Y-m-d")){ //must be nutrition
    echo "<td align='left'><font size='+2'>Today's <font color='#cf1519'>{$worktype_name}</font></font></td>";
  }
  if($viewdateworkout != date("Y-m-d") && $worktype_num < 5 ){ //must be FUTURE DATE
    if($futuredays_array['date'][0] == $viewdateworkout)
      $nextday_name = $futuredays_array['dayname'][0];
      else
      $nextday_name = $futuredays_array['dayname'][1];

    echo "<td align='left'><font size='+2'>{$nextday_name}'s workout is <font color='#cf1519'>{$worktype_name}</font></font></td>";
  }
  if($worktype_num == 5){
    echo "<td align='left'><font size='+2'><font color='#cf1519'>{$worktype_name}</font>.</font></td>";
  }
  

?>
<td>
<div align="left">


<?php
//ONLY SHOW IF WORKOUT IS BEING CLICKED
if($worktype_num == 1): ?>
<button onclick="window.open('/main_dev.php/index/resistence?user_id=<?php echo $user_id; ?>&searchdate=<?php echo $viewdateworkout; ?>','mywindow','width=900,height=800, scrollbars=yes, toolbar=no, menubar=yes')" class="buttons">Print Workout</button></div> </td>
<?php endif; ?>

<td><?php //echo "<a href='/main_dev.php/index/logout'>Logout</a>" ?></td>
</tr>
</table>
</div>
<div align="left">

<?php
if($worktype_num == 4){
  //echo "********************* $sf_web_dir";
  //include_once $sf_web_dir.'/nutrition/nutrition.php';
  //echo "<iframe src =\"/main_dev.php/index/nutrition?user_id={$user_id}&searchdate={$viewdateworkout}\" width=\"100%\" scrolling='yes' height=\"620px\" frameborder='0'></iframe>";
  include_partial('nutrition');
//echo "<iframe src =\"http://advancedonsite.com\" width=\"100%\" scrolling='yes' height=\"620px\" frameborder='0'></iframe>";
  //NUTRITION

  return; //IF NUTRITION THEN RETURN
}

?>


<table border="0" width="100%">
<tr valign="middle">
<td width="70%" valign="top" align="right" height="670px">
<?php
//die($worktype_num."***");
switch($worktype_num)
{
  case 1:
 echo "<iframe src =\"/main_dev.php/index/resistence?user_id={$user_id}&searchdate={$viewdateworkout}\" width=\"100%\" scrolling='yes' height=\"100%\" frameborder='0'></iframe>";
  break;

  case 2:
 echo "<iframe src =\"/main_dev.php/index/cardio?user_id={$user_id}&searchdate={$viewdateworkout}\" width=\"100%\" scrolling='yes' height=\"100%\" frameborder='0'></iframe>";
  break;

  case 3:
 echo "<iframe src =\"/main_dev.php/index/rest?user_id={$user_id}&searchdate={$viewdateworkout}\" width=\"100%\" scrolling='yes' height=\"100%\" frameborder='0'></iframe>";
  break;

  case 4:
  //echo "<iframe src =\"/main_dev.php/index/nutrition?user_id={$user_id}&searchdate={$viewdateworkout}\" width=\"100%\" scrolling='yes' height=\"100%\" frameborder='0'></iframe>";
  break;

  case 5:
  echo "<iframe src =\"/main_dev.php/progressreport/index?user_id={$user_id}&searchdate={$viewdateworkout}\" width=\"100%\" scrolling='yes' height=\"100%\" frameborder='0'></iframe>";
  break;

  case 6:
    echo "<iframe src =\"/main_dev.php/motivation\" width=\"100%\" scrolling='yes' height=\"100%\" frameborder='0'></iframe>";
    break;

  case 7:
    echo "<iframe src =\"/nutrition/Education/index.php\" width=\"100%\" scrolling='yes' height=\"100%\" frameborder='0'></iframe>";
    break;

  case 8:
    //http://v3.rewardstep.com/b2r/ValidateLoginAction.do?userid=democ&pword=democ&programid=triex&varid=demo
    //http://v3.rewardstep.com/b2r/ValidateLoginAction.do?userid=lowesdemo&pword=lowesdemo&programid=lowes&varid=demo
    echo "<iframe src =\"http://v3.rewardstep.com/b2r/ValidateLoginAction.do?userid=democ&pword=democ&programid=triex&varid=demo\" width=\"100%\" scrolling='yes' height=\"100%\" frameborder='0'></iframe>";
    return;
    break;

  case 9:
    echo "<iframe src =\"/main_dev.php/connectwithothers\" width=\"100%\" scrolling='yes' height=\"100%\" frameborder='0'></iframe>";
    return;
    break;

  case 10:
    echo "<iframe src =\"/main.php/events\" width=\"100%\" scrolling='yes' height=\"100%\" frameborder='0'></iframe>";
    return;
    break;

  case "a":
    echo "<iframe src =\"/assessment.php/index?noheader=true\" width=\"100%\" scrolling='yes' height=\"640\" frameborder='0'></iframe>";
    return;
    break;
    

}

?>


</td>
<td valign="top" align="center" width="30%">
<?php

$swf = str_replace(".swf","", $swif);

if($swf == ""){
  //set default swif
  $swf = "waitingonworkout";

}


echo "
<script src=\"/js/AC_RunActiveContent.js\" type=\"text/javascript\"></script>
    <script type=\"text/javascript\">
    AC_FL_RunContent('codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0',
    'width','400','height','400','id','Movie1','name','Movie1',
    'movie','/uploads/swf/{$swf}','src','/uploads/swf/{$swf}',
    'quality','high','bgcolor','#FFFFFF','loop','false','menu','false',
    'pluginspage','http://www.macromedia.com/go/getflashplayer');
    </script>
";
?>
<div align="center">
<iframe src="/main_dev.php/index/comments?user_id=<?php echo $user_id; ?>&searchdate=<?php echo $viewdateworkout; ?>&type=<?php echo $workouttype; ?>" width="100%" scrolling="no" height="260px" frameborder="0" />
</div>
</td>
</tr>
</table>



<?php
//$sf_web_dir = sfConfig::get('sf_web_dir');

//require_once $sf_web_dir.'/homepage/assessment/footer_asm.php'; ?>
<div align="center">
Copyright © 2008 Virtual Fitness Coach
</div>
