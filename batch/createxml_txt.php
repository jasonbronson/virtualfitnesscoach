<?php

$x=1000;
//1000 to 3K calories
while($x < 3001){

//for($x=1000; $x < 3101; $x++){
	//echo $x."\n";
	
//2500 SET MANUELLY
$dailycal = $x;

$row = 1;
echo "OPENING $x.csv \n";

$handle = fopen("$x.csv", "r");
while (($data = fgetcsv($handle, 7000, ",", '"')) !== FALSE) {
$num = count($data);

    $row++;

      $title = $data[0];
      $portion = $data[1];
      $img = $data[2];
      $cal = $data[3];
      $type = $data[4];
      $swf = str_replace(".jpg", ".swf", $img);
        //echo $data[$c] . "\n";
      
      if($title != "" && $portion != "")
      $query = "insert into nutrition_cal set title='$title', portion='$portion', image='$img', calories='$cal', type='$type', swf='$swf', dailycal='$dailycal'";
      $count = count(explode("'", $query))."\n";
      if($count > 15)
        die("ERROR MORE then 13 slashes !");

        $query_array[] = $query;
        echo "$query\n";

}



$link = mysql_connect("localhost","root");
if(!$link)
  die("Error");

  mysql_select_db("tannerl_test1");


foreach($query_array as $key=> $value){
  echo $value."\n";
  $result = mysql_query($value);
  if(!$result)
    die("Error ".mysql_error($link));
}
mysql_free_result($result);


//}

	$x = $x + 100;
}
?>