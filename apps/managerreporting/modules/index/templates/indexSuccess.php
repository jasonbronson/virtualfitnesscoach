<?php 
//count($logins_per_month)."**";
//die("TEST");
?>
<h1>Company Report</h1>
<br>
<table border=1 cellpadding=5 cellspacing=0>
<tr><td>Report Date <?php echo date("m/d/Y") ?></td> <td colspan=2>Logins Per Week</td> <td  colspan=2>Login Time</td>  <td  colspan=2># of days<br>between logins</td>  <td colspan=2># Exercise Routines<br> Visits Per Week</td>  <td colspan=2># Nutrition<br> Visits per week</td>  <td colspan=2># Exercise Tutorial<br> Visits Per Week</td>  <td colspan=2># Nutrition Tutorial<br> Visits per week</td>  <td colspan=2>Chatroom Participations<br> per month</td> <td colspan=2>Motivation Visits per week</td>  <td colspan=2>Total Reward Points Earned</td> <td colspan=2>Weight Loss</td> </tr>
<tr><td></td> <td>Apr Avg</td> <td>YTD</td> <td>Apr Avg</td> <td>YTD</td> <td>Apr Avg</td> <td>YTD</td> <td>Apr Avg</td> <td>YTD</td> <td>Apr Avg</td> <td>YTD</td> <td>Apr Avg</td> <td>YTD</td> <td>Apr Avg</td> <td>YTD</td> <td>Apr Avg</td> <td>YTD</td> <td>Apr Avg</td> <td>YTD</td> <td>Apr Avg</td> <td>YTD</td> <td>Apr Avg</td> <td>YTD</td> </tr>
<tr align=center><td>All Company Participants</td> <td><?php echo $totaluseravglogin;  ?></td>      <td><?php echo number_format($year_to_date_logins, 0) ?></td> <td><?php echo number_format( ($total_timeloggedin_month_avg / 60), 2); ?> Min</td> <td><?php echo number_format( ($year_to_date_totaltimeloggedin / 60), 2); ?> Min</td> <td><?php echo round($all_apr_daysbetweenlogins, PHP_ROUND_HALF_UP);  ?></td> <td><?php echo round($all_ytd_apr_daysbetweenlogins, PHP_ROUND_HALF_UP); ?></td> <td><?php echo round($all_exercisevisits, PHP_ROUND_HALF_UP); ?></td> <td><?php echo round($all_ytd_exercisevisits, PHP_ROUND_HALF_UP); ?></td> <td><?php echo round($all_nutritionvisits, PHP_ROUND_HALF_UP) ?></td> <td><?php echo round($all_ytd_totalnutrition, PHP_ROUND_HALF_UP) ?></td> <td><?php echo round($all_faq_exercise, PHP_ROUND_HALF_UP) ?></td> <td><?php echo round($all_ytd_faq_exercise, PHP_ROUND_HALF_UP) ?></td> <td><?php echo $all_faq_nutrition ?></td> <td><?php echo $all_ytd_faq_nutrition ?></td> <td></td> <td></td> <td><?php echo round($all_motivation, PHP_ROUND_HALF_UP) ?></td> <td><?php echo round($all_ytd_motivation, PHP_ROUND_HALF_UP) ?></td> <td></td> <td></td>  <td><?php echo $all_weightloss ?> lbs</td> <td><?php echo $all_ytd_weightloss ?> lbs</td></tr>
<tr><td colspan=30>&nbsp;</td> </tr>
<tr><td colspan=30>By # Logins Per Month</td> </tr>
<?php
$daysbetween_login[0] = round(($daysbetweenlogins[0] / $totalmembers), PHP_ROUND_HALF_UP);
$daysbetween_login[1] = round(($daysbetweenlogins[1] / $totalmembers), PHP_ROUND_HALF_UP);
$daysbetween_login[2] = round(($daysbetweenlogins[2] / $totalmembers), PHP_ROUND_HALF_UP);
$daysbetween_login[3] = round(($daysbetweenlogins[3] / $totalmembers), PHP_ROUND_HALF_UP);
$daysbetween_login[4] = round(($daysbetweenlogins[4] / $totalmembers), PHP_ROUND_HALF_UP);

