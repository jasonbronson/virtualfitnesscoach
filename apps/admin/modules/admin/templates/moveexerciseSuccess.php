.
<h1>You are about to destroy an existing exercise day ! </h1>
<font size=+1>Please make sure you either move it first or continue to destroy that day (unrecoverable) ! <br>
Your currently moving date <?php echo $workoutdate ?>
</font>
<?php



echo form_tag('admin/moveexercise', array('method'=>'post', 'style'=>'margin:0;padding:0; display:inline;'));
?>
   <input type=hidden name=user_id value='<?php echo $user_id ?>'>
   <input type=hidden name='workoutdate' value='<?php echo $workoutdate; ?>'>
   <input type=hidden name='newtype' value='<?php echo $newtype; ?>'>
   <input type=hidden name='type' value='<?php echo $type; ?>'>
   <input type=hidden name=move value='true'>
   <input type=submit name=submit value='Move Day'>
   </form>

&nbsp;&nbsp;&nbsp;&nbsp;

<?php echo form_tag('admin/moveexercise', array('method'=>'post', 'style'=>'margin:0;padding:0; display:inline;')); ?>
   <input type=hidden name=user_id value='<?php echo $user_id ?>'>
   <input type=hidden name=move value='destroy'>
   <input type=hidden name='newtype' value='<?php echo $newtype; ?>'>
   <input type=hidden name='type' value='<?php echo $type; ?>'>
   <input type=hidden name='workoutdate' value='<?php echo $workoutdate; ?>'>
   <input type=submit name=submit value='DESTROY Day and Continue !'>
   </form>


