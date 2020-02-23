<?php


$tmp = file_get_contents("http://www.menshealth.com/download/");
$tmp = strip_tags($tmp);


$tmp = str_replace("Men's Health", "Virtual Fitness Coach", $tmp);
$tmp = str_replace("\n", " ", $tmp);
$tmp = str_replace("\r", " ", $tmp);
$tmp = str_replace("|", " ", $tmp);
$tmp = html_entity_decode($tmp);
$tmp = htmlspecialchars_decode($tmp);
echo $tmp;


?>