$exercises_byloginspermonth_0 = round(($exercises_byloginspermonth[0] / 4), PHP_ROUND_HALF_UP);
$exercises_byloginspermonth_1 = round(($exercises_byloginspermonth[1] / 4), PHP_ROUND_HALF_UP);
$exercises_byloginspermonth_2 = round(($exercises_byloginspermonth[2] / 4), PHP_ROUND_HALF_UP);
$exercises_byloginspermonth_3 = round(($exercises_byloginspermonth[3] / 4), PHP_ROUND_HALF_UP);
$exercises_byloginspermonth_4 = round(($exercises_byloginspermonth[4] / 4), PHP_ROUND_HALF_UP);

$nutrition_byloginspermonth_0 = round(($nutrition_byloginspermonth[0] / 4), PHP_ROUND_HALF_UP);
$nutrition_byloginspermonth_1 = round(($nutrition_byloginspermonth[1] / 4), PHP_ROUND_HALF_UP);
$nutrition_byloginspermonth_2 = round(($nutrition_byloginspermonth[2] / 4), PHP_ROUND_HALF_UP);
$nutrition_byloginspermonth_3 = round(($nutrition_byloginspermonth[3] / 4), PHP_ROUND_HALF_UP);
$nutrition_byloginspermonth_4 = round(($nutrition_byloginspermonth[4] / 4), PHP_ROUND_HALF_UP);


$tutorial_byloginspermonth_0 = round(($tutorial_byloginspermonth[0] / 4), PHP_ROUND_HALF_UP);
$tutorial_byloginspermonth_1 = round(($tutorial_byloginspermonth[1] / 4), PHP_ROUND_HALF_UP);
$tutorial_byloginspermonth_2 = round(($tutorial_byloginspermonth[2] / 4), PHP_ROUND_HALF_UP);
$tutorial_byloginspermonth_3 = round(($tutorial_byloginspermonth[3] / 4), PHP_ROUND_HALF_UP);
$tutorial_byloginspermonth_4 = round(($tutorial_byloginspermonth[4] / 4), PHP_ROUND_HALF_UP);

$motivation_byloginspermonth_0 = round(($motivation_byloginspermonth[0] / 4), PHP_ROUND_HALF_UP);
$motivation_byloginspermonth_1 = round(($motivation_byloginspermonth[1] / 4), PHP_ROUND_HALF_UP);
$motivation_byloginspermonth_2 = round(($motivation_byloginspermonth[2] / 4), PHP_ROUND_HALF_UP);
$motivation_byloginspermonth_3 = round(($motivation_byloginspermonth[3] / 4), PHP_ROUND_HALF_UP);
$motivation_byloginspermonth_4 = round(($motivation_byloginspermonth[4] / 4), PHP_ROUND_HALF_UP);


$faqexercise_byloginspermonth_0 = round(($faqexercise_byloginspermonth[0] / 4), PHP_ROUND_HALF_UP);
$faqexercise_byloginspermonth_1 = round(($faqexercise_byloginspermonth[1] / 4), PHP_ROUND_HALF_UP);
$faqexercise_byloginspermonth_2 = round(($faqexercise_byloginspermonth[2] / 4), PHP_ROUND_HALF_UP);
$faqexercise_byloginspermonth_3 = round(($faqexercise_byloginspermonth[3] / 4), PHP_ROUND_HALF_UP);
$faqexercise_byloginspermonth_4 = round(($faqexercise_byloginspermonth[4] / 4), PHP_ROUND_HALF_UP);


