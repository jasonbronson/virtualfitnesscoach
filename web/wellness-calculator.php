<?php include("header_txt_corporate_wellness_inserts.php"); ?>

<style type="text/css">

<?php
$iesix = strstr($_SERVER['HTTP_USER_AGENT'],"MSIE 6.0");

if($iesix == ""){

}
else{
echo "#main-content-feature-left-bottom{margin-top:10px;}";
}
?>
#main-content-feature,#main-content-feature-left-spacer-1, #main-content-feature-left-spacer-2,#main-content-feature-right-spacer-3, #main-content-feature-left{
height:810px;
}
#main-content-feature-right-spacer-2,#main-content-feature-right-spacer-1,#main-content-feature-left-spacer-3 {
height:805px;
}
#main-content-feature-left-top{
margin-top:10px;

}

#table3{

}

#main-content-feature-left-bottom{
color:#333333;
}

span.bt2{
font-weight:bold;
}
</style>
            <div id="main-content-feature-left" style="width:948px;background:none;">

                <div id="main-content-feature-left-top" style="margin-top:0px;background-attachment:scroll;background-color:#9BCB67;background-image:none;background-position:0 0;background-repeat:repeat;height:5px;width:948px;">



                        </div>
                            <!--div style="width:900px;margin-left:auto;margin-right:auto;text-align:center; color:#000000;font-size:13px;"-->
                <div id="main-content-feature-left-middle" style="margin-top:14px;margin-left:auto; margin-right:auto; text-align:center;">
                  <div style="border:20px #25408f solid; margin-left:auto; margin-right:auto;">
                    <!-- end the blue div -->
                    <div style="font-size:13px;">
                      <img src="/homepage/images/px-img5.jpg" style="margin-left:auto;margin-right:auto;margin-top:40px:margin-bottom:40px" /alt="Wellness Calculator | Calculate Your ROI from Wellness">
                      <div style="text-align:left;margin-left:20px">
                        <h1>Health & Wellness Savings Calculator.</h1>
                        Virtual Fitness Coach has created a research-based tool called "Health & Wellness ROI Calculator", to help you determine the effect a high impact Wellness Program can have on Your Employees.  This <i>Wellness Calculator</i>  helps visualize the ROI and potential savings your company could obtain from Our effective Health & Wellness Program.  Start Calculating your savings today by inputting the necessary information into the Wellness Calculator below.
                        <br>
                      <span style="color:#25408f">
                      	For more information about our Cost Effective & Innovative Health & Wellness Program Please Review Our <A href="/ROI-on-health-and-wellness.php">ROI page</a> & <a href="mailto:support@virtualfitnesscoach.com">contact our team</a>.</span>
                        


                        
                        		<SCRIPT LANGUAGE="JavaScript">





function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}


function wellness_roi(form) {
	form.total_obese.value  = "";
	form.total_overweight.value = "";
	form.total_overweight_and_obese.value = ""; 

employee_size = form.employee_size.value;
employee_size = employee_size.replace(/,/g,"");
employee_size = parseFloat(employee_size);

perc_obese = form.perc_obese.value;
perc_obese = parseFloat(perc_obese);
perc_obese = perc_obese * 0.01;


health_care_cost = form.health_care_cost.value;
health_care_cost = health_care_cost.replace(/,/g,"");
health_care_cost = parseFloat(health_care_cost);

perc_overweight = form.perc_overweight.value;
perc_overweight = parseFloat(perc_overweight);
perc_overweight = perc_overweight * 0.01;

avg_salary = form.avg_salary.value;
avg_salary = avg_salary.replace(/,/g,"");
avg_salary = avg_salary.replace("$","");
avg_salary = parseFloat(avg_salary);

avg_days_missed = form.avg_days_missed.value;
avg_days_missed = parseFloat(avg_days_missed);

total_obese = perc_obese * employee_size;
total_overweight = perc_overweight * employee_size;
total_overweight_and_obese = total_obese + total_overweight;

est_health_care_savings = total_overweight_and_obese * 400;

total_days_missed = total_obese * avg_days_missed;
equivalent_number_employees = total_days_missed/52/5;
est_absenteeism_savings = equivalent_number_employees * avg_salary;


total_potential_savings = est_absenteeism_savings + est_health_care_savings;


total_obese = Math.round(total_obese);
total_overweight = Math.round(total_overweight);
total_overweight_and_obese = Math.round(total_overweight_and_obese);
est_health_care_savings = Math.round(est_health_care_savings);
total_potential_savings = Math.round(total_potential_savings);
est_absenteeism_savings = Math.round(est_absenteeism_savings);

total_potential_savings = addCommas(total_potential_savings);
est_absenteeism_savings = addCommas(est_absenteeism_savings);
est_health_care_savings = addCommas(est_health_care_savings);



form.total_obese.value  = " " + addCommas(total_obese);

form.total_overweight.value = " " + addCommas(total_overweight);

form.total_overweight_and_obese.value = " " + addCommas(total_overweight_and_obese);

form.est_health_care_savings.value = " $"+est_health_care_savings;
form.est_absenteeism_savings.value = " $"+est_absenteeism_savings;
form.total_potential_savings.value = " $"+total_potential_savings;

}
//  End -->
</script>

