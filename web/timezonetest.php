<?php

//echo "CURRENT TIME EASTERN ".date("H:i");
$timezone="America/Los_Angeles";
date_default_timezone_set("$timezone");
echo "$timezone ".date("H:i:s")."\n";
die();


//echo "Set timezone to America/New_York";
/*timezone("America/Los_Angeles");
timezone("America/New_York");
timezone("America/Nome");
timezone("America/Indiana/Marengo");

function timezone ($timezone){
putenv ('GMT='.$timezone);
echo "$timezone ".date("H:i:s")."\n";
}

echo " \n";
*/
?>