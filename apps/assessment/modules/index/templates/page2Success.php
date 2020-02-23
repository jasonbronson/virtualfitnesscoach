
<p>&nbsp;</p>
<p>Personal&nbsp;information:</p>

<blockquote> 
  <p> 
  <table cellspacing=2 cellpadding=0 border=0>
    <tbody> 
    <tr> 
      <td align=right><em>Age</em></td>
      <td>
        <input maxlength=3 size=3 name=age value="<?php echo $age ?>">
      </td>
    </tr>
    <tr> 
      <td align=right><em>Sex</em></td>

      <td>
        <input type=radio value=male name=Sex>
        Male 
        <input 
              type=radio value=female name=Sex>
        Female</td>
    </tr>
    <tr> 
      <td align=right><em>Height</em></td>
      <td>

        <input maxlength=6 size=6 name=person_height  value="<?php echo $person_height ?>">
      </td>
    </tr>
    <tr> 
      <td align=right><em>Weight</em></td>
      <td>
        <input maxlength=6 size=6 name=weight  value="<?php echo $weight ?>">
      </td>
    </tr>

    </tbody>
  </table>
  <hr>
  <p>&nbsp;</p>
  <p></p>
</blockquote>
<p>Are you pregnant?</p>
<blockquote> 
  <p> 
    
    <?php
	
    $param = "pregnant";
    $checked = "checked";
    
    if(${$param} == "Yes"){
    	$no = "";
    	$yes = "checked";
    }elseif(${$param} == "No"){
    	$no = "checked";
    	$yes = "";
    }
    	
    echo "<input type=radio value='Yes' name='$param' $yes >Yes<br>";
    echo "<input type=radio value='No' name='$param' $no >No<br>";
    
    ?>
    
   </p>
  <hr>
  <p>&nbsp;</p>
</blockquote>
<p>Do you have any orthopedic problems or old injuries (joint, ligament, tendon, 
  bone, or muscle) that I need to know about.? If yes, be specific and include 
  any exercises or movements that cause pain or irritation.&nbsp; </p>
<blockquote> 
  <p><b> 
    <textarea name="orthopedic_problems_injuries" rows=4 cols=60><?php echo $orthopedic_problems_injuries ?></textarea>
    </b></p>

  <hr>
  <p>&nbsp;</p>
</blockquote>
<p>List any medical conditions you have. This may include, but is not limited 
  to high blood pressure, elevated blood cholesterol, diabetes, thyroid condition, 
  hernia, asthma, etc.<br>
</p>
<blockquote> 
  <p><b> 
    <textarea name="medical_conditions" rows=4 cols=60><?php echo $medical_conditions ?></textarea>
    </b></p>
  <hr>
  <p>&nbsp;</p>

</blockquote>
<p>Please list the names of any medications you use.</p>
<blockquote> 
  <p><b> 
    <textarea name="names_of_medications" rows=4 cols=60><?php echo $names_of_medications ?></textarea>
    </b></p>
  <hr>
  <p>&nbsp;</p>
</blockquote>
<p>Has a physician ever said you should restrict your physical activity?</p>
<blockquote> 
  <p>

 <?php
	
    $param = "physicians_restriction";
    $checked = "checked";
    
    if(${$param} == "Yes"){
    	$no = "";
    	$yes = "checked";
    }elseif(${$param} == "No"){
    	$no = "checked";
    	$yes = "";
    }
    	
    echo "<input type=radio value='Yes' name='$param' $yes >Yes<br>";
    echo "<input type=radio value='No' name='$param' $no >No<br>";
    
    ?>
    
   </p>
</blockquote>
<p>If yes, explain:</p>
<blockquote> 
  <p><b> 
    <textarea name="physicians_restriction_advise" rows=4 cols=60><?php echo $physicians_restriction_advise ?></textarea>
    </b></p>

  <hr>
  <p>&nbsp;</p>
