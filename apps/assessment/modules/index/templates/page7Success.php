<p>Which days do you prefer to workout on (check all that apply)?</p>
<blockquote> 
  <p> 
    <input type=checkbox value=ON name="prefer_to_exercise_on_monday" <?php if($prefer_to_exercise_on_monday == "ON" )echo "CHECKED"; ?>>
    Monday<br>
    <input type=checkbox value=ON 
        name="prefer_to_exercise_on_tuesday" <?php if($prefer_to_exercise_on_tuesday == "ON" )echo "CHECKED"; ?>>
    Tuesday<br>
    <input type=checkbox value=ON 
        name="prefer_to_exercise_on_wednesday" <?php if($prefer_to_exercise_on_wednesday == "ON" )echo "CHECKED"; ?>>
    Wednesday<br>
    <input type=checkbox value=ON name="prefer_to_exercise_on_thursday" <?php if($prefer_to_exercise_on_thursday == "ON" )echo "CHECKED"; ?>>
    Thursday<br>
    <input type=checkbox value=ON 
        name="prefer_to_exercise_on_friday" <?php if($prefer_to_exercise_on_friday == "ON" )echo "CHECKED"; ?>>
    Friday<br>
    <input type=checkbox value=ON 
        name="prefer_to_exercise_on_saturday" <?php if($prefer_to_exercise_on_saturday == "ON" )echo "CHECKED"; ?>>
    Saturday<br>
    <input type=checkbox value=ON 
        name="prefer_to_exercise_on_sunday" <?php if($prefer_to_exercise_on_sunday == "ON" )echo "CHECKED"; ?>>
    Sunday</p>
  </blockquote>
<hr>
<p>&nbsp;</p>
<p></p>
<p>Please list other physical activities you will be engaging in addition to this 
  program (ultimate frisbee, kickball league, etc.):</p>
<blockquote> 
  <p> 
    <textarea name="other_activities_with_program" rows=5 cols=60><?php echo $other_activities_with_program ?></textarea>
  </p>
  <hr>
  <p>&nbsp;</p>
</blockquote>
<p>Where do you intend to exercise (check all that apply)?</p>
<blockquote> 
  <p> 
    <input type=checkbox value=ON name="exercise_at_fitness_facility"  <?php if($exercise_at_fitness_facility == "ON" )echo "CHECKED"; ?>>
    Fitness facility (gym or health club)<br>
    <input type=checkbox value=ON name="exercise_at_home"  <?php if($exercise_at_home == "ON" )echo "CHECKED"; ?>>
    Home<br>
    <input type=checkbox value=ON name="exercise_outside"  <?php if($exercise_outside == "ON" )echo "CHECKED"; ?>>
    Outside</p>
  <hr>
  <p>&nbsp;</p>
</blockquote>
<p>What equipment do you have available (check all that apply)?</p>
<p> 
<p>&nbsp;</p><p></p>
<blockquote> 
  <p> 
    <input type=checkbox value=ON name="no_equipment_available"   <?php if($no_equipment_available == "ON" )echo "CHECKED"; ?>>
    Nothing<br>
    <input type=checkbox value=ON name="free_weights_available"   <?php if($free_weights_available == "ON" )echo "CHECKED"; ?>>
    Free weights<br>
    Please list the type of free weights you have available example dumbells, barbells etc..
    <textarea rows="3" cols="60" name="type_of_free_weights_i_own"><?php echo $type_of_free_weights_i_own ?></textarea>
    <br>
    <input type=checkbox value=ON name="weight_machines_available"   <?php if($weight_machines_available == "ON" )echo "CHECKED"; ?>>
    Weight machines<br>
    <input 
        type=checkbox value=ON name="resistance_tubes_available"   <?php if($resistance_tubes_available == "ON" )echo "CHECKED"; ?>>
    Resistance&nbsp;Bands (rubber tubes with handles)<br>
    <input 
        type=checkbox value=ON name="cardio_equipment_available"   <?php if($cardio_equipment_available == "ON" )echo "CHECKED"; ?>>
    Cardio equipment<br>
    <input type=checkbox value=ON name="bicycle_available"   <?php if($bicycle_available == "ON" )echo "CHECKED"; ?>>
    Bicycle (outdoor)<br>
    <input type=checkbox value=ON name="aerobic_videos_available"   <?php if($aerobic_videos_available == "ON" )echo "CHECKED"; ?>>
    Aerobic videos (step, low impact, kickboxing)</p>
  <hr>
  <p>&nbsp;</p>
