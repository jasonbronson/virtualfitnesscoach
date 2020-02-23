<?php include("header.php"); ?>
		
            <div id="main-content-feature-left">
                                
                <script language="JavaScript" type="text/javascript">
						var hasReqestedVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);						
						if (hasReqestedVersion) {	
						var alternateContent = '<div id="main-content-feature-left-top">Test</div>';							
							document.write(alternateContent);
						} else {							
						}						
               	</script>

                <div id="main-content-feature-left-middle">
            		<script language="JavaScript" type="text/javascript">						
						var hasReqestedVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);						
						if (hasReqestedVersion) {							
							AC_FL_RunContent(
								"src", "flash_files/home_welcome.swf",
								"width", "600",
								"height", "375",
								"align", "middle",
								"id", "globe",
								"quality", "high",
								"wmode", "transparent",
								"name", "globe",
								"movie","flash_files/home_welcome",
								"allowScriptAccess","sameDomain",
								"type", "application/x-shockwave-flash",
								'codebase', 'http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab',
								"pluginspage", "http://www.adobe.com/go/getflashplayer"
							);							
						} else { 
							var alternateContent = '<div id="main-content-feature-left-middle-left" style="background-color:#000000;color:#FFFFFF;width:150px;font-size:18px;;float:left;padding-top:3px;padding-bottom:3px;">See Success</div><div id="main-content-feature-left-middle-right" style="width:520px;font-size:14px;float:right;text-align:left;">Whether you goal is to lose weight, gain muscle or just feel more fit, your Virtual Fitness Coach, Mel, can help you. Read he has helped these satisfied customers.</div>';
							document.write(alternateContent);
						}						
					</script>
                    <noscript>
                    <a href="http://www.adobe.com/go/getflashplayer"><img src="images/no_flash.gif" alt="Download Flash 9" />
                    <object width="32" height="32">
                    </object>
                    </a>
                    </noscript>
       			</div>
                <div id="main-content-feature-left-bottom">                    
        		</div>  
        	</div>                                      
                          
<?php include("footer.php"); ?>