</blockquote>
<p>Do you smoke tobacco products?</p>
<blockquote> 
  <p> 
   <?php
	
    $param = "smoke";
    $checked = "checked";
    
    if(${$param} == "Yes"){
    	$no = "";
    	$yes = "checked";
    }elseif(${$param} == "No"){
    	$no = "checked";
    	$yes = "";
    }
    	
    echo "<input type=radio value='Yes' name='$param' $yes >Yes<br>";
    echo "<input type=radio value='No' name='$param' $no >No<br>";
    
    ?>
    &nbsp; If yes, how much?&nbsp; 
    <input size=7 name="Smoke_quantity">

  </p>
  <hr>
  <p>&nbsp;</p>
</blockquote>
<p>Enter your occupation in the space provided below.</p>
<blockquote> 
  <p> 
    <input size=60 name=occupation value="<?php echo $occupation ?>">
  </p>
  <hr>
  <p>&nbsp;</p>

</blockquote>
<p>Rate your overall activity level?</p>
<blockquote> 
  <p> 
    
    <?php
	
    $param = "activity_level";
	$values = array("sedentary", "moderately_active", "active", "very_active");
    
    foreach($values as $value){
   		 if(${$param} == $value)
    		$checked = "checked";
   		 else
   		    $checked = "";
   		 
   		$tmp = ucwords(str_replace("_", " ", $value));    
    	echo "<input type=radio value='$value' name='$param' $checked>$tmp<br>";
    }
    
    
    ?>
    </p>
  <hr>
  <p>&nbsp;</p>
</blockquote>
<p>What exercise, if any, do you currently do?</p>
<blockquote> 
  <p> 
    <textarea name="current_exercise" rows=5 cols=60><?php echo $current_exercise ?></textarea>
  </p>

  <hr>
  <p>&nbsp;</p>
</blockquote>
<p>What exercise, if any, have you done in the past? How long ago?</p>
<blockquote> 
  <p> 
    <textarea name="past_exercise" rows=5 cols=60><?php echo $past_exercise ?></textarea>
  </p>
  <hr>
  <p>&nbsp;</p>

</blockquote>
<p>If you&nbsp;have an existing resistance&nbsp;regimen, please list the exercises 
  you have regularly performed in the last month.</p>
<blockquote> 
  <p> 
    <textarea name="recent_weight_training_exercises" rows=5 cols=60><?php echo $recent_weight_training_exercises ?></textarea>
  </p>
  <hr>
  <p>&nbsp;</p>
</blockquote>
<p>What is your current cardiovascular fitness level, or your ability to perform 
  aerobic exercise like cycling, brisk walking, jogging, etc.?</p>

<blockquote> 
  <p> 
  <?php
	
    $param = "cardio_fitness";
	$values = array("very_low", "Fair", "Average", "Good", "Excellent");
    
    foreach($values as $value){
   		 if(${$param} == $value)
    		$checked = "checked";
   		 else
   		    $checked = "";
   		 
   		$tmp = ucwords(str_replace("_", " ", $value));    
    	echo "<input type=radio value='$value' name='$param' $checked>$tmp<br>";
    }
    
    
    ?>
    </p>
  <hr>
  <p>&nbsp;</p>
</blockquote>
<p>How would you rate your experience with exercise?</p>
<blockquote> 
  <p> 
   <?php
	
    $param = "experience";
	$values = array("beginner", "intermediate", "advanced");
    
    foreach($values as $value){
   		 if(${$param} == $value)
    		$checked = "checked";
   		 else
   		    $checked = "";
   		 
   		$tmp = ucwords(str_replace("_", " ", $value));    
    	echo "<input type=radio value='$value' name='$param' $checked>$tmp<br>";
    }
    
    
    ?>
    
   </p>
  <hr>
  <p>&nbsp;</p>

</blockquote>
<p>Do you exercise regularly?</p>
<blockquote> 
  <p>
    <?php
	
    $param = "exercise";
	$values = array("never", "starting_back", "regular");
    
    foreach($values as $value){
   		 if(${$param} == $value)
    		$checked = "checked";
   		 else
   		    $checked = "";
   		 
   		$tmp = ucwords(str_replace("_", " ", $value));    
    	echo "<input type=radio value='$value' name='$param' $checked>$tmp<br>";
    }
    
    
    ?>
   </p>
</blockquote>
<p>
<input type=hidden name=pagenumber value=2>
  <input type="submit" name="Next" value="Next" >
</p>
