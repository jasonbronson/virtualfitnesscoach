<?php include("header_reg.php"); ?>


		
            <div id="main-content-feature-left">
        		<div id="main-content-feature-left-top" style="height:70px;">
        	    	
                    <div id="main-content-feature-left-top-text" style="margin-left:150px;float:left;width:450px;height:70px;font-size:10px;text-align:left;">
        	    	Start Now for just <strong>$49.99</strong> a month! That’s the average price of just one
                    hour at the gym with a personal trainer. The weight is over! We will be with you every step of the way.
                    <br />-A customized diet that works for you and exercises that adjust to your level of fitness.
                    <br />-A schedule you can stick to and video demos of all of your workouts.
                    <br />-Support & Motivation from your trainer & much more!
        			</div>
        		</div>
                <div id="main-content-feature-left-middle">
        	    	<div id="main-content-feature-left-middle-header" style="background-color:#CCCCCC;height:18px;width:680px;float:left;text-align:left;padding-top:4px;padding-bottom:4px;padding-left:10px;">
        	    		Select Your Payment Type
        			</div>
                    <div id="main-content-feature-left-middle-header-spacer" style="height:1px;width:690px;float:left;border-bottom-color:#000000;border-bottom-width:1px;border-bottom-style:solid;margin-top:5px;">
        	    		
        			</div>
                    <table style="float:left;margin-top:10px;margin-right:150px;margin-left:45px;"  >
                    	<tr>
                        	<td align="right" >
                            	Credit Card
                            </td>
                            <td align="left">
                            	
                                <select id="credit_card" name="credit_card" style="margin-left:20px;margin-right:20px;">
                                    <option selected="selected" value=""></option>
                                    <option value="Visa">Visa</option>
                                    <option value="Master Card">Master Card</option>
                                    <option value="American Express">American Express</option>
                                    <option value="Discover">Discover</option>
                                </select>
                            </td>
                            <td align="left">
                            	<img src="images/credit-card-images.jpg" alt="credit card" />
                            </td>
                        </tr>
                    </table>
                    <table  style="margin-left:78px;float:left;"   >
                        <tr>
                        	<td align="right" >
                            	Paypal
                            </td>
                            <td align="left">
                            	<input style="margin-left:19px;margin-right:5px;width:20px;" type="checkbox" id="paypal" name="paypal"/>
                                
                            </td>
                        	 <td align="left">
                            	
                                <img src="images/paypal.jpg" alt="PayPal" style="margin-right:116px;" />
                            </td>
                        	<td align="right" >
                            	Credit Card # 
                            </td>
                            <td align="left">
                            	<input style="margin-left:20px;width:120px;" maxlength="16" type="text" id="credit_card_number" name="credit_card_number"/>
                            </td>
                        </tr>                        
                    </table>
                    <table style="float:left;margin-left:20px;"  >	
                        <tr>
                        	<td align="right" >
                            	Expiration Date
                            </td>
                            <td>
                            	<select id="month" name="month" style="margin-left:20px;width:45px;" >                                  
                                    <option value="" selected="selected"></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>                                    
                                </select>
                                <select id="year" name="year" style="margin-left:5px;margin-right:106px;width:60px;" >
                                    <option value="" selected="selected"></option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>                                    
                                </select>
                            </td>
                            <td align="right" >
                            	CVV Code
                            </td>
                            <td>
                            	<input style="margin-left:20px;width:30px;" maxlength="4" type="text" id="cvv" name="cvv"/>
                            </td>
                        </tr>
                    </table>
        		</div>
                <div id="main-content-feature-left-bottom">                    
        			<div id="main-content-feature-left-bottom-header" style="background-color:#CCCCCC;height:18px;width:680px;float:left;text-align:left;padding-top:4px;padding-bottom:4px;padding-left:10px;margin-top:5px;">
        	    		Billing Information
        			</div>
                    <div id="main-content-feature-left-bottom-header-spacer" style="height:1px;width:690px;float:left;border-bottom-color:#000000;border-bottom-width:1px;border-bottom-style:solid;margin-top:5px;">
        	    		
        			</div>
                	<table  style="float:left;margin-top:10px;margin-left:0px;"  >	
                        <tr>
                        	<td align="right" >
                            	First Name
                            </td>
                            <td>
                            	<input style="margin-left:20px;width:150px;margin-right:11px;" type="text" id="first_name_billing" name="first_name_billing"/>
                            </td>
                            <td align="right" >
                            	Last Name
                            </td>
                            <td>
                            	<input style="margin-left:22px;width:150px;" type="text" id="last_name_billing" name="last_name_billing"/>
                            </td>
                        </tr>
                        <tr>
                        	<td align="right" style="width:170px;" >
                            	Billing Address Line 1
                            </td>
                            <td>
                            	<input style="margin-left:20px;width:150px;margin-right:11px;" type="text" id="billing_address_line_1" name="billing_address_line_1"/>
                            </td>
                            <td align="right" style="width:170px;" >
                            	Billing Address Line 2
                            </td>
                            <td>
                            	<input style="margin-left:22px;width:150px;" type="text" id="billing_address_line_2" name="billing_address_line_2"/>
                            </td>
                        </tr>
                    </table>
                 	<table style="float:left;margin-left:129px;"  >
                        <tr>
                            <td align="right" >
                                City
                            </td>
                            <td align="left">
                                <input style="margin-left:20px;width:150px;margin-right:20px;" type="text" id="city" name="city"/>
                            </td>
                        	<td align="right" >
                            	State
                            </td>
                            <td>
                            	<SELECT name="state" id="state" style="margin-left:20px;margin-right:20px;">
                                <OPTION value=""></OPTION>
                                <OPTION value="Alabama">Alabama</OPTION>
                                <OPTION value="Alaska">Alaska</OPTION>
                                <OPTION value="Arizona">Arizona</OPTION>
                                <OPTION value="Arkansas">Arkansas</OPTION>
                                <OPTION value="California">California</OPTION>
                                <OPTION value="Colorado">Colorado</OPTION>
                                <OPTION value="Connecticut">Connecticut</OPTION>
                                <OPTION value="Delaware">Delaware</OPTION>
                                <OPTION value="D.C.">D.C.</OPTION>
                                <OPTION value="Florida">Florida</OPTION>
                                <OPTION value="Georgia">Georgia</OPTION>
                                <OPTION value="Hawaii">Hawaii</OPTION>
                                <OPTION value="Idaho">Idaho</OPTION>
                                <OPTION value="Illinois">Illinois</OPTION>
                                <OPTION value="Indiana">Indiana</OPTION>
                                <OPTION value="Iowa">Iowa</OPTION>
                                <OPTION value="Kansas">Kansas</OPTION>
                                <OPTION value="Kentucky">Kentucky</OPTION>
                                <OPTION value="Louisiana">Louisiana</OPTION>
                                <OPTION value="Maine">Maine</OPTION>
                                <OPTION value="Maryland">Maryland</OPTION>
                                <OPTION value="Massachusetts">Massachusetts</OPTION>
                                <OPTION value="Michigan">Michigan</OPTION>
                                <OPTION value="Minnesota">Minnesota</OPTION>
                                <OPTION value="Mississippi">Mississippi</OPTION>
                                <OPTION value="Missouri">Missouri</OPTION>
                                <OPTION value="Montana">Montana</OPTION>
                                <OPTION value="Nebraska">Nebraska</OPTION>
                                <OPTION value="Nevada">Nevada</OPTION>
                                <OPTION value="New Hampshire">New Hampshire</OPTION>
                                <OPTION value="New Jersey">New Jersey</OPTION>
                                <OPTION value="New Mexico">New Mexico</OPTION>
                                <OPTION value="New York">New York</OPTION>
                                <OPTION value="North Carolina">North Carolina</OPTION>
                                <OPTION value="North Dakota">North Dakota</OPTION>
                                <OPTION value="Ohio">Ohio</OPTION>
                                <OPTION value="Oklahoma">Oklahoma</OPTION>
                                <OPTION value="Oregon">Oregon</OPTION>
                                <OPTION value="Pennsylvania">Pennsylvania</OPTION>
                                <OPTION value="Rhode Island">Rhode Island</OPTION>
                                <OPTION value="South Carolina">South Carolina</OPTION>
                                <OPTION value="South Dakota">South Dakota</OPTION>
                                <OPTION value="Tennessee">Tennessee</OPTION>
                                <OPTION value="Texas">Texas</OPTION>
                                <OPTION value="Utah">Utah</OPTION>
                                <OPTION value="Vermont">Vermont</OPTION>
                                <OPTION value="Virginia">Virginia</OPTION>
                                <OPTION value="Washington">Washington</OPTION>
                                <OPTION value="West Virginia">West Virginia</OPTION>
                                <OPTION value="Wisconsin">Wisconsin</OPTION>
                                <OPTION value="Wyoming">Wyoming</OPTION>
                                <!---<OPTION value="American Samoa">American Samoa</OPTION>
                                <OPTION value="Armed Forces America">Armed Forces America</OPTION>
                                <OPTION value="Armed Forces Africa">Armed Forces Africa</OPTION>
                                <OPTION value="Armed Forces Pacific">Armed Forces Pacific</OPTION>--->
                                <OPTION value="Canada">Canada</OPTION>
                                <OPTION value="Guam">Guam</OPTION>
                                <OPTION value="Puerto Rico">Puerto Rico</OPTION>
                                <OPTION value="Virgin Islands">Virgin Islands</OPTION>
                                
                                </SELECT>
                            </td>
                            <td align="right" >
                            	Zip
                            </td>
                            <td>
                            	<input style="margin-left:20px;width:40px;margin-right:20px;" type="text" id="zip" name="zip"/>
                            </td>
                        </tr>
                    </table>
                    <table  style="float:left;margin-left:52px;"  >	
                        <tr>
                        	
                            <td align="right" >
                            	
                            </td>
                            <td>
                            	<textarea cols="60" rows="2">
                                
                                
                                </textarea> 
                            </td>
                        </tr>                        
                    </table>
                	<table style="float:left;margin-left:50px;"   >
                        <tr>
                            <td align="right"   >
                                   <input style="width:20px;" type="checkbox" id="i_agree" name="i_agree"/>                       
                            </td>
                            
                        
                            <td align="right">                            	
                            	I have read and agreed to the Terms of Service and Billing Policy.
                            </td>
                            <td align="right"   >
                                <input type="image" style="margin-left:50px;"  src="images/continue_button.jpg" alt="contnue button" />                          
                            </td>
                            
                            
                        </tr>
                    </table>
                    
                </div>  
        	</div>                                                  
                          
<?php include("footer_reg.php"); ?>