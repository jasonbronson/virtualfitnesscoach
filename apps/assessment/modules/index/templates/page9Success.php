<p>Please indicate in the boxes below: At what time you wake up, as well as when 
  and what you eat on a typical day: <br>
  for example:</p>
<p>&quot;7 am - wake up&quot;</p>
<p>&quot;8 am - breakfast of scrambled eggs, toast and juice typically&quot;</p>
<hr>
<p>&nbsp;</p>
<p> 6 am 
  <input size=100 name="six_am_time" value="<?php echo $six_am_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 7 am 
  <input size=100 name="seven_am_time" value="<?php echo $seven_am_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 8 am 
  <input size=100 name="eight_am_time" value="<?php echo $eight_am_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 9 am 
  <input size=100 name="nine_am_time" value="<?php echo $nine_am_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 10 am 
  <input size=100 name="ten_am_time" value="<?php echo $ten_am_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 11 am 
  <input size=100 name="eleven_am_time" value="<?php echo $eleven_am_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 12 pm 
  <input size=100 name="tweleve_pm_time" value="<?php echo $tweleve_pm_time ?>">
</p>
<p> 1 pm 
  <input size=100 name="one_pm_time" value="<?php echo $one_pm_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 2 pm 
  <input size=100 name="two_pm_time" value="<?php echo $two_pm_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 3 pm 
  <input size=100 name="three_pm_time" value="<?php echo $three_pm_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 4 pm 
  <input size=100 name="four_pm_time" value="<?php echo $four_pm_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 5 pm 
  <input size=100 name="five_pm_time" value="<?php echo $five_pm_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 6 pm 
  <input size=100 name="six_pm_time" value="<?php echo $six_pm_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 7 pm 
  <input size=100 name="seven_pm_time" value="<?php echo $seven_pm_time ?>">
</p>
<p>8 pm 
  <input size=100 name="eight_pm_time" value="<?php echo $eight_pm_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 9 pm 
  <input size=100 name="nine_pm_time" value="<?php echo $nine_pm_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 10 pm 
  <input size=100 name="ten_pm_time" value="<?php echo $ten_pm_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p>11 pm 
  <input size=100 name="eleven_pm_time" value="<?php echo $eleven_pm_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p>12 am 
  <input size=100 name="tweleve_am_time" value="<?php echo $tweleve_am_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 1 am 
  <input size=100 name="one_am_time" value="<?php echo $one_am_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 2 am 
  <input size=100 name="two_am_time" value="<?php echo $two_am_time ?>">
</p>
<p> 3 am 
  <input size=100 name="three_am_time" value="<?php echo $three_am_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 4 am 
  <input size=100 name="four_am_time" value="<?php echo $four_am_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> 5 am 
  <input size=100 name="five_am_time" value="<?php echo $five_am_time ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<blockquote>
<blockquote>&nbsp; </blockquote>
</blockquote>
<p>

<hr>
Tell us below how hungry (or satisfied) you feel after you finish your typical meals:<br>
<br>
<table border=1 width=75%>
<tr><td>After breakfast I typically feel</td><td>      still hungry <input type=checkbox name="afterbreakfast_still_hungry" value="ON" <?php if($afterbreakfast_still_hungry == "ON") echo "CHECKED" ?>></td><td>    satisfied <input type=checkbox name="afterbreakfast_satisfied" value="ON" <?php if($afterbreakfast_satisfied == "ON") echo "CHECKED" ?>>  </td><td>   full or bloated <input type=checkbox name="afterbreakfast_full_or_bloated" value="ON" <?php if($afterbreakfast_full_or_bloated == "ON") echo "CHECKED" ?>></td></tr>
<tr><td>After lunch I typically feel  </td><td>       still hungry <input type=checkbox name="afterlunch_still_hungry" value="ON" <?php if($afterlunch_still_hungry == "ON") echo "CHECKED" ?>></td><td>    satisfied <input type=checkbox name="afterlunch_satisfied" value="ON" <?php if($afterlunch_satisfied == "ON") echo "CHECKED" ?>>   </td><td>  full or bloated <input type=checkbox name="afterlunch_full_or_bloated" value="ON" <?php if($afterlunch_full_or_bloated == "ON") echo "CHECKED" ?>></td></tr>
<tr><td>After dinner I typically feel  </td><td>       still hungry <input type=checkbox name="afterdinner_still_hungry" value="ON" <?php if($afterdinner_still_hungry == "ON") echo "CHECKED" ?>></td><td>    satisfied <input type=checkbox name="afterdinner_satisfied" value="ON" <?php if($afterdinner_satisfied == "ON") echo "CHECKED" ?>>  </td><td>   full or bloated <input type=checkbox name="afterdinner_full_or_bloated" value="ON" <?php if($afterdinner_full_or_bloated == "ON") echo "CHECKED" ?>></td></tr>
</table>
<hr> 

