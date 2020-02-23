<?php
  $array  = file('2500.csv');
  foreach($array as $key => $value){

    if(strpos($value, "type"))
      continue;

    $data = explode(",", $value);
    $title = $data[0];
    $portion = $data[1];
    $img = $data[2];
    $cal = $data[3];
    $type = $data[4];

    $swf = str_replace(".jpg",".swf",$img);


   /* if(stripos($title, "meal")){
      switch($type){
        case "dm":
      $xmltype = "<dinner>";
      $xmltype_e = "</dinner>";
          break;

      }

    }*/


  $save .= "
  <itemdata>
  <title>$title</title>
  <imgsource>$img</imgsource>
  <serving>$portion</serving>
  <cal>$cal</cal>
  <swf>$swf</swf>
  <type>$type</type>
  </itemdata>
  ";

    //print_r($data);

  }

  echo "
  <root>
  $save
  </root>
  ";

?>