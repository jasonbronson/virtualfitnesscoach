<style>
<!--

-->
</style>

<script type="text/javascript" src="/js/swfobject_source.js"></script>
 

<div id="flashcontent">
  This text is replaced by the Flash movie.
</div>

<script type="text/javascript">
   var so = new SWFObject("/nutrition/Main.swf", "mymovie", "100%", "680", "8", "#336699");
   so.addParam("wmode", "transparent");
   so.write("flashcontent");
   
</script>


<?php return; ?>

<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="100%" height="100%" id="cool" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="/nutrition/Main.swf" />
<param name="quality" value="high" />
<param name="wmode" value="transparent"/>
<param name="bgcolor" value="#999999" />
<embed src="/nutrition/Main.swf" quality="high" bgcolor="#999999" width="100%" height="100%" name="cooladvanced" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="transparent" /></object>


<?php 
return;
/*
 
<script language="JavaScript" type="text/javascript">
<!--
// -----------------------------------------------------------------------------
// Globals
// Major version of Flash required
var requiredMajorVersion = 9;
// Minor version of Flash required
var requiredMinorVersion = 0;
// Minor version of Flash required
var requiredRevision = 28;
// -----------------------------------------------------------------------------
// -->
</script>
</head>

<body scroll="no" >
<script language="JavaScript" type="text/javascript">
<!--
// Version check for the Flash Player that has the ability to start Player Product Install (6.0r65)
var hasProductInstall = DetectFlashVer(6, 0, 65);

// Version check based upon the values defined in globals
var hasRequestedVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);

if ( hasProductInstall && !hasRequestedVersion ) {
  // DO NOT MODIFY THE FOLLOWING FOUR LINES
  // Location visited after installation is complete if installation is required
  var MMPlayerType = (isIE == true) ? "ActiveX" : "PlugIn";
  var MMredirectURL = window.location;
    document.title = document.title.slice(0, 47) + " - Flash Player Installation";
    var MMdoctitle = document.title;

  AC_FL_RunContent(
    "src", "playerProductInstall",
    "FlashVars", "MMredirectURL="+MMredirectURL+'&MMplayerType='+MMPlayerType+'&MMdoctitle='+MMdoctitle+"",
    "width", "100%",
    "height", "100%",
    "align", "middle",
    "id", "nutrition",
    "quality", "high",
    "bgcolor", "#ffffff",
    "name", "/nutrition/Main",
    "allowScriptAccess","sameDomain",
    "type", "application/x-shockwave-flash",
    "pluginspage", "http://www.adobe.com/go/getflashplayer"
  );

} else if (hasRequestedVersion) {
  // if we've detected an acceptable version
  // embed the Flash Content SWF when all tests are passed

  AC_FL_RunContent(
      "src", "/nutrition/Main",
      "width", "100%",
      "height", "100%",
      "align", "middle",
      "id", "nutrition",
      "quality", "high",
      "bgcolor", "#ffffff",
      "name", "nutrition",
      "allowScriptAccess","sameDomain",
      "type", "application/x-shockwave-flash",
      
      "pluginspage", "http://www.adobe.com/go/getflashplayer"
  );
  } else {  // flash is too old or we can't detect the plugin
    var alternateContent = 'Alternate HTML content should be placed here. '
    + 'This content requires the Adobe Flash Player. '
     + '<a href=http://www.adobe.com/go/getflash/>Get Flash</a>';
    document.write(alternateContent);  // insert non-flash content
  }
// -->
</script>
*/
?>    
<?php
return;
?>
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

<script type="text/javascript" src="/carousel/swfobject.js"></script>

    <style type="text/css">
      html, body {
        height: 100%;
        margin: 0px;
        border: 0px;
        padding: 0px;
        color: black;
      }
      .carousel_container {
        width: 100%;
        height: 100%;
      }
    </style>
  </head>

<body>


</head>
<body>
<?php

?>
<table border=0 width=100% cellpadding=2 cellspacing=2>
<tr align='center'><td>&nbsp;</td> <td>Total Calories</td> <td>Suggested Calories</td> <td>Food Suggestions</td> <td>Food Portion Feedback</td></tr>
<?php



for($a = 0; $a < count($rows); $a++){

switch ($rows[$a]['sort']) {
case 0:
  $servingtime = "Breakfast";
  break;

case 1:
  $servingtime = "Snack";
  break;

case 2:
  $servingtime = "Lunch";
  break;

case 3:
  $servingtime = "Snack";
  break;

case 4:
  $servingtime = "Dinner";
  break;

case 5:
  $servingtime = "Snack";
  break;
}


$date=$_REQUEST['date'];


echo "
<tr>
 <td>$servingtime</td>
 <td>{$rows[$a]['totalcalories']}%</td>
 <td>{$rows[$a]['suggestedcalories']}</td>
  <td width='800px' height='300px'>
  <div class='carousel_container'>
  <div id='carousel$a'>
Javascript is required
  </div>
</div>
<script type='text/javascript'>
  swfobject.embedSWF('/carousel/Carousel.swf', 'carousel$a', '100%', '100%', '9.0.0', false, {xmlfile:'/carousel/default.xml', loaderColor:'0xCCCCCC', messages:'Virtual Fitness Coach'}, {wmode: 'transparent'});
</script>

  </td>

 <td><form style='margin: 0pt; display: inline;'>
     <input type=hidden name=user_id value='$user_id'>
     <input type=hidden name=searchdate value='$date'>
     <input type=hidden name=toolittle value='true'>
     <input type=hidden name=what value='{$rows[$a]['id']}'>
 <input type=submit name=submit value='I ate Too Little'></form>


 <br><br>
<form style='margin: 0pt; display: inline;'>
     <input type=hidden name=user_id value='$user_id'>
     <input type=hidden name=searchdate value='$date'>
     <input type=hidden name=toomuch value='true'>
     <input type=hidden name=what value='{$rows[$a]['id']}'>
 <input type=submit name=submit value='I ate Too Much'></form>

 </td>

</tr>
<tr><td colspan=7><hr size='1' width='90%'/></td></tr>
";


}


?>