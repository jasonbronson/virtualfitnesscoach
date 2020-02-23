<?php

header('Content-type: application/xml');
echo "
<DATARESULTS>\n";

for($a=0; $a < 99; $a++){

  $tmp = rand(9,923383);
  echo "<SELECT_ITEM code='$a'>$tmp$a</SELECT_ITEM>\n";


}
echo "
</DATARESULTS>\n
";





?>
