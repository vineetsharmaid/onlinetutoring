<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Rostrum" />
    <meta name="keywords" content="academy, course, education, education html theme, elearning, learning," />
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <!-- Page Title -->
    <title>Rostrum | Home page</title>
    <!-- Favicon and Touch Icons -->
    <link href="<?=base_url()?>assets/img/favicon.png" rel="shortcut icon" type="image/png">
    <link href="<?=base_url()?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="<?=base_url()?>assets/img/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="<?=base_url()?>assets/img/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="<?=base_url()?>assets/img/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
    <!-- Stylesheet -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/css/animate.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/css/css-plugin-collections.css" rel="stylesheet"/>
    <!-- CSS | Main style file -->
    <link href="<?=base_url()?>assets/css/style-main.css" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="<?=base_url()?>assets/css/preloader.css" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="<?=base_url()?>assets/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="<?=base_url()?>assets/css/responsive.css" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css"> -->
    <!-- Revolution Slider 5.x CSS settings -->
    <link  href="<?=base_url()?>assets/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
    <link  href="<?=base_url()?>assets/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
    <link  href="<?=base_url()?>assets/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>
    <!-- CSS | Theme Color -->
    <link href="<?=base_url()?>assets/css/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">
    <!-- external javascripts -->
    <link class="main-stylesheet" href="<?=base_url()?>assets/css/alertify.min.css" rel="stylesheet" type="text/css" />
    <script src="<?=base_url()?>assets/js/jquery-2.2.4.min.js"></script>
    <script src="<?=base_url()?>assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="<?=base_url()?>assets/js/jquery-plugin-collection.js"></script>
    <!-- Revolution Slider 5.x SCRIPTS -->
    <script src="<?=base_url()?>assets/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?=base_url()?>assets/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
  </head>
  <body class="">
    <div id="wrapper" class="clearfix">
      <!-- preloader -->
      <div id="preloader">
        <div id="spinner">
          <div class="preloader-bubblingG">
            <span id="bubblingG_1"></span>
            <span id="bubblingG_2"></span>
            <span id="bubblingG_3"></span>
          </div>
        </div>
        <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
      </div>
      <!-- Header -->
      <header id="header" class="header">
        <!--   <div class="header-top  navbar-fixed-top">
          <div class="container">
            <div class="left_header col-lg-3 col-sm-4 col-xs-3">
              <a href="tel:#"><i class="fa fa-phone font-16"></i></a>
              <a href="mailto:#"><i class="fa fa-envelope font-16"></i></a>
              
            </div>
            <div class="middle_header col-lg-6  col-sm-4 col-xs-6">
              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalConsult">Free Consultation</button>
            </div>
            <div class="right_header col-lg-3 col-sm-4 col-xs-3">
              <a href="#"><i class="fa fa-facebook font-16"></i></a>
              <a href="#"><i class="fa fa-twitter font-16"></i></a>
              
            </div>
          </div>
        </div> -->
        <div class="header-nav navbar-fixed-top header-dark navbar-white navbar-transparent navbar-sticky-animated animated-active">
          <div class="header-nav-wrapper">
            <div class="container">
              <nav id="menuzord-right" class="menuzord orange">
                <a class="menuzord-brand pull-left flip mt-10" href="http://www.rostrumib.com/">
                <img src="<?=base_url()?>assets/img/logo-home.png" alt=""></a>
                <div class="info">
                  <a href="<?=base_url()?>login">Login</a>
                  <a href="<?=base_url()?>register">Register</a>
                  <ul class="styled-icons icon-dark mt-20 right mobile">
                    <li><a href="tel:#"><i class="fa fa-phone"></i></a></li>
                    <li><a href="mailto:contact@rostrumib.co"><i class="fa fa-envelope"></i></a></li>
                  </ul>
                </div>
                <ul class="menuzord-menu dark">
                  <li><a href="#">Find a Tutor</a>
                  <ul class="dropdown" style="display: none;">
                    <li><a href="<?=base_url()?>search-tutor">Select A Tutor</a></li>
                    <li><a href="<?=base_url()?>search-tutor#/request">Request Tuition</a></li>
                  </ul>
                </li>
                <li><a href="#">IB Courses </a>
                <ul class="dropdown" style="display: none;">
                  <li><a href="#">Pre IB Courses</a></li>
                  <li><a href="#">Mid IB Courses</a></li>
                  <li><a href="#">Revision Courses</a></li>
                  <li><a href="#">Personal Tutoring</a></li>
                </ul>
              </li>
              
              <li><a href="#">Consulting</a>
              <ul class="dropdown" style="display: none;">
                <li><a href="#">US/CND Universities</a></li>
                <li><a href="#">UK Universities</a></li>
                <li><a href="#">Oxbridge</a></li>
                
              </ul>
            </li>
            <li><a href="#">Resources</a>
            <ul class="dropdown" style="display: none;">
              <li><a href="#">Learning Resources</a></li>
              <li><a href="#">Q&amp;A Portal </a></li>
              <li><a href="#">About The IB </a></li>
            </ul>
          </li>
          <!--   <li><a href="#">How it works</a>
          <ul class="dropdown" style="display: none;">
            <li><a href="#">In person</a></li>
            <li><a href="#">Online</a></li>
          </ul>
        </li>    -->
        
        <li><a href="#">Why Rostrum</a>
        <ul class="dropdown" style="display: none;">
          <li><a href="<?=base_url()?>/about-us">About Us</a></li>
          <li><a href="<?=base_url()?>/our-team">Our Team</a></li>
          <li><a href="#">Testimonials</a></li>
          <li><a href="#">Our Approach</a></li>
        </ul>
      </li>
      <li><a href="#">More</a>
      <ul class="dropdown" style="display: none;">
        <li><a href="#">Free Brochure</a></li>
        <li><a href="#">For Schools</a></li>
        <li><a href="#">Work With Us</a></li>
        
      </ul>
    </li>
    
    <!-- <li><a href="result.html">Tutors</a></li> -->
    <!-- <li><a href="pricing.html">Pricing</a></li> -->
  </ul>
