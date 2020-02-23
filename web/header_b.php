<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php $geturlvar = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>

<meta name="Keywords" content="<?php
if ($geturlvar == "index.php" or $geturlvar == "index_b.php"){
echo "Virtual Fitness Coach, online fitness, online coach, online exercise, online fitness trainer, online fitness training, online fitness trainer, online fitness training, online personal fitness, online personal fitness, online fitness programs, online fitness program, online fitness programs, online personal fitness trainer, online personal fitness trainer, virtual personal trainer, online exercise programs, online personal fitness training, fitness, exercise, exercises, personal trainer, exercise fitness, personal fitness, fitness training, exercise programs, fitness program, home exercise, fitness trainers, exercise routine, fitness programs, pregnancy exercise, personal fitness trainer, fitness instructor, exercise and fitness";
}

if ($geturlvar == "nutrition.php"){
echo "online nutrition, personalized nutrition, online nutrition programs, online food nutrition, health and nutrition online, personalized nutritional, personalized nutrition plan, best online nutrition, online nutrition information, online nutrition plan, personalized nutrition and exercise, personalized nutrition and exercise plan, nutrition online quiz, online nutrition plans, online nutrition advice, personalized fitness and nutrition";
}

if ($geturlvar == "get_fit.php"){
echo "";
}

if ($geturlvar == "see_success.php"){
echo "";
}

if ($geturlvar == "tools.php"){
echo "";
}

if ($geturlvar == "about_us.php"){
echo "Virtual Fitness Coach, About Virtual Fitness, Virtual Fitness, About Online Fitness, Online Coach, Virtually Fit";
}

if ($geturlvar == "what_sets_us_apart.php"){
echo "";
}

?>" />

<meta name="Description" content="<?php
if ($geturlvar == "index.php"){
echo "Virtual Fitness Coach is The Exercise Fitness Program For You! Mel Will Be Your Online Personal Fitness Trainer and Coach to Help You Become More Fit, Better Looking and Feeling Healthy. Virtual Fitness Coach’s Online Fitness Programs are an Innovative & Unique Way To Get In Shape.";
}

if ($geturlvar == "nutrition.php"){
echo "Your Online Nutrition Information Guide is Here! Virtual Fitness Coach Offers Personalized Online Nutrition Programs and Plans Catered Specifically To You and Your Nutrition Needs.  You tell us what your nutrition goals are and we’ll show you what and how much you need to eat, and when the right time to eat is so that you can correctly maintain your nutrition program...Online and Personalized.";
}

if ($geturlvar == "get_fit.php"){
echo "";
}

if ($geturlvar == "see_success.php"){
echo "";
}

if ($geturlvar == "tools.php"){
echo "";
}

if ($geturlvar == "about_us.php"){
echo "Virtual Fitness Coach enables me to deliver my 30 years of experience to you at a fraction of the cost of 1 on 1 training. Virtual Fitness Coach provides the essential element of accountability between you & your online fitness coach through a combination of email reminders, online messages & the phone for personalized feedback delivered to you from your virtual coach.";
}

if ($geturlvar == "what_sets_us_apart.php"){
echo "";
}

?>" />

<title><?php
if ($geturlvar == "index.php"){
echo "Virtual Fitness Coach | Online Fitness Program & Fitness Training";
}

if ($geturlvar == "nutrition.php"){
echo "Online Nutrition | Personalized Online Nutrition Programs | VFC";
}

if ($geturlvar == "get_fit.php"){
echo "";
}

if ($geturlvar == "see_success.php"){
echo "";
}

if ($geturlvar == "tools.php"){
echo "";
}

if ($geturlvar == "about_us.php"){
echo "About Virtual Fitness Coach |Meet Mel YOUR Virtual Fitness Coach";
}

if ($geturlvar == "what_sets_us_apart.php"){
echo "";
}

?></title>


<style type="text/css">
<?php
$iesix = strstr($_SERVER['HTTP_USER_AGENT'],"MSIE 6.0");

if($iesix == ""){
echo "@import url(/homepage/css/mainlayout.css);";
}
else{
echo "@import url(/homepage/css/mainlayout_ie6.css);";
}
?>
</style>


<script src="/homepage/js/prototype.js"></script>

<script type="text/javascript" src="/homepage/js/AC_OETags.js"></script>

<script language="JavaScript" type="text/javascript">

  <!--
  // -----------------------------------------------------------------------------
  // Globals
  // Major version of Flash required
  var requiredMajorVersion = 13;
  // Minor version of Flash required
  var requiredMinorVersion = 0;
  // Minor revision of Flash required
  var requiredRevision = 0;
  // -----------------------------------------------------------------------------
  // -->

</script>

<script type="text/javascript" language="javascript">

