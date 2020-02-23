<head>
<style>
body {
scrollbar-arrow-color: #FFFBF7;
scrollbar-3dlight-color: #FFFCF9;
scrollbar-darkshadow-color: #660000;
scrollbar-face-color: #51638b;
scrollbar-highlight-color: #E0D5D5;
scrollbar-shadow-color: #660000;
}
</style>
</head>
<body>
<?php

/*
$userid = $sf_user->getAttribute('user_id');

$searchdate  = $sf_user->getAttribute('searchdate');
$query = "SELECT * FROM fitness_exercise_cardio where user_id='{$userid}' and cardiodate='$searchdate'";
echo $query;
$res_cardio = mysql_query( $query , $db );

$row = mysql_fetch_assoc($res_cardio);
*/

//var_dump($row);
  $exclude = array(".gif","_",".jpg",".png",".jpeg");


$numofmin = $row['numberofmin'];
$heartrate = $row['maxheartrate'];

$image1 = $row['image1'];
$image2 = $row['image2'];
$image3 = $row['image3'];

?>
<table border=0 width=100% height=600px>
<tr>
<td>

<?php echo
"<table border=0 width=100% height=100%>
<tr align=center>
<td valign=center><img src='/uploads/graphic/{$image1}' width=100px hieght=80px> <br> ".str_replace($exclude,' ',$image1)."</td>
</tr>
<tr align=center><td valign=center>-OR-</td> </tr>
<tr align=center>
<td valign=center><img src='/uploads/graphic/{$image2}' width=100px hieght=80px> <br> ".str_replace($exclude,' ',$image2)."</td>
</tr>
<tr align=center><td valign=center>-OR-</td> </tr>
<tr align=center>
<td valign=center><img src='/uploads/graphic/{$image3}' width=100px hieght=80px> <br> ".str_replace($exclude,' ',$image3)."</td>
</tr>
<tr>
</table>
";
?>
</td>
<td rowspan=6>
<table border=0 width=100%>
<tr>
    <td valign=center align=center> Number of Minutes: <?php echo $numofmin; ?> <br><br><br> % of Max Heart Rate: <?php echo $heartrate; ?> </td>
</tr>
</table>

</td>
</tr>
</table>