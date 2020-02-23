<?php 
use_stylesheet('calendar-blue.css');
use_stylesheet('chat.css');
use_javascript('calendar.js');
//use_javascript('calendar-en.js');
use_javascript('calendar-setup.js');
use_javascript('jquery-1.7.2.js');

?>

<script type="text/javascript">
// jQuery Document
$(document).ready(function(){

	//Load on start the chat log
	loadLog();
	
	//If user submits the form
	$("#submitmsg").click(function(){	

		var msg = $("#frontEndusermsg").val();
		$.post("/main.php/index/comments", {
			response: msg,
			user_id: '<?php echo $user_id; ?>'
			});				
		$("#frontEndusermsg").attr("value", "");
		//reload chat log
		loadLog();
		return false;
	});
	
	//Load the chat log history
	function loadLog(){	
		
		var oldscrollHeight = $("#frontEndchatbox").attr("scrollHeight") - 20;
		$.ajax({
			url: "/main.php/index/commentsLoadLog",
			cache: false,
			data: {user_id: '<?php echo $user_id; ?>'},
			success: function(html){		
				$("#frontEndchatbox").html(html); //Insert chat log into the #chatbox div				
				var newscrollHeight = $("#frontEndchatbox").attr("scrollHeight") - 20;
				if(newscrollHeight > oldscrollHeight){
					$("#frontEndchatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	}
		});
		
	}
	setInterval (function(){
		loadLog();
		
	}, 5000);	//Reload file every 5 seconds

	setInterval (function(){
		 if($("#refreshRate").text() == 0){
			 $("#refreshRate").text("5");
		 }else{
			 var tmp = $("#refreshRate").text();
			 tmp = tmp - 1;
			 $("#refreshRate").text(tmp);
		 }
		}, 1000);
	
});
</script>

<div id="frontEndwrapper">

<div id="frontEndchatWrapper">
<font size="+1">Chat with Coach</font><br>

<div id="frontEndchatbox"></div>
 <div id="frontEndmessageSend">
     <form name="message" action="">
       <input type="hidden" id="userRespondingToID" name="userRespondingToID"/>
        Refreshing in <span id="refreshRate"></span> 
        <br/><textarea name="frontEndusermsg" id="frontEndusermsg"></textarea>
		<input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
		 
	</form>
 </div>	
</div> <!-- End of chatWrapper  -->
	
</div><!-- End of Wrapper TAG -->