function fetchfreeplan(){

var age = $('age').value
var feet = $('feet').value
var inches = $('inches').value
var weight = $('weight').value
var gender = $('gender').value
var activity = $('activity').value
var goalweight = $('goalweight').value
var goal = $('goal').value
var email = $('email').value

var url = 'freeplanajax.php';

var params = 'agevar=' + age + "&" + 'feetvar=' + feet + "&" + 'inchesvar=' + inches + "&" + 'weightvar=' + weight + "&" + 'gendervar=' +gender + "&" + 'activityvar=' + activity + "&" + 'goalweightvar=' + goalweight + "&" + 'emailvar=' + email + "&" + 'goalvar=' + goal;
var ajax = new Ajax.Updater(
{success: 'main-content-feature-right-bottom'}, url,{method: 'get',parameters:params, onFailure: reportError});
}

function reportError() {
  $('main-content-feature-right-bottom').value = "Error";
}
</script>

<SCRIPT LANGUAGE="JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=450,height=500');");
}
</script>

</head>

<body>

<div id="wrapper">

    <div id="blue-bar-top">
    </div>

    <div id="main-content">

        <div id="main-content-header">
        <div id="main-content-header-left">
          <a name="Virtual Fitness Coach Home" href="txt_index.php">
                  <img alt="Virtual Fitness Coach" src="/homepage/images/Tentative_Logo.jpg" />
                </a>
          </div>
         <form method="post" action="http://www.virtualfitnesscoach.com/memberlogin.php">
            <div id="main-content-header-right">
              <div id="main-content-header-right-top-number">
                  <span style="color:#000000;margin-left:4px;font-weight:bold; font-family:Arial, Helvetica, sans-serif;">1-888-480-7835</span> <span style="margin-left:2px;margin-right:2px;color:#666666;"> | </span><a
                     style=""  href="mailto:support@virtualfitnesscoach.com">support@virtualfitnesscoach.com</a>
                </div>
                <div id="main-content-header-right-bottom-container" style="padding-bottom:6px;padding-top:6px;" >
                    <div style="height:25px;font-size:12px;">
                      <label for="username">Email</label>
                        <input style="margin-left:2px;margin-right:5px;vertical-align:middle;" type="text" class="shrink" id="username" name="username" />
                        <label for="password">Password</label>
                        <input style="margin-left:2px;margin-right:5px;vertical-align:middle;" type="password" class="shrink" id="password" name="password"/>
                        <input style="margin:0px;padding:0px;height:23px;vertical-align:middle;" type="submit" value="Login" />
                    </div>
                <div style="height:18px; text-align:right;">
                        <input style="margin:0px;padding:0px;vertical-align:middle;" type="checkbox" id="remember_me" name="remember_me" />
                        <label style="font-size:10px;color:#333333;margin-right:115px;" for="remember_me">Remember Me</label>
                        <a style="font-size:10px;color:#333333; margin-right:90px;" name="Forget Your Password" href="">Forget your password?</a>
                    </div>
                </div>
            </div>
        </form>
        </div>

        <div id="main-content-navbar">
          <div id="main-content-navbar-left">
          </div>
            <div id="main-content-navbar-middle">
            <div style=" float:left;">
                          <a name="Virtual Fitness Coach Welcome" href="txt_index.php">
                              <img alt="Virtual Fitness Coach Welcome" src="/homepage/images/Welcome.jpg" />
                            </a>
                           </div>

                            <div style=" float:left;">
                          <a name="Virtual Fitness Coach Nutrition" href="txt_nutrition.php">
                              <img alt="Virtual Fitness Coach Nutrition" src="/homepage/images/nutrition.jpg" />
                            </a>
                          </div>
                          <div style=" float:left;">
                          <a name="Virtual Fitness Coach Get Fit" href="txt_get_fit.php">
                              <img alt="Virtual Fitness Coach Get Fit" src="/homepage/images/Get-Fit.jpg" />
                            </a>
                           </div>
                           <div style=" float:left;">
                          <a name="Virtual Fitness Coach See Success" href="txt_see_success.php">
                              <img alt="Virtual Fitness Coach See Success" src="/homepage/images/See-Success.jpg" />
                            </a>
                          </div>
                          <div style=" float:left;">
                          <a name="Virtual Fitness Coach Tools" href="txt_tools.php">
                              <img alt="Virtual Fitness Coach Tools" src="/homepage/images/Tools.jpg" />
                            </a>
                          </div>
                          <div style=" float:left;">
                          <a name="Virtual Fitness Coach About Us" href="txt_about_us.php">
                              <img alt="Virtual Fitness Coach About Us" src="/homepage/images/About-Us.jpg" />
                            </a>
                          </div>
                          <div style=" float:left;">
                          <a name="Virtual Fitness Coach What Sets Us Apart" href="txt_what_sets_us_apart.php">
                              <img alt="Virtual Fitness Coach What Sets Us Apart" src="/homepage/images/Why-Us.jpg" />
                            </a>
                           </div>
          </div>
            <div id="main-content-navbar-right">
          </div>
        </div>

        <div id="main-content-feature">
          <div id="main-content-feature-left-spacer-1">
          </div>
            <div id="main-content-feature-left-spacer-2">
          </div>
            <div id="main-content-feature-left-spacer-3">
          </div>