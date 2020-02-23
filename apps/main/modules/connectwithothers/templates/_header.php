<link rel="stylesheet" type="text/css" href="/css/connectwithothers.css" />

<table border="0" cellspacing="0" cellpadding="5">

	<tr>
		<td rowspan="4" valign=top><img src="/nutrition/Connect/connect.jpg"
			style="border: 1px black solid;"></td>

		<td valign="top" align="center" height=10%>
		<font color='blue' size='+2'>Exercise Connection With Others</font> <br>

		<font size='+1'><i>Find People & Groups to Exercise With, Post
		Searching For Messages & More!</i></font>
		<hr>

<?php 


if($myarray == "show"): ?>
		<div class="tabsmenuclass"> 
			<ul>
				<li><a href="<?php echo url_for('connectwithothers/profile'); ?>">My Profile</a></li>
				<li><a href="<?php echo url_for('connectwithothers/connectionlist'); ?>" rel="gotsubmenu[selected]">Group</a></li>
				<li><a href="<?php echo url_for('connectwithothers/messages'); ?>" rel="gotsubmenu">Messages</a></li>
				
			</ul>
		</div>
<?php endif; ?>	

</td>
</tr>