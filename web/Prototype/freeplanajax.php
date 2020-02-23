<?php



if ($_GET['gendervar'] =="" or $_GET['agevar'] =="" or $_GET['weightvar'] =="" or $_GET['goalweightvar'] =="" or $_GET['feetvar'] =="" or $_GET['inchesvar'] =="" or is_numeric($_GET['feetvar']) == "" or is_numeric($_GET['agevar']) == "" or is_numeric($_GET['weightvar']) == "" or is_numeric($_GET['goalweightvar']) == "" or is_numeric($_GET['inchesvar']) == ""){

echo "Please fill out the above form in its entirety using only numbers!";
 
} 
else{

	$weight_in_kilograms = $_GET['weightvar'] / 2.2;
	$height_in_inches = ($_GET['feetvar'] * 12) + $_GET['inchesvar'];
	$height_in_centimeters = $height_in_inches * 2.54;

	if ($_GET['gendervar'] =="male"){
	$bmr = (66 + (13.7 * $weight_in_kilograms ) + (5 * $height_in_centimeters ) - (6.8 * $_GET['agevar'] )) * $_GET['activityvar'];
	$bmr = $bmr + $_GET['goalvar'];
	echo "<span style='font-weight:bold;font-size:14px;display:block;'>Your Results:</span>";
	echo "To achieve your goal weight, you should consume <span style='color:#FF0000;font-weight:bold;'> " . round($bmr,0). " </span> <strong>calories per day.</strong>"; 
	echo "<br />";
	
	}
	  
	if ($_GET['gendervar'] =="female"){
	$bmr = (655 + (9.6 * $weight_in_kilograms ) + (1.8 * $height_in_centimeters ) - (4.7 * $_GET['agevar'] )) * $_GET['activityvar']; 
	$bmr = $bmr + $_GET['goalvar'];
	echo "<span style='font-weight:bold;font-size:14px;display:block;'>Your Results:</span>";
	echo "To achieve your goal weight, you should consume <span style='color:#FF0000;font-weight:bold;'> " . round($bmr,0). " </span> <strong>calories per day.</strong>"; 
	echo "<br />";
	
	}	
	
	if ($_GET['goalvar'] =="-500"){
		if ($_GET['goalweightvar'] == $_GET['weightvar']){
		echo "You are already at your Goal Weight. You should maintain your current daily calorie intake.";
		}
		
		if ($_GET['goalweightvar'] > $_GET['weightvar']){
		echo "If you wish to gain weight you should select weight gain as your goal.";
		}
		
		if ($_GET['goalweightvar'] < $_GET['weightvar']){
		
		$weight_diff = $_GET['weightvar'] - $_GET['goalweightvar'];
		
			if ($weight_diff <= 20){
				$weight_weeks = $weight_diff / 1.0;
			}
			if ($weight_diff >= 21 and $weight_diff <= 40 ){
				$weight_weeks = $weight_diff / 1.5;
			}
			if ($weight_diff >= 41){
				$weight_weeks = $weight_diff / 2.0;
			}
		
		echo "<div style='margin-top:5px;'><strong>In combination with our workout program</strong> you could reach your goal in <span style='color:#FF0000;font-weight:bold;'> " . round($weight_weeks,0) . " </span><strong>weeks.</strong></div>";
		
		}
	}
	if ($_GET['goalvar'] =="0"){
		if ($_GET['goalweightvar'] == $_GET['weightvar']){
		echo "You are already at your Goal Weight. You should maintain your current daily calorie intake.";
		}
		
		if ($_GET['goalweightvar'] > $_GET['weightvar']){
		echo "You are already at your Goal Weight. You should maintain your current daily calorie intake.";
		}
		
		if ($_GET['goalweightvar'] < $_GET['weightvar']){
		echo "If you wish to loose weight you should select weight loss as your goal.";
		}
	}
	if ($_GET['goalvar'] =="500"){
		if ($_GET['goalweightvar'] == $_GET['weightvar']){
		echo "You are already at your Goal Weight. You should maintain your current daily calorie intake.";
		}
		
		if ($_GET['goalweightvar'] > $_GET['weightvar']){
		$weight_diff = $_GET['goalweightvar'] - $_GET['weightvar'];
		
			if ($weight_diff <= 20){
				$weight_weeks = $weight_diff / 1.0;
			}
			if ($weight_diff >= 21 and $weight_diff <= 40 ){
				$weight_weeks = $weight_diff / 1.5;
			}
			if ($weight_diff >= 41){
				$weight_weeks = $weight_diff / 2.0;
			}
				
		echo "<div style='margin-top:5px;'><strong>In combination with our workout program</strong>, you could reach your goal in <span style='color:#FF0000;font-weight:bold;'> " . round($weight_weeks,0) . " </span><strong>weeks.</strong></div>";
		}
		
		if ($_GET['goalweightvar'] < $_GET['weightvar']){
		echo "If you wish to loose weight you should select weight loss as your goal.";
		}
	}
}

?> 

