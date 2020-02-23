


<p><br>
  Strength test: Please choose ONE of the pushup exercises below and indicate 
  HOW MANY TOTAL YOU CAN DO in one attempt:</p>
<p><br>
</p>
<p>Pushups&nbsp;&nbsp;&nbsp;&nbsp; 
  <input size=3 name="regular_pushups"  value="<?php echo $regular_pushups ?>">
</p>
<p>Modified pushups 
  <input size=3 name="modified_pushups"  value="<?php echo $modified_pushups ?>">
</p>
<p>Pushups against a table 
  <input size=3 name="pushups_against_table"  value="<?php echo $pushups_against_table ?>">
</p>
<p>Pushups against a wall 
  <input size=3 name="pushups_against_wall"  value="<?php echo $pushups_against_wall ?>">
</p>
<p><br>
</p>
<p>If you are unable to do any pushups, please tell us why in the box below:</p>
<p><br>
</p>
      <blockquote>
  <textarea name="why_i_cant_do_pushups" cols="60" rows="5"><?php echo $why_i_cant_do_pushups ?></textarea>
</blockquote>
<p>
<input type=hidden name=pagenumber value=5>
  <input type="submit" name="Next" value="Next">
</p>
