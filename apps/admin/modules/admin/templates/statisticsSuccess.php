<?php
//print_r($statistics);
echo form_tag('admin/statistics?user_id='.$user_id);
?>
.
<div align=center>
<h1>Statistics for <?php echo $statistics[0]['user_firstname']." ".$statistics[0]['user_lastname'] ?></h1>

<table border=1>
<tr>

<td align=center>
Current Statistics
<table>
<tr><td>Weight</td> <td><input type=text name='c1_weight' value='<?php echo $statistics[0]['weight'] ?>' size='15'></td> </tr>
<tr><td>Chest</td>  <td><input type=text name='c1_chest' value='<?php echo $statistics[0]['chest'] ?>' size='15'></td></tr>
<tr><td>Waist</td>  <td><input type=text name='c1_waist' value='<?php echo $statistics[0]['waist'] ?>' size='15'></td></tr>
<tr><td>Arms</td>  <td><input type=text name='c1_arms' value='<?php echo $statistics[0]['arms'] ?>' size='15'></td></tr>
<tr><td>Thighs</td>  <td><input type=text name='c1_thighs' value='<?php echo $statistics[0]['thighs'] ?>' size='15'></td></tr>
<tr><td>Hips</td>  <td><input type=text name='c1_hips' value='<?php echo $statistics[0]['hips'] ?>' size='15'></td></tr>
<tr><td>Resting Heart Rate</td>  <td><input type=text name='c1_restingheartrate' value='<?php echo $statistics[0]['restingheartrate'] ?>' size='15'></td></tr>
<tr><td>Step Test</td>  <td><input type=text name='c1_steptest' value='<?php echo $statistics[0]['steptest'] ?>' size='15'></td></tr>
<tr><td>Push Ups</td>  <td><input type=text name='c1_pushups' value='<?php echo $statistics[0]['pushups'] ?>' size='15'></td></tr>
<tr><td>Comments </td>  <td><textarea name='c1_comments'><?php echo $statistics[0]['comments'] ?></textarea></td></tr>
</table>
</td>

<!--  td align=center>
6-8 Weeks Statistics
<table>
<tr><td>Weight</td> <td><input type=text name='c2_weight' value='<?php echo $statistics[1]['weight'] ?>' size='15'></td> </tr>
<tr><td>Chest</td>  <td><input type=text name='c2_chest' value='<?php echo $statistics[1]['chest'] ?>' size='15'></td></tr>
<tr><td>Waist</td>  <td><input type=text name='c2_waist' value='<?php echo $statistics[1]['waist'] ?>' size='15'></td></tr>
<tr><td>Arms</td>  <td><input type=text name='c2_arms' value='<?php echo $statistics[1]['arms'] ?>' size='15'></td></tr>
<tr><td>Thighs</td>  <td><input type=text name='c2_thighs' value='<?php echo $statistics[1]['thighs'] ?>' size='15'></td></tr>
<tr><td>Hips</td>  <td><input type=text name='c2_hips' value='<?php echo $statistics[1]['hips'] ?>' size='15'></td></tr>
<tr><td>Resting Heart Rate</td>  <td><input type=text name='c2_restingheartrate' value='<?php echo $statistics[1]['restingheartrate'] ?>' size='15'></td></tr>
<tr><td>Step Test</td>  <td><input type=text name='c2_steptest' value='<?php echo $statistics[1]['steptest'] ?>' size='15'></td></tr>
<tr><td>Push Ups</td>  <td><input type=text name='c2_pushups' value='<?php echo $statistics[1]['pushups'] ?>' size='15'></td></tr>
<tr><td>Comments </td>  <td><textarea name='c2_comments'><?php echo $statistics[1]['comments'] ?></textarea></td></tr>
</table>
</td>

<td align=center>
1 Year Statistics
<table>
<tr><td>Weight</td> <td><input type=text name='c3_weight' value='<?php echo $statistics[2]['weight'] ?>' size='15'></td> </tr>
<tr><td>Chest</td>  <td><input type=text name='c3_chest' value='<?php echo $statistics[2]['chest'] ?>' size='15'></td></tr>
<tr><td>Waist</td>  <td><input type=text name='c3_waist' value='<?php echo $statistics[2]['waist'] ?>' size='15'></td></tr>
<tr><td>Arms</td>  <td><input type=text name='c3_arms' value='<?php echo $statistics[2]['arms'] ?>' size='15'></td></tr>
<tr><td>Thighs</td>  <td><input type=text name='c3_thighs' value='<?php echo $statistics[2]['thighs'] ?>' size='15'></td></tr>
<tr><td>Hips</td>  <td><input type=text name='c3_hips' value='<?php echo $statistics[2]['hips'] ?>' size='15'></td></tr>
<tr><td>Resting Heart Rate</td>  <td><input type=text name='c3_restingheartrate' value='<?php echo $statistics[2]['restingheartrate'] ?>' size='15'></td></tr>
<tr><td>Step Test</td>  <td><input type=text name='c3_steptest' value='<?php echo $statistics[2]['steptest'] ?>' size='15'></td></tr>
<tr><td>Push Ups</td>  <td><input type=text name='c3_pushups' value='<?php echo $statistics[2]['pushups'] ?>' size='15'></td></tr>
<tr><td>Comments </td>  <td><textarea name='c3_comments'><?php echo $statistics[2]['comments'] ?></textarea></td></tr>
</table>
</td-->

</tr>
</table>
<br><br>
<table>
<tr><td>Fat</td> <td>Normal</td> <td>Skinny</td></tr>
<tr><td><input type=text name=fat value='<?php echo $siloets[0]['name'] ?>'></td> <td><input type=text name=normal value='<?php echo $siloets[1]['name'] ?>'></td> <td><input type=text name=skinny value='<?php echo $siloets[2]['name'] ?>'></td></tr>
</table>

<table>
<tr><td>Priority Graph 1</td> <td>Priority Graph 2</td> </tr>
<tr>
<td>
	<select name=priority1>
		<?php

		$graphs = array(1=>"Pushups", 2=>"Weight", 3=>"Step test", 4=>"Hips", 5=>"Resting heart", 6=>"Thighs", 7=>"Waist", 8=>"Chest");
		foreach($graphs as $key => $select_value){
			if($priority_graphs[0]['type'] == $key)
			echo "<option value='$key' selected>$select_value</option>";
			else
			echo "<option value='$key'>$select_value</option>";
		}
		
		?>
		
	</select>
</td> 
<td>
<select name=priority2>
		<?php

		$graphs = array(1=>"Pushups", 2=>"Weight", 3=>"Step test", 4=>"Hips", 5=>"Resting heart", 6=>"Thighs", 7=>"Waist", 8=>"Chest");
		foreach($graphs as $key => $select_value){
			if($priority_graphs[1]['type'] == $key)
			echo "<option value='$key' selected>$select_value</option>";
			else
			echo "<option value='$key'>$select_value</option>";
		}
		
		?>
	</select>
</td> </tr>
</table>
<br><br>
<input type=submit name=submit value='Save Changes'>
</form>
</div>
