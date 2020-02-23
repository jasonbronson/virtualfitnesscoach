<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="verify-v1" content="kIEr3QLA/brnltEoALEwxgr3PbTcZ+cDUPsi7YMzD/U=" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php $geturlvar = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>

<meta name="Keywords" content="<?php
if ($geturlvar == "index.php" or $geturlvar == "index8.php" or $geturlvar == "index_a.php" or $geturlvar == "veteran_fitness.php"  ){
echo "Virtual Fitness Coach, online fitness, online coach, online exercise, online fitness trainer, online fitness training, online fitness trainer, online fitness training, online personal fitness, online personal fitness, online fitness programs, online fitness program, online fitness programs, online personal fitness trainer, online personal fitness trainer, virtual personal trainer, online exercise programs, online personal fitness training, fitness, exercise, exercises, personal trainer, exercise fitness, personal fitness, fitness training, exercise programs, fitness program, home exercise, fitness trainers, exercise routine, fitness programs, pregnancy exercise, personal fitness trainer, fitness instructor, exercise and fitness";
}

if ($geturlvar == "nutrition.php"){
echo "Online & Personalized Nutrition! Your Online Nutrition Program Guide is Here. All Online Nutrition Programs & Plans are Catered Specifically To You & Your Nutrition Needs. Just Tell US Your Nutrition Goals";
}

if ($geturlvar == "get_fit.php"){
echo "Online Personal Trainer. Offering Customized & Personal Training Programs for  Everyone. Mel Your Real Life & Virtual Personal Trainer has 30 yrs Experience in Personal Training.";
}

if ($geturlvar == "see_success.php"){
echo "Virtual Fitness Coach will be a Success For You! View Some of Our Fitness & Weight Loss Success Stories Using Our Online Program To Achieve Their Fitness Goals";
}

if ($geturlvar == "tools.php"){
echo "Online Fitness Tools, Online Weight Loss Tools, Fitness Tools, Weight Loss Tools, Tools For Fitness";
}

if ($geturlvar == "about_us.php"){
echo "Virtual Fitness Coach, About Virtual Fitness, Virtual Fitness, About Online Fitness, Online Coach, Virtually Fit";
}

if ($geturlvar == "what_sets_us_apart.php"){
echo "";
}

?>" />

<meta name="Description" content="<?php
if ($geturlvar == "index.php" or $geturlvar == "index8.php" or $geturlvar == "index_a.php" or $geturlvar == "veteran_fitness.php" ){
echo "Virtual Fitness Coach is The Online Exercise Fitness Program For You! Mel Will Be Your Online Personal Fitness Trainer & Coach. Online Fitness Programs are Personalized.";
}

if ($geturlvar == "nutrition.php"){
echo "Your Online Nutrition Information Guide is Here! Virtual Fitness Coach Offers Personalized Online Nutrition Programs and Plans Catered Specifically To You and Your Nutrition Needs.  You tell us what your nutrition goals are and we’ll show you what and how much you need to eat, and when the right time to eat is so that you can correctly maintain your nutrition program...Online and Personalized.";
}

if ($geturlvar == "get_fit.php"){
echo "How to Get Fit Online and Easily With the Get Fit Virtual Fitness Program.  Getting Fit and in Shape Can Be a Tremendous Challenge as an Individual That Requires Strong Determination…Let Virtual Fitness Coach and Their Get Fit Program Help Guide You";
}

if ($geturlvar == "see_success.php"){
echo "The Best Online Fitness Success Stories From Virtual Fitness Coach Online Fitness & Nutrition Personalized Workouts.  Your Fitness Success is Just Around The Corner With Our Unique and Cheap Program.  We Want To See You On Our Online Fitness Success Stories Page!";
}

if ($geturlvar == "tools.php"){
echo "Use These Online Fitness & Weight Loss Tools To Help You On Your Healthy and Fit Journey With Virtual Fitness Coach. Online Fitness & Weight Loss Tools Include a Calorie Counter, Fitness Equipment, Fitness & Nutrition Blog, Custom Shopping Lists &  More Fitness Tools are To Come";
}

if ($geturlvar == "about_us.php"){
echo "Virtual Fitness Coach enables me to deliver my 30 years of experience to you at a fraction of the cost of 1 on 1 training. Virtual Fitness Coach provides the essential element of accountability between you & your online fitness coach through a combination of email reminders, online messages & the phone for personalized feedback delivered to you from your virtual coach.";
}

if ($geturlvar == "what_sets_us_apart.php"){
echo "";
}

?>" />

<title><?php
if ($geturlvar == "index.php" or $geturlvar == "index8.php" or $geturlvar == "index_a.php" or $geturlvar == "veteran_fitness.php" ){
echo "Online Fitness | Virtual Fitness Coach - Custom Online Fitness Coach";
}

