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
                <form method="post" action="http://www.virtualfitnesscoach.com/assessment_dev.php" />
                <div id="main-content-feature-left-middle">
        	    	<div id="main-content-feature-left-middle-header" style="background-color:#CCCCCC;height:18px;width:680px;float:left;text-align:left;padding-top:4px;padding-bottom:4px;padding-left:10px;">
        	    		Your Account
        			</div>
                    <div id="main-content-feature-left-middle-header-spacer" style="height:1px;width:690px;float:left;border-bottom-color:#000000;border-bottom-width:1px;border-bottom-style:solid;margin-top:5px;">
        	    		
        			</div>
                    <table style="float:left;margin-top:10px;margin-right:150px;margin-left:58px;"  >
                    	<tr>
                        	<td align="right" >
                            	Username
                            </td>
                            <td align="left">
                            	<input style="margin-left:18px;width:150px;" type="text" id="username" name="username"/>
                            </td>
                        </tr>
                    </table>
                    <table style="margin-left:58px;float:left;"  >
                        <tr>
                        	<td align="right" >
                            	Password
                            </td>
                            <td align="left">
                            	<input style="margin-left:20px;width:150px;margin-right:20px;" type="password" id="password" name="password"/>
                            </td>
                        
                        	<td align="right" >
                            	Confirm Password
                            </td>
                            <td align="left">
                            	<input style="margin-left:20px;width:150px;" type="password" id="confirm_password" name="confirm_password"/>
                            </td>
                        </tr>                        
                    </table>
                    <table style="float:left;margin-left:5px;"  >	
                        <tr>
                        	<td align="right" >
                            	Select a Question
                            </td>
                            <td>
                            	
                                <select id="select_a_question" name="select_a_question" style="margin-left:20px;width:154px;margin-right:62px;">
                                	<option value='' selected="selected"></option>
                                    <option value='What is your mothers maiden name?'>What is your mother's maiden name?</option>
                                    <option value='What is the name of your favorite pet?'>What is the name of your favorite pet?</option>
                                    <option value='What city where you born in?'>What city where you born in?</option>
                                    <option value='Who was your childhood hero?'>Who was your childhood hero?</option>
                                    <option value='What is your best friends first name?'>What is your best friends first name?</option>
                                    
                                    
                                </select>
                            </td>
                            <td align="right" >
                            	Your Answer
                            </td>
                            <td>
                            	<input style="margin-left:20px;width:150px;" type="text" id="your_answer" name="your_answer"/>
                            </td>
                        </tr>
                    </table>
        		</div>
                <div id="main-content-feature-left-bottom">                    
        			<div id="main-content-feature-left-bottom-header" style="background-color:#CCCCCC;height:18px;width:680px;float:left;text-align:left;padding-top:4px;padding-bottom:4px;padding-left:10px;margin-top:5px;">
        	    		Your Account
        			</div>
                    <div id="main-content-feature-left-bottom-header-spacer" style="height:1px;width:690px;float:left;border-bottom-color:#000000;border-bottom-width:1px;border-bottom-style:solid;margin-top:5px;">
        	    		
        			</div>
                	<table  style="float:left;margin-top:10px;margin-left:25px;"  >	
                        <tr>
                        	<td align="right" >
                            	First Name
                            </td>
                            <td>
                            	<input style="margin-left:20px;width:150px;margin-right:31px;" type="text" id="first_name" name="first_name"/>
                            </td>
                            <td align="right" >
                            	Last Name
                            </td>
                            <td>
                            	<input style="margin-left:22px;width:150px;" type="text" id="last_name" name="last_name"/>
                            </td>
                        </tr>
                        <tr>
                        	<td align="right" >
                            	Email Address
                            </td>
                            <td>
                            	<input style="margin-left:20px;width:150px;margin-right:31px;" type="text" id="email_address" name="email_address"/>
                            </td>
                            <td align="right" >
                            	Phone
                            </td>
                            <td>
                            	<input style="margin-left:22px;width:150px;" type="text" id="phone" name="phone"/>
                            </td>
                        </tr>
                    </table>
                 	<table style="float:left;margin-left:75px;"  >
                        <tr>
                            <td align="right" >
                                Gender
                            </td>
                            <td align="left">
                                <input style="margin-left:20px;width:15px;" type="radio" value="male" id="gender" name="gender"/> Male
                                <input style="margin-left:20px;width:15px;" type="radio" value="female" id="gender" name="gender"/> Female
                            </td>
                        	<td align="right" >
                            	<span style="margin-left:62px;">Country</span>
                            </td>
                            <td>
                            	<!--<input style="margin-left:20px;width:150px;" type="text" id="Country" name="Country"/>-->
                                <select id="country" name="country" style="margin-left:20px;width:240px;">
                                <option value='' selected="selected"></option>