$faqnutrition_byloginspermonth_0 = round(($faqnutrition_byloginspermonth[0] / 4), PHP_ROUND_HALF_UP);
$faqnutrition_byloginspermonth_1 = round(($faqnutrition_byloginspermonth[1] / 4), PHP_ROUND_HALF_UP);
$faqnutrition_byloginspermonth_2 = round(($faqnutrition_byloginspermonth[2] / 4), PHP_ROUND_HALF_UP);
$faqnutrition_byloginspermonth_3 = round(($faqnutrition_byloginspermonth[3] / 4), PHP_ROUND_HALF_UP);
$faqnutrition_byloginspermonth_4 = round(($faqnutrition_byloginspermonth[4] / 4), PHP_ROUND_HALF_UP);

$weightloss_byloginspermonth_0 = ($weightloss_byloginspermonth[0] / 4);
$weightloss_byloginspermonth_1 = ($weightloss_byloginspermonth[1] / 4);
$weightloss_byloginspermonth_2 = ($weightloss_byloginspermonth[2] / 4);
$weightloss_byloginspermonth_3 = ($weightloss_byloginspermonth[3] / 4);
$weightloss_byloginspermonth_4 = ($weightloss_byloginspermonth[4] / 4);

echo "
<tr align='center'><td align='left'>0 - 5</td> <td>{$logins_per_month[0]}</td>        <td>N/A</td> <td>".number_format( ($timeloggedin_per_month[0] / 60), 2 )." Min</td> <td>N/A</td> <td>{$daysbetween_login[0]}</td> <td>N/A</td> <td>$exercises_byloginspermonth_0</td> <td>NA</td> <td>$nutrition_byloginspermonth_0</td> <td>NA</td> <td>$faqexercise_byloginspermonth_0</td> <td>NA</td><td>$faqnutrition_byloginspermonth_0</td> <td>NA</td> <td>$chatroom_0</td> <td>NA</td> <td>$motivation_byloginspermonth_0</td> <td>NA</td> <td>$totalrewards</td> <td>NA</td> <td>$weightloss_byloginspermonth_0 lbs</td> <td></td></tr>
<tr align='center'><td align='left'>5 - 10</td> <td>{$logins_per_month[1]}</td>        <td>N/A</td> <td>".number_format( ($timeloggedin_per_month[1] / 60), 2 )." Min</td> <td>N/A</td> <td>{$daysbetween_login[1]}</td> <td>N/A</td> <td>$exercises_byloginspermonth_1</td> <td>NA</td> <td>$nutrition_byloginspermonth_1</td> <td>NA</td> <td>$faqexercise_byloginspermonth_1</td> <td>NA</td><td>$faqnutrition_byloginspermonth_1</td> <td>NA</td> <td>$chatroom_1</td> <td>NA</td> <td>$motivation_byloginspermonth_1</td> <td>NA</td> <td>$totalrewards</td> <td>NA</td> <td>$weightloss_byloginspermonth_1 lbs</td> <td></td></tr>
<tr align='center'><td align='left'>10 - 15</td> <td>{$logins_per_month[2]}</td>        <td>N/A</td> <td>".number_format( ($timeloggedin_per_month[2] / 60), 2 )." Min</td> <td>N/A</td> <td>{$daysbetween_login[2]}</td> <td>N/A</td> <td>$exercises_byloginspermonth_2</td> <td>NA</td> <td>$nutrition_byloginspermonth_2</td> <td>NA</td> <td>$faqexercise_byloginspermonth_2</td> <td>NA</td><td>$faqnutrition_byloginspermonth_2</td> <td>NA</td> <td>$chatroom_2</td> <td>NA</td> <td>$motivation_byloginspermonth_2</td> <td>NA</td> <td>$totalrewards</td> <td>NA</td> <td>$weightloss_byloginspermonth_2 lbs</td> <td></td></tr>
<tr align='center'><td align='left'>20 - 31</td> <td>{$logins_per_month[3]}</td>        <td>N/A</td> <td>".number_format( ($timeloggedin_per_month[3] / 60), 2 )." Min</td> <td>N/A</td> <td>{$daysbetween_login[3]}</td><td>N/A</td> <td>$exercises_byloginspermonth_3</td> <td>NA</td> <td>$nutrition_byloginspermonth_3</td> <td>NA</td> <td>$faqexercise_byloginspermonth_3</td> <td>NA</td><td>$faqnutrition_byloginspermonth_3</td> <td>NA</td> <td>$chatroom_3</td> <td>NA</td> <td>$motivation_byloginspermonth_3</td> <td>NA</td> <td>$totalrewards</td> <td>NA</td> <td>$weightloss_byloginspermonth_3 lbs</td> <td></td></tr>
<tr align='center'><td align='left'>31+</td> <td>{$logins_per_month[4]}</td>            <td>N/A</td> <td>".number_format( ($timeloggedin_per_month[4] / 60), 2 )." Min</td> <td>N/A</td> <td>{$daysbetween_login[4]}</td> <td>N/A</td> <td>$exercises_byloginspermonth_4</td> <td>NA</td> <td>$nutrition_byloginspermonth_4</td> <td>NA</td> <td>$faqexercise_byloginspermonth_4</td> <td>NA</td><td>$faqnutrition_byloginspermonth_4</td> <td>NA</td> <td>$chatroom_4</td> <td>NA</td> <td>$motivation_byloginspermonth_4</td> <td>NA</td> <td>$totalrewards</td> <td>NA</td> <td>$weightloss_byloginspermonth_4 lbs</td> <td></td></tr>
";



