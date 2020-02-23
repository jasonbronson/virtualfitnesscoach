

You can complete this Assessment now or come back later.

<!--  p>Full name:&nbsp; 
  <input type="text" name="full_name" size="40" value="<?php echo $full_name ?>">
  <br>
</p>
<p>Email address:&nbsp; 
  <input type="text" name="email_address" size="40" value="<?php echo $email_address ?>">
  <br>
</p>
-->
<hr>
<p>&nbsp; </p>
<p> 
<p></p>
<p>Goals:&nbsp; </p>
<p>What are your health and fitness goals? (check all that apply):</p>
<blockquote> 
  <p> 
  
  <?php
	$checkboxs_array = array("appearance_goal", "cardiovascular_goal", "fat_reduction_goal", "flexibility_goal", "health_goal",
	"definition_goal", "muscular_endurance_goal", "muscular_size_goal", "strength_goal", "power_goal", "self_esteem_goal",
	"speed_goal", "sports_goal", "stress_goal", "toning_goal", "weight_goal", "posture", "other_goal");
  
	foreach($checkboxs_array as $key => $value){
		$tmp = str_replace("_", " ", $value);
		$tmp = ucwords($tmp);
		
		if(${$value} == "ON")
			echo "<input type=checkbox value=ON name='$value' checked> $tmp<br>";
			else
			echo "<input type=checkbox value=ON name='$value' > $tmp <br>";
	}
  
  ?>
  <!-- 
    <input type=checkbox value=ON name="appearance_goal"  <?php echo $appearance_goal ?>>
    Appearance (aesthetics)<br>

    <input type=checkbox value=ON 
        name="cardiovascular_goal"  checked="<?php echo $cardiovascular_goal ?>">
    Cardiovascular endurance<br>
    <input 
        type=checkbox value=ON name="fat_reduction_goal"  checked="<?php echo $fat_reduction_goal ?>">
    Fat reduction<br>
    <input type=checkbox value=ON name="flexibility_goal"  checked="<?php echo $flexibility_goal ?>">
    Flexibility<br>
    <input type=checkbox value=ON name="health_goal"  checked="<?php echo $health_goal ?>">

    Health (General)<br>
    <input type=checkbox value=ON name="definition_goal"  checked="<?php echo $definition_goal ?>">
    Muscular definition<br>
    <input type=checkbox value=ON 
        name="muscular_endurance_goal"  checked="<?php echo $muscular_endurance_goal ?>">
    Muscular endurance<br>
    <input 
        type=checkbox value=ON name="muscular_size_goal"  checked="<?php echo $muscular_size_goal ?>">
    Muscular size<br>

    <input type=checkbox value=ON name="strength_goal"  checked="<?php echo $strength_goal ?>">
    Muscular strength<br>
    <input type=checkbox value=ON name="power_goal"  checked="<?php echo $power_goal ?>">
    Power<br>
    <input type=checkbox value=ON name="self_esteem_goal"  checked="<?php echo $self_esteem_goal ?>">
    Self-esteem or confidence<br>
    <input type=checkbox value=ON 
        name="speed_goal"  checked="<?php echo $speed_goal ?>">

    Speed<br>
    <input type=checkbox value=ON 
        name="sports_goal"  checked="<?php echo $sports_goal ?>">
    Sports performance<br>
    <input type=checkbox value=ON 
        name="stress_goal"  checked="<?php echo $stress_goal ?>">
    Stress reduction<br>
    <input type=checkbox value=ON 
        name="toning_goal"  checked="<?php echo $toning_goal ?>">
    Toning and shaping<br>

    <input type=checkbox value=ON 
        name="weight_goal"  checked="<?php echo $weight_goal ?>">
    Weight loss<br>
    <input type=checkbox value=ON 
        name=posture  checked="<?php echo $posture ?>">
    Posture<br>
    <input type=checkbox value=ON 
        name="other_goal"  checked="<?php echo $other_goal ?>">
    Other (please describe in the box below) </p>-->
  <p>If Other Goal (please describe in the box below) <br> 
    <textarea name="other_goal_details" rows=5 cols=60><?php echo $other_goal_details ?></textarea>
  </p>
  <hr>
  <p>&nbsp;</p>
</blockquote>
<blockquote>
<p> 
  <p></p>
</blockquote>
<p>How are you going to feel when you've achieved these goals?</p>
<blockquote> 
  <p> 
    <textarea name="how_going_to_make_you_feel" rows=5 cols=60><?php echo $how_going_to_make_you_feel ?></textarea>
  </p>
  <hr>
  <p>&nbsp;</p>
</blockquote>
<p>List any other specific fitness goals (eg: run 5K, get back into your old jeans, 
  play soccer with your kids, etc.)</p>
<blockquote> 
  <p>
    <textarea name="other_specific_fitness_goals" rows=5 cols=60><?php echo $other_specific_fitness_goals ?></textarea>
  </p>
</blockquote>
<br>
<p> <input type="submit" name="Next" value="Next"></p>