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

	$("#userRespondingTo").text("All Users");
	$("#userRespondingToID").val("ALL");
	
	$(".username").click(function() {
        //alert($(this).attr("userid"));
        var tmp = $(this).attr("userid");
		$("#userRespondingToID").val(tmp);

		 var tmp = $(this).text();
		$("#userRespondingTo").text(tmp);

		//reload chat log
		loadLog();
		
    });
     
	//If user submits the form
	$("#submitmsg").click(function(){	

		if($("#userRespondingToID").val() == "ALL"){
			alert('Sending a message to everyone is currently not allowed.');
			return false;
		}
		
		var clientmsg = $("#usermsg").val();
		$.post("/admin.php/admin/comments", {
			coachResponse: clientmsg,
			user_id: $("#userRespondingToID").val()
			});				
		$("#usermsg").attr("value", "");
		//reload chat log
		loadLog();
		return false;
	});
	
	//Load the chat log history
	function loadLog(){	
		
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
		$.ajax({
			url: "/admin.php/admin/commentsLoadLog",
			cache: false,
			data: {user_id: $("#userRespondingToID").val()},
			success: function(html){		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div				
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	}
		});
		
	}
	setInterval (function(){
		loadLog();
		
	}, 9000);	//Reload file every 5 seconds

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


<div id="wrapper">

<div id="chatWrapper">
<h1>Coach Chat Program</h1><br>

<div id="users">
<?php 
	echo "<a href='#' class='username' userid='ALL'>All Users</a><br/>";

	foreach($userList as $key=>$user){
		echo "<a href='#' class='username' userid='".$user['user_id']."'>".ucfirst($user['user_firstname'])." ".ucfirst($user['user_lastname'])."</a><br/>";
		
	}
?>
</div>
<div id="chatbox"></div>
 <div id="messageSend">
     <form name="message" action="">
       <input type="hidden" id="userRespondingToID" name="userRespondingToID"/>
		Responding to <span id="userRespondingTo"></span> <br/><textarea name="usermsg" id="usermsg"></textarea>
		<input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
		<br/>
		Refreshing in <span id="refreshRate"></span>  
	</form>
 </div>	
</div> <!-- End of chatWrapper  -->
	
</div><!-- End of Wrapper TAG -->


