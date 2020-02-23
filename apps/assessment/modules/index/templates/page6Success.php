

<p><br>
  Fitness test</p>
<p><br>
</p>
<p>
  <input size=3 name="fitness_test_beats_per_minute" value="<?php echo $fitness_test_beats_per_minute ?>">
  &nbsp;Beats per minute after 
  <input size=3 
      name="fitness_test_minutes_stepping" value="<?php echo $fitness_test_minutes_stepping ?>">
  &nbsp;minutes stepping up on a step 
  <input size=3 
      name="fitness_test_inches_high" value="<?php echo $fitness_test_inches_high ?>">
  &nbsp;inches high</p>
      
<p><br>
  <br>
</p>
<p>If you are unable to do this test, please tell us why in the box below:</p>
<p><br>
</p>
      <blockquote>
  <textarea name="why_i_cant_do_stepups" cols="60" rows="5"><?php echo $why_i_cant_do_stepups ?></textarea>
</blockquote>
<p>
<input type=hidden name=pagenumber value=6>
  <input type="submit" name="Next" value="Next">
  </p>