<br><br>
	<center>
<form name='wellness_calculator'>
	<table border= 0 cellpadding = "10" cellspacing = "0">
		<tr><td>
<table border= 0 cellpadding = "10" cellspacing = "0">
<tr bgcolor="#9BCB67" height="40">
<td ><font face="arial, helvetica" size="-1">Number of fulltime<br>employees</td>
<td><input type=text name=employee_size size=9 value="1,000"></td>
</tr>
<tr height="40">
<td ><font face="arial, helvetica" size="-1">Obese % <font size="-2">(1)</font></td>
<td><input type=text name=perc_obese size=6 value="32.2%"></td>
</tr>
<tr  bgcolor="#9BCB67" height="40">
<td ><font face="arial, helvetica" size="-1">Overweight  % <font size="-2">(2)</font></td>
<td><input type=text name=perc_overweight size=6 value="34.1%"></td>
</tr>
<tr height="40">
<td ><font face="arial, helvetica" size="-1">Health Care Cost<br>Per Employee <font size="-2">(3)</font></td>
<td><input type=text name=health_care_cost size=7 value="$9,500"></td>
</tr>
<tr bgcolor="#9BCB67" height="40">
<td ><font face="arial, helvetica" size="-1">Average Salary</td>
<td><input type=text name=avg_salary size=9 value="$38,500"></td>
</tr>
<tr height="40">
<td ><font face="arial, helvetica" size="-1">Average Missed Days<br>Among Obese Population <font size="-2">(4)</font></td>
<td><input type=text name=avg_days_missed size=3 value="13"></td>
</tr>
</table>
</td><td width="15 bgcolor="#9BCB67"> &nbsp; </td><td>
	<table border= 0 cellpadding = "10" cellspacing = "0">
		
		<tr bgcolor="#9BCB67" height="40">
<td ><font face="arial, helvetica" size="-1">Total Overweight &<br> Obese</font></td>
<td ><input type=text name=total_overweight_and_obese size=11></td>
</tr>
<tr height="40">
<td ><font face="arial, helvetica" size="-1">Total Obese Employees</font></td>
<td ><input type=text name=total_obese size=11></td>
</tr>
<tr height="40" bgcolor="#9BCB67">
<td ><font face="arial, helvetica" size="-1">Total Overweight<br>Employees</font></td>
<td ><input type=text name=total_overweight size=11></td>
</tr>

<tr height="40">
<td ><font face="arial, helvetica" size="-1">Potential Health Care<br> Savings <font size="-2">(5)</font></font></td>
<td ><input type=text name=est_health_care_savings size=11></td>
</tr>
<tr bgcolor="#9BCB67" height="40">
<td ><font face="arial, helvetica" size="-1">Potential Absenteeism<br> Savings</font></td>
<td ><input type=text name=est_absenteeism_savings size=11></td>
</tr>
<tr  height="40">
<td ><font face="arial, helvetica" size="-1"><b>Total Potential Savings</b></font></td>
<td ><input type=text name=total_potential_savings size=11></td>
</tr>


</table>
</td></tr>
<tr><td colspan="3" align="center" >
<input type=button name=calc value="Calculate Wellness Savings" onClick="javascript:wellness_roi(this.form)">
</td></tr>
</table>

</form><br><br><br>
<table border=0 width="75%"><tr><td><font face="arial, helvetica" size="-1">
	<ol><li>The National Center for Health Statistics reports that the prevalence of obesity in adult Americans is 32.2%.<br>
	<li>The Centers for Disease Control and Prevention (CDC) reports that 34.1% of adult Americans are overweight.<br>
	<li>Nationwide, employer-covered health care cost averages of $9,500 per employee.
	<li>Shockingly, the International Journal of Obesity reports that obese employees miss 13 times more days of work than their normal-weight colleagues.
	<li>A study from Kaiser Permanente indicates that a modest weight loss of 5%, attained by participation in a health & wellness program, resulted in cost savings from the 
		perspective of the health care system of more than $400 per patient per year..(For a 200 lb adult, that is only 10 lbs)

</ol></font>
</td></tr></table>
</center>

<br><br><br><br><br><br><br><br><br><br><br>


                      </div>



                    </div>
                  </div>
                </div>


            </div>

<?php include("footer_txt_corporate_wellness_inserts.php"); ?>