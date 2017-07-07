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
    <div class="header-nav navbar-fixed-top header-dark navbar-white navbar-transparent navbar-sticky-animated animated-active">
      <div class="header-nav-wrapper">
        <div class="container">
          <nav id="menuzord-right" class="menuzord orange">
            <a class="menuzord-brand pull-left flip mt-10" href="javascript:void(0)">
              <img src="<?=base_url()?>assets/img/logo.png" alt=""></a>
              <ul class="menuzord-menu dark">
                <li><a href="#">Find a Tutor</a>
                  <ul class="dropdown" style="display: none;">
                    <li><a href="<?=base_url()?>search-tutor">Search for Tutor</a></li>
                    <li><a href="<?=base_url()?>search-tutor#/request">Request a Tutor</a></li>
                  </ul>
                </li>    

                <li><a href="how-it-work.html">How it works</a></li> 

                <li><a href="#">Resources</a>
                  <ul class="dropdown" style="display: none;">
                    <li><a href="resources.html">Learning Resources</a></li>
                  </ul>
                </li>  

                <li><a href="packages.html">Packages</a></li>

                <li><a href="#">Tutors</a>
                  <ul class="dropdown" style="display: none;">
                    <li><a href="register-tutor.html">Apply Now</a></li>
                    <li><a href="jobs-tutor.html">Tutoring Jobs</a></li>
                  </ul>
                </li>    
   
                <li><a href="#">About Rostrum</a>
                  <ul class="dropdown" style="display: none;">
                    <li><a href="about-us.html">About Us</a></li>
                    <li><a href="our-team.html">Our Team</a></li>
                    <li><a href="contact-us.html">Contact us</a></li>
                  </ul>
                </li>
                <li><a href="<?=base_url()?>login">Login</a></li>
                <li class="active"><a href="<?=base_url()?>register">Register</a></li>
                <!-- <li><a href="result.html">Tutors</a></li> -->
                <!-- <li><a href="pricing.html">Pricing</a></li> -->
              </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  