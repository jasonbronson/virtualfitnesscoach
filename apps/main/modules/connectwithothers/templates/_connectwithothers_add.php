<script language="JavaScript" type="text/javascript" src="/js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/jquery.chainedSelects.js"></script>

<script>


$(function()
{
        $('#statecode').chainSelect('#city','/main.php/connectwithothers/getcity',
        { 
                before:function (target) //before request hide the target combobox and display the loading message
                { 
                        $("#loading").css("display","block");
                        $(target).css("display","none");
                },
                after:function (target) //after request show the target combobox and hide the loading message
                { 
                        $("#loading").css("display","none");
                        $(target).css("display","inline");
                }
        });
       
});




</script>

<h1><?php  echo $msg;  ?></h1>
<form name='new_group_form' action='' method='POST'>
<table border="0">
<tr>
<td>Group Name</td>
<td><input type=text name='groupname' value='<?php echo $params['groupname'] ?>'></td>
</tr>

<tr>
<td>Meeting Location</td>
<td><input type=text name='location' id='location' value='<?php echo $params['location'] ?>'></td>
</tr>

<tr>
<td>State</td>
<td>
<?php 

?>

<select name='statecode' id="statecode">
<?
foreach($states as $value){
	//if($params['state'] == $value['city'])
	//echo "<option value='{$value['city']}' selected>{$value['city']}</option>";
	//else
	echo "<option value='{$value['statecode']}'>{$value['state']}</option>";
}
?></select>
</td>
</tr>

<tr>
  <td>City</td>
  <td><select name="city" id="city" style="display:none"></select>
  
  </td>
</tr>


<tr>
<td>Group Description </td>
<td><textarea name='description' rows=4 cols=40><?php echo $params['description'] ?></textarea></td>
</tr>

<tr>
<td>Meeting Date / Time</td>
<td><input type=text name='meeting_datetime' size=35 value='<?php echo $params['meeting_datetime'] ?>'> </td>
</tr>

<tr>
<td><input type='submit' name='submit' value='Add Group'></td>
</tr>
</form>