if ($geturlvar == "nutrition.php"){
echo "Online Nutrition Programs | Personalized Nutrition Online | VFC";
}

if ($geturlvar == "get_fit.php"){
echo "Online Personal Trainer | Proven Personal Training Program Online-VFC";
}

if ($geturlvar == "see_success.php"){
echo "Fitness & Success - Stories | Online Fitness Success Stories";
}

if ($geturlvar == "tools.php"){
echo "Online Fitness & Weight Loss Tools | Tools For Your Fitness Goals";
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
  var requiredMajorVersion = 9;
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

<script language="JavaScript" type="text/javascript">
  function pageredirect(var1){

  var hasReqestedVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);
    if (hasReqestedVersion) {


    } else {
        var redirecturl = "txt_" +  var1 ;
        window.location = redirecturl
        }
    }
</script>



<SCRIPT LANGUAGE="JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=400,height=500,left = 520,top = 200');");
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
          <a name="Virtual Fitness Coach Home" href="index.php">
                  <img alt="Online Fitness | Virtual Fitness Coach - Online Fitness Experts" src="/homepage/images/New Logo 5.jpg" />
                </a>
          </div>
         <form method="post" action="http://www.virtualfitnesscoach.com/memberlogin.php">

            <div id="main-content-header-right">
               <div id="main-content-header-right-top-number">
                   <!---<span style="float:left;">


                     <a href="
                     <?php
                    //echo "txt_" . substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
                     ?>
                     ">


                     Text Version</a>


                     </span>---><span style="color:#000000;margin-left:4px;font-weight:bold; font-family:Arial, Helvetica, sans-serif;">1-888-480-7835</span> <span style="margin-left:2px;margin-right:2px;color:#666666;"> | </span><a
                     style=""  href="mailto:support@virtualfitnesscoach.com">support@virtualfitnesscoach.com</a>
                </div>
                <div id="main-content-header-right-bottom-container" style="padding-bottom:6px;padding-top:6px;" >
                    <div style="height:25px;font-size:12px;">
                      <label for="username"><font color=black>Email</font></label>
                        <input style="margin-left:2px;margin-right:5px;vertical-align:middle;" type="text" class="shrink" id="username" name="username" />
                        <label for="password">Password</label>
                        <input style="margin-left:2px;margin-right:5px;vertical-align:middle;" type="password" class="shrink" id="password" name="password"/>
                        <input style="margin:0px;padding:0px;height:23px;vertical-align:middle;" type="submit" value="Login" />

                    </div>
                <div style="height:18px; text-align:right;">
                        <input style="margin:0px;padding:0px;vertical-align:middle;" type="checkbox" id="remember_me" name="remember_me" />
                        <label style="font-size:10px;color:#333333;margin-right:115px;" for="remember_me">Remember Me</label>
                        <a style="font-size:10px;color:#333333; margin-right:90px;" name="Forget Your Password" href="/main.php/default/forgotpassword">Forget your password?</a>
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
                          <a name="Virtual Fitness Coach Welcome" href="index.php">
                              <img alt="Virtual Fitness Coach Welcome" src="/homepage/images/Welcome.jpg" />
                            </a>
                           </div>

                            <div style=" float:left;">
                          <a name="Virtual Fitness Coach Nutrition" href="nutrition.php">
                              <img alt="Virtual Fitness Coach Nutrition" src="/homepage/images/nutrition.jpg" />
                            </a>
                          </div>
                          <div style=" float:left;">
                          <a name="Virtual Fitness Coach Get Fit" href="get_fit.php">
                              <img alt="Virtual Fitness Coach Get Fit" src="/homepage/images/Get-Fit.jpg" />
                            </a>
                           </div>
                           <div style=" float:left;">
                          <a name="Virtual Fitness Coach See Success" href="see_success.php">
                              <img alt="Virtual Fitness Coach See Success" src="/homepage/images/See-Success.jpg" />
                            </a>
                          </div>
                          <div style=" float:left;">
                          <a name="Virtual Fitness Coach Tools" href="tools.php">
                              <img alt="Virtual Fitness Coach Tools" src="/homepage/images/Tools.jpg" />
                            </a>
                          </div>
                          <div style=" float:left;">
                          <a name="Virtual Fitness Coach About Us" href="about_us.php">
                              <img alt="Virtual Fitness Coach About Us" src="/homepage/images/About-Us.jpg" />
                            </a>
                          </div>
                          <div style=" float:left;">
                          <a name="Virtual Fitness Coach What Sets Us Apart" href="what_sets_us_apart.php">
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