<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Virtual Fitness Coach | Personalized Workouts - Personalized Nutrition</title>
<style type="text/css">
	@import url(css/mainlayout_reg.css);
</style>
<script src="prototype.js"></script>
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
</head>

<body>

<div id="wrapper">
	
    <div id="blue-bar-top">
    </div>
    
    <div id="main-content">
    	
        <div id="main-content-header">
    		<div id="main-content-header-left">
    			<a name="Virtual Fitness Coach Home" href="index.php">
                	<img alt="Virtual Fitness Coach Logo" src="images/Tentative_Logo.jpg" />
                </a>
        	</div>
         <form method="post" action="">   
            <!---<div id="main-content-header-right">
            	<div id="main-content-header-right-top">
                	Username <input type="text" class="shrink" id="username" name="username" /> 
                    Password <input type="password" class="shrink" id="password" name="password"/>
                    <input type="submit" value="Login" />
                </div>               
                <div id="main-content-header-right-bottom" >
                	<input type="checkbox" id="remember_me" name="remember_me" /><span class="red-text">Remember Me</span>
					<a href="">Forget your password?</a>
                </div>                                               
            </div>--->   
        </form>
        </div>    
    	
        <div id="main-content-navbar">
        	<div id="main-content-navbar-left">        		
        	</div>
            <div id="main-content-navbar-middle">
        		<!--<table cellpadding="0" cellspacing="0">
                	<tr>
                        <td>
                        	<a name="Virtual Fitness Coach Welcome" href="index.php">
                            	<img alt="Virtual Fitness Coach Welcome" src="images/welcome.jpg" />
                            </a>
                        </td>
                        <td>
                        	<a name="Virtual Fitness Coach Nutrition" href="nutrition.php">
                            	<img alt="Virtual Fitness Coach Nutrition" src="images/nutrition.jpg" />
                            </a>
                        </td>
                        <td>
                        	<a name="Virtual Fitness Coach Get Fit" href="get_fit.php">
                            	<img alt="Virtual Fitness Coach Get Fit" src="images/get-fit.jpg" />
                            </a>
                        </td>
                        <td>
                        	<a name="Virtual Fitness Coach See Success" href="see_success.php">
                            	<img alt="Virtual Fitness Coach See Success" src="images/see-success.jpg" />
                            </a>
                        </td>
                        <td>
                        	<a name="Virtual Fitness Coach Tools" href="tools.php">
                            	<img alt="Virtual Fitness Coach Tools" src="images/tools.jpg" />
                            </a>
                        </td>
                        <td>
                        	<a name="Virtual Fitness Coach About Us" href="about_us.php">
                            	<img alt="Virtual Fitness Coach About Us" src="images/about-us.jpg" />
                            </a>
                        </td>
                        <td>
                        	<a name="Virtual Fitness Coach Join Now" href="join_now.php">
                            	<img alt="Virtual Fitness Coach Join Now" src="images/join-now.jpg" />
                            </a>
                        </td>                
                	</tr>
                </table>-->
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