</blockquote>
<p>What types of activities would you like to have included on your fitness plan 
  (check all that apply)?</p>
<blockquote> 
  <blockquote> 
    <p> 
      <input type=checkbox value=ON name="i_have_no_preferences_for_activities" <?php if($i_have_no_preferences_for_activities == "ON" )echo "CHECKED"; ?>>
      No strong preferences, make recommendation based upon my goals and available 
      equipment</p>
    <hr>
    <p>&nbsp;</p>
  </blockquote>
  <p><i>Resistance Training</i></p>
  <blockquote> 
    <p> 
      <input type=checkbox value=ON name="include_free_weights" <?php if($include_free_weights == "ON" )echo "CHECKED"; ?>>
      Free weights<br>
      <input type=checkbox value=ON 
          name="Include_weight_machines">
      Weight machines<br>
      <input 
          type=checkbox value=ON name="include_resistance_tubes" <?php if($include_resistance_tubes == "ON" )echo "CHECKED"; ?>>
      Resistance Bands</p>
    <hr>
    <p>&nbsp;</p>
  </blockquote>
  <p><i>Cardio Training</i></p>
  <blockquote> 
    <p>
      <input type=checkbox value=ON name="include_walking" <?php if($include_walking == "ON" )echo "CHECKED"; ?>>
      Brisk walking<br>
      <input type=checkbox value=ON name="include_jogging" <?php if($include_jogging == "ON" )echo "CHECKED"; ?>>
      Jogging<br>
      <input type=checkbox value=ON name="include_running" <?php if($include_running == "ON" )echo "CHECKED"; ?>>
      Running<br>
      <input type=checkbox value=ON name="include_hiking" <?php if($include_hiking == "ON" )echo "CHECKED"; ?>>
      Hiking <br>
      <input type=checkbox value=ON name="include_aerobic_classes" <?php if($include_aerobic_classes == "ON" )echo "CHECKED"; ?>>
      Aerobic classes<br>
      <input type=checkbox value=ON name="include_bicycling" <?php if($include_bicycling == "ON" )echo "CHECKED"; ?>>
      Bicycling (outdoors)<br>
      <input type=checkbox value=ON name="include_stationary_bike" <?php if($include_stationary_bike == "ON" )echo "CHECKED"; ?>>
      Stationary bike<br>
      <input type=checkbox value=ON name="include_stair_machine" <?php if($include_stair_machine == "ON" )echo "CHECKED"; ?>>
      Stair climber<br>
      <input type=checkbox value=ON name="include_elliptical" <?php if($include_elliptical == "ON" )echo "CHECKED"; ?>>
      Elliptical trainer<br>
      <input type=checkbox value=ON name="include_treadmill" <?php if($include_treadmill == "ON" )echo "CHECKED"; ?>>
      Treadmill<br>
      <input type=checkbox value=ON name="include_spinning" <?php if($include_spinning == "ON" )echo "CHECKED"; ?>>
      Spinning<br>
      <input type=checkbox value=ON name="include_rowing_machine" <?php if($include_rowing_machine == "ON" )echo "CHECKED"; ?>>
      Rowing machine<br>
      <input type=checkbox value=ON name="include_swimming" <?php if($include_swimming == "ON" )echo "CHECKED"; ?>>
      Swimming</p>
  </blockquote>
</blockquote>
<p> 
<p>&nbsp;
<p>
<input type=hidden name=pagenumber value=7>
  <input type="submit" name="Next" value="Next">
 </p>
