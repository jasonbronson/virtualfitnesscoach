<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

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
var pageTracker = _gat._getTracker("UA-522265-13");
pageTracker._trackPageview();
} catch(err) {}</script>
<!--END TRACKER-->


<link rel="shortcut icon" href="/favicon.ico" />

<style type="text/css">

.nextbutton
{
   font-size:23px;
}

</style>

</head>
<body>
<div id="wrapper">
    

<?php if(!$noheader): ?>
       <div id="blue-bar-top"></div>
       <div id="main-content-header">
        <div id="main-content-header-left">
          <a name="Virtual Fitness Coach Home" href="index.php"> <img alt="Virtual Fitness Coach Logo" src="/homepage/images/Tentative_Logo.jpg" /> </a>
        </div>
 	   </div>
 	    <div id="main-content-navbar"></div>
 	    
<?php endif; ?>
       

<div class="left_column">
   <OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
          codebase="http://active.macromedia.com/flash2/cabs/swflash.cab#version=4,0,0,0"
          ID=vft1 WIDTH="<?php echo $width ?>" HEIGHT="<?php echo $height ?>">
          <PARAM NAME=movie VALUE="/assessment/<?php echo $assessswf ?>">
          <PARAM NAME=quality VALUE=high>
          <PARAM NAME=loop VALUE=false>
          <param name="wmode" value="transparent">
          <EMBED src="/assessment/<?php echo $assessswf ?>" loop=false quality=high
          WIDTH="<?php echo $width ?>" HEIGHT="<?php echo $height ?>" TYPE="application/x-shockwave-flash"
           PLUGINSPAGE="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash">

          </EMBED>
  </OBJECT>

</div>


<div class="right_column">

<?php if($postform): ?>
<form action="<?php echo url_for('index/index'); ?>" method="post">
<?php endif; ?>

<?php echo $sf_data->getRaw('sf_content') ?>

</form>
</div>

 <div id="main-content-navbar"></div>
    
 <div style="clear:both;margin-left:auto;margin-right:auto;margin-top:7px;text-align:center;">Copyright &#169; 2008 Virtual Fitness Coach</div>
 <div id="blue-bar-bottom"></div>

 </div>
</div>

</body>
</html>
