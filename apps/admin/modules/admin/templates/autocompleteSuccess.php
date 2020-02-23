<ul>
<?php

$exlist_count = count($exlist);
 for($b=0; $b < $exlist_count; $b++){

  echo "<li class=tmp><font color=black>{$exlist[$b]['location']}-{$exlist[$b]['categoryname']}:{$exlist[$b]['exercisename']}</font></li> \n";
}
?>
</ul>