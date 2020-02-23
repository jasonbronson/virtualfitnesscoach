<?php include("header.php"); ?>
		                               
                <script language="JavaScript" type="text/javascript">
						var hasReqestedVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);						
						if (hasReqestedVersion) {	
						var alternateContent = '<div id="main-content-feature-left-top">Test</div>';							
							document.write(alternateContent);
						} else {							
						
						document.write('<?php include("suc_text.php"); ?>)';
						}						
               	</script>
                         
<?php include("footer.php"); ?>
