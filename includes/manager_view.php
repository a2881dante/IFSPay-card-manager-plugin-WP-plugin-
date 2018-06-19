<?php

    function getLoginView(){

        //require_once "template_balance.php";

        /*return "           
                <div class='container'>
                    
                    <div class=\"tab-pane fade show active\" id=\"personal\" role=\"tabpanel\" 
                        aria-labelledby=\"home-tab\">
                        <br>
                        <div class='row justify-content-center'>
                            <div class='col-12 col-sm-8'>
                                <form id='convert-form' class='container' method='POST'>
            
                                    <div class='form-group row'>
                                        <label for='cardNumber' class='col-sm-4 col-form-label'>SAN/Card number</label>
                                        <div class='col-sm-8'>
                                            <input type='text' class='form-control' name='first_name' id='cardNumber' 
                                                placeholder='0000 0000 0000 0000'>
                                        </div>
                                    </div>
                
                                    <div class='form-group row'>
                                        <label for='amount' class='col-sm-4 col-form-label'>Password</label>
                                        <div class='col-sm-8 input-group'>
                                            <input type='password' class='col-7 form-control' name='last_name' id='amount' 
                                                placeholder='pass'>
                                        </div>
                                    </div>
                                
                                    <input type='submit' class='col-sm-12' name='submit_person_register' value='Login'>

                                    <a href='".$_SERVER['REQUEST_URI']."?page=register'>I still do not have a card. register a new card</a>
                                    
                                </form>
                            </div>
                        </div>
                        
                    </div>
                        
                </div>
            ";*/
    }

    function getRegisterView(){

        return "           
                
                <div class='container'>
                
                    <style>
                        a:visited { color: #777777; }
                        a { color: #777777; }
                    </style>
                
                    <ul class=\"nav nav-tabs\" id=\"myTab\" role=\"tablist\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link active\" id=\"personal-tab\" data-toggle=\"tab\" href=\"#personal\" role=\"tab\" 
                                aria-controls=\"personal\" aria-selected=\"true\">Personal Account (for individuals)</a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" id=\"corporate-tab\" data-toggle=\"tab\" href=\"#corporate\" role=\"tab\" 
                                aria-controls=\"corpotate\" aria-selected=\"false\">Corporate Account (for legal entities, sole traders)</a>
                        </li>
                    </ul>"."
                    
                    <div class=\"tab-content\" id=\"myTabContent\">
                        <div class=\"tab-pane fade show active\" id=\"personal\" role=\"tabpanel\" 
                            aria-labelledby=\"home-tab\">
                            <br>
                            <div class='row justify-content-center'>
                                <div class='col-12 col-sm-8'>
                                    <form id='convert-form' class='container' method='POST' enctype='multipart/form-data' action>
                
                                        <div class='form-group row'>
                                            <label for='cardNumber' class='col-sm-4 col-form-label'>First Name*</label>
                                            <div class='col-sm-8'>
                                                <input type='text' class='form-control' name='pFirstName' id='FirstNamePersonal' required=''
                                                    placeholder='John'>
                                            </div>
                                        </div>
                    
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Last Name*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='pLastName' id='LastNamePersonal' required=''
                                                    placeholder='Dou'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Address Line*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='pAddressLine' id='AddressPersonal' required='' 
                                                    placeholder='st. Value, 111'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Region*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='pRegion' id='RegionPersonal' required=''
                                                    placeholder='Europe'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Country*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='pCountry' id='CountryPersonal' required=''
                                                    placeholder='England'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>City*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='pCity' id='CityPersonal' required=''
                                                    placeholder='Liverpool'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Postal code*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='pPostalCode' id='PostalCodePersonal' required=''
                                                    placeholder='00000'>
                                            </div>
                                        </div>
                                        
                                        <p><b>For concluding local and international transactions resident persons are obliged to upload 
                                            all the required documents for identification established by legislation</b></p>
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Identification card or passport*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='file' accept='.pdf, .jpg, .jpeg' class='col-12 form-control' name='pImage1' required='' class='form-control-file' id='image1Personal'>
                                            </div>
                                        </div>
                                        
                                        <p><b>If the person is registered as an individual entrepreneur - extract from the National Agency 
                                            of Public Registry, taxpayer identification number</b></p>
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'></label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='file' accept='.pdf, .jpg, .jpeg' class='col-12 form-control' name='url' class='form-control-file' id='image2Personal'>
                                            </div>
                                        </div>
                                        
                                        <p><b>In case of non-resident persons, according to legislation, submitted documents should 
                                            be translated into English language, notarized and apostilled. In order to review application 
                                            submitted by non-resident companies the companies are obliged to pay non-refundable fee. 
                                            Relations with the agents is regulated under “the contract of identification/verification”. If 
                                            identification/verification procedures of a client is done by an agent, additional commissions 
                                            might be paid by the client.</b></p>
                                            
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Email address*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='email' class='col-7 form-control' name='pEmail'
                                                    placeholder='email@email.com' id='EmailPersonal'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Phone number*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='pPhoneNumber' id='PhoneNumberPersonal' 
                                                    placeholder='+00000000000000'>
                                            </div>
                                        </div>
                                        
                                        <input type='checkbox' required=''>
                                        <a  data-toggle=\"collapse\" href=\"#collapseRules\" style=\"color: #777777; text-decoration: underline;\" aria-expanded=\"false\" aria-controls=\"collapseRules\">
                                            Please read the following terms and conditions and accept it.
                                        </a>
                                        <br>
                                        <div class=\"collapse\" id=\"collapseRules\">
                                            <div class=\"card card-body\">
                                                ".get_terms_politics()."
                                            </div>
                                        </div>
                                        
                                        <div class=\"form-group d-flex justify-content-center\">
                                             <input type='button' id='registerPersonal' 
                                                onclick=\"handleFileSelectPersonal('image1Personal','image2Personal');\" 
                                                class='btn btn-primary' value='Register'>
                                        </div>
                                    
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        <div class=\"tab-pane fade\" id=\"corporate\" role=\"tabpanel\" aria-labelledby=\"profile-tab\">
                            <br><div class='row justify-content-center'>
                                <div class='col-12 col-sm-8'>
                                    <form id='convert-form' class='container' method='POST' enctype='multipart/form-data'>
                
                                        <div class='form-group row'>
                                            <label for='cardNumber' class='col-sm-4 col-form-label'>First Name*</label>
                                            <div class='col-sm-8'>
                                                <input type='text' class='form-control' name='oFirstName' id='LastNameCorporate' required='' 
                                                    placeholder='John'>
                                            </div>
                                        </div>
                    
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Last Name*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='oLastName' id='LastNameCorporate' required='' 
                                                    placeholder='Dou'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Address Line*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='oAddressLine' id='AddressCorporate' required='' 
                                                    placeholder='st. Value, 111'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Region*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='oRegion' id='RegionCorporate' required='' 
                                                    placeholder='Europe'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Country*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='oCountry' id='CountryCorporate' required='' 
                                                    placeholder='England'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>City*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='oCity' id='CityCorporate' required='' 
                                                    placeholder='Liverpool'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Postal code*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='oPostalCode' id='PostalCodeCorporate' required='' 
                                                    placeholder='00000'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Organization*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='oOrganization' id='OrganizationCorporate' required='' 
                                                    placeholder='Europe Smart Solution LTD.'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Position*</label>
                                            <div class='col-sm-8 input-group'>
                                                <select name='oPosition' class='col-sm-12' id='PositionCorporate' required=''>
                                                    <option value='director'>Director</option>
                                                    <option value='director and owner'>Director and Owner</option>
                                                    <option value='owner'>Owner</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <p><b>For concluding local and international transactions resident persons are 
                                            obliged to upload all the required documents for identification established by legislation</b></p>
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-7 col-form-label'>Extract from the National Agency of Public Registry, taxpayer identification number*</label>
                                            <div class='col-sm-5 input-group'>
                                                <input type='file' accept='.pdf, .jpg, .jpeg' class='col-12 form-control' name='image1' required='' class='form-control-file' id='image1Corporate'>
                                            </div>
                                        </div>
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-7 col-form-label'>Taxpayer identification number*</label>
                                            <div class='col-sm-5 input-group'>
                                                <input type='file' accept='.pdf, .jpg, .jpeg' class='col-12 form-control' name='image2' required='' class='form-control-file' id='image2Corporate'>
                                            </div>
                                        </div>
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-7 col-form-label'>Identification data of the supervisor or authorized person*</label>
                                            <div class='col-sm-5 input-group'>
                                                <input type='file' accept='.pdf, .jpg, .jpeg' class='col-12 form-control' name='image3' required='' class='form-control-file' id='image3Corporate'>
                                            </div>
                                        </div>
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-7 col-form-label'>Identification data on the person representing the legal person in specific payment operation (agreement)*</label>
                                            <div class='col-sm-5 input-group'>
                                                <input type='file' accept='.pdf, .jpg, .jpeg' class='col-12 form-control' name='image4' required='' class='form-control-file' id='image4Corporate'>
                                            </div>
                                        </div>
                                        
                                        <p><b>In case of non-resident persons, according to legislation, submitted documents should 
                                            be translated into English language, notarized and apostilled. In order to review application 
                                            submitted by non-resident companies the companies are obliged to pay non-refundable fee. 
                                            Relations with the agents is regulated under “the contract of identification/verification”. If 
                                            identification/verification procedures of a client is done by an agent, additional commissions 
                                            might be paid by the client.</b></p>
                                            
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Email address*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='email' id='EmailCorporate' required='' 
                                                    placeholder='email@email.com'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Phone number*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='phoneNumber' id='PhoneNumberCorporate' required='' 
                                                    placeholder='+00000000000000'>
                                            </div>
                                        </div>
                                        
                                        <input type='checkbox' required=''>
                                        <a  data-toggle=\"collapse\"  style=\"color: #777777; text-decoration: underline;\" href=\"#collapseRules1\"  aria-expanded=\"false\" aria-controls=\"collapseRules\">
                                            Please read the following terms and conditions and accept it.
                                        </a>
                                        <br>
                                        <div class=\"collapse\" id=\"collapseRules1\">
                                            <div class=\"card card-body\">
                                                ".get_terms_politics()."
                                            </div>
                                        </div>
                                        
                                        <div class=\"form-group d-flex justify-content-center\">
                                             <input type='button' id='registerCorporate' 
                                                onclick=\"handleFileSelectCorporate('image1Corporate','image2Corporate','image3Corporate','image4Corporate');\" 
                                                class='btn btn-primary' value='Register'>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
    }

    function getManagerView(){

        return "";

    }

    function get_terms_politics(){

        return "
                <h3>TERMS AND CONDITIONS</h3>
                
                <br>By using our site, you accept these terms of use www.ifspay.ge
                
                <br>We strongly advise you to read these terms and conditions, in order to be sure that you understand aforementioned terms, in prior of using our services.
                
                
                <br>1. General Information
                
                <br>The website is operated by International Financial Services LLC,(hereinafter referred to as \"the company\", Registered in Georgia licensed and regulated by the National Bank of Georgia (License number 0057-2904).
                
                
                <br>2. Access to the website
                
                <br>2.1 Access to our site is not intended for those under the age of 18.
                <br>2.2 Use of any method that may hinder access to the website or attempt to have an access to any private information is prohibited.
                
                <br>3. Opening an account
                
                <br>3.1 In case you open an account, you confirm the acceptance of these terms and conditions and any other rules established by the company published on the website related to any service provided by the company.
                <br>3.2 In case you open an account, you will be given a user name and password in order to follow established security procedures. You must take such information as a confidential and that must not be disclosed to third party. In case anyone other than you knows your user name or password, you must immediately notify us about it via e-mail.
                <br>3.3 According to the Order N12 of the Head of the Financial Monitoring Service of Georgia on the rule of receiving, systematizing, digesting and providing information to the Monitoring Service of Georgia by Payment Service Providers, The provider company is obliged to identify the client, and take reasonable measures for verification of his/her identity from the basis of information (documents) that are obtained from trustworthy and independent sources, in case when:
                <br>a)The amount of Local or/and international monetary transaction is more than 1 500 GEL (or equal in another currency)
                
                <br>b) The amount of transaction is more than 3 000 GEL (or equal in another currency)
                
                <br>c)The provider considers that the transaction is suspicious
                
                <br>4. Intellectual property
                
                <br>In this paragraph, \"Intellectual Property\" means all copyright, trademarks, design rights, patents and other intellectual property rights (registered and unregistered) in and Online Services and website Content belong to the company and/or third parties (which may include you or other users). Nothing in the Terms grants you a right or license to use any trade mark, design right or copyright owned or controlled by the company.
                
                <br>4.1 Translation or modification of any material from the website is prohibited.
                <br>4.2 Modification of the documents or digital versions of the documents or other materials you have printed off or downloaded is prohibited.
                <br>4.3 Use of any part of the materials published on the website for commercial matters without permission is prohibited.
                
                <br>5. Liability of the company
                
                <br>5.1 Nothing in these terms of use excludes or limits our liability for which cannot be excluded or limited by the law of Georgia.
                <br>5.2 Including the liability for any direct, indirect loss arising from the inability to use our website by reliance on any content published on the website.
                <br>5.3 The company shall not be liable for any errors, or losses, including the loss of data or as a result of interruptions to the service.
                <br>5.4 Although we make reasonable efforts to ensure that material available for download from our site is free from viruses, worms or other malicious or disruptive codes or devices, we cannot guarantee that such is the case. We will not be liable for any loss or damage caused by a virus, distributed denial-of-service attack, or other technologically harmful material that may infect your computer equipment, computer programs, data or other proprietary material due to your use of our site or to your downloading of any content on it, or on any website linked to it. You are responsible for configuring your information technology, computer programs and platform in order to have an access to the site.
                
                <br>6. Information about user and visits of a user on the website
                
                <br>Information about the user is processed in accordance with the law of Law of Georgia on personal data protection. By using the website, user consents to such processing and thereby agrees to ensure that any provided data is true.
                
                
                <br>7. Linking to the website
                
                <br>7.1 Address of the home page can be linked only as it is established by the law in order not to damage reputation of the company.
                <br>7.2 The website must not be framed on any other site, nor a link to any part of the site other than the home page can be used. The right to withdraw linking permission without notice is reserved. The website used as a link comprehensively must be in compliance with all applicable laws and regulations.
                <br>7.3 If you wish to make any use of material on our site other than that set out above, please address your request to email.
                
                <br>8. General
                
                <br>8.1 Subject to any rights that a user may have as a consumer to choose jurisdiction, Georgian courts will have an exclusive jurisdiction over any claim arising from, or related to, a visit to the website although the right to bring proceedings against a user for breach of these conditions in user’s country of residence or any other relevant country is retained.
                <br>8.2 The terms of use and any dispute or claim arising out of connection with them or their subject matter or formation (including non-contractual disputes or claims) shall be governed by and construed in accordance with the law of Georgia.
                <br>8.3 The terms of use may be revised at any time by amending this page. User is expected to check this page from time to time to take notice of any made changes, as they are binding to the user. Some of the provisions included in these terms of use may also be superseded by provisions or notices published elsewhere on the website.
                <br>8.4 In the event that any provision in these terms of use is determined to be unenforceable or invalid, such provision shall be severed and the remaining provisions which shall be enforceable to the fullest extent are permitted by law.
                <br>8.5 The provisions of these terms of use on intellectual property, liability and jurisdiction shall remain in force if these terms of use expire or are terminated.
                <br>8.6 No third party shall have the right to enforce any provision of these terms of use under the Contracts.
                        
            ";

    }

    function getAltRegisterView(){
        return "           
                <div class='container'>
                    
                    <style>
                        a:visited { color: #777777; }
                        a { color: #777777; }
                    </style>
                    
                    <ul class=\"nav nav-tabs\" id=\"myTab\" role=\"tablist\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link active\" id=\"personal-tab\" data-toggle=\"tab\" href=\"#personal\" role=\"tab\" 
                                aria-controls=\"personal\" aria-selected=\"true\">Personal Account (for individuals)</a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" id=\"corporate-tab\" data-toggle=\"tab\" href=\"#corporate\" role=\"tab\" 
                                aria-controls=\"corpotate\" aria-selected=\"false\">Corporate Account (for legal entities, sole traders)</a>
                        </li>
                    </ul>"."
                    
                    <div class=\"tab-content\" id=\"myTabContent\">
                        <div class=\"tab-pane fade show active\" id=\"personal\" role=\"tabpanel\" 
                            aria-labelledby=\"home-tab\">
                            <br>
                            <div class='row justify-content-center'>
                                <div class='col-12 col-sm-8'>
                                    <form id='convert-form' class='container' method='POST' enctype='multipart/form-data' action>
                
                                        <div class='form-group row'>
                                            <label for='cardNumber' class='col-sm-4 col-form-label'>First Name*</label>
                                            <div class='col-sm-8'>
                                                <input type='text' class='form-control' name='pFirstName' id='FirstNamePersonal' required=''>
                                            </div>
                                        </div>
                    
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Last Name*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='pLastName' id='LastNamePersonal' required=''>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Address Line*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='pAddressLine' id='AddressPersonal' required='' >
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Region*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='pRegion' id='RegionPersonal' required=''>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Country*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='pCountry' id='CountryPersonal' required=''>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>City*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='pCity' id='CityPersonal' required=''>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Postal code*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='pPostalCode' id='PostalCodePersonal' required=''>
                                            </div>
                                        </div>
                                        
                                        <p><b>For concluding local and international transactions resident persons are obliged to upload 
                                            all the required documents for identification established by legislation</b></p>
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Identification card or passport*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='file' accept='.pdf, .jpg, .jpeg' class='col-12 form-control' name='pImage1' required='' class='form-control-file' id='image1Personal'>
                                            </div>
                                        </div>
                                        
                                        <p><b>If the person is registered as an individual entrepreneur - extract from the National Agency 
                                            of Public Registry, taxpayer identification number</b></p>
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'></label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='file' accept='.pdf, .jpg, .jpeg' class='col-12 form-control' name='url' class='form-control-file' id='image2Personal'>
                                            </div>
                                        </div>
                                        
                                        <p><b>In case of non-resident persons, according to legislation, submitted documents should 
                                            be translated into English language, notarized and apostilled. In order to review application 
                                            submitted by non-resident companies the companies are obliged to pay non-refundable fee. 
                                            Relations with the agents is regulated under “the contract of identification/verification”. If 
                                            identification/verification procedures of a client is done by an agent, additional commissions 
                                            might be paid by the client.</b></p>
                                            
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Email address*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='email' class='col-7 form-control' name='pEmail' id='EmailPersonal'>
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Phone number*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='pPhoneNumber' id='PhoneNumberPersonal' >
                                            </div>
                                        </div>
                                        
                                        <input type='checkbox' required=''>
                                        <a  data-toggle=\"collapse\" href=\"#collapseRules\" style=\"color: #777777; text-decoration: underline;\" aria-expanded=\"false\" aria-controls=\"collapseRules\">
                                            Please read the following terms and conditions and accept it.
                                        </a>
                                        <br>
                                        <div class=\"collapse\" id=\"collapseRules\">
                                            <div class=\"card card-body\">
                                                ".get_terms_politics()."
                                            </div>
                                        </div>
                                        <br>
                                    
                                        <div class=\"form-group d-flex justify-content-center\">
                                             <input type='button' id='registerPersonal' 
                                                onclick=\"handleFileSelectPersonal('image1Personal','image2Personal');\" 
                                                class='btn btn-primary col-4' value='Register'>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        <div class=\"tab-pane fade\" id=\"corporate\" role=\"tabpanel\" aria-labelledby=\"profile-tab\">
                            <br><div class='row justify-content-center'>
                                <div class='col-12 col-sm-8'>
                                    <form id='convert-form' class='container' method='POST' enctype='multipart/form-data'>
                
                                        <div class='form-group row'>
                                            <label for='cardNumber' class='col-sm-4 col-form-label'>First Name*</label>
                                            <div class='col-sm-8'>
                                                <input type='text' class='form-control' name='oFirstName' id='LastNameCorporate' required='' >
                                            </div>
                                        </div>
                    
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Last Name*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='oLastName' id='LastNameCorporate' required='' >
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Address Line*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='oAddressLine' id='AddressCorporate' required='' >
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Region*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='oRegion' id='RegionCorporate' required='' >
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Country*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='oCountry' id='CountryCorporate' required='' >
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>City*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='oCity' id='CityCorporate' required='' >
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Postal code*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='oPostalCode' id='PostalCodeCorporate' required='' >
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Organization*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='oOrganization' id='OrganizationCorporate' required='' >
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Position*</label>
                                            <div class='col-sm-8 input-group'>
                                                <select name='oPosition' class='col-sm-12' id='PositionCorporate' required=''>
                                                    <option value='director'>Director</option>
                                                    <option value='director and owner'>Director and Owner</option>
                                                    <option value='owner'>Owner</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <p><b>For concluding local and international transactions resident persons are 
                                            obliged to upload all the required documents for identification established by legislation</b></p>
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-7 col-form-label'>Extract from the National Agency of Public Registry, taxpayer identification number*</label>
                                            <div class='col-sm-5 input-group'>
                                                <input type='file' accept='.pdf, .jpg, .jpeg' class='col-12 form-control' name='image1' required='' class='form-control-file' id='image1Corporate'>
                                            </div>
                                        </div>
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-7 col-form-label'>Taxpayer identification number*</label>
                                            <div class='col-sm-5 input-group'>
                                                <input type='file' accept='.pdf, .jpg, .jpeg' class='col-12 form-control' name='image2' required='' class='form-control-file' id='image2Corporate'>
                                            </div>
                                        </div>
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-7 col-form-label'>Identification data of the supervisor or authorized person*</label>
                                            <div class='col-sm-5 input-group'>
                                                <input type='file' accept='.pdf, .jpg, .jpeg' class='col-12 form-control' name='image3' required='' class='form-control-file' id='image3Corporate'>
                                            </div>
                                        </div>
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-7 col-form-label'>Identification data on the person representing the legal person in specific payment operation (agreement)*</label>
                                            <div class='col-sm-5 input-group'>
                                                <input type='file' accept='.pdf, .jpg, .jpeg' class='col-12 form-control' name='image4' required='' class='form-control-file' id='image4Corporate'>
                                            </div>
                                        </div>
                                        
                                        <p><b>In case of non-resident persons, according to legislation, submitted documents should 
                                            be translated into English language, notarized and apostilled. In order to review application 
                                            submitted by non-resident companies the companies are obliged to pay non-refundable fee. 
                                            Relations with the agents is regulated under “the contract of identification/verification”. If 
                                            identification/verification procedures of a client is done by an agent, additional commissions 
                                            might be paid by the client.</b></p>
                                            
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Email address*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='email' id='EmailCorporate' required='' >
                                            </div>
                                        </div>
                                        
                                        <div class='form-group row'>
                                            <label for='amount' class='col-sm-4 col-form-label'>Phone number*</label>
                                            <div class='col-sm-8 input-group'>
                                                <input type='text' class='col-7 form-control' name='phoneNumber' id='PhoneNumberCorporate' required='' >
                                            </div>
                                        </div>
                                        
                                        <input type='checkbox' required=''>
                                        <a  data-toggle=\"collapse\" href=\"#collapseRules1\" style=\"color: #777777; text-decoration: underline;\" aria-expanded=\"false\" aria-controls=\"collapseRules\">
                                            Please read the following terms and conditions and accept it.
                                        </a>
                                        <br>
                                        <div class=\"collapse\" id=\"collapseRules1\">
                                            <div class=\"card card-body\">
                                                ".get_terms_politics()."
                                            </div>
                                        </div>
                                        <br>
                                        
                                        <div class=\"form-group d-flex justify-content-center\">
                                             <input type='button' id='registerCorporate' 
                                                onclick=\"handleFileSelectCorporate('image1Corporate','image2Corporate','image3Corporate','image4Corporate');\" 
                                                class='btn btn-primary col-4' value='Register'>
                                        
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
    }