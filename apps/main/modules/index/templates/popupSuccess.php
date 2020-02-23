<h1>Exercise Example</h1>
<?php
//print_r($row);


?>

<table border=0>
<tr><td><?php echo $row['exercisename']; ?></td> </tr>
<!-- tr><td><img src='/uploads/graphic/<?php echo $row['exercisefile']; ?>'></td></tr-->
<tr>
<td>
<?php

for($a=1; $a < 4; $a++){

  if($row['popupvideo'.$a] != "")
  echo '
  <object width="550" height="400">
<param name="movie" value="/uploads/graphic/popup/'.$row['popupvideo'.$a].'">
<embed src="/uploads/graphic/popup/'.$row['popupvideo'.$a].'" width="550" height="400">
</embed>
';

  /*
echo "
<td>
<script src=\"/js/AC_RunActiveContent.js\" type=\"text/javascript\"></script>
    <script type=\"text/javascript\">
    AC_FL_RunContent('codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0',
    'width','250','height','400','id','Movie1','name','Movie1',
    'movie','uploads/graphic/popup/{$row['popupvideo'.$a]}','src','uploads/graphic/popup/{$row['popupvideo'.$a]}',
    'quality','high','bgcolor','#FFFFFF','loop','false','menu','false',
    'pluginspage','http://www.macromedia.com/go/getflashplayer');
    </script>
</td>
";*/

}
?>
</td></tr>
<tr>
<td><?php echo $row['popupdescription']; ?></td>
</tr>
</table>