<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Rostrum" />
<meta name="keywords" content="academy, course, education, education html theme, elearning, learning," />
<link rel="icon" type="image/x-icon" href="<?=base_url()?>assets/img/favicon.png">
<!-- Page Title -->
<title>Rostrum | <?=$page_title?></title>
<!-- Stylesheet -->
<link href="<?=base_url()?>assets/css/normalize.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/css/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/animate.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="<?=base_url()?>assets/css/menuzord-rounded-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="<?=base_url()?>assets/css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="<?=base_url()?>assets/css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="<?=base_url()?>assets/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="<?=base_url()?>assets/css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Theme Color -->
<link href="<?=base_url()?>assets/css/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">
<link class="main-stylesheet" href="<?=base_url()?>assets/css/alertify.min.css" rel="stylesheet" type="text/css" />
<link class="main-stylesheet" href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />

<!-- external javascripts -->
<script src="<?=base_url()?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?=base_url()?>assets/js/jquery-plugin-collection.js"></script>
<script type="text/javascript"> var baseurl = '<?=base_url()?>'; </script>
</head>
<body class="has-side-panel side-panel-left fullwidth-page side-push-panel" ng-app="homeApp">

<div class="body-overlay"></div>
<!-- side-panel -->
<div id="side-panel" class="dark layer-overlay overlay-dark-deep" data-bg-img="<?=base_url()?>assets/img/bg/bg8.jpg">
  <div class="side-panel-wrap">
    <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon_close font-30"></i></a></div>
    <a href="javascript:void(0)"><img alt="logo" src="<?=base_url()?>assets/img/logo.png"></a>
    <div class="side-panel-nav mt-30">
      <div class="widget no-border">
        <nav>
          <ul class="nav nav-list">
            <li><a href="<?=base_url()?>">Home</a></li>

            <li>
              <a class="tree-toggler nav-header">Find a Tutor 
                <i class="fa fa-angle-down"></i>
              </a>
              <ul class="nav nav-list tree">
                <li><a href="#/">Select A Tutor</a></li>
                <li><a href="#/request">Request Tuition</a></li>
              </ul>
            </li>

            <li>
              <a class="tree-toggler nav-header">IB Courses  
                <i class="fa fa-angle-down"></i>
              </a>
              <ul class="nav nav-list tree">
                <li><a href="#">Pre IB Courses</a></li>
                <li><a href="#">Mid IB Courses</a></li>
                <li><a href="#">Revision Courses</a></li>
                <li><a href="#">Personal Tutoring</a></li>
              </ul>
            </li>

            <li>
              <a class="tree-toggler nav-header">Consulting  
                <i class="fa fa-angle-down"></i>
              </a>
              <ul class="nav nav-list tree">
                <li><a href="#">US/CND Universities</a></li>
                <li><a href="#">UK Universities</a></li>
                <li><a href="#">Oxbridge</a></li>
              </ul>
            </li>

            <li>
              <a class="tree-toggler nav-header">Resources  
                <i class="fa fa-angle-down"></i>
              </a>
              <ul class="nav nav-list tree">
                <li><a href="#">Learning Resources</a></li>
                <li><a href="#">Q&amp;A Portal </a></li>
                <li><a href="#">About The IB </a></li>
              </ul>
            </li>

            <li>
              <a class="tree-toggler nav-header">Why Rostrum  
                <i class="fa fa-angle-down"></i>
              </a>
              <ul class="nav nav-list tree">
                <li><a href="<?=base_url()?>/about-us">About Us</a></li>
                <li><a href="<?=base_url()?>/our-team">Our Team</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">Our Approach</a></li>
              </ul>
            </li>

            <li>
              <a class="tree-toggler nav-header">More  
                <i class="fa fa-angle-down"></i>
              </a>
              <ul class="nav nav-list tree">
                <li><a href="#">Free Brochure</a></li>
                <li><a href="#">For Schools</a></li>
                <li><a href="#">Work With Us</a></li>
              </ul>
            </li>

            <!-- <li><a href="how-it-work.html">How it works</a></li> 

            <li><a class="tree-toggler nav-header" href="#">Resources <i class="fa fa-angle-down"></i></a>
              <ul class="nav nav-list tree">
                <li><a href="resources.html">Learning Resources</a></li>
              </ul>
            </li>  

            <li><a href="packages.html">Packages</a></li>

            <li><a class="tree-toggler nav-header" href="#">Tutors <i class="fa fa-angle-down"></i></a>
              <ul class="nav nav-list tree">
                <li><a href="register-tutor.html">Apply Now</a></li>
                <li><a href="jobs-tutor.html">Tutoring Jobs</a></li>
              </ul>
            </li>    

            <li><a class="tree-toggler nav-header" href="#">About Rostrum <i class="fa fa-angle-down"></i></a>
              <ul class="nav nav-list tree">
                <li><a href="about-us.html">About Us</a></li>
                <li><a href="our-team.html">Our Team</a></li>
                <li><a href="contact-us.html">Contact us</a></li>
              </ul>
            </li> -->

            <li><a href="<?=base_url()?>login">Login</a></li>

            <li class="active"><a href="<?=base_url()?>register">Register</a></li>
          </ul>
        </nav>        
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="side-panel-widget mt-30">
      <div class="widget no-border">
        <ul>
          <li class="font-14 mb-5"> <i class="fa fa-phone text-theme-color-2"></i> <a href="#" class="text-gray">123-456-789</a> </li>
          <li class="font-14 mb-5"> <i class="fa fa-clock-o text-theme-color-2"></i> Mon-Fri 8:00 to 2:00 </li>
          <li class="font-14 mb-5"> <i class="fa fa-envelope-o text-theme-color-2"></i> <a href="#" class="text-gray">contact@yourdomain.com</a> </li>
        </ul>      
      </div>
      <div class="widget">
        <ul class="styled-icons icon-dark icon-theme-colored icon-sm">
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div id="wrapper">
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
  
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax" data-bg-img="<?=base_url()?>assets/img/bg/bg-1.jpg">
      <div class="container pt-40 pb-15">
      <a class="logo-center pb-20" href="<?=base_url()?>"><img width="300px" alt="logo" src="<?=base_url()?>assets/img/logo-white.png"></a>
      <div id="side-panel-trigger" class="side-panel-trigger"><a href="#"><i class="fa fa-bars font-24 text-white"></i></a></div>
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-12">
              <h3 class="title text-white mt-0 mb-0"><?=$page_title?></h3>
              <ol class="breadcrumb text-left text-black mt-0 mb-0">
                <li><a href="<?=base_url()?>">Home</a></li>
                <li class="active text-gray-silver">
                  <a href="#/"><?=$page_title?></a>
                </li>               
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
    