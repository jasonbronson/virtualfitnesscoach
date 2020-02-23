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


<style>
<!--
li span {color:black;}
li {color:red;}
-->
</style>

</head>

<!--
<link rel="stylesheet" type="text/css" href="/css/office_xp/office_xp.css" />
<script type="text/javascript" src="/js/jsdomenu.js"></script>
<script type="text/javascript" src="/js/jsdomenubar.js"></script>
<script type="text/javascript" src="/js/jsdomenu.inc.js"></script>
<img src='/images/Tentative_Logo.jpg' alt="Main Virtual Fitness Logo" width=200px height=100px/>
 -->

<!--  div id=tabcontainer class=solidblockmenu>
<ul>
<li class=solidblockmenu><?php echo link_to('DASHBOARD', 'admin/dashboard')."" ?></li>
<li class=solidblockmenu> <?php echo link_to('User List', 'admin/showuserlist') ?></li>
<li class=solidblockmenu><?php echo link_to('Add Exercises', 'admin/exerciseentry') ?></li>
<li class=solidblockmenu><?php echo link_to('Print Workouts', 'admin/showworkoutschedules') ?></li>
<li class=solidblockmenu><?php echo link_to('Nutrition Area', 'admin/nutrition') ?></li>
<li class=solidblockmenu><?php echo link_to('Clone Date-Date', 'clonedatetodate/index') ?></li>
<li class=solidblockmenu><?php echo link_to('Upload Files', 'admin/uploadfiles') ?></li>
<li class=solidblockmenu><?php echo link_to('Add User', 'admin/adduser') ?></li>
<li class=solidblockmenu><?php echo link_to('Add Events', 'admin/events') ?></li>
<li class=solidblockmenu><?php echo link_to('Logout', '') ?></li>
</ul>
</div>  -->
<script>

