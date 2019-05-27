<div class="container-fluid">

                <!-- Page Heading -->
                
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card py-2">
                                <div class="container">
                                    <ul class="progressbar">
                                        <li id="adpref" class="active">Ads Preference</li>
                                        <li id="adcontent">Ads Content</li>
                                    </ul>
                                </div>
                        </div>
                        
                        <div class="card border-bottom-primary shadow h-100 py-2">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa fa-info-circle"></i> Failed to create the ads, please check your data then try again
                                <br> <small>If still failed to , so please call customer service</small>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?=base_url()?>ads/post" enctype="multipart/form-data">

                                <!-- form preference -->
                                    <div class="row" id="form-preference">
                                        
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="Languages"><h3>Ads Preference</h3></label>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="Languages">Languages</label>
                                            <input type="text" onInput="validationform1()"  class="form-control" name="languages" id="languages" value="<?=$formValue['languages']?>" required>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 mb-0">
                                            <label>Location Target</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" onInput="validationform1()" class="form-control" name="city" placeholder="City" value="<?=$formValue['city']?>" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" onInput="validationform1()" class="form-control" name="state" placeholder="State" value="<?=$formValue['state']?>" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select class="form-control" id="country" onInput="validationform1()" name="country" required>
                                                <?php
                                                $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                                                foreach ($countries as $ctr){
                                                    if($ctr == "Indonesia"){
                                                        echo '<option value="'.$ctr.'" selected>'.$ctr.'</option>';
                                                    }else{
                                                        echo '<option value="'.$ctr.'" >'.$ctr.'</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="budget">Budget</label>
                                            <select id="budget" class="form-control" onInput="validationform1()" name="budget" required>
                                                <option value="1">Daily Budget</option>
                                                <option value="2">Lifetime Budget</option>
                                            </select>
                                            <small class="form-text text-muted">define how much you'd like to spend</small>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="price">Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-primary text-white">IDR</div>
                                                </div>
                                                <input type="text" onInput="validationform1()" name="price" class="form-control" id="price" placeholder="0.00" value="<?=$formValue['price']?>" required>
                                            </div>
                                            <small class="text-muted text-form">price in indonesia rupiah (min. IDR 100K)</small>
                                        </div>
                                        <div class="col-md-6 col-sm-12 form-group">
                                            <label for="scheduling">Scheduling</label>
                                            <select id="scheduling" class="form-control" name="scheduling" onInput="validationform1()" required>
                                                <option value="1">Daily Repeated</option>
                                                <option value="2">Weekly Repeated</option>
                                                <option value="3">Monthly Repeated</option>
                                            </select>
                                            <small class="form-text text-muted">define when you'd like your ads to appear</small>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="platform">Platform</label>
                                            <select id="platform" class="form-control" name="platform" onInput="validationform1()" required>
                                                <option value="1">@wifi.id Landing Page</option>
                                                <option value="2">MyIndihome (soon)</option>
                                                <option value="3">Blanja.com (soon)</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 text-right">
                                            <button type="button" class="btn btn-primary" id="nextpageads" disabled> Next <i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </div>

                                    <!-- end form preference -->
                                    <!-- form content -->

                                    <div class="row" id="form-content">
                                    <div class="form-group col-md-12 col-sm-12">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" onInput="validationform2()" name="title" id="title" placeholder="Product XYZ" value="<?=$formValue['title']?>" required>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="photo">Photo</label>
                                            <input type="file" class="form-control" onInput="validationform2()" name="photo" id="photo" required>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="adsclick">Ads Click</label>
                                            <select id="adsclick" onInput="validationform2()" class="form-control" name="adsclick" required>
                                                <option value="1">Terms & Conditions</option>
                                                <option value="2">Infographic</option>
                                                <option value="3">Subscribe</option>
                                            </select>
                                            <small class="form-text text-muted">define when a user clicks on an ads </small>
                                        </div>

                                        <div id="formterms" class="col-md-12 col-sm-12">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="row" id="formtermscontainer">
                                                    <div id="formterms0" class="col-md-8 col-sm-8">
                                                        <div class="form-group col-md-12 col-sm-12">
                                                            <input type="text" class="form-control" onInput="validationform2()" name="terms[]" id="terms0" placeholder="Terms & Conditions 1" required>
                                                        </div>
                                                    </div>
                                                    <div id="addFormsBtn" class="form-group col-md-2 col-sm-2">
                                                        <button type="button" class="btn btn-primary col-md-12 col-sm-12" id="addnewterms"><i class="fa fa-plus-circle"></i></button>
                                                    </div>
                                                    <div id="minFormsBtn" class="form-group col-md-2 col-sm-2">
                                                        <button type="button" class="btn btn-default col-md-12 col-sm-12" id="minnewterms"><i class="fa fa-minus-circle"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="forminfo" class="form-group col-md-12 col-sm-12 hidden">
                                            <div class="col-md-12 col-sm-12">
                                                <input type="file" class="form-control" onInput="validationform2()" name="infographic" id="infographic" required>
                                                <small class="form-text text-muted">input file infographic</small>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="Verification">Verification</label>
                                            <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LcSH58UAAAAALpCs16fF8Cd-e209CGBJDXPULoQ"></div>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 text-left mt-3">
                                            <button class="btn btn-primary" type="button" id="prevpageads"><i class="fa fa-arrow-left"></i> Previous </button>
                                            <button class="btn btn-primary" name="finish" id="finish" style="float:right" disabled> Finish (Proceed Payment) <i class="fa fa-dollar-sign"></i></button>
                                        </div>
                                    </div>

                                    <!-- end form content -->

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>