<option value='Abkhazia – Republic of Abkhazia'>Abkhazia – Republic of Abkhazia</option>
 <option value='Afghanistan – Islamic Republic of Afghanistan'>Afghanistan – Islamic Republic of Afghanistan</option>
 <option value='Akrotiri and Dhekelia – Sovereign Base Areas of Akrotiri and Dhekelia (UK overseas territory)'>Akrotiri and Dhekelia – Sovereign Base Areas of Akrotiri and Dhekelia (UK overseas territory)</option>
 <option value='Åland – Åland Islands (Autonomous province of Finland)'>Åland – Åland Islands (Autonomous province of Finland)</option>
 <option value='Albania – Republic of Albania'>Albania – Republic of Albania</option>
 <option value='Algeria – Peoples Democratic Republic of Algeria'>Algeria – Peoples Democratic Republic of Algeria</option>
 <option value='American Samoa – Territory of American Samoa (US territory)'>American Samoa – Territory of American Samoa (US territory)</option>
 <option value='Andorra – Principality of Andorra'>Andorra – Principality of Andorra</option>
 <option value='Angola – Republic of Angola'>Angola – Republic of Angola</option>
 <option value='Anguilla (UK overseas territory)'>Anguilla (UK overseas territory)</option>
 <option value='Antigua and Barbuda'>Antigua and Barbuda</option>
 <option value='Argentina – Argentine Republic'>Argentina – Argentine Republic</option>
 <option value='Armenia – Republic of Armenia'>Armenia – Republic of Armenia</option>
 <option value='Aruba (Self-governing country in the Kingdom of the Netherlands)'>Aruba (Self-governing country in the Kingdom of the Netherlands)</option>
 <option value='Ascension Island (Dependency of the UK overseas territory of Saint Helena)'>Ascension Island (Dependency of the UK overseas territory of Saint Helena)</option>
 <option value='Australia – Commonwealth of Australia'>Australia – Commonwealth of Australia</option>
 <option value='Austria – Republic of Austria'>Austria – Republic of Austria</option>
 <option value='Azerbaijan – Republic of Azerbaijan'>Austria – Republic of Austria</option>
 <option value='Bahamas, The – Commonwealth of The Bahamas'>Bahamas, The – Commonwealth of The Bahamas</option>
 <option value='Bahrain – Kingdom of Bahrain'>Bahrain – Kingdom of Bahrain</option>
 <option value='Bangladesh – Peoples Republic of Bangladesh'>Bangladesh – Peoples Republic of Bangladesh</option>
 <option value='Barbados '>Barbados</option>
 <option value='Belarus – Republic of Belarus'>Belarus – Republic of Belarus</option>
 <option value='Belgium – Kingdom of Belgium'>Belgium – Kingdom of Belgium</option>
 <option value='Belize '>Belize</option>
 <option value='Benin – Republic of Benin'>Benin – Republic of Benin</option>
 <option value='Bermuda (UK overseas territory)'>Bermuda (UK overseas territory)</option>
 <option value='Bhutan – Kingdom of Bhutan'>Bhutan – Kingdom of Bhutan</option>
 <option value='Bolivia – Republic of Bolivia'>Bolivia – Republic of Bolivia</option>
 <option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option>
 <option value='Botswana – Republic of Botswana'>Botswana – Republic of Botswana</option>
 <option value='Brazil – Federative Republic of Brazil'>Brazil – Federative Republic of Brazil</option>
 <option value='Brunei – Negara Brunei Darussalam'>Brunei – Negara Brunei Darussalam</option>
 <option value='Bulgaria – Republic of Bulgaria'>Bulgaria – Republic of Bulgaria</option>
 <option value='Burkina Faso'>Burkina Faso</option>
 <option value='Burma – Union of Myanmar'>Burma – Union of Myanmar</option>
 <option value='Burundi – Republic of Burundi'>Burundi – Republic of Burundi</option>
 <option value='Cambodia – Kingdom of Cambodia'>Cambodia – Kingdom of Cambodia</option>
 <option value='Cameroon – Republic of Cameroon'>Cameroon – Republic of Cameroon</option>
 <option value='Canada'>Canada</option>
 <option value='Cape Verde – Republic of Cape Verde'>Cape Verde – Republic of Cape Verde</option>
 <option value='Cayman Islands (UK overseas territory)'> Cayman Islands (UK overseas territory)</option>
 <option value='Central African Republic'>Central African Republic</option>
 <option value='Chad – Republic of Chad'>Chad – Republic of Chad</option>
 <option value='Chile – Republic of Chile'>Chile – Republic of Chile</option>
 <option value='China – Peoples Republic of China'>China – Peoples Republic of China</option>
 <option value='Christmas Island – Territory of Christmas Island (Australian overseas territory)'>Christmas Island – Territory of Christmas Island (Australian overseas territory)</option>
 <option value='Cocos (Keeling) Islands – Territory of Cocos (Keeling) Islands (Australian overseas territory)'>Cocos (Keeling) Islands – Territory of Cocos (Keeling) Islands (Australian overseas territory)</option>
 <option value='Colombia – Republic of Colombia'>Colombia – Republic of Colombia</option>
 <option value='Comoros – Union of the Comoros'>Comoros – Union of the Comoros</option>
 <option value='Congo – Democratic Republic of the Congo'>Congo – Democratic Republic of the Congo</option>
 <option value='Congo – Republic of the Congo'>Congo – Republic of the Congo</option>
 <option value='Cook Islands (Associated state of New Zealand)'>Cook Islands (Associated state of New Zealand)</option>
 <option value='Costa Rica – Republic of Costa Rica'>Costa Rica – Republic of Costa Rica</option>
 <option value='Côte dIvoire – Republic of Côte dIvoire'>Côte dIvoire – Republic of Côte dIvoire</option>
 <option value='Croatia – Republic of Croatia'>Croatia – Republic of Croatia</option>
 <option value='Cuba – Republic of Cuba'>Cuba – Republic of Cuba</option>
 <option value='Cyprus – Republic of Cyprus'>Cyprus – Republic of Cyprus</option>
 <option value='Czech Republic '>Czech Republic</option>
 <option value='Denmark – Kingdom of Denmark'>Denmark – Kingdom of Denmark</option>
 <option value='Djibouti – Republic of Djibouti'>Djibouti – Republic of Djibouti</option>
 <option value='Dominica – Commonwealth of Dominica'>Dominica – Commonwealth of Dominica</option>
 <option value='Dominican Republic'>Dominican Republic</option>
 <option value='East Timor – Democratic Republic of Timor-Leste'>East Timor – Democratic Republic of Timor-Leste</option>
 <option value='Ecuador – Republic of Ecuador'>Ecuador – Republic of Ecuador</option>
 <option value='Egypt – Arab Republic of Egypt'>Egypt – Arab Republic of Egypt</option>
 <option value='El Salvador – Republic of El Salvador'>El Salvador – Republic of El Salvador</option>
 <option value='Equatorial Guinea – Republic of Equatorial Guinea'>Equatorial Guinea – Republic of Equatorial Guinea</option>
 <option value='Eritrea – State of Eritrea'>Eritrea – State of Eritrea</option>
 <option value='Estonia – Republic of Estonia'>Estonia – Republic of Estonia</option>
 <option value='Ethiopia – Federal Democratic Republic of Ethiopia'>Ethiopia – Federal Democratic Republic of Ethiopia</option>
 <option value='Falkland Islands (UK overseas territory)'>Falkland Islands (UK overseas territory)</option>
 <option value='Faroe Islands (Self-governing country in the Kingdom of Denmark)'>Faroe Islands (Self-governing country in the Kingdom of Denmark)</option>
 <option value='Fiji – Republic of the Fiji Islands'>Fiji – Republic of the Fiji Islands</option>
 <option value='Finland – Republic of Finland'>Finland – Republic of Finland</option>
 <option value='France – French Republic'>France – French Republic</option>
 <option value='French Polynesia (French overseas collectivity)'>French Polynesia (French overseas collectivity)</option>
 <option value='Gabon – Gabonese Republic'>Gabon – Gabonese Republic</option>
 <option value='Gambia, The – Republic of The Gambia'>Gambia, The – Republic of The Gambia</option>
 <option value='Georgia'>Georgia</option>
 <option value='Germany – Federal Republic of Germany'>Germany – Federal Republic of Germany</option>
 <option value='Ghana – Republic of Ghana'>Ghana – Republic of Ghana</option>
 <option value='Gibraltar (UK overseas territory)'>Gibraltar (UK overseas territory)</option>
 <option value='Greece – Hellenic Republic'>Greece – Hellenic Republic</option>
 <option value='Greenland (Self-governing country in the Kingdom of Denmark)'>Greenland (Self-governing country in the Kingdom of Denmark)</option>
 <option value='Grenada'>Grenada</option>
 <option value='Guam – Territory of Guam (US organized territory)'>Guam – Territory of Guam (US organized territory)</option> 
 <option value='Guatemala – Republic of Guatemala'>Guatemala – Republic of Guatemala</option>
 <option value='Guernsey – Bailiwick of Guernsey (British Crown dependency)'>Guernsey – Bailiwick of Guernsey (British Crown dependency)</option>
 <option value='Guinea – Republic of Guinea'>Guinea – Republic of Guinea</option>
 <option value='Guinea-Bissau – Republic of Guinea-Bissau'>Guinea-Bissau – Republic of Guinea-Bissau</option>
 <option value='Guyana – Co-operative Republic of Guyana'>Guyana – Co-operative Republic of Guyana</option> 
 <option value='Haiti – Republic of Haiti'>Haiti – Republic of Haiti</option> 
 <option value='Honduras – Republic of Honduras'>Honduras – Republic of Honduras</option>
 <option value='Hong Kong – Hong Kong Special Administrative Region of the Peoples Republic of China (Area of special sovereignty)'>Hong Kong – Hong Kong Special Administrative Region of the Peoples Republic of China (Area of special sovereignty)</option> 
 <option value='Hungary – Republic of Hungary'>Hungary – Republic of Hungary</option>
 <option value='Iceland – Republic of Iceland'>Iceland – Republic of Iceland</option>
 <option value='India – Republic of India'>India – Republic of India</option>
 <option value='Indonesia – Republic of Indonesia'>Indonesia – Republic of Indonesia</option>
 <option value='Iran – Islamic Republic of Iran'>Iran – Islamic Republic of Iran</option>
 <option value='Iraq – Republic of Iraq'>Iraq – Republic of Iraq</option>
 <option value='Ireland - Ireland'>Ireland - Ireland</option>
 <option value='Isle of Man (British Crown dependency)'>Isle of Man (British Crown dependency)</option>
 <option value='Israel – State of Israel'>Israel – State of Israel</option>
 <option value='Italy – Italian Republic'>Italy – Italian Republic</option>
 <option value='Jamaica'>Jamaica</option>
 <option value='Japan'>Japan</option>
 <option value='Jersey – Bailiwick of Jersey (British Crown dependency)'>Jersey – Bailiwick of Jersey (British Crown dependency)</option>
 <option value='Jordan – Hashemite Kingdom of Jordan'>Jordan – Hashemite Kingdom of Jordan</option>
 <option value='Kazakhstan – Republic of Kazakhstan'>Kazakhstan – Republic of Kazakhstan</option>
 <option value='Kenya – Republic of Kenya'>Kenya – Republic of Kenya</option>
 <option value='Kiribati – Republic of Kiribati'>Kiribati – Republic of Kiribati</option>
 <option value='Korea, North – Democratic Peoples Republic of Korea'>Korea, North – Democratic Peoples Republic of Korea</option>
 <option value='Korea, South – Republic of Korea'>Korea, South – Republic of Korea</option>
 <option value='Kosovo – Republic of Kosovo'>Kosovo – Republic of Kosovo</option>
 <option value='Kuwait – State of Kuwait'>Kuwait – State of Kuwait</option>
 <option value='Kyrgyzstan – Kyrgyz Republic'>Kyrgyzstan – Kyrgyz Republic</option>
 <option value='Laos – Lao Peoples Democratic Republic'>Laos – Lao Peoples Democratic Republic</option>
 <option value='Latvia – Republic of Latvia'>Latvia – Republic of Latvia</option>
 <option value='Lebanon – Republic of Lebanon'>Lebanon – Republic of Lebanon</option>
 <option value='Lesotho – Kingdom of Lesotho'>Lesotho – Kingdom of Lesotho</option>
 <option value='Liberia – Republic of Liberia'>Liberia – Republic of Liberia</option>
 <option value='Libya – Great Socialist Peoples Libyan Arab Jamahiriya'>Libya – Great Socialist Peoples Libyan Arab Jamahiriya</option>
 <option value='Liechtenstein – Principality of Liechtenstein'>Liechtenstein – Principality of Liechtenstein</option>
 <option value='Lithuania – Republic of Lithuania'>Lithuania – Republic of Lithuania</option>
 <option value='Luxembourg – Grand Duchy of Luxembourg'>Luxembourg – Grand Duchy of Luxembourg</option>
 <option value='Macao – Macao Special Administrative Region of the Peoples Republic of China (Area of special sovereignty)'>Macao – Macao Special Administrative Region of the Peoples Republic of China (Area of special sovereignty)</option>
 <option value='Macedonia – Republic of Macedonia'>Macedonia – Republic of Macedonia</option>
 <option value='Madagascar – Republic of Madagascar'>Madagascar – Republic of Madagascar</option>
 <option value='Malawi – Republic of Malawi'>Malawi – Republic of Malawi</option>
 <option value='Malaysia '>Malaysia</option>
 <option value='Maldives – Republic of Maldives'>Maldives – Republic of Maldives</option> 
 <option value='Mali – Republic of Mali'>Mali – Republic of Mali</option>
 <option value='Malta – Republic of Malta'>Malta – Republic of Malta </option>
 <option value='Marshall Islands – Republic of the Marshall Islands'>Marshall Islands – Republic of the Marshall Islands</option>
 <option value='Mauritania – Islamic Republic of Mauritania'>Mauritania – Islamic Republic of Mauritania</option>
 <option value='Mauritius – Republic of Mauritius'>Mauritius – Republic of Mauritius</option>
 <option value='Mayotte – Departmental Collectivity of Mayotte (French overseas collectivity)'>Mayotte – Departmental Collectivity of Mayotte (French overseas collectivity)</option> 
 <option value='Mexico – United Mexican States'>Mexico – United Mexican States</option>
 <option value='Micronesia – Federated States of Micronesia'>Micronesia – Federated States of Micronesia</option>
 <option value='Moldova – Republic of Moldova'>Moldova – Republic of Moldova</option>
 <option value='Monaco – Principality of Monaco'>Monaco – Principality of Monaco</option> 
 <option value='Mongolia'>Mongolia</option>
 <option value='Montenegro'>Montenegro</option>
 <option value='Montserrat (UK overseas territory)'>Montserrat (UK overseas territory)</option>
 <option value='Morocco – Kingdom of Morocco'>Morocco – Kingdom of Morocco</option>
 <option value='Mozambique – Republic of Mozambique'>Mozambique – Republic of Mozambique</option>
 <option value='Nagorno-Karabakh – Nagorno-Karabakh Republic (Artsakh)'>Nagorno-Karabakh – Nagorno-Karabakh Republic (Artsakh)</option>
 <option value='Namibia – Republic of Namibia'>Namibia – Republic of Namibia</option>
 <option value='Nauru – Republic of Nauru'>Nauru – Republic of Nauru</option>
 <option value='Nepal – Federal Democratic Republic of Nepal'>Nepal – Federal Democratic Republic of Nepal</option>
 <option value='Netherlands – Kingdom of the Netherlands'>Netherlands – Kingdom of the Netherlands</option>
 <option value='Netherlands Antilles (Self-governing country in the Kingdom of the Netherlands)'>Netherlands Antilles (Self-governing country in the Kingdom of the Netherlands)</option> 
 <option value='New Caledonia – Territory of New Caledonia and Dependencies (French community sui generis)'>New Caledonia – Territory of New Caledonia and Dependencies (French community sui generis)</option>
 <option value='New Zealand'>New Zealand</option>
 <option value='Nicaragua – Republic of Nicaragua'>Nicaragua – Republic of Nicaragua</option>
 <option value='Niger – Republic of Niger'>Niger – Republic of Niger</option>
 <option value='Nigeria – Federal Republic of Nigeria'>Nigeria – Federal Republic of Nigeria</option> 
 <option value='Niue (Associated state of New Zealand)'>Niue (Associated state of New Zealand)</option>
 <option value='Norfolk Island – Territory of Norfolk Island (Australian overseas territory)'>Norfolk Island – Territory of Norfolk Island (Australian overseas territory)</option> 
 <option value='Northern Cyprus – Turkish Republic of Northern Cyprus'>Northern Cyprus – Turkish Republic of Northern Cyprus</option>
 <option value='Northern Mariana Islands – Commonwealth of the Northern Mariana Islands (US commonwealth)'>Northern Mariana Islands – Commonwealth of the Northern Mariana Islands (US commonwealth)</option>
 <option value='Norway – Kingdom of Norway'>Norway – Kingdom of Norway</option>
 <option value='Oman – Sultanate of Oman'>Oman – Sultanate of Oman</option>
 <option value='Pakistan – Islamic Republic of Pakistan'>Pakistan – Islamic Republic of Pakistan</option>
 <option value='Palau – Republic of Palau'>Palau – Republic of Palau</option>
 <option value='Palestine – Palestinian Territories'>Palestine – Palestinian Territories</option>
 <option value='Panama – Republic of Panama'>Panama – Republic of Panama</option>
 <option value='Papua New Guinea – Independent State of Papua New Guinea'>Papua New Guinea – Independent State of Papua New Guinea </option>
 <option value='Paraguay – Republic of Paraguay'>Paraguay – Republic of Paraguay</option>
 <option value='Peru – Republic of Peru'>Peru – Republic of Peru</option>
 <option value='Philippines – Republic of the Philippines'>Philippines – Republic of the Philippines</option> 
 <option value='Pitcairn Islands – Pitcairn, Henderson, Ducie, and Oeno Islands (UK overseas territory)'>Pitcairn Islands – Pitcairn, Henderson, Ducie, and Oeno Islands (UK overseas territory)</option>
 <option value='Poland – Republic of Poland'>Poland – Republic of Poland</option>
 <option value='Portugal – Portuguese Republic'>Portugal – Portuguese Republic</option>
 <option value='Puerto Rico – Commonwealth of Puerto Rico (US commonwealth)'>Puerto Rico – Commonwealth of Puerto Rico (US commonwealth)</option>
 <option value='Qatar – State of Qatar'>Qatar – State of Qatar</option>
 <option value='Romania'>Romania</option>
 <option value='Russia – Russian Federation'>Russia – Russian Federation</option> 
 <option value='Rwanda – Republic of Rwanda'>Rwanda – Republic of Rwanda</option>
 <option value='Saint Barthélemy – Collectivity of Saint Barthélemy (French overseas collectivity)'>Saint Barthélemy – Collectivity of Saint Barthélemy (French overseas collectivity)</option>
 <option value='Saint Helena (UK overseas territory)'>Saint Helena (UK overseas territory)</option>
 <option value='Saint Kitts and Nevis – Federation of Saint Christopher and Nevis'>Saint Kitts and Nevis – Federation of Saint Christopher and Nevis</option>
 <option value='Saint Lucia'>Saint Lucia</option>
 <option value='Saint Martin – Collectivity of Saint Martin (French overseas collectivity)'>Saint Martin – Collectivity of Saint Martin (French overseas collectivity)</option>
 <option value='Saint Pierre and Miquelon – Territorial Collectivity of Saint Pierre and Miquelon (French overseas collectivity)'>Saint Pierre and Miquelon – Territorial Collectivity of Saint Pierre and Miquelon (French overseas collectivity)</option>
 <option value='Saint Vincent and the Grenadines'>Saint Vincent and the Grenadines</option>
 <option value='Samoa – Independent State of Samoa'>Samoa – Independent State of Samoa</option>
 <option value='San Marino – Most Serene Republic of San Marino'>San Marino – Most Serene Republic of San Marino</option>
 <option value='São Tomé and Príncipe – Democratic Republic of São Tomé and Príncipe'>São Tomé and Príncipe – Democratic Republic of São Tomé and Príncipe</option>
 <option value='Saudi Arabia – Kingdom of Saudi Arabia'>Saudi Arabia – Kingdom of Saudi Arabia</option>
 <option value='Senegal – Republic of Senegal'>Senegal – Republic of Senegal</option>
 <option value='Serbia – Republic of Serbia'>Serbia – Republic of Serbia</option>
 <option value='Seychelles – Republic of Seychelles'>Seychelles – Republic of Seychelles</option>
 <option value='Sierra Leone – Republic of Sierra Leone'>Sierra Leone – Republic of Sierra Leone</option>
 <option value='Singapore – Republic of Singapore'>Singapore – Republic of Singapore</option>
 <option value='Slovakia – Slovak Republic'>Slovakia – Slovak Republic</option>
 <option value='Slovenia – Republic of Slovenia '>Slovenia – Republic of Slovenia</option>
 <option value='Solomon Islands'>Solomon Islands</option>
 <option value='Somalia - Somali Republic '>Somalia - Somali Republic</option>
 <option value='Somaliland – Republic of Somaliland'>Somaliland – Republic of Somaliland</option>
 <option value='South Africa – Republic of South Africa'>South Africa – Republic of South Africa</option> 
 <option value='South Ossetia – Republic of South Ossetia'>South Ossetia – Republic of South Ossetia </option>
 <option value='Spain – Kingdom of Spain'>Spain – Kingdom of Spain</option>
 <option value='Sri Lanka – Democratic Socialist Republic of Sri Lanka'>Sri Lanka – Democratic Socialist Republic of Sri Lanka</option>
 <option value='Sudan – Republic of the Sudan'>Sudan – Republic of the Sudan</option>
 <option value='Suriname – Republic of Suriname'>Suriname – Republic of Suriname</option> 
 <option value='Svalbard (Territory of Norway)'>Svalbard (Territory of Norway)</option>
 <option value='Swaziland – Kingdom of Swaziland'>Swaziland – Kingdom of Swaziland</option>
 <option value='Sweden – Kingdom of Sweden'>Sweden – Kingdom of Sweden</option>
 <option value='Switzerland – Swiss Confederation'>Switzerland – Swiss Confederation</option> 
 <option value='Syria – Syrian Arab Republic'>Syria – Syrian Arab Republic</option>
 <option value='Taiwan – Republic of China'>Taiwan – Republic of China</option>
 <option value='Tajikistan – Republic of Tajikistan'>Tajikistan – Republic of Tajikistan</option>
 <option value='Tanzania – United Republic of Tanzania'>Tanzania – United Republic of Tanzania</option>
 <option value='Thailand – Kingdom of Thailand'>Thailand – Kingdom of Thailand</option>
 <option value='Togo – Togolese Republic'>Togo – Togolese Republic</option>
 <option value='Tokelau (Overseas territory of New Zealand)'>Tokelau (Overseas territory of New Zealand)</option>
 <option value='Tonga – Kingdom of Tonga'>Tonga – Kingdom of Tonga</option>
 <option value='Transnistria – Transnistrian Moldovan Republic'>Transnistria – Transnistrian Moldovan Republic</option> 
 <option value='Trinidad and Tobago – Republic of Trinidad and Tobago'>Trinidad and Tobago – Republic of Trinidad and Tobago</option>
 <option value='Tristan da Cunha (Dependency of the UK overseas territory of Saint Helena)'>Tristan da Cunha (Dependency of the UK overseas territory of Saint Helena)</option>
 <option value='Tunisia – Tunisian Republic'>Tunisia – Tunisian Republic</option>
 <option value='Turkey – Republic of Turkey'>Turkey – Republic of Turkey</option>
 <option value='Turkmenistan'>Turkmenistan</option>
 <option value='Turks and Caicos Islands (UK overseas territory)'>Turks and Caicos Islands (UK overseas territory)</option> 
 <option value='Tuvalu'>Tuvalu</option>
 <option value='Uganda – Republic of Uganda'>Uganda – Republic of Uganda</option>
 <option value='Ukraine'>Ukraine</option>
 <option value='United Arab Emirates'>United Arab Emirates</option>
 <option value='United Kingdom – United Kingdom of Great Britain and Northern Ireland'>United Kingdom – United Kingdom of Great Britain and Northern Ireland</option>
 <option value='United States – United States of America'>United States – United States of America</option>
 <option value='Uruguay – Eastern Republic of Uruguay'>Uruguay – Eastern Republic of Uruguay</option>
 <option value='Uzbekistan – Republic of Uzbekistan'>Uzbekistan – Republic of Uzbekistan</option>
 <option value='Vanuatu – Republic of Vanuatu'>Vanuatu – Republic of Vanuatu</option>
 <option value='Vatican City – State of the Vatican City'>Vatican City – State of the Vatican City</option>
 <option value='Venezuela – Bolivarian Republic of Venezuela'>Venezuela – Bolivarian Republic of Venezuela</option>
 <option value='Vietnam – Socialist Republic of Vietnam'>Vietnam – Socialist Republic of Vietnam </option>
 <option value='Virgin Islands, British – British Virgin Islands (UK overseas territory)'>Virgin Islands, British – British Virgin Islands (UK overseas territory)</option>
 <option value='Virgin Islands, United States – United States Virgin Islands (US organized territory)'>Virgin Islands, United States – United States Virgin Islands (US organized territory)</option>
 <option value='Wallis and Futuna – Territory of Wallis and Futuna Islands (French overseas collectivity)'>Wallis and Futuna – Territory of Wallis and Futuna Islands (French overseas collectivity)</option>
 <option value='Western Sahara - Sahrawi Arab Democratic Republic'>Western Sahara - Sahrawi Arab Democratic Republic</option>
 <option value='Yemen – Republic of Yemen'>Yemen – Republic of Yemen</option>
 <option value='Zambia – Republic of Zambia'>Zambia – Republic of Zambia</option>
 <option value='Zimbabwe – Republic of Zimbabwe'>Zimbabwe – Republic of Zimbabwe</option>
