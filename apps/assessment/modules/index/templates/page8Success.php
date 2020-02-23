<p>
  <input type=checkbox value=ON name="obstacle_intimidated_or_embarrassed" <?php if($obstacle_intimidated_or_embarrassed == "ON" )echo "CHECKED"; ?>>
  I feel intimidated or embarrassed in an exercise setting <br clear=all>
  <input type=checkbox value=ON name="obstacle_holidays_and_vacations"  <?php if($obstacle_holidays_and_vacations == "ON" )echo "CHECKED"; ?>>
  Upcoming holidays or planned vacation may make it difficult to fit in exercise 
  <br clear=all>
  <input type=checkbox value=ON name="obstacle_travel"  <?php if($obstacle_travel == "ON" )echo "CHECKED"; ?>>
  I travel extensively for work or fun <br clear=all>
  <input type=checkbox value=ON 
        name="obstacle_work_demands"  <?php if($obstacle_work_demands == "ON" )echo "CHECKED"; ?>>
  Work demands may make it difficult to exercise <br clear=all>
  <input type=checkbox value=ON 
        name="obstacle_finding_time"  <?php if($obstacle_finding_time == "ON" )echo "CHECKED"; ?>>
  I don't know how I'm going to find the time to exercise <br clear=all>
  <input type=checkbox value=ON 
        name="obstacle_dont_see_results"  <?php if($obstacle_dont_see_results == "ON" )echo "CHECKED"; ?>>
  I might get frustrated if I don't see results right away <br clear=all>
  <input type=checkbox value=ON 
        name="obstacle_family_obligations"  <?php if($obstacle_family_obligations == "ON" )echo "CHECKED"; ?>>
  Family obligations may make it difficult to exercise <br clear=all>
  <input type=checkbox value=ON 
        name="obstacle_no_support"  <?php if($obstacle_no_support == "ON" )echo "CHECKED"; ?>>
  My family or friends may not support my attempts to exercise <br clear=all>
  <input type=checkbox value=ON 
        name="obstacle_exercise_not_enjoyable"  <?php if($obstacle_exercise_not_enjoyable == "ON" )echo "CHECKED"; ?>>
  Exercise is not enjoyable or fun for me <br clear=all>
  <input type=checkbox value=ON 
        name="obstacle_exercise_is_boring"  <?php if($obstacle_exercise_is_boring == "ON" )echo "CHECKED"; ?>>
  I get bored easily when I exercise <br clear=all>
  <input type=checkbox value=ON 
        name="obstacle_tired_or_fatigued"  <?php if($obstacle_tired_or_fatigued == "ON" )echo "CHECKED"; ?>>
  It's hard for me to exercise when I'm tired or fatigued <br clear=all>
  <input type=checkbox value=ON 
        name="obstacle_forget_goal"  <?php if($obstacle_forget_goal == "ON" )echo "CHECKED"; ?>>
  I may forget or lose track of my goal <br 
        clear=all>
  <input type=checkbox value=ON name="obstacle_exercise_alone"  <?php if($obstacle_exercise_alone == "ON" )echo "CHECKED"; ?>>
  I may have to exercise alone <br clear=all>
  <input type=checkbox value=ON 
        name="obstacle_deficient_exercise_setting"  <?php if($obstacle_deficient_exercise_setting == "ON" )echo "CHECKED"; ?>>
  The exercise setting available to me may not meet my needs <br clear=all>
  <input type=checkbox 
        value=ON name="obstacle_bad_weather"  <?php if($obstacle_bad_weather == "ON" )echo "CHECKED"; ?>>
  I don't enjoy exercising in bad weather (rainy, hot, humid, cold, snow) <br clear=all>
  <input 
        type=checkbox value=ON name="obstacle_none"  <?php if($obstacle_none == "ON" )echo "CHECKED"; ?>>
  I have no personal obstacles in adhering to an exercise program</p>
<blockquote><blockquote>&nbsp;</blockquote>
</blockquote>

<br>
<p>Below, please tell us about some experience(s) in your life where you have 
  worked hard for a goal - and achieved it.<br>
  Perhaps, it was an athletic event, or maybe you learned a new language, etc. 
  And then, how did you feel once you accomplished the goal?<br>
  Please be as specific as you can. <br>
  <br>
  <b> 
  <textarea name="my_accomplishments" rows=13 cols=120><?php echo $my_accomplishments ?></textarea>
  </b> </p>


<br>

Now, tell us about the desired &quot;tone&quot; of your virtual coach. Some prefer 
to be gently &quot;coaxed&quot; when they are &quot;slacking off&quot; a bit,<br>
others prefer to be &quot;barked at&quot;! Tell us below which kind of &quot;tone&quot; 
you are best motivated by when you have clearly been &quot;slacking off&quot; 

<br>
(for example, we notice that you have not been logging in for 3 days, yet, you 
had not indicated that you were on vacation!)<br>
<br>
<p> 
  <input type=checkbox 
        value=ON name="tough_coach" <?php if($tough_coach == "ON" )echo "CHECKED"; ?>>
  When I am &quot;slacking&quot;, I need a &quot;tough&quot; coach to get me back 
  on track (don't worry, even our &quot;tough&quot; virtual coach &quot;barks&quot; 
  humorously!)<br clear=all>

  <input 
        type=checkbox value=ON name="tender_coach" <?php if($tender_coach == "ON" )echo "CHECKED"; ?>>
  When I am &quot;slacking&quot;, I need a more &quot;tender&quot; tone to coax 
  me back on track <br>
  <input 
        type=checkbox value=ON name="tender_and_tough_coach" <?php if($tender_and_tough_coach == "ON" )echo "CHECKED"; ?>>
  When I am &quot;slacking&quot;, suprise me! Mix up the &quot;tone&quot; of the 
  virtual coach; sometimes &quot;tough&quot;, sometimes &quot;tender&quot;</p>


<p> 
<p>&nbsp;
<p>
 <input type=hidden name=pagenumber value=8>
  <input type="submit" name="Next" value="Next">
 </p>
