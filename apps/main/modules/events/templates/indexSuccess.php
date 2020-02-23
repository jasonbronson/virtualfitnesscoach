<?php 
date_default_timezone_set('America/New York');

//print_r($row);

 	/**
  	 * 
  	 * CREATE TABLE  `tannerl_test1`.`events` (
  `id` int(11) NOT NULL auto_increment,
  `eventdate` datetime NOT NULL,
  `event` mediumtext NOT NULL,
  `event_type` int(11) NOT NULL default '1',
  `event_other` varchar(200) NOT NULL,
  `event_title` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1
  	 */
  	//echo "***".$row[0]['event']."***";

?>
<html><body>

<TABLE border="0" cellspacing="0" cellpadding="12">
 <TR>
     <TD valign=top align=center> <font face="Arial" size="2">
      <h2>Weekly Live, Online Webinars</h2><img src="/nutrition/Events/gotomeeting3.jpg"><br>
       Dial in or listen in via the web as our<br>Expert Doctors, Fitness Coaches, and Guests discuss a topic of the week
       <br>(Return to this page on the date of event to gain access)
     
    <br><br>
 
<table border=0>  
  <?php
  for($a=0; $a < count($row); $a++){
  	if($row[$a]['event_type'] == 1){
  		if(strpos($row[$a]['eventdate'], "00:00:00" ))
  			$date = date("l M,d Y", strtotime($row[$a]['eventdate']));
  		else
  		  $date = date("l M,d Y - h a", strtotime($row[$a]['eventdate']))." est.";
  			
  		
  	 echo "<tr align='left'> <td><ul><li><b>{$row[$a]['event_other']}</b></li></ul></td> </tr> 
  	       <tr align='left'> <td> {$date}</td></tr> 
  	       <tr align='left'><td> {$row[$a]['event']}</td></tr>";
  	}
  }
  ?>
</table>
  
  <br><br>
  <table border=0 align="center"><tr><td></td><td align="center"><font face="Arial" size="2">
   <h2>Weekly Live, Online Chat Room</h2><img src="/nutrition/Events/gotomeeting.jpg"><br>
       Chat via online-text messaging through our chat room as our<br>Expert Doctors, Fitness Coaches, and Guests discuss a topic of the week<br>
       Ask any question! &nbsp; It's fun and private!
       <br>(Return to this page on the date of event to gain access)</font>
     </td></tr></table>
<br>
<table border=0>
<?php
  for($a=0; $a < count($row); $a++){
  	if($row[$a]['event_type'] == 2){
  	if(strpos($row[$a]['eventdate'], "00:00:00" ))
  		  $date = date("l M,d Y", strtotime($row[$a]['eventdate']));
  		else
  		  $date = date("l M,d Y - h a", strtotime($row[$a]['eventdate']))." est.";	
  		
  	echo "<tr align='left'> <td><ul><li><b>{$row[$a]['event_other']}</b></li></ul></td> </tr> 
  	       <tr align='left'> <td> {$date} est.</td></tr> 
  	       <tr align='left'><td> {$row[$a]['event']}</td></tr>";
  	}
  }
  ?>  
</table>
     
     </td>
  <TD valign=top> <font size="2">

<font face="Arial" size="2">
<center><h2>Events Within 25 Miles of <br><?php echo $zip[0]['city'].",".$zip[0]['statecode'] ?></h2>  <br>
<!--  input type="text" name="search" value="<?php echo $user[0]['zip'] ?>"  size="5" maxlength="5"> <input type="button" name="button" value="Search by Zip">-->
</center>

<table border=0>
<?php
  for($a=0; $a < count($row); $a++){
  	if($row[$a]['event_type'] == 3){
  	if(strpos($row[$a]['eventdate'], "00:00:00" ))
  		  $date = date("l M,d Y", strtotime($row[$a]['eventdate']));
  		else
  		  $date = date("l M,d Y - h a", strtotime($row[$a]['eventdate']))." est.";	
  		
  	echo "<tr align='left'> <td><ul><li><b>{$row[$a]['event_other']}</b></li></ul></td> </tr> 
  	       <tr align='left'> <td> {$date} est.</td></tr> 
  	       <tr align='left'><td> {$row[$a]['event']}</td></tr>";
  	}
  }
  ?>  
</table>

<!--  
a href="http://www.sportoften.com/events/eventDetails.cfm?pEventId=3528" target="_blank">Ballantyne Village and Morrison Family YMCA</a><br>
May 16, 2009 <br> Charlotte, NC
<br><br><br><br>
<a href="http://www.runforyourlife.com/CharlotteRunningEvents/CharlotteRaceCalendar/2009_King_Tiger_5K_at_University_City.htm"  target="_blank">King Tiger 5K at University City 2009 </a><br>
Jun 06, 2009  <Br>Charlotte, NC
<br><br><Br><br>
<a href="http://www.rrca.org/calendars/showevent.php?id=17749"  target="_blank">The China Grove 5k Main Street Challenge 2009  </a><br>
Jun 12, 2009  <br>China Grove, NC
<Br><br><Br><br>
<a href="http://www.salisburync.gov/pkrec/5K%20Race%20Brochure%202008.pdf" target="_blank">Run/Walk for the Greenway 5k & Fun Run   </a><br>
Jul 25, 2009 <br> Salisbury, NC
<Br><br><br><br>
<a href="http://www.unitypresbyterianchurch.com/tomato-trot-registration.aspx" target="_blank">Tomato Trot </a><br>
Aug 15, 2009  <br>Cleveland, NC
<Br><br><br><br>
<a href="http://www.greaturbanrace.com/events2009.php" target="_blank">The Great Urban Race  </a><br>
Sep 12, 2009  <br>Charlotte, NC
-->
<Br><br><b>New Event Updates to come!</b><br><Br><br><br>
</font>

</TD>
<td valign="top" ><img src="/nutrition/Events/events.jpg" align=right>
</td></tr></table>

</body></html>