<p><br>
  Now, please indicate below if there are certain foods (in the specific categories 
  below)<br>
  that you really <b>enjoy</b>, as well as any that you <b>can't stand</b>:&nbsp;&nbsp; 
  <br>
  This is important because we will often select items from this list to offer 
  in your daily suggested meals! </p>

<br>
First, please list any foods below that your <b>are fond of</b> in the following 
categories:<br>
<br>
<p> PROTEIN (meat, chicken, fish, etc.) 
  <input size=140 name="protein_likes" value="<?php echo $protein_likes ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</p>
<p>DAIRY (milk, cheese, yogurt, etc.) 
  <input size=140 name="dairy_likes"  value="<?php echo $dairy_likes ?>">
  &nbsp;&nbsp;&nbsp;&nbsp; </p>

<p> FRUIT (apples, oranges, etc.) 
  <input size=140 name="fruit_likes"  value="<?php echo $fruit_likes ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p>VEGETABLES (spinach, broccolli, etc.) 
  <input size=140 name="vegies_likes"  value="<?php echo $vegies_likes ?>">
</p>
<p>STARCHES (pasta, bread, rice, etc.) 
  <input size=140 name="starches_likes"  value="<?php echo $starches_likes ?>">
</p>
<p>&nbsp;</p>
<p>Now below, list any foods below that you<b> dislike</b> in the following categories:<br>

  <br>
</p>
<p> PROTEIN (meat, chicken, fish, etc.) 
  <input size=140 name="protein_dislikes"  value="<?php echo $protein_dislikes ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</p>
<p>DAIRY (milk, cheese, yogurt, etc.) 
  <input size=140 name="dairy_dislikes"  value="<?php echo $dairy_dislikes ?>">
  &nbsp;&nbsp;&nbsp;&nbsp; </p>
<p> FRUIT (apples, oranges, etc.) 
  <input size=140 name="fruit_dislikes"  value="<?php echo $fruit_dislikes ?>">

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p>VEGETABLES (spinach, broccolli, etc.) 
  <input size=140 name="vegies_dislikes"  value="<?php echo $vegies_dislikes ?>">
</p>
<p>STARCHES (pasta, bread, rice, etc.) 
  <input size=140 name="starches_dislikes"  value="<?php echo $starches_dislikes ?>">
</p>
<hr>
<p><br>
  Now, please indicate below for the following categories of food <b>how much</b> 
  you consume in a typical day (e.g. &quot;I drink about 2 glasses of wine a night&quot;). 
  <br>

  This is vital information for us because we will often have special informational 
  and/or motivational tutorials waiting for you when you sign in, based on what 
  you tell us below.<br>
  <br>
  <br>
</p>
<p>ALCOHOL (wine, beer, liquor, etc.) 
  <input size=140 name="alcohol_consumption"  value="<?php echo $alcohol_consumption ?>">
</p>
<p>SUGARY DRINKS (cola, sweetened tea, etc.) 
  <input size=140 name="sweet_drinks_consumption"  value="<?php echo $sweet_drinks_consumption ?>">
</p>
<p>STARCHES (pasta, bread, potatoes, etc.) 
  <input size=140 name="starches_consumption"  value="<?php echo $starches_consumption ?>">
</p>

<p>WHOLE MILK (as opposed to skim milk) 
  <input size=140 name="whole_milk_consumption"  value="<?php echo $whole_milk_consumption ?>">
</p>
<p>SWEETS (ice cream, chocolate, candy, etc.) 
  <input size=140 name="sweets_consumption"  value="<?php echo $sweets_consumption ?>">
</p>
<p>FAST FOOD (burgers, pizza, fries, etc.) 
  <input size=140 name="fast_food_consumption"  value="<?php echo $fast_food_consumption ?>">
</p>
<p>FRUITS <br>
  <input size=140 name="fruit_consumption"  value="<?php echo $fruit_consumption ?>">
</p>
<p>VEGETABLES<br>
  <input size=140 name="vegies_consumption"  value="<?php echo $vegies_consumption ?>">

</p>
<p>WATER <br>
  <input size=140 name="water_consumption" value="<?php echo $water_consumption ?>">
</p>
<p>LEAN MEAT (turkey, chicken, etc.) 
  <input size=140 name="lean_meat_consumption2" value="<?php echo $lean_meat_consumption2 ?>">
</p>


<input type=hidden name=pagenumber value=9>
  <input type="submit" name="Next" value="Next">
 </p>
