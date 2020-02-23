<?php

echo shell_exec("rsync -avz --rsh='ssh -p2222' --exclude=lib/mysql.class.php /web/virtualgym/* jbronson@gembows.org:/home/jbronson/public_html/virtualfitnesscoach");


?>
