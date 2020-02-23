<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<script type="text/javascript" src="/js/ajax.js"></script>

<?php  if($header == true): ?>
<script type="text/javascript">
var c = 0;
var t;
var timer_is_on = 0;
var totaltime = 0;
var ajax = new sack();

function timedCount()
{
  //document.getElementById('txt').value = c;
  c = c+1;
  t = setTimeout("timedCount()",1000);
}

function doTimer()
{
if (!timer_is_on)
  {
  timer_is_on=1;
  timedCount();
  }
}

function stopCount()
{
clearTimeout(t);
timer_is_on=0;
}

function sendupdates(){
	 if(c < 30){ //IF IDLE FOR 30 seconds or less send updates
    	//alert('Updates sent');
			   ajax.requestFile = "/main.php/index/ajax_report";
			   ajax.setVar("userid", '<?php echo sfContext::getInstance()->getUser()->getAttribute('user_id', 'NA'); ?>'); // recomended method of setting data to be parsed.
			   ajax.runAJAX();
				
 		   	
  	}else{
  		//alert('no update sent');
  		
  	}
 
 //START AGAIN
 setTimeout("sendupdates()",30000);
}

setTimeout("sendupdates()",30000);
</script>

<script language="JavaScript1.2">
<!--

// Detect if the browser is IE or not.
// If it is not IE, we assume that the browser is NS.
var IE = document.all?true:false

// If NS -- that is, !IE -- then set up for mouse capture
if (!IE) document.captureEvents(Event.MOUSEMOVE)

// Set-up to use getMouseXY function onMouseMove
document.onmousemove = getMouseXY;

// Temporary variables to hold mouse x-y pos.s
var tempX = 0
var tempY = 0

// Main function to retrieve mouse x-y pos.s

function getMouseXY(e) {
  if (IE) { // grab the x-y pos.s if browser is IE
    tempX = event.clientX + document.body.scrollLeft
    tempY = event.clientY + document.body.scrollTop
  } else {  // grab the x-y pos.s if browser is NS
    tempX = e.pageX
    tempY = e.pageY
  }  
  // catch possible negative values in NS4
  if (tempX < 0){tempX = 0}
  if (tempY < 0){tempY = 0}  
  
  
  // show the position values in the form named Show
  // in the text fields named MouseX and MouseY
  
  //document.Show.MouseX.value = tempX;
  //document.Show.MouseY.value = tempY;
  c=0;
  
  
  return true
}
</script>

<?php endif; ?>

<?php include_http_metas() ?>
<?php include_metas() ?>

<?php include_title() ?>
<!-- TRACKER -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6689690-1");
pageTracker._trackPageview();
} catch(err) {}</script>
<!--END TRACKER-->

<link rel="shortcut icon" href="/favicon.ico" />
<script type="text/javascript" src="/ddtabmenufiles/ddtabmenu.js"></script>
<link rel="stylesheet" type="text/css"
	href="/ddtabmenufiles/solidblocksmenu.css" />

<script type="text/javascript">
//SYNTAX: ddtabmenu.definemenu("tab_menu_id", integer OR "auto")
ddtabmenu.definemenu("tabcontainer", 0) //initialize Tab Menu #3 with 2nd tab selected
</script>
<style type="text/css">
#vfclogo {
	position: absolute;
	top: 20px;
	right: 2px;
	width: 400px;
}
</style>

</head>
<?php if($header == true): ?>
<body onload="timedCount();">
<?php endif; ?>


<link rel="stylesheet" type="text/css"
	href="/nutrition/ddsmoothmenu.css" />
<!--[if lte IE 7]>
<style type="text/css">
html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->

<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script type="text/javascript" src="/nutrition/ddsmoothmenu.js">
/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/
</script>
<div><?php  

if($header == true): ?>
<table border="0" width="100%">
	<tr>
		<td><img src='/images/Tentative_Logo2.jpg' alt="Virtual Fitness Coach" />
		<font size="+2">Welcome <?php echo ucwords($sf_user->getAttribute('user_name')); ?></font>
		</td>
		<td>
		<!--  form name="Show"><input type="text" name="MouseX" value="0" size="4">
		X<br>
		<input type="text" name="MouseY" value="0" size="4"> Y<br>
		</form-->

		<!-- BEGIN ProvideSupport.com Text Chat Link Code -->
		<div id="ciCDl1" style="z-index: 100; position: absolute"></div>
		<div id="scCDl1" style="display: inline"></div>
		<div id="sdCDl1" style="display: none"></div>
		<script type="text/javascript">var seCDl1=document.createElement("script");seCDl1.type="text/javascript";var seCDl1s=(location.protocol.indexOf("https")==0?"https":"http")+"://image.providesupport.com/js/vfc/safe-textlink.js?ps_h=CDl1&ps_t="+new Date().getTime()+"&online-link-html=Coach%20Mel%20is%20currently%20online%21%0D%0APlease%20click%20here%20to%20chat%20with%20Mel.&offline-link-html=";setTimeout("seCDl1.src=seCDl1s;document.getElementById('sdCDl1').appendChild(seCDl1)",1)</script>
		<noscript>
		<div style="display: inline"><a
			href="http://www.providesupport.com?messenger=vfc">Live Chat Support</a></div>
		</noscript>
		<!-- END ProvideSupport.com Text Chat Link Code --></td>
		<!-- td valign='middle'><img src='/siloets/skinny.jpg' height=105 width=85 border=1> Who you want to be !</td-->
		<!--  td valign='middle'><img src='/nutrition/tv.jpg'> What you want to earn !</td-->
	</tr>
</table>

<div id="smoothmenu1" class="ddsmoothmenu">
<ul>
	<li><a href="/main.php">Exercise</a>
	<ul>
		<li><a href="/main.php">Today's Workout</a></li>
		<?php
		$tomorrows_workouttype = $futuredays_array['type_num'][0];
		$nextday_workouttype = $futuredays_array['type_num'][1];
		$tomorrow = $futuredays_array['date'][0];//date("Y-m-").str_pad((date("d") + 1), 2, "0", STR_PAD_LEFT);
		$nextday = $futuredays_array['date'][1];//date("Y-m-").str_pad((date("d") + 2), 2, "0", STR_PAD_LEFT);
		$dayname1 = date("l", mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"))); //outputs TUE
		$dayname2 = date("l", mktime(0, 0, 0, date("m")  , date("d")+2, date("Y"))); //outputs WED

		echo"
		<li><a href=\"/main.php?type=$tomorrows_workouttype&date=$tomorrow\">$dayname1 Workout</a></li>
		<li><a href=\"/main.php?type=$nextday_workouttype&date=$nextday\">$dayname2 Workout</a></li>
  			";
		?>
	</ul>
	</li>
	<li><a href="/main.php?type=4">Nutrition</a></li>
	<li><a href="/main.php?type=10">Events</a></li>
	<li><a href="/main.php?type=9">Connect With Others</a></li>
	<li><a href="/main.php?type=7">Education</a></li>
	<li><a href="/main.php?type=6">Motivation</a></li>
	<li><a href="/main.php?type=5">Progress Report</a></li>
	<li><a href="/main.php?type=a">Assessment</a></li>
	<!-- li><a href="/main.php?type=8">Rewards</a></li-->
	<li><a href="<?php echo url_for('index/logout'); ?>">Logout</a></li>
</ul>
		<?php  endif; ?> <br style="clear: left" />
</div>
</div>

<?php echo $sf_data->getRaw('sf_content') ?>

</body>
</html>
