<?php
echo form_tag('index/progressreport');
?>

<div id="main" align="center">
Current Statistics
<table>
<tr><td>Weight</td> <td><input type=text name='weight' value='' size='15'></td> </tr>
<tr><td>Chest</td>  <td><input type=text name='chest' value='' size='15'></td></tr>
<tr><td>Waist</td>  <td><input type=text name='waist' value='' size='15'></td></tr>
<tr><td>Arms</td>  <td><input type=text name='arms' value='' size='15'></td></tr>

<tr><td>Thighs</td>  <td><input type=text name='thighs' value='' size='15'></td></tr>
<tr><td>Hips</td>  <td><input type=text name='hips' value='' size='15'></td></tr>
<tr><td>Resting Heart Rate</td>  <td><input type=text name='restingheartrate' value='' size='15'></td></tr>
<tr><td>Step Test</td>  <td><input type=text name='steptest' value='' size='15'></td></tr>
<tr><td>Push Ups</td>  <td><input type=text name='pushups' value='' size='15'></td></tr>
<tr><td>Comments </td>  <td><textarea name='comments'></textarea></td></tr>
</table>

</div>

</form>