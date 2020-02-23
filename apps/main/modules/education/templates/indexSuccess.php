<!-- 
<style type="text/css">
.cssframe {
overflow: auto;
width: 75%;
top: 130px;
left: 0px;
border: 1px;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<script type="text/javascript" src="/js/swfobject.js"></script>		
    <script type="text/javascript">
    swfobject.embedSWF("/swif/melbench.swf", "myContent", "400", "400", "6.0.0");
    </script>
	</head>
	<body>
    <div id="myContent">
      <p>Alternative content</p>
    </div>
  <IFRAME src="/main.php/education/leftside" FRAMEBORDER=1 height=84%>
  <IFRAME src="/main.php/education/leftside?2" FRAMEBORDER=1-->

<script
	src="/js/jquery.core.1-3-2.min.js" type="text/javascript"
	charset="utf-8"></script>
<script
	src="/js/jquery.swfobject.1-0-5.min.js" type="text/javascript"
	charset="utf-8"></script>
<div
	style="text-align: center;"><!-- 
     <a href='#' onClick="$('#flash-example-3').flash({swf:'/uploads/swf/cindycardio.swf',height:500,width:600});">FAQ 1</a>  
     <a href='#' onClick="$('#flash-example-3').flash({swf:'/uploads/swf/motivation.swf',height:500,width:600});">FAQ 1</a>
     
     input type=button onClick="$('#flash-example-3').html('');" value="Remove Flash"-->


</div>
<script>
	function loadswf(elementname, type){
	
		if(elementname == 'education.swf'){
		     var swf = elementname;
		}else{
			//var selectbox = document.getElementById(elementname);
		    //var tmp =selectbox.options[selectbox.selectedIndex];
		    //var swf = tmp.value;
		    var swf = elementname;
			
		}
		//alert(swf);
		$('#flash-example-3').flash({swf:'/uploads/faqswf/' + swf,height:400,width:400});
	
	//DEFAULT LOAD
	if(type == 'D')
		return;
	
	   var dataString = 'type=' + type; 
      //alert (dataString);return false;  
		 $.ajax({  
		   type: "POST",  
		   url: "<?php echo url_for('education/ajax_recordswf'); ?>",  
		   data: dataString,  
		   success: function() {  
		     
		      
		   }  
		 });  
		 return false; 
	
	
	}
setTimeout("loadswf('education.swf', 'D');",3000);

</script>

<?php
//return;
//include_once ('../menu.php');
?>


<TABLE border="0" cellspacing="0" cellpadding="5">
	<tr>
		<td colspan=3>
		<h1>Featured Frequently Asked Questions:</h1>
		</td>
	</tr>
	<tr>
		<td><font color=red>Nutrition</font></td>
		<td><font color=blue>Exercise</font></td>
		<td>&nbsp;</td>
	</tr>
	<TR>
		<td valign=top><img src='/images/question.jpg' width='200px' height='200px'> <br>
		<a href='#' onclick="loadswf('nutritionphil.swf', 'N')">What is the overall
		nutrition philosophy at V.F.C.?</a> <br>
		<a href='#' onclick="loadswf('alcohol.swf', 'N')">What about alcohol?</a> <br>
		<a href='#' onclick="loadswf('how_much_fat.swf', 'N')">How much fat can I
		consume in my diet?</a> <br>
		<a href='#' onclick="loadswf('faq_flavored_water.swf', 'N')">What do you
		think about flavored water?</a> <br>
		<a href='#' onclick="loadswf('faq_yoyo_diet.swf', 'N')">What do you think
		of Yo-Yo dieting?</a> <br>
		<a href='#' onclick="loadswf('tasty_potato_chips.swf', 'N')">What about
		baked potato chips?</a> <br>
		<a href='#' onclick="loadswf('faq_egg_yolks.swf', 'N')">What about egg
		yolks?</a> <br>
		<a href='#' onclick="loadswf('faq_soluble_fiber.swf', 'N')">Can you explain
		soluble vs. insoluble fiber?</a> <br>
		<a href='#' onclick="loadswf('faq_sodium_nitrate.swf', 'N')">What should I
		know about sodium nitrate?</a> <br>

		<!--  a href='#' onclick="loadswf('eatless.swf')">What if I eat much less than my recommended calories?</a> <br>
<a href='#' onclick="loadswf('fewcookies.swf')">Can I eat a few cookies sometimes?</a> <br>
<a href='#' onclick="loadswf('howmuchsugar.swf')">How much sugar can I consume in a day?</a> <br>
<a href='#' onclick="loadswf('flavoredwater.swf')">What about flavored water?</a> <br>
<a href='#' onclick="loadswf('highlowcarb.swf')">Can you explain high carb vs low carb eating?</a> <br>
<a href='#' onclick="loadswf('cuttingsnacks.swf')">Will I gain or lose weight if I cut out snacks?</a> <br>
<a href='#' onclick="loadswf('tastychips.swf')">What about those tasty potato chips?</a> <br>
<a href='#' onclick="loadswf('bakedchips.swf')">What about baked potato chips?</a> <br>
<a href='#' onclick="loadswf('elvis.swf')">Why did Elvis get fat?</a> <br>
<a href='#' onclick="loadswf('carbsstory.swf')">What's the real story about carbs?</a> <br>
<a href='#' onclick="loadswf('frozenstuff.swf')">Are frozen fruits and vegetables healthy?</a> <br>
<a href='#' onclick="loadswf('cabbagevslettuce.swf')">Do you suggest cabbage or lettuce?</a> <br>
<a href='#' onclick="loadswf('fastfood.swf')">Can I consume fast food?</a> <br>
<a href='#' onclick="loadswf('2percent.swf')">What do you think about 2% milk?</a> <br>
<a href='#' onclick="loadswf('salads.swf')">What about salads?</a> <br>
<a href='#' onclick="loadswf('pastabad.swf')">Is pasta bad for me?</a> <br>
<a href='#' onclick="loadswf('momdiabetic.swf')">What if my mom is diabetic? Is it hereditary?</a> <br>
<a href='#' onclick="loadswf('redmeat.swf')">Is red meat healthy?</a> <br>
<a href='#' onclick="loadswf('caldense.swf')">What does 'calorically dense' mean?</a> <br>
<a href='#' onclick="loadswf('potatoes.swf')">Are potatoes healthy for me?</a> <br>
<a href='#' onclick="loadswf('redwine.swf')">Is red wine alright to drink?</a> <br>
<a href='#' onclick="loadswf('coffee.swf')">Is drinking coffee healthy?</a> <br>
<a href='#' onclick="loadswf('yolks.swf')">What about eating egg yolks?</a> <br>
<a href='#' onclick="loadswf('cereal.swf')">What is the most healthy cereal?</a> <br>
<a href='#' onclick="loadswf('skipbreakfast.swf')">What if I skip breakfast?</a> <br>
<a href='#' onclick="loadswf('rice.swf')">Do you suggest brown or white rice?  </a> <br>
<a href='#' onclick="loadswf('saltandbloodpressure.swf')">Will large salt consumption lead to high blood pressure?</a> <br>
<a href='#' onclick="loadswf('organic.swf')">Should I eat 'organic' foods?</a> <br>
<a href='#' onclick="loadswf('tomatofoods.swf')">What about tomato based foods?</a> <br>
<a href='#' onclick="loadswf('tastyvegies.swf')">How can I make my vegetables more tasty?</a> <br>
<a href='#' onclick="loadswf('sportsvswater.swf')">Should I drink sports drinks or water?</a> <br>
<a href='#' onclick="loadswf('superfoods.swf')">What are 'super foods' ?</a> <br>
<a href='#' onclick="loadswf('sugaranddiabetes.swf')">Does eating sugar lead to diabetes?</a> <br>
<a href='#' onclick="loadswf('bestvegie.swf')">What's the best vegetable?</a> <br-->

		</td>

		<td valign=top><img src='/images/question-mark.jpg' width='200px'
			height='200px'> <br>
		<a href='#' onclick="loadswf('philosophy.swf', 'E')">What is the overall
		exercise philosophy at V.F.C.?</a> <br>
		<a href='#' onclick="loadswf('allcardio.swf', 'E')">Can I do all cardio and
		not lift weights?</a> <br>
		<a href='#' onclick="loadswf('elipticalline.swf', 'E')">What if there is a
		line at the eliptical machine?</a> <br>
		<a href='#' onclick="loadswf('calcounters.swf', 'E')">How accurate are the
		calorie counters on machines?</a> <br>
		<a href='#' onclick="loadswf('weighingoften.swf', 'E')">What are your
		thoughts about weighing often?</a> <br>
		<a href='#' onclick="loadswf('gainweightlosefat.swf', 'E')">Is it possible
		to gain weight and lose fat?</a> <br>
		<a href='#' onclick="loadswf('faq_cardio_only.swf', 'E')">What if I only do
		cardio and no resistance workouts?</a> <br>
		<!--  a href='#' onclick="loadswf('detrestingheartrate.swf')">How do you determine your resting heart rate?</a> <br>
<a href='#' onclick="loadswf('nobulkingup.swf')">How do I avoid bulking up with weight training?</a> <br>
<a href='#' onclick="loadswf('nothavemachine.swf')">What if I don't have the recommended machine?</a> <br>
<a href='#' onclick="loadswf('conseccardio.swf')">Can I do cardio on consecutive days?</a> <br>
<a href='#' onclick="loadswf('consecresist.swf')">Can I do resistance training on consecutive days?</a> <br>
<a href='#' onclick="loadswf('freevsmachines.swf')">What is the difference between free weights and machines?</a> <br>

<a href='#' onclick="loadswf('calcbmr.swf')">How do you calculate my Basal Metabolic Rate (BMR)?</a> <br>
<a href='#' onclick="loadswf('diffbmrs.swf')">Can two people weigh the same and have different BMR's?</a> <br>
<a href='#' onclick="loadswf('diffcardio.swf')">What's the diffference between 'warm up cardio' and 'final circuit cardio'?</a> <br>
<a href='#' onclick="loadswf('howmuchweight.swf')">How do my trainers know how much weight I should lift?</a> <br>
<a href='#' onclick="loadswf('machishogged.swf')">What if a machine is unavailable at the gym?</a> <br>
<a href='#' onclick="loadswf('bestabs.swf')">What is the best abs exercise?</a> <br>
<a href='#' onclick="loadswf('exercisehurts.swf')">What if certain exercises hurt me?</a> <br>
<a href='#' onclick="loadswf('nothavemachine.swf')">What if I don't have the exercise machine you recommend?</a> <br-->

		</td>

		<td valign=top>
		<div id="flash-example-3" style="padding: 10px;"></div>
		</td>
	</tr>
</table>
</body>
</html>