</div>
</nav>

</div>
</div>
</header>
<div class="modal fade" id="myModalConsult" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h5 class="text-left p-b-5"><span class="semi-bold"> FREE CONSULTATION </span></h5>
</div>
<button type="button" data-dismiss="modal" class="consultation_close">X</button>
<div class="modal-body">
<div class="row">
  <div class="col-sm-12">
    <!-- START PANEL -->
    <div class="panel panel-transparent">
      <div class="panel-body">
        <form id="form-project-consult" method="POST" name="addPostForm" >
          
          <div class="form-group-attached">
            <!-- <div class="row clearfix"> -->
            <div class="col-sm-6 no-padding">
              <div class="form-group form-group-default required">
                <label>First Name</label>
                <input class="form-control" name="name" type="text" required>
              </div>
            </div>
            <div class="col-sm-6 no-padding">
              <div class="form-group form-group-default required">
                <label>Last Name</label>
                <input class="form-control" name="surname" type="text" required>
              </div>
            </div>
            <div class="col-sm-6 no-padding">
              <div class="form-group form-group-default required">
                <label>Contact No.</label>
                <div class="col-sm-6 no-padding">
                  <?php $country_code = array("+93" => "Afghanistan","+355" => "Albania","+213" => "Algeria","+1" => "American Samoa","+376" => "Andorra","+244" => "Angola","+1" => "Anguilla","+1" => "Antigua and Barbuda","+54" => "Argentina","+374" => "Armenia","+297" => "Aruba","+247" => "Ascension","+61" => "Australia","+43" => "Austria","+994" => "Azerbaijan","+1" => "Bahamas","+973" => "Bahrain","+880" => "Bangladesh","+1" => "Barbados","+375" => "Belarus","+32" => "Belgium","+501" => "Belize","+229" => "Benin","+1" => "Bermuda","+975" => "Bhutan","+591" => "Bolivia","+387" => "Bosnia and Herzegovina","+267" => "Botswana","+55" => "Brazil","+1" => "British Virgin Islands","+673" => "Brunei","+359" => "Bulgaria","+226" => "Burkina Faso","+257" => "Burundi","+855" => "Cambodia","+237" => "Cameroon","+1" => "Canada","+238" => "Cape Verde","+1" => "Cayman Islands","+236" => "Central African Republic","+235" => "Chad","+56" => "Chile","+86" => "China","+57" => "Colombia","+269" => "Comoros","+242" => "Congo","+682" => "Cook Islands","+506" => "Costa Rica","+385" => "Croatia","+53" => "Cuba","+357" => "Cyprus","+420" => "Czech Republic","+243" => "Democratic Republic of Congo","+45" => "Denmark","+246" => "Diego Garcia","+253" => "Djibouti","+1" => "Dominica","+1" => "Dominican Republic","+670" => "East Timor","+593" => "Ecuador","+20" => "Egypt","+503" => "El Salvador","+240" => "Equatorial Guinea","+291" => "Eritrea","+372" => "Estonia","+251" => "Ethiopia","+500" => "Falkland (Malvinas) Islands","+298" => "Faroe Islands","+679" => "Fiji","+358" => "Finland","+33" => "France","+594" => "French Guiana","+689" => "French Polynesia","+241" => "Gabon","+220" => "Gambia","+995" => "Georgia","+49" => "Germany","+233" => "Ghana","+350" => "Gibraltar","+30" => "Greece","+299" => "Greenland","+1" => "Grenada","+590" => "Guadeloupe","+1" => "Guam","+502" => "Guatemala","+224" => "Guinea","+245" => "Guinea-Bissau","+592" => "Guyana","+509" => "Haiti","+504" => "Honduras","+852" => "Hong Kong","+36" => "Hungary","+354" => "Iceland", "+91" => "India","+62" => "Indonesia","8+70 " => "Inmarsat Satellite","+98" => "Iran","+964" => "Iraq","+353" => "Ireland","+972" => "Israel","+39" => "Italy","+225" => "Ivory Coast","+1" => "Jamaica","+81" => "Japan","+962" => "Jordan","+7" => "Kazakhstan","+254" => "Kenya","+686" => "Kiribati","+965" => "Kuwait","+996" => "Kyrgyzstan","+856" => "Laos","+371" => "Latvia","+961" => "Lebanon","+266" => "Lesotho","+231" => "Liberia","+218" => "Libya","+423" => "Liechtenstein","+370" => "Lithuania","+352" => "Luxembourg","+853" => "Macau","+389" => "Macedonia","+261" => "Madagascar","+265" => "Malawi","+60" => "Malaysia","+960" => "Maldives","+223" => "Mali","+356" => "Malta","+692" => "Marshall Islands","+596" => "Martinique","+222" => "Mauritania","+230" => "Mauritius","+262" => "Mayotte","+52" => "Mexico","+691" => "Micronesia","+373" => "Moldova","+377" => "Monaco","+976" => "Mongolia","+382" => "Montenegro","+1" => "Montserrat","+212" => "Morocco","+258" => "Mozambique","+95" => "Myanmar","+264" => "Namibia","+674" => "Nauru","+977" => "Nepal","+31" => "Netherlands","+599" => "Netherlands Antilles","+687" => "New Caledonia","+64" => "New Zealand","+505" => "Nicaragua","+227" => "Niger","+234" => "Nigeria","+683" => "Niue Island","+850" => "North Korea","+1" => "Northern Marianas","+47" => "Norway","+968" => "Oman","+92" => "Pakistan","+680" => "Palau","+507" => "Panama","+675" => "Papua New Guinea","+595" => "Paraguay","+51" => "Peru","+63" => "Philippines","+48" => "Poland","+351" => "Portugal","+1" => "Puerto Rico","+974" => "Qatar","+262" => "Reunion","+40" => "Romania","+7" => "Russian Federation","+250" => "Rwanda","+290" => "Saint Helena","+1" => "Saint Kitts and Nevis","+1" => "Saint Lucia","+508" => "Saint Pierre and Miquelon","+1" => "Saint Vincent and the Grenadines","+685" => "Samoa","+378" => "San Marino","+239" => "Sao Tome and Principe","+966" => "Saudi Arabia","+221" => "Senegal","+381" => "Serbia","+248" => "Seychelles","+232" => "Sierra Leone","+65" => "Singapore","+421" => "Slovakia","+386" => "Slovenia","+677" => "Solomon Islands","+252" => "Somalia","+27" => "South Africa","+82" => "South Korea","+34" => "Spain","+94" => "Sri Lanka","+249" => "Sudan","+597" => "Suriname","+268" => "Swaziland","+46" => "Sweden","+41" => "Switzerland","+963" => "Syria","+886" => "Taiwan","+992" => "Tajikistan","+255" => "Tanzania","+66" => "Thailand","+228" => "Togo","+690" => "Tokelau","+1" => "Trinidad and Tobago","+216" => "Tunisia","+90" => "Turkey","+993" => "Turkmenistan","+1" => "Turks and Caicos Islands","+688" => "Tuvalu","+256" => "Uganda","+380" => "Ukraine","+971" => "United Arab Emirates","+44" => "United Kingdom","+1" => "United States of America","+1" => "U.S. Virgin Islands","+598" => "Uruguay","+998" => "Uzbekistan","+678" => "Vanuatu","+379" => "Vatican City","+58" => "Venezuela","+84" => "Vietnam","+681" => "Wallis and Futuna","+967" => "Yemen","+260" => "Zambia","+263" => "Zimbabwe");
                  ?>
                  <select name="country_code" class="form-control"  required>
                    <option value="+44" title="United Kingdom">+44( United Kingdom )</option>
                    <?php
                    foreach($country_code as $key => $value) {
                    ?>
                    <option value="<?= $key ?>" title="<?= $value ?>"><?= $key. "( ".$value." )" ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="col-sm-6 no-padding">
                  <input class="form-control" name="phone" type="number" required>
                </div>
              </div>
            </div>
            <!-- </div> -->
            <div class="col-sm-6 form-group form-group-default required">
              <label>Email</label>
              <input class="form-control" name="Email"  type="email" required>
            </div>
            <!--  <label>Address</label>
            <textarea class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="Enter your address" ng-model="Requirements.address" name="address" required=""></textarea> -->
            <div class="form-group form-group-default container-btn-radio">
              <label for="sel1" class="select_label">Interested in</label>
              <div data-toggle="buttons" class="col-sm-4 mar-bt-15 student">
                <!-- <label class="btn active btn-success" id="ib_click"> -->
                <label class="btn active btn-success checked_box">
                  <input type="checkbox"  value="IB courses" name="role[]"> IB courses
                </label>
              </div>
              <div data-toggle="buttons" class="col-sm-4 mar-bt-15" >
                <!-- <label class="btn active" id="univ_click"> -->
                <label class="btn active checked_box">
                  <input type="checkbox" value="University Consulting" name="role[]"> University Consulting
                </label>
              </div>
              <div data-toggle="buttons" class="col-sm-4 mar-bt-15" >
                <!-- <label class="btn active" id="univ_click"> -->
                <label class="btn active checked_box">
                  <input type="checkbox" value="Personal tutoring" name="role[]"> Personal tutoring
                </label>
              </div>
            </div>
            <div class="form-group form-group-default container-btn-radio">
              <label for="sel1" class="select_label"> Are You? </label>
              <div data-toggle="buttons" class="col-sm-6 student mar-bt-15">
                <label class="btn label-btn-radio active btn-success" id="ib_student">
                  <input type="radio"  value="Student" name="i_am_a"> are you a student?
                </label>
              </div>
              <div data-toggle="buttons" class="col-sm-6 mar-bt-15">
                <label class="btn label-btn-radio active" id="ib_parent">
                  <input type="radio" value="Parent" name="i_am_a"> are you a parent?
                </label>
              </div>
            </div>
            <div class="form-group form-group-default required">
              <label>Select Country</label>
              <?php $countries = array("AF" => "Afghanistan","AX" => "Åland Islands","AL" => "Albania","DZ" => "Algeria","AS" => "American Samoa","AD" => "Andorra","AO" => "Angola","AI" => "Anguilla","AQ" => "Antarctica","AG" => "Antigua and Barbuda","AR" => "Argentina","AM" => "Armenia","AW" => "Aruba","AU" => "Australia","AT" => "Austria","AZ" => "Azerbaijan","BS" => "Bahamas","BH" => "Bahrain","BD" => "Bangladesh","BB" => "Barbados","BY" => "Belarus","BE" => "Belgium","BZ" => "Belize","BJ" => "Benin","BM" => "Bermuda","BT" => "Bhutan","BO" => "Bolivia","BA" => "Bosnia and Herzegovina","BW" => "Botswana","BV" => "Bouvet Island","BR" => "Brazil","IO" => "British Indian Ocean Territory","BN" => "Brunei Darussalam","BG" => "Bulgaria","BF" => "Burkina Faso","BI" => "Burundi","KH" => "Cambodia","CM" => "Cameroon","CA" => "Canada","CV" => "Cape Verde","KY" => "Cayman Islands","CF" => "Central African Republic","TD" => "Chad","CL" => "Chile","CN" => "China","CX" => "Christmas Island","CC" => "Cocos (Keeling) Islands","CO" => "Colombia","KM" => "Comoros","CG" => "Congo","CD" => "Congo, The Democratic Republic of The","CK" => "Cook Islands","CR" => "Costa Rica","CI" => "Cote D'ivoire","HR" => "Croatia","CU" => "Cuba","CY" => "Cyprus","CZ" => "Czech Republic","DK" => "Denmark","DJ" => "Djibouti","DM" => "Dominica","DO" => "Dominican Republic","EC" => "Ecuador","EG" => "Egypt","SV" => "El Salvador","GQ" => "Equatorial Guinea","ER" => "Eritrea","EE" => "Estonia","ET" => "Ethiopia","FK" => "Falkland Islands (Malvinas)","FO" => "Faroe Islands","FJ" => "Fiji","FI" => "Finland","FR" => "France","GF" => "French Guiana","PF" => "French Polynesia","TF" => "French Southern Territories","GA" => "Gabon","GM" => "Gambia","GE" => "Georgia","DE" => "Germany","GH" => "Ghana","GI" => "Gibraltar","GR" => "Greece","GL" => "Greenland","GD" => "Grenada","GP" => "Guadeloupe","GU" => "Guam","GT" => "Guatemala","GG" => "Guernsey","GN" => "Guinea","GW" => "Guinea-bissau","GY" => "Guyana","HT" => "Haiti","HM" => "Heard Island and Mcdonald Islands","VA" => "Holy See (Vatican City State)","HN" => "Honduras","HK" => "Hong Kong","HU" => "Hungary","IS" => "Iceland","IN" => "India", "ID" => "Indonesia","IR" => "Iran, Islamic Republic of","IQ" => "Iraq","IE" => "Ireland","IM" => "Isle of Man","IL" => "Israel","IT" => "Italy","JM" => "Jamaica","JP" => "Japan","JE" => "Jersey","JO" => "Jordan","KZ" => "Kazakhstan","KE" => "Kenya","KI" => "Kiribati","KP" => "Korea, Democratic People's Republic of","KR" => "Korea, Republic of","KW" => "Kuwait","KG" => "Kyrgyzstan","LA" => "Lao People's Democratic Republic","LV" => "Latvia","LB" => "Lebanon","LS" => "Lesotho","LR" => "Liberia","LY" => "Libyan Arab Jamahiriya","LI" => "Liechtenstein","LT" => "Lithuania","LU" => "Luxembourg","MO" => "Macao","MK" => "Macedonia, The Former Yugoslav Republic of","MG" => "Madagascar","MW" => "Malawi","MY" => "Malaysia","MV" => "Maldives","ML" => "Mali","MT" => "Malta","MH" => "Marshall Islands","MQ" => "Martinique","MR" => "Mauritania","MU" => "Mauritius","YT" => "Mayotte","MX" => "Mexico","FM" => "Micronesia, Federated States of","MD" => "Moldova, Republic of","MC" => "Monaco","MN" => "Mongolia","ME" => "Montenegro","MS" => "Montserrat","MA" => "Morocco","MZ" => "Mozambique","MM" => "Myanmar","NA" => "Namibia","NR" => "Nauru","NP" => "Nepal","NL" => "Netherlands","AN" => "Netherlands Antilles","NC" => "New Caledonia","NZ" => "New Zealand","NI" => "Nicaragua","NE" => "Niger","NG" => "Nigeria","NU" => "Niue","NF" => "Norfolk Island","MP" => "Northern Mariana Islands","NO" => "Norway","OM" => "Oman","PK" => "Pakistan","PW" => "Palau","PS" => "Palestinian Territory, Occupied","PA" => "Panama","PG" => "Papua New Guinea","PY" => "Paraguay","PE" => "Peru","PH" => "Philippines","PN" => "Pitcairn","PL" => "Poland","PT" => "Portugal","PR" => "Puerto Rico","QA" => "Qatar","RE" => "Reunion","RO" => "Romania","RU" => "Russian Federation","RW" => "Rwanda","SH" => "Saint Helena","KN" => "Saint Kitts and Nevis","LC" => "Saint Lucia","PM" => "Saint Pierre and Miquelon","VC" => "Saint Vincent and The Grenadines","WS" => "Samoa","SM" => "San Marino","ST" => "Sao Tome and Principe","SA" => "Saudi Arabia","SN" => "Senegal","RS" => "Serbia","SC" => "Seychelles","SL" => "Sierra Leone","SG" => "Singapore","SK" => "Slovakia","SI" => "Slovenia","SB" => "Solomon Islands","SO" => "Somalia","ZA" => "South Africa","GS" => "South Georgia and The South Sandwich Islands","ES" => "Spain","LK" => "Sri Lanka","SD" => "Sudan","SR" => "Suriname","SJ" => "Svalbard and Jan Mayen","SZ" => "Swaziland","SE" => "Sweden","CH" => "Switzerland","SY" => "Syrian Arab Republic","TW" => "Taiwan, Province of China","TJ" => "Tajikistan","TZ" => "Tanzania, United Republic of","TH" => "Thailand","TL" => "Timor-leste","TG" => "Togo","TK" => "Tokelau","TO" => "Tonga","TT" => "Trinidad and Tobago","TN" => "Tunisia","TR" => "Turkey","TM" => "Turkmenistan","TC" => "Turks and Caicos Islands","TV" => "Tuvalu","UG" => "Uganda","UA" => "Ukraine","AE" => "United Arab Emirates","GB" => "United Kingdom","US" => "United States","UM" => "United States Minor Outlying Islands","UY" => "Uruguay","UZ" => "Uzbekistan","VU" => "Vanuatu","VE" => "Venezuela","VN" => "Viet Nam","VG" => "Virgin Islands, British","VI" => "Virgin Islands, U.S.","WF" => "Wallis and Futuna","EH" => "Western Sahara","YE" => "Yemen","ZM" => "Zambia","ZW" => "Zimbabwe"); ?>
              <select name="country" class="form-control">
                <option value="United Kingdom" title="United Kingdom">United Kingdom</option>
                <?php
                foreach($countries as $key => $value) {
                ?>
                <option value="<?= $value ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          
          <p></p>
          <button class="btn bg-theme-color-2" type="submit">Submit</button>
        </form>
      </div>
    </div>
    <!-- END PANEL -->
  </div>
</div>
</div>
<div class="modal-footer">
<!-- <button type="button"  data-dismiss="modal"></button> -->
</div>
</div>

</div>
</div>

</div>