?>

<tr><td colspan=30>&nbsp;</td></tr>
<tr><td colspan=30>Individual Participants</td> </tr>
<?php

$counter = 0;

foreach($avg_user_login as $key => $value){
	//if($value['avg_user_login'] > 4)
		$month_average = round(($value['avg_user_login'] / 4), PHP_ROUND_HALF_UP);
	/*else
		$month_average = $value['avg_user_login'];
*/
	//if($value['exercises'] > 4)	
	    $exercises = round(($value['exercises'] / 4), PHP_ROUND_HALF_UP);
	 
	//if($value['nutrition'] > 4)	
	    $nutrition = round(($value['nutrition'] / 4), PHP_ROUND_HALF_UP);
	   
		$timeloggedin = round($value['timelogin_avg'], PHP_ROUND_HALF_UP);
		
		$tutorial = round(($value['tutorial'] / 4), PHP_ROUND_HALF_UP);
		
		$motivation  = round(($value['motivation'] / 4), PHP_ROUND_HALF_UP);
		
		//
		$numdays_b_logins  = round($value['numberofdaysbetweenlogins'], PHP_ROUND_HALF_UP);

		$ytd_exercises = round(($value['ytd_totalexercises'] / 52), PHP_ROUND_HALF_UP);
		$ytd_nutrition = round(($value['ytd_nutrition'] / 52), PHP_ROUND_HALF_UP);
		
	if(($counter % 2) == 0)
		$color = "white";
		else
		$color = "lightblue";	
		
	//if($value['timelogin_avg'] != 0)	
	echo "<tr align='center' bgcolor='$color'>
	<td align='left'>{$value['name']}</td> 
	<td>{$month_average}</td>        
	<td>{$value['year_to_date_logins']}</td> 
	<td>{$timeloggedin} Min</td> 
	<td>{$timeloggedin} Min</td>
	<td>{$numdays_b_logins}</td>
	<td>&nbsp;</td>
	<td>{$exercises}</td>
	<td>{$ytd_exercises}</td>
	<td>{$nutrition}</td>
	<td>{$ytd_nutrition}</td>
	<td>{$value['faq_exercise']}</td>
	<td>{$value['ytd_faq_exercise']}</td>
	<td>{$value['faq_nutrition']}</td>
	<td>{$value['ytd_faq_nutrition']}</td>
	<td>{$chatroom}</td>
	<td></td>
	<td>{$motivation}</td>
	<td>{$value['ytd_motivation']}</td>
	<td>{$rewardpoints}</td>
	<td></td>
	<td>{$value['weightloss']}</td>
	<td>{$value['weightloss_ytd']}</td>
	
	</tr>";
	
	$counter = $counter + 1;
}
?>
</table>