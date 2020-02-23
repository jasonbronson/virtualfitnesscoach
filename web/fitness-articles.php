<?php include("header_txt.php"); ?>

<style type="text/css">


<?php
$iesix = strstr($_SERVER['HTTP_USER_AGENT'],"MSIE 6.0");

if($iesix == ""){
echo "#main-content-feature-left-middle{
margin-top:10px; 
overflow:scroll; 
width:688px;  
height:422px; 
}";
}
else{
echo "#main-content-feature-left-middle{
margin-top:10px; 
overflow:scroll; 
width:696px;  
height:422px; 
}";
}
?>


#table1{
font-size:12px;
text-align:left;
margin-left:5px;
float:left;
width:650px;
}

#div1{
background-color:#000000;
color:#FFFFFF;
width:150px;
font-size:18px;
float:left;
padding-top:3px;
padding-bottom:3px;
text-align:center;
}

#arrow{
float:right;
margin-left:10px;
}

#div2{
text-align:center;
font-weight:bold;
float:center;
}

div.st1{
color:#0000CD;  
height:15px; 
margin-top:5px;
font-weight:bold;
}

#div3{
height:15px; 
text-align:center;
margin-top:4px

}

#div4{
margin-top:7px;
}

#table2{
float:left;
width:210px;
margin-left:5px;
}

td.ts1{
text-align:center;
width:210px;
color:#333333;

}

span.ss1{
display:block;

}

span.bt{
font-weight:bold;
}

#div5{
text-align:center;
width:auto;
font-size:12px;
margin-top:5px;
}

#img1{
margin-top:5px;
margin-left:auto;
margin-right:auto;
}
</style>
		
            <div id="main-content-feature-left" >
                                         
                <div id="main-content-feature-left-middle">
                	
                    <div>
                    <table id="table1">
                    	<tr>                      	
                            <td>
                    			<div id="div2">
                                	<h1><a href="exercises-for-the-elderly.php">Exercises For the Elderly & Senior Citizens</A></h1><br>
                                	<h1><a href="exercises-for-teens.php">Exercises For Teens</h1><br>
                                </div>                   
                            </td>
                            
                        </tr>

                    </table>
                    

                	</div>                
                
                </div>        	    
                
                <div id="main-content-feature-left-bottom">                    
        		</div>  
        	
            </div>                                                  
                          
<?php include("footer_txt.php"); ?>