function createjsDOMenu() {
  absoluteMenu1 = new jsDOMenu(120, "absolute");
  with (absoluteMenu1) {
    addMenuItem(new menuItem("Dashboard", "", "<?php echo url_for('dashboard/index'); ?>"));
    //addMenuItem(new menuItem("Item 2", "item2", "blank.htm"));
    
  }
  
  
  absoluteMenu2 = new jsDOMenu(280, "absolute");
  with (absoluteMenu2) {
    addMenuItem(new menuItem("User List", "", "<?php echo url_for('showuserlist/index'); ?>"));
    addMenuItem(new menuItem("Add User", "", "<?php echo url_for('adduser/index'); ?>"));
    addMenuItem(new menuItem("Create Workouts", "", "<?php echo url_for('showuserlist/index'); ?>"));
    addMenuItem(new menuItem("Clone Date to Date", "", "<?php echo url_for('clonedatetodate/index'); ?>"));
    addMenuItem(new menuItem("Statistics", "", "<?php echo url_for('showuserlist/index'); ?>"));
    addMenuItem(new menuItem("User Comments", "", "<?php echo url_for('admin/comments'); ?>"));
    
    //addMenuItem(new menuItem("Item 3", "", "<?php echo url_for('showuserlist/index'); ?>"));
    //addMenuItem(new menuItem("-"));
    //addMenuItem(new menuItem("Item 4", "item4", "blank.htm"));
  }
  
  
  
  absoluteMenu3 = new jsDOMenu(240, "absolute");
  with (absoluteMenu3) {
    addMenuItem(new menuItem("Create Workouts", "", "<?php echo url_for('showuserlist/index'); ?>"));
    addMenuItem(new menuItem("Add Exercise Types", "item1", "<?php echo url_for('admin/exerciseentry'); ?>"));
    
    addMenuItem(new menuItem("-"));
    addMenuItem(new menuItem("Clone Date to Date", "", "<?php echo url_for('clonedatetodate/index'); ?>"));
    
  }
  
  absoluteMenu4 = new jsDOMenu(150, "absolute");
  with (absoluteMenu4) {
   // addMenuItem(new menuItem("Set Nutrition", "", "<?php echo url_for('nutritionupdate/index'); ?>"));
    addMenuItem(new menuItem("-"));
    
  }
  
   absoluteMenu5 = new jsDOMenu(190, "absolute");
  with (absoluteMenu5) {
    addMenuItem(new menuItem("Upload Swf", "", "<?php echo url_for('admin/uploadfiles'); ?>"));
    addMenuItem(new menuItem("Upload Graphics", "", "<?php echo url_for('admin/uploadfiles'); ?>"));
    addMenuItem(new menuItem("Upload Nutrition Graphics", "", "<?php echo url_for('admin/uploadfiles'); ?>"));
    addMenuItem(new menuItem("Remove Graphics", "", "<?php echo url_for('admin/uploadfiles'); ?>"));
    
  }
  
  absoluteMenu6 = new jsDOMenu(150, "absolute");
  with (absoluteMenu6) {
    addMenuItem(new menuItem("Add Events", "", "<?php echo url_for('events/index'); ?>"));
    addMenuItem(new menuItem("View Events", "", "<?php echo url_for('events/index'); ?>"));
    addMenuItem(new menuItem("Remove Events", "", "<?php echo url_for('events/index'); ?>"));
    
  }
  
   absoluteMenu7 = new jsDOMenu(150, "absolute");
  with (absoluteMenu7) {
    addMenuItem(new menuItem("Add Motivation", "", "<?php echo url_for('motivation/index'); ?>"));
    addMenuItem(new menuItem("View Motivation", "", "<?php echo url_for('motivation/index'); ?>"));
    
  }
  
   absoluteMenu8 = new jsDOMenu(250, "absolute");
  with (absoluteMenu8) {
    addMenuItem(new menuItem("User All Statistics", "", "<?php echo url_for('report_userstatistics/index'); ?>"));
    addMenuItem(new menuItem("User Weight/Waist Statistics", "", "<?php echo url_for('report_userweightwaiststatistics/index'); ?>"));
    addMenuItem(new menuItem("Show Users Who have not logged in", "", "<?php echo url_for('report_notloggedin/index'); ?>?user_id=0"));
    
  }
  
  company = new jsDOMenu(250, "absolute");
  with (company) {
    addMenuItem(new menuItem("Change Company", "", "<?php echo url_for('login/choosecompany'); ?>"));
    
  }
  
   logout = new jsDOMenu(250, "absolute");
  with (logout) {
    addMenuItem(new menuItem("Logout", "", "<?php echo url_for('login/logout'); ?>"));
    
  }
  
  //absoluteMenu2.items.item4.setSubMenu(absoluteMenu2_1);
  //absoluteMenu3.items.item1.setSubMenu(absoluteMenu3_1);
  
  absoluteMenuBar = new jsDOMenuBar("static", "staticMenuBar");
  with (absoluteMenuBar) {
    addMenuBarItem(new menuBarItem("Dashboard", absoluteMenu1));
    addMenuBarItem(new menuBarItem("Users", absoluteMenu2));
    addMenuBarItem(new menuBarItem("Exercises", absoluteMenu3));
    addMenuBarItem(new menuBarItem("Nutrition", absoluteMenu4));
    addMenuBarItem(new menuBarItem("Upload ", absoluteMenu5));
    addMenuBarItem(new menuBarItem("Events", absoluteMenu6));
    addMenuBarItem(new menuBarItem("Motivation", absoluteMenu7));
    addMenuBarItem(new menuBarItem("Reports", absoluteMenu8));
    
    addMenuBarItem(new menuBarItem("Company <?php echo $companyname ?>", company));
    addMenuBarItem(new menuBarItem("Logout", logout));
  }
}


</script>
</head>


<body onload="initjsDOMenu()">

<div id="staticMenuBar"></div>



<?php echo $sf_data->getRaw('sf_content') ?>

</body>
</html>
