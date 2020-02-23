<table border=0 width=100%>
<tr>
<td>

<div align=center>
<?php 


foreach($row as $value){
	echo "<h1>Video {$value['week']}</h1>".$value['link']."<br>";
	
}

?>

</div>


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