</select>

                            </td>
                        </tr>
                    </table>
                    <table  style="float:left;margin-left:52px;"  >	
                        <tr>
                        	
                            <td align="right" >
                            	Time Zone
                            </td>
                            <td>
                            	<select id="timezone" name="timezone" style="margin-left:22px;">
          		
                                	<!---<option value='' selected="selected"></option>
                            <option value='(GMT-12:00) International Date Line West'>(GMT-12:00) International Date Line West</option>
                            <option value='(GMT-11:00) Midway Island, Samoa'>(GMT-11:00) Midway Island, Samoa</option>
                            <option value='(GMT-10:00) Hawaii'>(GMT-10:00) Hawaii</option>
                            <option value='(GMT-09:00) Alaska'>(GMT-09:00) Alaska</option>
                            <option value='(GMT-08:00) Pacific Time(US & Canada)'>(GMT-08:00) Pacific Time(US & Canada)</option>
                            <option value='(GMT-08:00) Tijuana, Baja California'>(GMT-08:00) Tijuana, Baja California</option>
                            <option value='(GMT-07:00) Arizona'>(GMT-07:00) Arizona</option>
                            <option value='(GMT-07:00) Chihuahua, La Paz, Mazatlan'>(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                            <option value='(GMT-07:00) Mountain Time(US & Canada)'>(GMT-07:00) Mountain Time(US & Canada)</option>
                            <option value='(GMT-06:00) Central America'>(GMT-06:00) Central America</option>
                            <option value='(GMT-06:00) Central Time(US & Canada)'>(GMT-06:00) Central Time(US & Canada)</option>
                            <option value='(GMT-06:00) Guadalajara, Mexico City, Monterrey'>(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                            <option value='(GMT-06:00) Saskatchewan'>(GMT-06:00) Saskatchewan</option>
                            <option value='(GMT-05:00) Bogota, Lima, Quito, Rio Branco'>(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                            <option value='(GMT-05:00) Eastern Time(US & Canada)'>(GMT-05:00) Eastern Time(US & Canada)</option>
                            <option value='(GMT-05:00) Indiana'>(GMT-05:00) Indiana</option>
                            <option value='(GMT-04:30) Caracas'>(GMT-04:30) Caracas</option>
                            <option value='(GMT-04:00) Atlantic Time(Canada)'>(GMT-04:00) Atlantic Time(Canada)</option>
                            <option value='(GMT-04:00) La Paz'>(GMT-04:00) La Paz</option>
                            <option value='(GMT-04:00) Manaus'>(GMT-04:00) Manaus</option>
                            <option value='(GMT-04:00) Santiago'>(GMT-04:00) Santiago</option>
                            <option value='(GMT-03:30) Newfoundland'>(GMT-03:30) Newfoundland</option>
                            <option value='(GMT-03:00) Brasilia'>(GMT-03:00) Brasilia</option>
                            <option value='(GMT-03:00) Buenos Aires'>(GMT-03:00) Buenos Aires</option>
                            <option value='(GMT-03:00) Georgetown'>(GMT-03:00) Georgetown</option>
                            <option value='(GMT-03:00) Greenland'>(GMT-03:00 ) Greenland</option>
                            <option value='(GMT-03:00) Montevideo'>(GMT-03:00) Montevideo</option>            
                            <option value='(GMT-02:00) Mid-Alantic'>(GMT-02:00) Mid-Alantic</option>
                            <option value='(GMT-01:00) Azores'>(GMT-01:00) Azores</option>
                            <option value='(GMT-01:00) Cape Verde Is.'>(GMT-01:00) Cape Verde Is.</option>                
                            <option value='(GMT 00:00) Casablanca'>(GMT 00:00) Casablanca</option>
                            <option value='(GMT 00:00) Greenwich Mean Time: Dublin, Edinburgh, Libson, London'>(GMT 00:00) Greenwich Mean Time: Dublin, Edinburgh, Libson, London</option>
                            <option value='(GMT 00:00) Monrovia, Reykjavik'>(GMT 00:00) Monrovia, Reykjavik</option>                
                            <option value='(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna'>(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                            <option value='(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague'>(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                            <option value='(GMT+01:00) Brussels, Copenhagen, Madrid, Paris'>(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                            <option value='(GMT+01:00) Sarejevo, Skopje, Warsaw, Zagreb'>(GMT+01:00) Sarejevo, Skopje, Warsaw, Zagreb</option>
                            <option value='(GMT+01:00) West Central Africa'>(GMT+01:00) West Central Africa</option>
                            <option value='(GMT+02:00) Amman'>(GMT+02:00) Amman</option>
                            <option value='(GMT+02:00) Athens, Bucharest, Isanbul'>(GMT+02:00) Athens, Bucharest, Isanbul</option>
                            <option value='(GMT+02:00) Beirut'>(GMT+02:00) Beirut</option>
                            <option value='(GMT+02:00) Cairo'>(GMT+02:00) Cairo</option>
                            <option value='(GMT+02:00) Harare, Pretoria'>(GMT+02:00) Harare, Pretoria'</option>
                            <option value='(GMT+02:00) Helsinki, Kyiv, Riga, Tallinn, Vilnius'>(GMT+02:00) Helsinki, Kyiv, Riga, Tallinn, Vilnius</option>
                            <option value='(GMT+02:00) Jerusalem'>(GMT+02:00) Jerusalem</option>
                            <option value='(GMT+02:00) Minsk'>(GMT+02:00) Minsk</option>
                            <option value='(GMT+02:00) Windhoek'>(GMT+02:00) Windhoek</option>
                            <option value='(GMT+03:00) Baghdad'>(GMT+03:00) Baghdad</option>
                            <option value='(GMT+03:00) Kuwait, Riyadh'>(GMT+03:00) Kuwait, Riyadh</option>
                            <option value='(GMT+03:00) Moscow, St. Petersburg, Volgograd'>(GMT+03:00) Kuwait, Riyadh</option>
                            <option value='(GMT+03:00) Nairobi'>(GMT+03:00 ) Nairobi</option>
                            <option value='(GMT+03:00) Tbilisi'>(GMT+03:00) Tbilisi</option>
                            <option value='(GMT+03:30) Tehran'>(GMT+03:30) Tehran</option>
                            <option value='(GMT+04:00) Abu Dhabi, Muscat'>(GMT+04:00) Abu Dhabi, Muscat</option>
                            <option value='(GMT+04:00) Baku'>(GMT+04:00) Baku</option>
                            <option value='(GMT+04:00) Yerevan'>(GMT+04:00) Yerevan</option>
                            <option value='(GMT+04:30) Kabul'>(GMT+04:30) Kabul</option>
                            <option value='(GMT+05:00) Ekaterinburg'>GMT+05:00) Ekaterinburg</option>
                            <option value='(GMT+05:00) Islamabad, Karachi'>(GMT+05:00) Islamabad, Karachi</option>
                            <option value='(GMT+05:00) Tashkent'>(GMT+05:00) Islamabad, Karachi</option>
                            <option value='(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi'>(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                            <option value='(GMT+05:30) Sri Jayawardenepura'>(GMT+05:30) Sri Jayawardenepura</option>
                            <option value='(GMT+05:45) Kathmandu'>(GMT+05:45) Kathmandu</option>
                            <option value='(GMT+06:00) Almaty, Novosibirsk'>(GMT+06:00) Almaty, Novosibirsk</option>
                            <option value='(GMT+06:00) Astana, Dhaka'>(GMT+06:00) Astana, Dhaka</option>
                            <option value='(GMT+06:30) Yangon(Rangoon)'>(GMT+06:30) Yangon(Rangoon)</option>
                            <option value='(GMT+07:00) Bangkok, Hanoi, Jakarta'>(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                            <option value='(GMT+07:00) Krasnoyarsk'>(GMT+07:00) Krasnoyarsk</option>
                            <option value='(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumpi'>(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumpi</option>
                            <option value='(GMT+08:00) Irkutsk, Ulaan Bataar'>(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                            <option value='(GMT+08:00) Kuala Lumpur, Singapore'>(GMT+08:00) Kuala Lumpur, Singapore</option>
                            <option value='(GMT+08:00) Perth'>(GMT+08:00) Perth</option>
                            <option value='(GMT+08:00) Taipei'>(GMT+08:00) Taipei</option>
                            <option value='(GMT+09:00) Osaka, Sapporo, Tokyo'>(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                            <option value='(GMT+09:00) Seoul'>(GMT+09:00) Seoul</option>
                            <option value='(GMT+09:00) Yakutsk'>(GMT+09:00) Yakutsk</option>
                            <option value='(GMT+09:30) Adelaide'>(GMT+09:30) Adelaide</option>
                            <option value='(GMT+09:30) Darwin'>(GMT+09:30) Darwin</option>
                            <option value='(GMT+10:00) Brisbane'>(GMT+10:00) Brisbane</option>
                            <option value='(GMT+10:00) Canberra, Melbourne, Sydney'>(GMT+10:00) Canberra, Melbourne, Sydney</option>
                            <option value='(GMT+10:00) Guam Port Moresby'>(GMT+10:00) Guam Port Moresby</option>
                            <option value='(GMT+10:00) Hobart'>(GMT+10:00) Hobart</option>
                            <option value='(GMT+10:00) Vladivostok'>(GMT+10:00) Vladivostok</option>
                            <option value='(GMT+11:00) Magadan, Solomon Is., New Caledonia'>(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
                            <option value='(GMT+12:00) Auckland, Wellington'>(GMT+12:00) Auckland, Wellington</option>
                            <option value='(GMT+12:00) Fiji, Kamchatka, Marshall Is.'>(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                            <option value="(GMT+13:00) Nuku'alofa">(GMT+13:00) Nuku'alofa</option>    --->
                            <option value='' selected="selected"></option>
                            <option value='America/Adak'>America/Adak</option>
<option value='America/Anchorage'>America/Anchorage</option>
<option value='America/Anguilla'>America/Anguilla</option>
<option value='America/Antigua'>America/Antigua</option>
<option value='America/Araguaina'>America/Araguaina</option>
<option value='America/Argentina/Buenos_Aires'>America/Argentina/Buenos_Aires</option>
<option value='America/Argentina/Catamarca'>America/Argentina/Catamarca</option>
<option value='America/Argentina/ComodRivadavia'>America/Argentina/ComodRivadavia</option>
<option value='America/Argentina/Cordoba'>America/Argentina/Cordoba</option>
<option value='America/Argentina/Jujuy'>America/Argentina/Jujuy</option>
<option value='America/Argentina/La_Rioja'>America/Argentina/La_Rioja</option>
<option value='America/Argentina/Mendoza'>America/Argentina/Mendoza</option>
<option value='America/Argentina/Rio_Gallegos'>America/Argentina/Rio_Gallegos</option>
<option value='America/Argentina/San_Juan'>America/Argentina/San_Juan</option>
<option value='America/Argentina/San_Luis'>America/Argentina/San_Luis</option>
<option value='America/Argentina/Tucuman'>America/Argentina/Tucuman</option>
<option value='America/Argentina/Ushuaia'>America/Argentina/Ushuaia</option>
<option value='America/Aruba'>America/Aruba</option>
<option value='America/Asuncion'>America/Asuncion</option>
<option value='America/Atikokan'>America/Atikokan</option>
<option value='America/Atka'>America/Atka</option>
<option value='America/Bahia'>America/Bahia</option>
<option value='America/Barbados'>America/Barbados</option>
<option value='America/Belem'>America/Belem</option>
<option value='America/Belize'>America/Belize</option>
<option value='America/Blanc-Sablon'>America/Blanc-Sablon</option>
<option value='America/Boa_Vista'>America/Boa_Vista</option>
<option value='America/Bogota'>America/Bogota</option>
<option value='America/Boise'>America/Boise</option>
<option value='America/Buenos_Aires'>America/Buenos_Aires</option>
<option value='America/Cambridge_Bay'>America/Cambridge_Bay</option>
<option value='America/Campo_Grande'>America/Campo_Grande</option>
<option value='America/Cancun'>America/Cancun</option>
<option value='America/Caracas'>America/Caracas</option>
<option value='America/Catamarca'>America/Catamarca</option>
<option value='America/Cayenne'>America/Cayenne</option>
<option value='America/Cayman'>America/Cayman</option>
<option value='America/Chicago'>America/Chicago</option>
<option value='America/Chihuahua'>America/Chihuahua</option>
<option value='America/Coral_Harbour'>America/Coral_Harbour</option>
<option value='America/Cordoba'>America/Cordoba</option>
<option value='America/Costa_Rica'>America/Costa_Rica</option>
<option value='America/Cuiaba'>America/Cuiaba</option>
<option value='America/Curacao'>America/Curacao</option>
<option value='America/Danmarkshavn'>America/Danmarkshavn</option>
<option value='America/Dawson'>America/Dawson</option>
<option value='America/Dawson_Creek'>America/Dawson_Creek</option>
<option value='America/Denver'>America/Denver</option>
<option value='America/Detroit'>America/Detroit</option>
<option value='America/Dominica'>America/Dominica</option>
<option value='America/Edmonton'>America/Edmonton</option>
<option value='America/Eirunepe'>America/Eirunepe</option>
<option value='America/El_Salvador'>America/El_Salvador</option>
<option value='America/Ensenada'>America/Ensenada</option>
<option value='America/Fort_Wayne'>America/Fort_Wayne</option>
<option value='America/Fortaleza'>America/Fortaleza</option>
<option value='America/Glace_Bay'>America/Glace_Bay</option>
<option value='America/Godthab'>America/Godthab</option>
<option value='America/Goose_Bay'>America/Goose_Bay</option>
<option value='America/Grand_Turk'>America/Grand_Turk</option>
<option value='America/Grenada'>America/Grenada</option>
<option value='America/Guadeloupe'>America/Guadeloupe</option>
<option value='America/Guatemala'>America/Guatemala</option>
<option value='America/Guayaquil'>America/Guayaquil</option>
<option value='America/Guyana'>America/Guyana</option>
<option value='America/Halifax'>America/Halifax</option>
<option value='America/Havana'>America/Havana</option>
<option value='America/Hermosillo'>America/Hermosillo</option>
<option value='America/Indiana/Indianapolis'>America/Indiana/Indianapolis</option>
<option value='America/Indiana/Knox'>America/Indiana/Knox</option>
<option value='America/Indiana/Marengo'>America/Indiana/Marengo</option>
<option value='America/Indiana/Petersburg'>America/Indiana/Petersburg</option>
<option value='America/Indiana/Tell_City'>America/Indiana/Tell_City</option>
<option value='America/Indiana/Vevay'>America/Indiana/Vevay</option>
<option value='America/Indiana/Vincennes'>America/Indiana/Vincennes</option>
<option value='America/Indiana/Winamac'>America/Indiana/Winamac</option>
<option value='America/Indianapolis'>America/Indianapolis</option>
<option value='America/Inuvik'>America/Inuvik</option>
<option value='America/Iqaluit'>America/Iqaluit</option>
<option value='America/Jamaica'>America/Jamaica</option>
<option value='America/Jujuy'>America/Jujuy</option>
<option value='America/Juneau'>America/Juneau</option>
<option value='America/Kentucky/Louisville'>America/Kentucky/Louisville</option>
<option value='America/Kentucky/Monticello'>America/Kentucky/Monticello</option>
<option value='America/Knox_IN'>America/Knox_IN</option>
<option value='America/La_Paz'>America/La_Paz</option>
<option value='America/Lima'>America/Lima</option>
<option value='America/Los_Angeles'>America/Los_Angeles</option>
<option value='America/Louisville'>America/Louisville</option>
<option value='America/Maceio'>America/Maceio</option>
<option value='America/Managua'>America/Managua</option>
<option value='America/Manaus'>America/Manaus</option>
<option value='America/Marigot'>America/Marigot</option>
<option value='America/Martinique'>America/Martinique</option>
<option value='America/Mazatlan'>America/Mazatlan</option>
<option value='America/Mendoza'>America/Mendoza</option>
<option value='America/Menominee'>America/Menominee</option>
<option value='America/Merida'>America/Merida</option>
<option value='America/Mexico_City'>America/Mexico_City</option>
<option value='America/Miquelon'>America/Miquelon</option>
<option value='America/Moncton'>America/Moncton</option>
<option value='America/Monterrey'>America/Monterrey</option>
<option value='America/Montevideo'>America/Montevideo</option>
<option value='America/Montreal'>America/Montreal</option>
<option value='America/Montserrat'>America/Montserrat</option>
<option value='America/Nassau'>America/Nassau</option>
<option value='America/New_York'>America/New_York</option>
<option value='America/Nipigon'>America/Nipigon</option>
<option value='America/Nome'>America/Nome</option>
<option value='America/Noronha'>America/Noronha</option>
<option value='America/North_Dakota/Center'>America/North_Dakota/Center</option>
<option value='America/North_Dakota/New_Salem'>America/North_Dakota/New_Salem</option>
<option value='America/Panama'>America/Panama</option>
<option value='America/Pangnirtung'>America/Pangnirtung</option>
<option value='America/Paramaribo'>America/Paramaribo</option>
<option value='America/Phoenix'>America/Phoenix</option>
<option value='America/Port-au-Prince'>America/Port-au-Prince</option>
<option value='America/Port_of_Spain'>America/Port_of_Spain</option>
<option value='America/Porto_Acre'>America/Porto_Acre</option>
<option value='America/Porto_Velho'>America/Porto_Velho</option>
<option value='America/Puerto_Rico'>America/Puerto_Rico</option>
<option value='America/Rainy_River'>America/Rainy_River</option>
<option value='America/Rankin_Inlet'>America/Rankin_Inlet</option>
<option value='America/Recife'>America/Recife</option>
<option value='America/Regina'>America/Regina</option>
<option value='America/Resolute'>America/Resolute</option>
<option value='America/Rio_Branco'>America/Rio_Branco</option>
<option value='America/Rosario'>America/Rosario</option>
<option value='America/Santiago'>America/Santiago</option>
<option value='America/Santo_Domingo'>America/Santo_Domingo</option>
<option value='America/Sao_Paulo'>America/Sao_Paulo</option>
<option value='America/Scoresbysund'>America/Scoresbysund</option>
<option value='America/Shiprock'>America/Shiprock</option>
<option value='America/St_Barthelemy'>America/St_Barthelemy</option>
<option value='America/St_Johns'>America/St_Johns</option>
<option value='America/St_Kitts'>America/St_Kitts</option>
<option value='America/St_Lucia'>America/St_Lucia</option>
<option value='America/St_Thomas'>America/St_Thomas</option>
<option value='America/St_Vincent'>America/St_Vincent</option>
<option value='America/Swift_Current'>America/Swift_Current</option>
<option value='America/Tegucigalpa'>America/Tegucigalpa</option>
<option value='America/Thule'>America/Thule</option>
<option value='America/Thunder_Bay'>America/Thunder_Bay</option>
<option value='America/Tijuana'>America/Tijuana</option>
<option value='America/Toronto'>America/Toronto</option>
<option value='America/Tortola'>America/Tortola</option>
<option value='America/Vancouver'>America/Vancouver</option>
<option value='America/Virgin'>America/Virgin</option>
<option value='America/Whitehorse'>America/Whitehorse</option>
<option value='America/Winnipeg'>America/Winnipeg</option>
<option value='Europe/Amsterdam'>Europe/Amsterdam</option>
<option value='Europe/Andorra'>Europe/Andorra</option>
<option value='Europe/Athens'>Europe/Athens</option>
<option value='Europe/Belfast'>Europe/Belfast</option>
<option value='Europe/Belgrade'>Europe/Belgrade</option>
<option value='Europe/Berlin'>Europe/Berlin</option>
<option value='Europe/Bratislava'>Europe/Bratislava</option>
<option value='Europe/Brussels'>Europe/Brussels</option>
<option value='Europe/Bucharest'>Europe/Bucharest</option>
<option value='Europe/Budapest'>Europe/Budapest</option>
<option value='Europe/Chisinau'>Europe/Chisinau</option>
<option value='Europe/Copenhagen'>Europe/Copenhagen</option>
<option value='Europe/Dublin'>Europe/Dublin</option>
<option value='Europe/Gibraltar'>Europe/Gibraltar</option>
<option value='Europe/Guernsey'>Europe/Guernsey</option>
<option value='Europe/Helsinki'>Europe/Helsinki</option>
<option value='Europe/Isle_of_Man'>Europe/Isle_of_Man</option>
<option value='Europe/Istanbul'>Europe/Istanbul</option>
<option value='Europe/Jersey'>Europe/Jersey</option>
<option value='Europe/Kaliningrad'>Europe/Kaliningrad</option>
<option value='Europe/Kiev'>Europe/Kiev</option>
<option value='Europe/Lisbon'>Europe/Lisbon</option>
<option value='Europe/Ljubljana'>Europe/Ljubljana</option>
<option value='Europe/London'>Europe/London</option>
<option value='Europe/Luxembourg'>Europe/Luxembourg</option>
<option value='Europe/Madrid'>Europe/Madrid</option>
<option value='Europe/Malta'>Europe/Malta</option>
<option value='Europe/Mariehamn'>Europe/Mariehamn</option>
<option value='Europe/Minsk'>Europe/Minsk</option>
<option value='Europe/Monaco'>Europe/Monaco</option>
<option value='Europe/Moscow'>Europe/Moscow</option>
<option value='Europe/Nicosia'>Europe/Nicosia</option>
<option value='Europe/Oslo'>Europe/Oslo</option>
<option value='Europe/Paris'>Europe/Paris</option>
<option value='Europe/Podgorica'>Europe/Podgorica</option>
<option value='Europe/Prague'>Europe/Prague</option>
<option value='Europe/Riga'>Europe/Riga</option>
<option value='Europe/Rome'>Europe/Rome</option>
<option value='Europe/Samara'>Europe/Samara</option>
<option value='Europe/San_Marino'>Europe/San_Marino</option>
<option value='Europe/Sarajevo'>Europe/Sarajevo</option>
<option value='Europe/Simferopol'>Europe/Simferopol</option>
<option value='Europe/Skopje'>Europe/Skopje</option>
<option value='Europe/Sofia'>Europe/Sofia</option>
<option value='Europe/Stockholm'>Europe/Stockholm</option>
<option value='Europe/Tallinn'>Europe/Tallinn</option>
<option value='Europe/Tirane'>Europe/Tirane</option>
<option value='Europe/Tiraspol'>Europe/Tiraspol</option>
<option value='Europe/Uzhgorod'>Europe/Uzhgorod</option>
<option value='Europe/Vaduz'>Europe/Vaduz</option>
<option value='Europe/Vatican'>Europe/Vatican</option>
<option value='Europe/Vienna'>Europe/Vienna</option>
<option value='Europe/Vilnius'>Europe/Vilnius</option>
<option value='Europe/Volgograd'>Europe/Volgograd</option>
<option value='Europe/Warsaw'>Europe/Warsaw</option>
<option value='Europe/Zagreb'>Europe/Zagreb</option>
<option value='Europe/Zaporozhye'>Europe/Zaporozhye</option>
<option value='Europe/Zurich'>Europe/Zurich</option>
<option value='Atlantic/Azores'>Atlantic/Azores</option>
<option value='Atlantic/Bermuda'>Atlantic/Bermuda</option>
<option value='Atlantic/Canary'>Atlantic/Canary</option>
<option value='Atlantic/Cape_Verde'>Atlantic/Cape_Verde</option>
<option value='Atlantic/Faeroe'>Atlantic/Faeroe</option>
<option value='Atlantic/Faroe'>Atlantic/Faroe</option>
<option value='Atlantic/Jan_Mayen'>Atlantic/Jan_Mayen</option>
<option value='Atlantic/Madeira'>Atlantic/Madeira</option>
<option value='Atlantic/Reykjavik'>Atlantic/Reykjavik</option>
<option value='Atlantic/South_Georgia'>Atlantic/South_Georgia</option>
<option value='Atlantic/St_Helena'>Atlantic/St_Helena</option>
<option value='Atlantic/Stanley'>Atlantic/Stanley</option>
<option value='Australia/ACT'>Australia/ACT</option>
<option value='Australia/Adelaide'>Australia/Adelaide</option>
<option value='Australia/Brisbane'>Australia/Brisbane</option>
<option value='Australia/Broken_Hill'>Australia/Broken_Hill</option>
<option value='Australia/Canberra'>Australia/Canberra</option>
<option value='Australia/Currie'>Australia/Currie</option>
<option value='Australia/Darwin'>Australia/Darwin</option>
<option value='Australia/Eucla'>Australia/Eucla</option>
<option value='Australia/Hobart'>Australia/Hobart</option>
<option value='Australia/LHI'>Australia/LHI</option>
<option value='Australia/Lindeman'>Australia/Lindeman</option>
<option value='Australia/Lord_Howe'>Australia/Lord_Howe</option>
<option value='Australia/Melbourne'>Australia/Melbourne</option>
<option value='Australia/North'>Australia/North</option>
<option value='Australia/NSW'>Australia/NSW</option>
<option value='Australia/Perth'>Australia/Perth</option>
<option value='Australia/Queensland'>Australia/Queensland</option>
<option value='Australia/South'>Australia/South</option>
<option value='Australia/Sydney'>Australia/Sydney</option>
<option value='Australia/Tasmania'>Australia/Tasmania</option>
<option value='Australia/Victoria'>Australia/Victoria</option>
<option value='Australia/West'>Australia/West</option>
<option value='Australia/Yancowinna'>Australia/Yancowinna</option>
<option value='Indian/Antananarivo'>Indian/Antananarivo</option>
<option value='Indian/Chagos'>Indian/Chagos</option>
<option value='Indian/Christmas'>Indian/Christmas</option>
<option value='Indian/Cocos'>Indian/Cocos</option>
<option value='Indian/Comoro'>Indian/Comoro</option>
<option value='Indian/Kerguelen'>Indian/Kerguelen</option>
<option value='Indian/Mahe'>Indian/Mahe</option>
<option value='Indian/Maldives'>Indian/Maldives</option>
<option value='Indian/Mauritius'>Indian/Mauritius</option>
<option value='Indian/Mayotte'>Indian/Mayotte</option>
<option value='Indian/Reunion'>Indian/Reunion</option>
<option value='Pacific/Apia'>Pacific/Apia</option>
<option value='Pacific/Auckland'>Pacific/Auckland</option>
<option value='Pacific/Chatham'>Pacific/Chatham</option>
<option value='Pacific/Easter'>Pacific/Easter</option>
<option value='Pacific/Efate'>Pacific/Efate</option>
<option value='Pacific/Enderbury'>Pacific/Enderbury</option>
<option value='Pacific/Fakaofo'>Pacific/Fakaofo</option>
<option value='Pacific/Fiji'>Pacific/Fiji</option>
<option value='Pacific/Funafuti'>Pacific/Funafuti</option>
<option value='Pacific/Galapagos'>Pacific/Galapagos</option>
<option value='Pacific/Gambier'>Pacific/Gambier</option>
<option value='Pacific/Guadalcanal'>Pacific/Guadalcanal</option>
<option value='Pacific/Guam'>Pacific/Guam</option>
<option value='Pacific/Honolulu'>Pacific/Honolulu</option>
<option value='Pacific/Johnston'>Pacific/Johnston</option>
<option value='Pacific/Kiritimati'>Pacific/Kiritimati</option>
<option value='Pacific/Kosrae'>Pacific/Kosrae</option>
<option value='Pacific/Kwajalein'>Pacific/Kwajalein</option>
<option value='Pacific/Majuro'>Pacific/Majuro</option>
<option value='Pacific/Marquesas'>Pacific/Marquesas</option>
<option value='Pacific/Midway'>Pacific/Midway</option>
<option value='Pacific/Nauru'>Pacific/Nauru</option>
<option value='Pacific/Niue'>Pacific/Niue</option>
<option value='Pacific/Norfolk'>Pacific/Norfolk</option>
<option value='Pacific/Noumea'>Pacific/Noumea</option>
<option value='Pacific/Pago_Pago'>Pacific/Pago_Pago</option>
<option value='Pacific/Palau'>Pacific/Palau</option>
<option value='Pacific/Pitcairn'>Pacific/Pitcairn</option>
<option value='Pacific/Ponape'>Pacific/Ponape</option>
<option value='Pacific/Port_Moresby'>Pacific/Port_Moresby</option>
<option value='Pacific/Rarotonga'>Pacific/Rarotonga</option>
<option value='Pacific/Saipan'>Pacific/Saipan</option>
<option value='Pacific/Samoa'>Pacific/Samoa</option>
<option value='Pacific/Tahiti'>Pacific/Tahiti</option>
<option value='Pacific/Tarawa'>Pacific/Tarawa</option>
<option value='Pacific/Tongatapu'>Pacific/Tongatapu</option>
<option value='Pacific/Truk'>Pacific/Truk</option>
<option value='Pacific/Wake'>Pacific/Wake</option>
<option value='Pacific/Wallis'>Pacific/Wallis</option>
<option value='Pacific/Yap'>Pacific/Yap</option>
<option value='Arctic/Longyearbyen'>Arctic/Longyearbyen</option>
<option value='Asia/Aden'>Asia/Aden</option>
<option value='Asia/Almaty'>Asia/Almaty</option>
<option value='Asia/Amman'>Asia/Amman</option>
<option value='Asia/Anadyr'>Asia/Anadyr</option>
<option value='Asia/Aqtau'>Asia/Aqtau</option>
<option value='Asia/Aqtobe'>Asia/Aqtobe</option>
<option value='Asia/Ashgabat'>Asia/Ashgabat</option>
<option value='Asia/Ashkhabad'>Asia/Ashkhabad</option>
<option value='Asia/Baghdad'>Asia/Baghdad</option>
<option value='Asia/Bahrain'>Asia/Bahrain</option>
<option value='Asia/Baku'>Asia/Baku</option>
<option value='Asia/Bangkok'>Asia/Bangkok</option>
<option value='Asia/Beirut'>Asia/Beirut</option>
<option value='Asia/Bishkek'>Asia/Bishkek</option>
<option value='Asia/Brunei'>Asia/Brunei</option>
<option value='Asia/Calcutta'>Asia/Calcutta</option>
<option value='Asia/Choibalsan'>Asia/Choibalsan</option>
<option value='Asia/Chongqing'>Asia/Chongqing</option>
<option value='Asia/Chungking'>Asia/Chungking</option>
<option value='Asia/Colombo'>Asia/Colombo</option>
<option value='Asia/Dacca'>Asia/Dacca</option>
<option value='Asia/Damascus'>Asia/Damascus</option>
<option value='Asia/Dhaka'>Asia/Dhaka</option>
<option value='Asia/Dili'>Asia/Dili</option>
<option value='Asia/Dubai'>Asia/Dubai</option>
<option value='Asia/Dushanbe'>Asia/Dushanbe</option>
<option value='Asia/Gaza'>Asia/Gaza</option>
<option value='Asia/Harbin'>Asia/Harbin</option>
<option value='Asia/Ho_Chi_Minh'>Asia/Ho_Chi_Minh</option>
<option value='Asia/Hong_Kong'>Asia/Hong_Kong</option>
<option value='Asia/Hovd'>Asia/Hovd</option>
<option value='Asia/Irkutsk'>Asia/Irkutsk</option>
<option value='Asia/Istanbul'>Asia/Istanbul</option>
<option value='Asia/Jakarta'>Asia/Jakarta</option>
<option value='Asia/Jayapura'>Asia/Jayapura</option>
<option value='Asia/Jerusalem'>Asia/Jerusalem</option>
<option value='Asia/Kabul'>Asia/Kabul</option>
<option value='Asia/Kamchatka'>Asia/Kamchatka</option>
<option value='Asia/Karachi'>Asia/Karachi</option>
<option value='Asia/Kashgar'>Asia/Kashgar</option>
<option value='Asia/Katmandu'>Asia/Katmandu</option>
<option value='Asia/Kolkata'>Asia/Kolkata</option>
<option value='Asia/Krasnoyarsk'>Asia/Krasnoyarsk</option>
<option value='Asia/Kuala_Lumpur'>Asia/Kuala_Lumpur</option>
<option value='Asia/Kuching'>Asia/Kuching</option>
<option value='Asia/Kuwait'>Asia/Kuwait</option>
<option value='Asia/Macao'>Asia/Macao</option>
<option value='Asia/Macau'>Asia/Macau</option>
<option value='Asia/Magadan'>Asia/Magadan</option>
<option value='Asia/Makassar'>Asia/Makassar</option>
<option value='Asia/Manila'>Asia/Manila</option>
<option value='Asia/Muscat'>Asia/Muscat</option>
<option value='Asia/Nicosia'>Asia/Nicosia</option>
<option value='Asia/Novosibirsk'>Asia/Novosibirsk</option>
<option value='Asia/Omsk'>Asia/Omsk</option>
<option value='Asia/Oral'>Asia/Oral</option>
<option value='Asia/Phnom_Penh'>Asia/Phnom_Penh</option>
<option value='Asia/Pontianak'>Asia/Pontianak</option>
<option value='Asia/Pyongyang'>Asia/Pyongyang</option>
<option value='Asia/Qatar'>Asia/Qatar</option>
<option value='Asia/Qyzylorda'>Asia/Qyzylorda</option>
<option value='Asia/Rangoon'>Asia/Rangoon</option>
<option value='Asia/Riyadh'>Asia/Riyadh</option>
<option value='Asia/Saigon'>Asia/Saigon</option>
<option value='Asia/Sakhalin'>Asia/Sakhalin</option>
<option value='Asia/Samarkand'>Asia/Samarkand</option>
<option value='Asia/Seoul'>Asia/Seoul</option>
<option value='Asia/Shanghai'>Asia/Shanghai</option>
<option value='Asia/Singapore'>Asia/Singapore</option>
<option value='Asia/Taipei'>Asia/Taipei</option>
<option value='Asia/Tashkent'>Asia/Tashkent</option>
<option value='Asia/Tbilisi'>Asia/Tbilisi</option>
<option value='Asia/Tehran'>Asia/Tehran</option>
<option value='Asia/Tel_Aviv'>Asia/Tel_Aviv</option>
<option value='Asia/Thimbu'>Asia/Thimbu</option>
<option value='Asia/Thimphu'>Asia/Thimphu</option>
<option value='Asia/Tokyo'>Asia/Tokyo</option>
<option value='Asia/Ujung_Pandang'>Asia/Ujung_Pandang</option>
<option value='Asia/Ulaanbaatar'>Asia/Ulaanbaatar</option>
<option value='Asia/Ulan_Bator'>Asia/Ulan_Bator</option>
<option value='Asia/Urumqi'>Asia/Urumqi</option>
<option value='Asia/Vientiane'>Asia/Vientiane</option>
<option value='Asia/Vladivostok'>Asia/Vladivostok</option>
<option value='Asia/Yakutsk'>Asia/Yakutsk</option>
<option value='Asia/Yekaterinburg'>Asia/Yekaterinburg</option>
<option value='Asia/Yerevan'>Asia/Yerevan</option>
<option value='Arctic/Longyearbyen'>Arctic/Longyearbyen</option>
<option value='Antarctica/Casey'>Antarctica/Casey</option>
<option value='Antarctica/Davis'>Antarctica/Davis</option>
<option value='Antarctica/DumontDUrville'>Antarctica/DumontDUrville</option>
<option value='Antarctica/Mawson'>Antarctica/Mawson</option>
<option value='Antarctica/McMurdo'>Antarctica/McMurdo</option>
<option value='Antarctica/Palmer'>Antarctica/Palmer</option>
<option value='Antarctica/Rothera'>Antarctica/Rothera</option>
<option value='Antarctica/South_Pole'>Antarctica/South_Pole</option>
<option value='Antarctica/Syowa'>Antarctica/Syowa</option>
<option value='Antarctica/Vostok'>Antarctica/Vostok</option>
<option value='Africa/Abidjan'>Africa/Abidjan</option>
<option value='Africa/Accra'>Africa/Accra</option>
<option value='Africa/Addis_Ababa'>Africa/Addis_Ababa</option>
<option value='Africa/Algiers'>Africa/Algiers</option>
<option value='Africa/Asmara'>Africa/Asmara</option>
<option value='Africa/Asmera'>Africa/Asmera</option>
<option value='Africa/Bamako'>Africa/Bamako</option>
<option value='Africa/Bangui'>Africa/Bangui</option>
<option value='Africa/Banjul'>Africa/Banjul</option>
<option value='Africa/Bissau'>Africa/Bissau</option>
<option value='Africa/Blantyre'>Africa/Blantyre</option>
<option value='Africa/Brazzaville'>Africa/Brazzaville</option>
<option value='Africa/Bujumbura'>Africa/Bujumbura</option>
<option value='Africa/Cairo'>Africa/Cairo</option>
<option value='Africa/Casablanca'>Africa/Casablanca</option>
<option value='Africa/Ceuta'>Africa/Ceuta</option>
<option value='Africa/Conakry'>Africa/Conakry</option>
<option value='Africa/Dakar'>Africa/Dakar</option>
<option value='Africa/Dar_es_Salaam'>Africa/Dar_es_Salaam</option>
<option value='Africa/Djibouti'>Africa/Djibouti</option>
<option value='Africa/Douala'>Africa/Douala</option>
<option value='Africa/El_Aaiun'>Africa/El_Aaiun</option>
<option value='Africa/Freetown'>Africa/Freetown</option>
<option value='Africa/Gaborone'>Africa/Gaborone</option>
<option value='Africa/Harare'>Africa/Harare</option>
<option value='Africa/Johannesburg'>Africa/Johannesburg</option>
<option value='Africa/Kampala'>Africa/Kampala</option>
<option value='Africa/Khartoum'>Africa/Khartoum</option>
<option value='Africa/Kigali'>Africa/Kigali</option>
<option value='Africa/Kinshasa'>Africa/Kinshasa</option>
<option value='Africa/Lagos'>Africa/Lagos</option>
<option value='Africa/Libreville'>Africa/Libreville</option>
<option value='Africa/Lome'>Africa/Lome</option>
<option value='Africa/Luanda'>Africa/Luanda</option>
<option value='Africa/Lubumbashi'>Africa/Lubumbashi</option>
<option value='Africa/Lusaka'>Africa/Lusaka</option>
<option value='Africa/Malabo'>Africa/Malabo</option>
<option value='Africa/Maputo'>Africa/Maputo</option>
<option value='Africa/Maseru'>Africa/Maseru</option>
<option value='Africa/Mbabane'>Africa/Mbabane</option>
<option value='Africa/Mogadishu'>Africa/Mogadishu</option>
<option value='Africa/Monrovia'>Africa/Monrovia</option>
<option value='Africa/Nairobi'>Africa/Nairobi</option>
<option value='Africa/Ndjamena'>Africa/Ndjamena</option>
<option value='Africa/Niamey'>Africa/Niamey</option>
<option value='Africa/Nouakchott'>Africa/Nouakchott</option>
<option value='Africa/Ouagadougou'>Africa/Ouagadougou</option>
<option value='Africa/Porto-Novo'>Africa/Porto-Novo</option>
<option value='Africa/Sao_Tome'>Africa/Sao_Tome</option>
<option value='Africa/Timbuktu'>Africa/Timbuktu</option>
<option value='Africa/Tripoli'>Africa/Tripoli</option>
<option value='Africa/Tunis'>Africa/Tunis</option>
<option value='Africa/Windhoek'>Africa/Windhoek</option>
                                                               
                        		</select> 
                            </td>
                        </tr>                        
                    </table>
                	<div style="float:left;">
                    <table style="margin-left:4px;width:300px;"   >
                        <tr>
                            <td align="right" width="125"  >
                                How did you find out about us?                            
                            </td>
                            
                        
                            <td align="right">                            	
                            	<select id="find_out" name="find_out" style="margin-left:20px;width:150px;">
                                	<option value=''></option>
                                    <option value='Google'>Google</option>
                                    <option value='Radio'>Radio</option>
                                    <option value='News Letter'>News Letter</option>
                                    <option value='Newspaper'>Newspaper</option>
                                    <option value='Press Release'>Press Release</option>
                                    <option value='Television'>Television</option>
                                    <option value='Yahoo'>Yahoo</option>
                                    <option value='Microsoft Live'>Microsoft Live</option>
                                    <option value='Other Search Engine'>Other Search Engine</option>
                                    <option value='Word of Mouth'>Word of Mouth</option>
                                    <option value='VetFriends.com'>VetFriends.com</option>
                                    <option value='ESAC'>ESAC</option>
                                </select>
                            </td>
                          </tr>
                    </table>
                    </div>   
                    <div style="float:right;">
                    <table style="margin-left:4px;margin-top:20px;"   >
                        <tr>      
                            <td>
                            	<input type="image" style=""  src="images/continue_button.jpg" alt="contnue button" />
                            </td>
                            
                        </tr>
                    </table>
                     </div> 
                </div>  
        	</div></form>                                                  
                          
<?php include("footer_reg.php"); ?>