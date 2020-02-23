<?php



if ($_GET['emailvar'] =="" or $_GET['gendervar'] =="" or $_GET['agevar'] =="" or $_GET['weightvar'] =="" or $_GET['goalweightvar'] =="" or $_GET['feetvar'] =="" or $_GET['inchesvar'] =="" or is_numeric($_GET['feetvar']) == "" or is_numeric($_GET['agevar']) == "" or is_numeric($_GET['weightvar']) == "" or is_numeric($_GET['goalweightvar']) == "" or is_numeric($_GET['inchesvar']) == ""){

echo "<div style='height:80px;background-color:#CFE7B7;width:223px;padding-left:3px;padding-right:3px;'>Please fill out the above form in its entirety using only numbers!</div>";
 
} 
else{
	echo "<div style='height:80px;background-color:#CFE7B7;width:223px;padding-left:3px;padding-right:3px;'>";
	$weight_in_kilograms = $_GET['weightvar'] / 2.2;
	$height_in_inches = ($_GET['feetvar'] * 12) + $_GET['inchesvar'];
	$height_in_centimeters = $height_in_inches * 2.54;

	if ($_GET['gendervar'] =="male"){
	$bmr = (66 + (13.7 * $weight_in_kilograms ) + (5 * $height_in_centimeters ) - (6.8 * $_GET['agevar'] )) * $_GET['activityvar'];
	$bmr = $bmr + $_GET['goalvar'];
	//echo "<span style='font-weight:bold;font-size:14px;display:block;'>Your Results:</span>";
	echo "To achieve your goal weight, you should consume <span style='color:#FF0000;font-weight:bold;'> " . round($bmr,0). " </span> <strong>calories per day.</strong>"; 
	echo "<br />";
	
	}
	  
	if ($_GET['gendervar'] =="female"){
	$bmr = (655 + (9.6 * $weight_in_kilograms ) + (1.8 * $height_in_centimeters ) - (4.7 * $_GET['agevar'] )) * $_GET['activityvar']; 
	$bmr = $bmr + $_GET['goalvar'];
	//echo "<span style='font-weight:bold;font-size:14px;display:block;'>Your Results:</span>";
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
		
		
		$to = "Trainer@virtualfitnesscoach.com";
		$subject = "Instant Fitness Plan Result";

		$message = "Instant Fitness Plan Result \n" ."
		Age =" . $_GET['agevar'] ." \n
		Feet  = " . $_GET['feetvar'] ."\n
		Inches  = " . $_GET['inchesvar'] ."\n
		Weight  = " . $_GET['weightvar'] ." \n
		Gender  = " . $_GET['gendervar'] ." \n
		Activity  = " . $_GET['activityvar'] ." \n
		Goal Weight  = " . $_GET['goalweightvar'] ." \n
		Goal  = " . $_GET['goalvar'] ." \n
		Email  = " . $_GET['emailvar'] ." \n\n" .
		"To achieve your goal weight, you should consume " . round($bmr,0). " calories per day. \n\n" .
		"In combination with our workout program you could reach your goal in " . round($weight_weeks,0) . " weeks.";		
				
		$from = "calculator@virtualfitness.com";
		$headers = "From: $from";
		mail($to,$subject,$message,$headers);
		
				$to = $_GET['emailvar'];
		$subject = "Instant Fitness Plan Result";

		$message = '<html><head><title>Your customized Fitness Plan</title><style type="text/css"> #VWPLINK {display:none}</style></head><br />
 

<body topmargin="0" leftmargin="0" rightmargin="0"><div align="center" style="background-color:#ffffff;padding-bottom:10px;"><div align="left" style="font-family:verdana,arial;font-size:8pt;color:#000000;width:600;"><font face="verdana,arial" size="1" color="#000000" style="font-family:verdana,arial;font-size:8pt;color:#000000;"><center><table bgcolor="#ffffff" width="595" id="VWPLINK"><tr><td style="font-size: 8pt; font-family: Verdana, Arial, Helvetica, sans-serif; color: #000000;" width="100%" rowspan="1" colspan="1">Having trouble viewing this email?
<a track="off" shape="rect" href="http://campaign.constantcontact.com/render?v=001aqj1QInodGQZqZzXn0-19EFV4e5FnZ61oviSKUp9jq3qZnVo44_oySfvD-r5SZ2hWTkzwrJXu7MMZiThH97OdZdBWrBM8cOSRsHVqermdIRFybaAbjRg13ON80eRK_By7N3Xx2cqVMaNEVIeyVWvm29hmQmWC3fBXldNFu47kUXoY_R3A2CgqRzK5YaeR1oL6ITP_Itpsql7WCH1q9SM75MQK3M2aOvF4G62RepECaJ5fIyLeyz2OcdmZ6UNfwauatQUiDiVVBigxj9G6K12rkANqBwegcE-VMZOq1VUxsLqQ4pDlqWSAONkQ9e5_KkQLGWwr6PBz35_Mnc2WpdIjsEmMcR-d2fRyI15pnw9_3sL9EjwI6mqxQoH8Ge_7ld3JGDhZBaGJupsirRMePLfFGecPMxA6mD_" target="_blank">Click here
</a></td></tr></table></center></font></div></div>
<div style="overflow: auto;" id="rootDiv" align="center">
<table style="background-color:#FFFFFF;margin:0px 0px 0px 0px;" bgcolor="#FFFFFF" border="0" width="100%" cellspacing="0" cellpadding="0">
<tr>
 <td valign="top" rowspan="1" colspan="1" align="center">
  <table style="width:600px;" border="0" width="600" cellspacing="0" cellpadding="1">
    <tr>
      <td valign="top" width="100%" rowspan="1" colspan="1" align="left">
          
        <table id="content_LETTER.BLOCK1" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="0" contenteditable="inherit" datapagesize="0">
<tr>
<td valign="bottom" align="middle"><span><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNQm7SBbIn3r63UbWHSmlluIbrgfI0noK4kNd5aaDgmdvMdfYc1DdhMjWw6E73Pp8Orrv64aXLA62T0P2xlNc6uSRp7N7X3opePreIC4zYeBBPgmnb-ca7RfnKssWos6ubOTJqtnbGFKpQ==" target="_blank"><img name="ACCOUNT.IMAGE.1" border="0" contenteditable="false" alt="VFC Logo" src="http://origin.ih.constantcontact.com/fs095/1102365168645/img/1.jpg?a=1102371918445" /></a></span></td></tr></table></td>
    </tr>
    <tr>
      <td style="background-color:#4379D3;padding:1px;" bgcolor="#4379D3" rowspan="1" colspan="1" align="left">
        <table style="background-color:#92B2E6;" bgcolor="#92B2E6" border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td style="background-image:url(http://img.constantcontact.com/letters/images/1101093164665/news_fitness_topbg.jpg);height:90px;background-repeat:no-repeat;background-color:#92B2E6;" bgcolor="#92B2E6" background="http://img.constantcontact.com/letters/images/1101093164665/news_fitness_topbg.jpg" width="100%" rowspan="1" colspan="2" align="left">
                <table id="content_LETTER.BLOCK2" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="0" contenteditable="inherit" datapagesize="0">
<tr>
<td style="color:#2E66C5;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:24pt;" align="middle"><font color="#2E66C5" size="6" face="Arial Narrow,Arial MT Condensed Light,sans-serif" style="color:#2E66C5;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:24pt;"><span>Your Virtual Fitness Coach</span> Fitness Plan</font></td></tr></table>
              </td>
          </tr>
          <tr>
            <td style="background-color:#92B2E6;padding-top:5px;padding-left:0px;padding-bottom:5px;padding-right:5px;" bgcolor="#92B2E6" valign="top" rowspan="1" colspan="1" align="left">
              <table style="width:150px;" border="0" width="160" cellspacing="0" cellpadding="3">
                <tr>
                  <td valign="top" width="100%" rowspan="1" colspan="1" align="center">
                      
                      <table class="QuickLinksBorder" style="margin-bottom:10px;" id="content_LETTER.BLOCK4" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0">
<tr>
<td style="background-color:#4379D3;color:#FFD354;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:10pt;" bgcolor="#4379D3" valign="center" align="middle"><font color="#FFD354" size="2" face="Arial Narrow,Arial MT Condensed Light,sans-serif" style="color:#FFD354;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:10pt;"><b>Virtual Fitness Coach</b>&nbsp;</font></td></tr>
<tr>
<td style="color:#FFFFFF;font-family:Arial,Helvetica,sans-serif;font-size:10pt;" align="middle"><font color="#FFFFFF" size="2" face="Arial,Helvetica,sans-serif" style="color:#FFFFFF;font-family:Arial,Helvetica,sans-serif;font-size:10pt;">
<div><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNSDlD4gzCpu5ZAKEJFbTUiGa2VgEIwev0H9aTHCX7SwzNNeI7V0D6qfrYsaa0SJhijFesvRHEK348j-YpMA9oJwOCVhWI39jQTjwlvGmCSjbpdxHSuKuywt4d_ZAa8tlxqRZF8NOXMarymg_2fPTJJp" linktype="link" target="_blank">Register Now</a></div>
<div><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNR4FO689apV6nhifR5VX5rzVYjGas8bFI2k9sJDD7l_ZwzxlejthP6V3o8YZhHqrX_jjEHv8dlmyNx0mhDYPQtRyldTYz_FEclY1sI54XU-sg0vDgp9rFOMUgzZOU2BOeR4oiCGNJnhetm7NKVYN8t-TpZLuteIU0TwpBQqHj4fRg==" linktype="link" target="_blank">Why Us?</a></div>
<div><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNQ8T0ndfEIRl-LIhRBTi1Y9kCVATWr6Jg09J7tPeGUpv7rUcWs6xqXdAwpw0AscyZOrVe0KfjDCj1NQXlJidXNtxfXGWDyYhkEqWvuR8-nB856ObXpjrrPwUEEsqzGFErszUJdL01rwoHzEzbcCQC9iWfeaksqdxKE=" linktype="link" target="_blank">Success Stories</a></div>
<div><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNQlzKER8zktjvqj8bQFQxZCYP7rq76vQgDTE1xMmhY9-KXHHBS7OmacEYSQcZcKrnKU0MD_p2JWGdvUJqhHGzgItCGe2DZqWpNXZ35H-jitQmgGiEU0chp_hWV_uoKwHxekOwkEbQoJooTpX-MhmAYt" linktype="link" target="_blank">Visit Today</a></div></font></td></tr></table>
                      
                      
                      
                      
                    <table style="margin-bottom:10px;" id="content_LETTER.BLOCK23" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0">
<tr>
<td align="middle"><em>&nbsp; </em>
<div>
<div><font size="2"><em>"After my first baby, I started Mel"s program and was consistently losing 2 pounds a week. The exercises were really easy to follow and understand. Thanks Mel for all of your help."<br />-MH</em> </font></div><br /></div></td></tr></table><table style="margin-bottom:10px;" id="content_LETTER.BLOCK25" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0">
<tr>
<td align="middle"><font size="2" face="Trebuchet MS,Verdana,Helvetica,sans-serif"><em>&nbsp;</em></font>
<div>
<div><font size="2"><font face="Times New Roman,Times,Serif"><em>"Before I started training with Mel, the furthest&nbsp;I could run was for a minute on the treadmill. Six months later, I did my first half marathon and because of his motivation will be doing my third one soon."<br />-AW</em></font> </font></div><br /></div></td></tr></table><table style="margin-bottom:10px;" id="content_LETTER.BLOCK26" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0">
<tr>
<td align="middle">&nbsp; 
<div>
<div align="center"><font size="2"><em>"Since I"ve been working with Mel, I"ve gained about 12 pounds of muscle and taken 6 strokes off my handicap."<br />-JC </em></font></div><br /></div></td></tr></table></td>
                </tr>
              </table>
            </td>
            <td style="background-color:#92B2E6;padding-top:5px;padding-left:0;padding-bottom:5px;padding-right:0;" bgcolor="#92B2E6" valign="top" rowspan="1" colspan="1" align="left">
              <table style="width:440px;" border="0" width="440" cellspacing="0" cellpadding="3">
                <tr>
                  <td valign="top" width="100%" rowspan="1" colspan="1" align="left">
                      <table style="background-image:url(http://img.constantcontact.com/letters/images/1101093164665/news_fitness_titlebg1.jpg);background-repeat:no-repeat;background-color:#FF9933;" background="http://img.constantcontact.com/letters/images/1101093164665/news_fitness_titlebg1.jpg" id="content_LETTER.BLOCK9" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0" bgcolor="#FF9933">
<tr>
<td style="color:#FFFFCC;font-family:Verdana,Geneva,Arial,Helvetica,sans-serif;font-size:10pt;" width="50%" align="left"></td>
<td style="color:#FFFFCC;font-family:Verdana,Geneva,Arial,Helvetica,sans-serif;font-size:10pt;" width="49%" align="right"><font color="#FFFFCC" size="2" face="Verdana,Geneva,Arial,Helvetica,sans-serif" style="color:#FFFFCC;font-family:Verdana,Geneva,Arial,Helvetica,sans-serif;font-size:10pt;">&nbsp;</font></td></tr></table>
                      <table style="margin-bottom:10px;" id="content_LETTER.BLOCK10" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="0" contenteditable="inherit" datapagesize="0">
<tr>
<td valign="top" align="left"><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNQm7SBbIn3r63UbWHSmlluIbrgfI0noK4kNd5aaDgmdvMdfYc1DdhMjWw6E73Pp8Orrv64aXLA62T0P2xlNc6uSRp7N7X3opePreIC4zYeBBPgmnb-ca7RfnKssWos6ubOTJqtnbGFKpQ==" target="_blank"><img border="0" contenteditable="false" optionname="NEWS_FITNESS_HDER" src="http://www.signup.virtualfitnesscoach.com/images/vfcwelcome.jpg" /></a></td></tr></table>
       <table style="margin-bottom:10px;background-color:#ffffff" id="content_LETTER.BLOCK11" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0" bgcolor="#ffffff">
<tr>
<td style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;" align="left"><font color="#2E66C5" size="2" face="Arial,Helvetica,sans-serif" style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;">
<blockquote style="MARGIN-RIGHT: 0px" dir="ltr">
<p><font color="#000000"><strong>Hello,</strong>&nbsp;<br /><br /></font><font color="#000000">This is Mel from <a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNQeX-qHSPPKZRgdUJeZH_3rF5bZxBYl7b04Ye4Mbvcdruk_rWwJvbLg-5lVZbWhJw1uNw3cCo2qKY6fjZ-SFdctV5TBCBOztKQ7nHv972i0WtHtQbFwZRder6Efdvf2GFFl0GiubreIGg==" linktype="link" target="_blank">Virtual Fitness Coach</a>&nbsp;- here to help you reach your fitness goals!</font></p>
<div><font color="#000000">You have recently submitted your Instant Fitness Plan request&nbsp;on our Web site, and here are your results:&nbsp;&nbsp;</font></div></blockquote>
<div><font color="#000000">&nbsp;</font></div>
<div><font color="#000000" size="3"><strong>I. Your total number of calories was: <font color="#0000ff"> ' . round($bmr,0) . ' </font></strong></font></div>
<blockquote style="MARGIN-RIGHT: 0px" dir="ltr">
<div><font color="#000000">I generated&nbsp;this number by first calculating your <em>BMR - Basal Metabolic Rate</em> (the amount of calories of energy your body will burn off in a day if you didn"t get out of bed).&nbsp; </font></div>
<div><font color="#000000">&nbsp;</font></div>
<div><font color="#000000">From there, I multiplied that number by an "activity multiplier", which you selected from the dropdown box.&nbsp; </font></div>
<div><font color="#000000">&nbsp;</font></div>
<div><font color="#000000">Here are the calculations that I used: 
<div>&nbsp;<br /></div></font><font color="#000000">Male BMR = 66 + (13.7 X weight in Kilos) + (5 X height in centimeters) - (6.8 X age in years)<br /></font></div>
<div><font color="#000000">
<div>&nbsp;</div>Female BMR = 655 + (9.6 X Weight in Kilos) + (1.8 X height in centimeters) - (4.7 X age in years) 
<div>&nbsp;</div></font></div></blockquote>
<div dir="ltr"><font color="#000000" size="3"><strong>II. How many weeks to reach your goal: <font color="#0000ff"> ' . round($weight_weeks,0) . ' </font></strong></font></div>
<blockquote style="MARGIN-RIGHT: 0px" dir="ltr">
<div dir="ltr"><font color="#000000">
<div>A reasonable weight loss or gain per week ranges from one to two pounds.&nbsp; I know that may sound meager compared to all of those magazines at the grocery store check out line, but the difference between my pounds and theirs&nbsp;is the fact that I clarify what you"ll gain or lose.&nbsp; </div>
<div>&nbsp;</div>
<div>If you lose, it will be fat.&nbsp; If you gain it will be muscle.&nbsp; So the next time you hear someone say they lost 10 pounds in a week, ask them "pounds of what?"</div>
<div>&nbsp;</div></font></div></blockquote>
<div dir="ltr"><strong><font color="#000000" size="3">III. Okay, now what?</font></strong>&nbsp; </div>
<blockquote style="MARGIN-RIGHT: 0px" dir="ltr">
<div dir="ltr"><font color="#000000">First, let"s acknowledge that these figures are approximations, however&nbsp;in my <strong>30 years</strong> of training people I"ve found these numbers&nbsp;to be excellent information to work from.&nbsp; </font></div>
<div dir="ltr">&nbsp;</div>
<div dir="ltr"><font color="#000000">Second, like most things in life they really don"t mean that much unless <em>you know how to apply them</em>.&nbsp; So I"ve included a general observation about the&nbsp;two main components you need to consider in order to achieve your own personal health and fitness goals.</font></div></blockquote></font></td></tr></table>
       </td>
       </tr>
       <tr>
       <td valign="top" width="100%" rowspan="1" colspan="1" align="left">
                      <a name="LETTER.BLOCK12" /><table style="margin-bottom:10px;background-color:#ffffff" id="content_LETTER.BLOCK12" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0" bgcolor="#ffffff">
<tr>
<td style="background-image:url(http://img.constantcontact.com/letters/images/1101093164665/news_fitness_titlebg1.jpg);background-repeat:no-repeat;background-color:#FF9933;color:#FEFEFE;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:14pt;" bgcolor="#FF9933" background="http://img.constantcontact.com/letters/images/1101093164665/news_fitness_titlebg1.jpg" width="99%" align="left"><font color="#FEFEFE" size="4" face="Arial Narrow,Arial MT Condensed Light,sans-serif" style="color:#FEFEFE;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:14pt;"><b>Nutrition</b></font></td></tr>
<tr>
<td style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;" align="left"><font color="#2E66C5" size="2" face="Arial,Helvetica,sans-serif" style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;">
<blockquote>
<p><font color="#000000"><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNQm7SBbIn3r63UbWHSmlluIbrgfI0noK4kNd5aaDgmdvMdfYc1DdhMjWw6E73Pp8Orrv64aXLA62T0P2xlNc6uSRp7N7X3opePreIC4zYeBBPgmnb-ca7RfnKssWos6ubOTJqtnbGFKpQ==" target="_blank"><img name="ACCOUNT.IMAGE.3" border="0" contenteditable="false" alt="Food" src="http://origin.ih.constantcontact.com/fs095/1102365168645/img/3.jpg?a=1102371918445" align="right" /></a>As a coach and an athlete who has competed in an Ironman triathlon, there"s one area of fitness I think I"ve had my fair share of personal experience - what to eat and when to eat it!&nbsp;&nbsp;</font><font color="#000000">&nbsp;</font></p><font color="#000000">And if you do nothing other than take this one snippet of advice you"ll be closer to your weight goal, whether that"s to lose it or gain it.&nbsp; </font>
<div><font color="#000000">&nbsp;</font></div><font color="#000000"><strong>Eat at least 25% of your daily nutrition for breakfast.&nbsp; That"s it!&nbsp; Okay, not quite all of it.</strong>&nbsp; </font>
<div><font color="#000000">&nbsp;</font></div><font color="#000000">If you"ve done the math in your head and determined that you need to eat 500 calories for breakfast, it can"t be 500 calories of anything!&nbsp; It"s.&nbsp; A drive through biscuit might be 500 calories, but probably contains a whole day"s fat requirements in it!&nbsp; <strong>As a member of <a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNSDlD4gzCpu5ZAKEJFbTUiGa2VgEIwev0H9aTHCX7SwzNNeI7V0D6qfrYsaa0SJhijFesvRHEK348j-YpMA9oJwOCVhWI39jQTjwlvGmCSjbpdxHSuKuywt4d_ZAa8tlxqRZF8NOXMarymg_2fPTJJp" linktype="link" target="_blank">Virtual Fitness Coach</a>&nbsp;you"ll know what to eat, when to eat and how much to eat to achieve your goals.</strong></font></blockquote></font></td></tr></table>
                      <a name="LETTER.BLOCK13" /><table style="margin-bottom:10px;background-color:#ffffff" id="content_LETTER.BLOCK13" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0" bgcolor="#ffffff">
<tr>
<td style="background-image:url(http://img.constantcontact.com/letters/images/1101093164665/news_fitness_titlebg1.jpg);background-repeat:no-repeat;background-color:#FF9933;color:#FEFEFE;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:14pt;" bgcolor="#FF9933" background="http://img.constantcontact.com/letters/images/1101093164665/news_fitness_titlebg1.jpg" width="99%" align="left"><font color="#FEFEFE" size="4" face="Arial Narrow,Arial MT Condensed Light,sans-serif" style="color:#FEFEFE;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:14pt;"><b>Exercise</b></font></td></tr>
<tr>
<td style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;" align="left"><font color="#2E66C5" size="2" face="Arial,Helvetica,sans-serif" style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;">
<blockquote style="MARGIN-RIGHT: 0px" dir="ltr">
<div><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNTM2cMQEuJXMXLeSqsgcmtPsXpdamMnhVDntZwhQMYk37dIATu5Q5DqU1QnZ8poyFJl0-10lEde7Avw3bHdpbyIqT8FMBI-VRugGjfXHeLEgg==" target="_blank"><font color="#000000" face="Arial,Helvetica,sans-serif"><img height="100" name="ACCOUNT.IMAGE.2" border="0" width="100" contenteditable="false" alt="exercise" src="http://origin.ih.constantcontact.com/fs095/1102365168645/img/2.gif?a=1102371918445" align="right" /></font></a><font color="#000000" face="Arial,Helvetica,sans-serif">If joining a gym or buying equipment for the home was all people needed to do to lead a fit and healthy life, the world would be a different place </font><font color="#000000" face="Arial,Helvetica,sans-serif">wouldn"t it?&nbsp; 
<div>&nbsp;</div>So let me ask you this: Have you tried and failed to lose fat or gain muscle?&nbsp; Or have you had temporary results only to lose all of your gains?&nbsp; 
<div>&nbsp;</div>
<div>Are you ready to get that fit and healthy body you"ve always wanted and are prepared to take the expert advice of a professional?&nbsp; What are you waiting for?&nbsp; Let"s get started....<br />&nbsp;&nbsp;&nbsp;</div></font></div>
<div>
<div><strong><font color="#000000" face="Arial,Helvetica,sans-serif">That"s what a personal trainer brings to the gym or home.&nbsp; Knowledge, skills, experience, motivation.... </font></strong></div>
<div><font color="#000000" face="Arial,Helvetica,sans-serif">&nbsp;</font></div>
<div><font color="#000000" face="Arial,Helvetica,sans-serif">And that"s what you"ll get and more as a member&nbsp;of 
<div>Virtual Fitness Coach.com...You have my word.&nbsp; </div>
<div>&nbsp;</div>
<div><font size="4"><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNSDlD4gzCpu5ZAKEJFbTUiGa2VgEIwev0H9aTHCX7SwzNNeI7V0D6qfrYsaa0SJhijFesvRHEK348j-YpMA9oJwOCVhWI39jQTjwlvGmCSjbpdxHSuKuywt4d_ZAa8tlxqRZF8NOXMarymg_2fPTJJp" linktype="link" target="_blank">Make a Change & Get Started Today</a></font><font size="4">!&nbsp;</font></div></font></div></div></blockquote></font></td></tr></table>
                    </td>
                </tr>
                <tr>
                  <td style="background-color:#92B2E6;" bgcolor="#92B2E6" valign="top" width="100%" rowspan="1" colspan="1" align="left">
                      <table style="background-color:#1F4858;margin-bottom:10px;" bgcolor="#1F4858" border="0" width="100%" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="1" rowspan="1" colspan="1" align="left" />
                          </tr>
                        </table>
       
                      <table style="margin-bottom:10px;background-color:#ffffff" id="content_LETTER.BLOCK16" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0" bgcolor="#ffffff">
<tr>
<td style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;" align="left"><font color="#2E66C5" size="2" face="Arial,Helvetica,sans-serif" style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;">
<blockquote>
<div><font color="#000000">Thank you,&nbsp;and remember, as a member of Virtual Fitness Coach&nbsp;- I"ll be with you every step of the way to achieve your fitness goals.&nbsp;</font></div>
<div><font color="#000000">&nbsp;</font></div>
<div><font color="#000000"><b>Sincerely,</b> </font></div>
<div><font color="#000000">&nbsp;</font></div><span><br /><font color="#000000">Mel O"Keefe<br />Virtual Fitness Coach</font>
<div><a href="mailto:trainer@virtualfitnesscoach.com" target="_blank">trainer@virtualfitnesscoach.com</a>&nbsp;</div></span></blockquote></font></td></tr></table>
                    </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td height="10" width="100%" rowspan="1" colspan="1" align="left">
          
        </td>
    </tr>
  </table>
  </td>
</tr>
</table>
</div>

</body>
</html>';	
				
		$headers = "From: <Trainer@virtualfitnesscoach.com>" . "\r\n";
		$headers  .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		mail($to,$subject,$message,$headers);



		
		
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
		
		
		$to = "trainer@virtualfitnesscoach.com";
		$subject = "Instant Fitness Plan Result";

		$message = "Instant Fitness Plan Result \n" ."
		Age =" . $_GET['agevar'] ." \n
		Feet  = " . $_GET['feetvar'] ."\n
		Inches  = " . $_GET['inchesvar'] ."\n
		Weight  = " . $_GET['weightvar'] ." \n
		Gender  = " . $_GET['gendervar'] ." \n
		Activity  = " . $_GET['activityvar'] ." \n
		Goal Weight  = " . $_GET['goalweightvar'] ." \n
		Goal  = " . $_GET['goalvar'] ." \n
		Email  = " . $_GET['emailvar'] ." \n\n" .
		"To achieve your goal weight, you should consume " . round($bmr,0). " calories per day. \n\n" .
		"In combination with our workout program you could reach your goal in " . round($weight_weeks,0) . " weeks.";		
				
		$from = "calculator@virtualfitnesscoach.com";
		$headers = "From: $from";
		
		mail($to,$subject,$message,$headers);
		
		
		
		
		
		$to = $_GET['emailvar'];
		$subject = "Instant Fitness Plan Result";

		$message = '<html><head><title>Your customized Fitness Plan</title><style type="text/css"> #VWPLINK {display:none}</style></head><br />
 

<body topmargin="0" leftmargin="0" rightmargin="0"><div align="center" style="background-color:#ffffff;padding-bottom:10px;"><div align="left" style="font-family:verdana,arial;font-size:8pt;color:#000000;width:600;"><font face="verdana,arial" size="1" color="#000000" style="font-family:verdana,arial;font-size:8pt;color:#000000;"><center><table bgcolor="#ffffff" width="595" id="VWPLINK"><tr><td style="font-size: 8pt; font-family: Verdana, Arial, Helvetica, sans-serif; color: #000000;" width="100%" rowspan="1" colspan="1">Having trouble viewing this email?
<a track="off" shape="rect" href="http://campaign.constantcontact.com/render?v=001aqj1QInodGQZqZzXn0-19EFV4e5FnZ61oviSKUp9jq3qZnVo44_oySfvD-r5SZ2hWTkzwrJXu7MMZiThH97OdZdBWrBM8cOSRsHVqermdIRFybaAbjRg13ON80eRK_By7N3Xx2cqVMaNEVIeyVWvm29hmQmWC3fBXldNFu47kUXoY_R3A2CgqRzK5YaeR1oL6ITP_Itpsql7WCH1q9SM75MQK3M2aOvF4G62RepECaJ5fIyLeyz2OcdmZ6UNfwauatQUiDiVVBigxj9G6K12rkANqBwegcE-VMZOq1VUxsLqQ4pDlqWSAONkQ9e5_KkQLGWwr6PBz35_Mnc2WpdIjsEmMcR-d2fRyI15pnw9_3sL9EjwI6mqxQoH8Ge_7ld3JGDhZBaGJupsirRMePLfFGecPMxA6mD_" target="_blank">Click here
</a></td></tr></table></center></font></div></div>
<div style="overflow: auto;" id="rootDiv" align="center">
<table style="background-color:#FFFFFF;margin:0px 0px 0px 0px;" bgcolor="#FFFFFF" border="0" width="100%" cellspacing="0" cellpadding="0">
<tr>
 <td valign="top" rowspan="1" colspan="1" align="center">
  <table style="width:600px;" border="0" width="600" cellspacing="0" cellpadding="1">
    <tr>
      <td valign="top" width="100%" rowspan="1" colspan="1" align="left">
          
        <table id="content_LETTER.BLOCK1" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="0" contenteditable="inherit" datapagesize="0">
<tr>
<td valign="bottom" align="middle"><span><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNQm7SBbIn3r63UbWHSmlluIbrgfI0noK4kNd5aaDgmdvMdfYc1DdhMjWw6E73Pp8Orrv64aXLA62T0P2xlNc6uSRp7N7X3opePreIC4zYeBBPgmnb-ca7RfnKssWos6ubOTJqtnbGFKpQ==" target="_blank"><img name="ACCOUNT.IMAGE.1" border="0" contenteditable="false" alt="VFC Logo" src="http://origin.ih.constantcontact.com/fs095/1102365168645/img/1.jpg?a=1102371918445" /></a></span></td></tr></table></td>
    </tr>
    <tr>
      <td style="background-color:#4379D3;padding:1px;" bgcolor="#4379D3" rowspan="1" colspan="1" align="left">
        <table style="background-color:#92B2E6;" bgcolor="#92B2E6" border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td style="background-image:url(http://img.constantcontact.com/letters/images/1101093164665/news_fitness_topbg.jpg);height:90px;background-repeat:no-repeat;background-color:#92B2E6;" bgcolor="#92B2E6" background="http://img.constantcontact.com/letters/images/1101093164665/news_fitness_topbg.jpg" width="100%" rowspan="1" colspan="2" align="left">
                <table id="content_LETTER.BLOCK2" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="0" contenteditable="inherit" datapagesize="0">
<tr>
<td style="color:#2E66C5;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:24pt;" align="middle"><font color="#2E66C5" size="6" face="Arial Narrow,Arial MT Condensed Light,sans-serif" style="color:#2E66C5;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:24pt;"><span>Your Virtual Fitness Coach</span> Fitness Plan</font></td></tr></table>
              </td>
          </tr>
          <tr>
            <td style="background-color:#92B2E6;padding-top:5px;padding-left:0px;padding-bottom:5px;padding-right:5px;" bgcolor="#92B2E6" valign="top" rowspan="1" colspan="1" align="left">
              <table style="width:150px;" border="0" width="160" cellspacing="0" cellpadding="3">
                <tr>
                  <td valign="top" width="100%" rowspan="1" colspan="1" align="center">
                      
                      <table class="QuickLinksBorder" style="margin-bottom:10px;" id="content_LETTER.BLOCK4" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0">
<tr>
<td style="background-color:#4379D3;color:#FFD354;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:10pt;" bgcolor="#4379D3" valign="center" align="middle"><font color="#FFD354" size="2" face="Arial Narrow,Arial MT Condensed Light,sans-serif" style="color:#FFD354;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:10pt;"><b>Virtual Fitness Coach</b>&nbsp;</font></td></tr>
<tr>
<td style="color:#FFFFFF;font-family:Arial,Helvetica,sans-serif;font-size:10pt;" align="middle"><font color="#FFFFFF" size="2" face="Arial,Helvetica,sans-serif" style="color:#FFFFFF;font-family:Arial,Helvetica,sans-serif;font-size:10pt;">
<div><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNSDlD4gzCpu5ZAKEJFbTUiGa2VgEIwev0H9aTHCX7SwzNNeI7V0D6qfrYsaa0SJhijFesvRHEK348j-YpMA9oJwOCVhWI39jQTjwlvGmCSjbpdxHSuKuywt4d_ZAa8tlxqRZF8NOXMarymg_2fPTJJp" linktype="link" target="_blank">Register Now</a></div>
<div><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNR4FO689apV6nhifR5VX5rzVYjGas8bFI2k9sJDD7l_ZwzxlejthP6V3o8YZhHqrX_jjEHv8dlmyNx0mhDYPQtRyldTYz_FEclY1sI54XU-sg0vDgp9rFOMUgzZOU2BOeR4oiCGNJnhetm7NKVYN8t-TpZLuteIU0TwpBQqHj4fRg==" linktype="link" target="_blank">Why Us?</a></div>
<div><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNQ8T0ndfEIRl-LIhRBTi1Y9kCVATWr6Jg09J7tPeGUpv7rUcWs6xqXdAwpw0AscyZOrVe0KfjDCj1NQXlJidXNtxfXGWDyYhkEqWvuR8-nB856ObXpjrrPwUEEsqzGFErszUJdL01rwoHzEzbcCQC9iWfeaksqdxKE=" linktype="link" target="_blank">Success Stories</a></div>
<div><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNQlzKER8zktjvqj8bQFQxZCYP7rq76vQgDTE1xMmhY9-KXHHBS7OmacEYSQcZcKrnKU0MD_p2JWGdvUJqhHGzgItCGe2DZqWpNXZ35H-jitQmgGiEU0chp_hWV_uoKwHxekOwkEbQoJooTpX-MhmAYt" linktype="link" target="_blank">Visit Today</a></div></font></td></tr></table>
                      
                      
                      
                      
                    <table style="margin-bottom:10px;" id="content_LETTER.BLOCK23" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0">
<tr>
<td align="middle"><em>&nbsp; </em>
<div>
<div><font size="2"><em>"After my first baby, I started Mel"s program and was consistently losing 2 pounds a week. The exercises were really easy to follow and understand. Thanks Mel for all of your help."<br />-MH</em> </font></div><br /></div></td></tr></table><table style="margin-bottom:10px;" id="content_LETTER.BLOCK25" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0">
<tr>
<td align="middle"><font size="2" face="Trebuchet MS,Verdana,Helvetica,sans-serif"><em>&nbsp;</em></font>
<div>
<div><font size="2"><font face="Times New Roman,Times,Serif"><em>"Before I started training with Mel, the furthest&nbsp;I could run was for a minute on the treadmill. Six months later, I did my first half marathon and because of his motivation will be doing my third one soon."<br />-AW</em></font> </font></div><br /></div></td></tr></table><table style="margin-bottom:10px;" id="content_LETTER.BLOCK26" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0">
<tr>
<td align="middle">&nbsp; 
<div>
<div align="center"><font size="2"><em>"Since I"ve been working with Mel, I"ve gained about 12 pounds of muscle and taken 6 strokes off my handicap."<br />-JC </em></font></div><br /></div></td></tr></table></td>
                </tr>
              </table>
            </td>
            <td style="background-color:#92B2E6;padding-top:5px;padding-left:0;padding-bottom:5px;padding-right:0;" bgcolor="#92B2E6" valign="top" rowspan="1" colspan="1" align="left">
              <table style="width:440px;" border="0" width="440" cellspacing="0" cellpadding="3">
                <tr>
                  <td valign="top" width="100%" rowspan="1" colspan="1" align="left">
                      <table style="background-image:url(http://img.constantcontact.com/letters/images/1101093164665/news_fitness_titlebg1.jpg);background-repeat:no-repeat;background-color:#FF9933;" background="http://img.constantcontact.com/letters/images/1101093164665/news_fitness_titlebg1.jpg" id="content_LETTER.BLOCK9" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0" bgcolor="#FF9933">
<tr>
<td style="color:#FFFFCC;font-family:Verdana,Geneva,Arial,Helvetica,sans-serif;font-size:10pt;" width="50%" align="left"></td>
<td style="color:#FFFFCC;font-family:Verdana,Geneva,Arial,Helvetica,sans-serif;font-size:10pt;" width="49%" align="right"><font color="#FFFFCC" size="2" face="Verdana,Geneva,Arial,Helvetica,sans-serif" style="color:#FFFFCC;font-family:Verdana,Geneva,Arial,Helvetica,sans-serif;font-size:10pt;">&nbsp;</font></td></tr></table>
                      <table style="margin-bottom:10px;" id="content_LETTER.BLOCK10" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="0" contenteditable="inherit" datapagesize="0">
<tr>
<td valign="top" align="left"><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNQm7SBbIn3r63UbWHSmlluIbrgfI0noK4kNd5aaDgmdvMdfYc1DdhMjWw6E73Pp8Orrv64aXLA62T0P2xlNc6uSRp7N7X3opePreIC4zYeBBPgmnb-ca7RfnKssWos6ubOTJqtnbGFKpQ==" target="_blank"><img border="0" contenteditable="false" optionname="NEWS_FITNESS_HDER" src="http://www.signup.virtualfitnesscoach.com/images/vfcwelcome.jpg" /></a></td></tr></table>
       <table style="margin-bottom:10px;background-color:#ffffff" id="content_LETTER.BLOCK11" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0" bgcolor="#ffffff">
<tr>
<td style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;" align="left"><font color="#2E66C5" size="2" face="Arial,Helvetica,sans-serif" style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;">
<blockquote style="MARGIN-RIGHT: 0px" dir="ltr">
<p><font color="#000000"><strong>Hello,</strong>&nbsp;<br /><br /></font><font color="#000000">This is Mel from <a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNQeX-qHSPPKZRgdUJeZH_3rF5bZxBYl7b04Ye4Mbvcdruk_rWwJvbLg-5lVZbWhJw1uNw3cCo2qKY6fjZ-SFdctV5TBCBOztKQ7nHv972i0WtHtQbFwZRder6Efdvf2GFFl0GiubreIGg==" linktype="link" target="_blank">Virtual Fitness Coach</a>&nbsp;- here to help you reach your fitness goals!</font></p>
<div><font color="#000000">You have recently submitted your Instant Fitness Plan request&nbsp;on our Web site, and here are your results:&nbsp;&nbsp;</font></div></blockquote>
<div><font color="#000000">&nbsp;</font></div>
<div><font color="#000000" size="3"><strong>I. Your total number of calories was: <font color="#0000ff"> ' . round($bmr,0) . ' </font></strong></font></div>
<blockquote style="MARGIN-RIGHT: 0px" dir="ltr">
<div><font color="#000000">I generated&nbsp;this number by first calculating your <em>BMR - Basal Metabolic Rate</em> (the amount of calories of energy your body will burn off in a day if you didn"t get out of bed).&nbsp; </font></div>
<div><font color="#000000">&nbsp;</font></div>
<div><font color="#000000">From there, I multiplied that number by an "activity multiplier", which you selected from the dropdown box.&nbsp; </font></div>
<div><font color="#000000">&nbsp;</font></div>
<div><font color="#000000">Here are the calculations that I used: 
<div>&nbsp;<br /></div></font><font color="#000000">Male BMR = 66 + (13.7 X weight in Kilos) + (5 X height in centimeters) - (6.8 X age in years)<br /></font></div>
<div><font color="#000000">
<div>&nbsp;</div>Female BMR = 655 + (9.6 X Weight in Kilos) + (1.8 X height in centimeters) - (4.7 X age in years) 
<div>&nbsp;</div></font></div></blockquote>
<div dir="ltr"><font color="#000000" size="3"><strong>II. How many weeks to reach your goal: <font color="#0000ff"> ' . round($weight_weeks,0) . ' </font></strong></font></div>
<blockquote style="MARGIN-RIGHT: 0px" dir="ltr">
<div dir="ltr"><font color="#000000">
<div>A reasonable weight loss or gain per week ranges from one to two pounds.&nbsp; I know that may sound meager compared to all of those magazines at the grocery store check out line, but the difference between my pounds and theirs&nbsp;is the fact that I clarify what you"ll gain or lose.&nbsp; </div>
<div>&nbsp;</div>
<div>If you lose, it will be fat.&nbsp; If you gain it will be muscle.&nbsp; So the next time you hear someone say they lost 10 pounds in a week, ask them "pounds of what?"</div>
<div>&nbsp;</div></font></div></blockquote>
<div dir="ltr"><strong><font color="#000000" size="3">III. Okay, now what?</font></strong>&nbsp; </div>
<blockquote style="MARGIN-RIGHT: 0px" dir="ltr">
<div dir="ltr"><font color="#000000">First, let"s acknowledge that these figures are approximations, however&nbsp;in my <strong>30 years</strong> of training people I"ve found these numbers&nbsp;to be excellent information to work from.&nbsp; </font></div>
<div dir="ltr">&nbsp;</div>
<div dir="ltr"><font color="#000000">Second, like most things in life they really don"t mean that much unless <em>you know how to apply them</em>.&nbsp; So I"ve included a general observation about the&nbsp;two main components you need to consider in order to achieve your own personal health and fitness goals.</font></div></blockquote></font></td></tr></table>
       </td>
       </tr>
       <tr>
       <td valign="top" width="100%" rowspan="1" colspan="1" align="left">
                      <a name="LETTER.BLOCK12" /><table style="margin-bottom:10px;background-color:#ffffff" id="content_LETTER.BLOCK12" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0" bgcolor="#ffffff">
<tr>
<td style="background-image:url(http://img.constantcontact.com/letters/images/1101093164665/news_fitness_titlebg1.jpg);background-repeat:no-repeat;background-color:#FF9933;color:#FEFEFE;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:14pt;" bgcolor="#FF9933" background="http://img.constantcontact.com/letters/images/1101093164665/news_fitness_titlebg1.jpg" width="99%" align="left"><font color="#FEFEFE" size="4" face="Arial Narrow,Arial MT Condensed Light,sans-serif" style="color:#FEFEFE;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:14pt;"><b>Nutrition</b></font></td></tr>
<tr>
<td style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;" align="left"><font color="#2E66C5" size="2" face="Arial,Helvetica,sans-serif" style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;">
<blockquote>
<p><font color="#000000"><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNQm7SBbIn3r63UbWHSmlluIbrgfI0noK4kNd5aaDgmdvMdfYc1DdhMjWw6E73Pp8Orrv64aXLA62T0P2xlNc6uSRp7N7X3opePreIC4zYeBBPgmnb-ca7RfnKssWos6ubOTJqtnbGFKpQ==" target="_blank"><img name="ACCOUNT.IMAGE.3" border="0" contenteditable="false" alt="Food" src="http://origin.ih.constantcontact.com/fs095/1102365168645/img/3.jpg?a=1102371918445" align="right" /></a>As a coach and an athlete who has competed in an Ironman triathlon, there"s one area of fitness I think I"ve had my fair share of personal experience - what to eat and when to eat it!&nbsp;&nbsp;</font><font color="#000000">&nbsp;</font></p><font color="#000000">And if you do nothing other than take this one snippet of advice you"ll be closer to your weight goal, whether that"s to lose it or gain it.&nbsp; </font>
<div><font color="#000000">&nbsp;</font></div><font color="#000000"><strong>Eat at least 25% of your daily nutrition for breakfast.&nbsp; That"s it!&nbsp; Okay, not quite all of it.</strong>&nbsp; </font>
<div><font color="#000000">&nbsp;</font></div><font color="#000000">If you"ve done the math in your head and determined that you need to eat 500 calories for breakfast, it can"t be 500 calories of anything!&nbsp; It"s.&nbsp; A drive through biscuit might be 500 calories, but probably contains a whole day"s fat requirements in it!&nbsp; <strong>As a member of <a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNSDlD4gzCpu5ZAKEJFbTUiGa2VgEIwev0H9aTHCX7SwzNNeI7V0D6qfrYsaa0SJhijFesvRHEK348j-YpMA9oJwOCVhWI39jQTjwlvGmCSjbpdxHSuKuywt4d_ZAa8tlxqRZF8NOXMarymg_2fPTJJp" linktype="link" target="_blank">Virtual Fitness Coach</a>&nbsp;you"ll know what to eat, when to eat and how much to eat to achieve your goals.</strong></font></blockquote></font></td></tr></table>
                      <a name="LETTER.BLOCK13" /><table style="margin-bottom:10px;background-color:#ffffff" id="content_LETTER.BLOCK13" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0" bgcolor="#ffffff">
<tr>
<td style="background-image:url(http://img.constantcontact.com/letters/images/1101093164665/news_fitness_titlebg1.jpg);background-repeat:no-repeat;background-color:#FF9933;color:#FEFEFE;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:14pt;" bgcolor="#FF9933" background="http://img.constantcontact.com/letters/images/1101093164665/news_fitness_titlebg1.jpg" width="99%" align="left"><font color="#FEFEFE" size="4" face="Arial Narrow,Arial MT Condensed Light,sans-serif" style="color:#FEFEFE;font-family:Arial Narrow,Arial MT Condensed Light,sans-serif;font-size:14pt;"><b>Exercise</b></font></td></tr>
<tr>
<td style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;" align="left"><font color="#2E66C5" size="2" face="Arial,Helvetica,sans-serif" style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;">
<blockquote style="MARGIN-RIGHT: 0px" dir="ltr">
<div><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNTM2cMQEuJXMXLeSqsgcmtPsXpdamMnhVDntZwhQMYk37dIATu5Q5DqU1QnZ8poyFJl0-10lEde7Avw3bHdpbyIqT8FMBI-VRugGjfXHeLEgg==" target="_blank"><font color="#000000" face="Arial,Helvetica,sans-serif"><img height="100" name="ACCOUNT.IMAGE.2" border="0" width="100" contenteditable="false" alt="exercise" src="http://origin.ih.constantcontact.com/fs095/1102365168645/img/2.gif?a=1102371918445" align="right" /></font></a><font color="#000000" face="Arial,Helvetica,sans-serif">If joining a gym or buying equipment for the home was all people needed to do to lead a fit and healthy life, the world would be a different place </font><font color="#000000" face="Arial,Helvetica,sans-serif">wouldn"t it?&nbsp; 
<div>&nbsp;</div>So let me ask you this: Have you tried and failed to lose fat or gain muscle?&nbsp; Or have you had temporary results only to lose all of your gains?&nbsp; 
<div>&nbsp;</div>
<div>Are you ready to get that fit and healthy body you"ve always wanted and are prepared to take the expert advice of a professional?&nbsp; What are you waiting for?&nbsp; Let"s get started....<br />&nbsp;&nbsp;&nbsp;</div></font></div>
<div>
<div><strong><font color="#000000" face="Arial,Helvetica,sans-serif">That"s what a personal trainer brings to the gym or home.&nbsp; Knowledge, skills, experience, motivation.... </font></strong></div>
<div><font color="#000000" face="Arial,Helvetica,sans-serif">&nbsp;</font></div>
<div><font color="#000000" face="Arial,Helvetica,sans-serif">And that"s what you"ll get and more as a member&nbsp;of 
<div>Virtual Fitness Coach.com...You have my word.&nbsp; </div>
<div>&nbsp;</div>
<div><font size="4"><a track="on" href="http://rs6.net/tn.jsp?e=001awwWDtj_sNSDlD4gzCpu5ZAKEJFbTUiGa2VgEIwev0H9aTHCX7SwzNNeI7V0D6qfrYsaa0SJhijFesvRHEK348j-YpMA9oJwOCVhWI39jQTjwlvGmCSjbpdxHSuKuywt4d_ZAa8tlxqRZF8NOXMarymg_2fPTJJp" linktype="link" target="_blank">Make a Change & Get Started Today</a></font><font size="4">!&nbsp;</font></div></font></div></div></blockquote></font></td></tr></table>
                    </td>
                </tr>
                <tr>
                  <td style="background-color:#92B2E6;" bgcolor="#92B2E6" valign="top" width="100%" rowspan="1" colspan="1" align="left">
                      <table style="background-color:#1F4858;margin-bottom:10px;" bgcolor="#1F4858" border="0" width="100%" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="1" rowspan="1" colspan="1" align="left" />
                          </tr>
                        </table>
       
                      <table style="margin-bottom:10px;background-color:#ffffff" id="content_LETTER.BLOCK16" width="100%" border="0" hidefocus="true" tabindex="0" cellspacing="0" cols="0" cellpadding="5" contenteditable="inherit" datapagesize="0" bgcolor="#ffffff">
<tr>
<td style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;" align="left"><font color="#2E66C5" size="2" face="Arial,Helvetica,sans-serif" style="color:#2E66C5;font-family:Arial,Helvetica,sans-serif;font-size:10pt;">
<blockquote>
<div><font color="#000000">Thank you,&nbsp;and remember, as a member of Virtual Fitness Coach&nbsp;- I"ll be with you every step of the way to achieve your fitness goals.&nbsp;</font></div>
<div><font color="#000000">&nbsp;</font></div>
<div><font color="#000000"><b>Sincerely,</b> </font></div>
<div><font color="#000000">&nbsp;</font></div><span><br /><font color="#000000">Mel O"Keefe<br />Virtual Fitness Coach</font>
<div><a href="mailto:trainer@virtualfitnesscoach.com" target="_blank">trainer@virtualfitnesscoach.com</a>&nbsp;</div></span></blockquote></font></td></tr></table>
                    </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td height="10" width="100%" rowspan="1" colspan="1" align="left">
          
        </td>
    </tr>
  </table>
  </td>
</tr>
</table>
</div>

</body>
</html>';	
				
		
		$headers = "From: <Trainer@virtualfitnesscoach.com>" . "\r\n";
		$headers  .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		mail($to,$subject,$message,$headers);
		
		
		
		}
		
		if ($_GET['goalweightvar'] < $_GET['weightvar']){
		echo "If you wish to loose weight you should select weight loss as your goal.";
		}
	}
echo "</div>";
}

?> 

