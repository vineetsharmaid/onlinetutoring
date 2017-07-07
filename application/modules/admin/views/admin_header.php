<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Admin Dashboards - Rostrum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="icon" type="image/x-icon" href="<?=base_url()?>assets/img/favicon.png">
    <link rel="apple-touch-icon" href="<?=base_url()?>assets/pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>assets/pages/ico/120.png">
    <link href="<?=base_url()?>assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />   
    <link href="<?=base_url()?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?=base_url()?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/pages/css/pages.css" rel="stylesheet" class="main-stylesheet" type="text/css" /> 
    <link href="<?=base_url()?>assets/css/datatable.css" rel="stylesheet" class="main-stylesheet" type="text/css" />
    <link class="main-stylesheet" href="<?=base_url()?>assets/css/alertify.min.css" rel="stylesheet" type="text/css" />
    <link class="main-stylesheet" href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">var baseurl = '<?=base_url()?>'; var user = 'admin';</script>
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <!-- <script>tinymce.init({ selector:'textarea.tinyMce' });</script> -->
    
  </head>
  <body class="fixed-header dashboard admin-dashboard requests-page" ng-app="adminApp" ng-controller="dashboardCtrl">
    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <img src="<?=base_url()?>assets/img/logo.png" alt="logo" class="brand" data-src="<?=base_url()?>assets/img/logo.png" data-src-retina="images/logo.png" width="95">
        <div class="sidebar-header-controls">
          <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
          </button>
          <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
          </button>
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30 ">
            <a href="#/" class="detailed">
              <span class="title">Dashboard</span>
              <span class="details">4 New Updates</span>
            </a>
            <span class="bg-primary icon-thumbnail"><i class="fa fa-home"></i></span>
          </li>
        <!--   <li class="">
            <a href="email.html" class="detailed">
              <span class="title">Email</span>
              <span class="details">24 New Emails</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-envelope"></i></span>
          </li>
          <li class="">
            <a href="admin-calender.html" class="detailed">
              <span class="title">Calendar</span>
              <span class="details">12 New Bookings</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-calendar"></i></span>
          </li> -->
          <li>
            <a href="#/tutors-request">
              <span class="title">Tutors</span>
              <!-- <span class=" arrow"></span> -->
            </a>
            <span class="icon-thumbnail"><i class="fa fa-graduation-cap"></i></span>
            <!-- <ul class="sub-menu">
              <li class="">
                <a href="teachers-list.html">All Tutors</a>
                <span class="icon-thumbnail"><i class="fa fa-file-text-o"></i></span>
              </li>
              <li class="">
                <a href="teachers-list.html">SL Tutors</a>
                <span class="icon-thumbnail"><i class="fa fa-book"></i></span>
              </li>
              <li class="">
                <a href="teachers-list.html">HL Tutors</a>
                <span class="icon-thumbnail"><i class="fa fa-diamond"></i></span>
              </li>
              <li class="">
                <a href="#/tutors-request">Requests from Teachers</a>
                <span class="icon-thumbnail"><i class="fa fa-street-view"></i></span>
              </li>
            </ul> -->
          </li>
          <li>
            <a href="javascript:;">
              <span class="title">Students</span>
              <span class=" arrow"></span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-user"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="#/students-list">Students List</a>
                <span class="icon-thumbnail"><i class="fa fa-file-text-o"></i></span>
              </li>
              <li class="">
                <a href="#/tution-requests">Requests from Students</a>
                <span class="icon-thumbnail"><i class="fa fa-street-view"></i></span>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;">
              <span class="title">Settings</span>
              <span class=" arrow"></span>
            </a>
            <span class="icon-thumbnail"><i class="pg-settings_small"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="#/subjects">Subjects</a>
                <span class="icon-thumbnail"><i class="fa fa-file-text-o"></i></span>
              </li>
             <!--  <li class="">
                <a href="#/subject-groups">Subjects</a>
                <span class="icon-thumbnail"><i class="fa fa-street-view"></i></span>
              </li> -->
            </ul>
          </li>


          <!-- <li>
            <a href="javascript:;">
              <span class="title">Static Pages</span>
              <span class=" arrow"></span>
            </a>
            <span class="icon-thumbnail"><i class="pg-form"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="#">Home</a>
                <span class="icon-thumbnail"><i class="fa fa-home"></i></span>
              </li>
              <li class="">
                <a href="#">About Us</a>
                <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
              </li>
              <li class="">
                <a href="#">How It Works</a>
                <span class="icon-thumbnail"><i class="fa fa-gears"></i></span>
              </li>
            </ul>
          </li> -->
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
      <!-- START HEADER -->
      <div class="header ">
        <!-- START MOBILE CONTROLS -->
        <div class="container-fluid relative">
          <!-- LEFT SIDE -->
          <div class="pull-left full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="header-inner">
              <a href="#" class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5" data-toggle="sidebar">
                <span class="icon-set menu-hambuger"></span>
              </a>
            </div>
            <!-- END ACTION BAR -->
          </div>
          <div class="pull-center hidden-md hidden-lg">
            <div class="header-inner">
              <div class="brand inline p-l-30">
                <img src="<?=base_url()?>assets/img/logo.png" alt="logo" data-src="<?=base_url()?>assets/img/logo.png" data-src-retina="images/logo.png" width="150">
              </div>
            </div>
          </div>
          <!-- RIGHT SIDE -->
          <div class="pull-right full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="header-inner">
              <a href="#" class="btn-link visible-sm-inline-block visible-xs-inline-block" data-toggle="quickview" data-toggle-element="#quickview">
                <span class="icon-set menu-hambuger-plus"></span>
              </a>
            </div>
            <!-- END ACTION BAR -->
          </div>
        </div>
        <!-- END MOBILE CONTROLS -->
        <div class="pull-left sm-table hidden-xs hidden-sm">
          <div class="header-inner">
            <div class="brand inline p-l-30">
              <img src="<?=base_url()?>assets/img/logo.png" alt="logo" data-src="<?=base_url()?>assets/img/logo.png" data-src-retina="images/logo.png" width="125">
            </div>
            <!-- START NOTIFICATION LIST -->
            <ul class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
              <li class="p-r-15 inline">
                <div class="dropdown">
                  <a href="javascript:;" id="notification-center" class="icon-set globe-fill" data-toggle="dropdown">
                    <span class="bubble" ng-bind="notificationscount"></span>
                  </a>
                  <!-- START Notification Dropdown -->
                  <div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">
                    <!-- START Notification -->
                    <div class="notification-panel">
                      <!-- START Notification Body-->
                      <div class="notification-body scrollable">
                        <!-- START Notification Item-->
                        <div class="notification-item unread clearfix">
                          <!-- START Notification Item-->
<!--                           <div class="heading open">
                            <a href="#" class="text-complete pull-left">
                              <i class="pg-map fs-16 m-r-10"></i>
                              <span class="bold">Carrot Design</span>
                              <span class="fs-12 m-l-10">David Nester</span>
                            </a>
                            <div class="pull-right">
                              <div class="thumbnail-wrapper d16 circular inline m-t-15 m-r-10 toggle-more-details">
                                <div><i class="fa fa-angle-left"></i>
                                </div>
                              </div>
                              <span class=" time">few sec ago</span>
                            </div>
                            <div class="more-details">
                              <div class="more-details-inner">
                                <h5 class="semi-bold fs-16">“Apple’s Motivation - Innovation <br> 
                                                            distinguishes between <br>
                                                            A leader and a follower.”</h5>
                                <p class="small hint-text">
                                  Commented on john Smiths wall.
                                  <br> via pages framework.
                                </p>
                              </div>
                            </div>
                          </div> -->
                          <!-- END Notification Item-->
                          <!-- START Notification Item Right Side-->
                          <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                            <a href="#" class="mark"></a>
                          </div>
                          <!-- END Notification Item Right Side-->
                        </div>
                        <!-- START Notification Body-->
                        <!-- START Notification Item-->
                        <div class="notification-item  clearfix">
                          <div class="heading">
                            <a href="#" class="text-danger pull-left">
                              <a  ng-click="clearnotification('student','register')">
                              <span class="bold" ng-repeat="ntf in notificationsdata" ng-if="ntf.notification_for == 'student' ">{{ntf.count}} new {{ntf.notification_for}} has been registered.<br /></span>
                              </a>
                              <a ng-click="clearnotification('tutor','register')">
                              <span class="bold" ng-repeat="ntf in notificationsdata" ng-if="ntf.notification_for == 'tutor' ">{{ntf.count}} new {{ntf.notification_for}} has been registered.<br /></span>
                              </a>
                              <a ng-click="clearnotification('admin','schedule_class')">
                              <span class="bold" ng-repeat="ntf in notificationsdata" ng-if="ntf.notification_type == 'schedule_class' && ntf.notification_for == 'admin' ">{{ntf.count}} new classes has been scheduled by tutor.<br /></span>
                              </a>
                              <a ng-click="clearnotification('admin','requirement')">
                              <span class="bold" ng-repeat="ntf in notificationsdata" ng-if="ntf.notification_type == 'requirement' && ntf.notification_for == 'admin' ">{{ntf.count}} new requirements has been posted.<br /></span>
                              </a>
                              <span class="fs-12 m-l-10">Take Action</span>
                            </a>
                            <span class="pull-right time">2 mins ago</span>
                          </div>
                          <!-- START Notification Item Right Side-->
                          <div class="option">
                            <a href="#" class="mark"></a>
                          </div>
                          <!-- END Notification Item Right Side-->
                        </div>
                        <!-- END Notification Item-->
                        <!-- START Notification Item-->
                       <!--  <div class="notification-item  clearfix">
                          <div class="heading">
                            <a href="#" class="text-warning-dark pull-left">
                              <i class="fa fa-exclamation-triangle m-r-10"></i>
                              <span class="bold">Warning Notification</span>
                              <span class="fs-12 m-l-10">Buy Now</span>
                            </a>
                            <span class="pull-right time">yesterday</span>
                          </div> -->
                          <!-- START Notification Item Right Side-->
                          <!-- <div class="option">
                            <a href="#" class="mark"></a>
                          </div> -->
                          <!-- END Notification Item Right Side-->
                        <!-- </div> -->
                        <!-- END Notification Item-->
                        <!-- START Notification Item-->
                        <!-- <div class="notification-item unread clearfix">
                          <div class="heading">
                            <div class="thumbnail-wrapper d24 circular b-white m-r-5 b-a b-white m-t-10 m-r-10">
                              <img width="30" height="30" data-src-retina="assets/img/profiles/1x.jpg" data-src="assets/img/profiles/1.jpg" alt="" src="assets/img/profiles/1.jpg">
                            </div>
                            <a href="#" class="text-complete pull-left">
                              <span class="bold">Revox Design Labs</span>
                              <span class="fs-12 m-l-10">Owners</span>
                            </a>
                            <span class="pull-right time">11:00pm</span>
                          </div> -->
                          <!-- START Notification Item Right Side-->
                          <!-- div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                            <a href="#" class="mark"></a>
                          </div> -->
                          <!-- END Notification Item Right Side-->
                        <!-- </div> -->
                        <!-- END Notification Item-->
                      </div>
                      <!-- END Notification Body-->
                      <!-- START Notification Footer-->
                      <div class="notification-footer text-center">
                        <a href="#" class="">Read all notifications</a>
                        <a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                          <i class="pg-refresh_new"></i>
                        </a>
                      </div>
                      <!-- START Notification Footer-->
                    </div>
                    <!-- END Notification -->
                  </div>
                  <!-- END Notification Dropdown -->
                </div>
              </li>
              <!-- <li class="p-r-15 inline">
                <a href="#" class="icon-set clip "></a>
              </li>
              <li class="p-r-15 inline">
                <a href="#" class="icon-set grid-box"></a>
              </li> -->
            </ul>
            <!-- END NOTIFICATIONS LIST -->
            <!-- <a href="#" class="search-link" data-toggle="search"><i class="pg-search"></i>Type anywhere to <span class="bold">search</span></a>  -->
            </div>
        </div>
        <div class=" pull-right">
          <div class="header-inner">
            <!-- <a href="#" class="btn-link icon-set menu-hambuger-plus m-l-20 sm-no-margin hidden-sm hidden-xs" data-toggle="quickview" data-toggle-element="#quickview"></a> -->
          </div>
        </div>
        <div class=" pull-right">
          <!-- START User Info-->
          <div class="visible-lg visible-md m-t-10">
            <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
              <span class="semi-bold">Admin</span> <span class="text-master">Rostrum</span>
            </div>
            <div class="dropdown pull-right">
              <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                <img src="assets/img/profiles/avatar.jpg" alt="" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="32" height="32"></span>
              </button>
              <ul class="dropdown-menu profile-dropdown" role="menu">
                <li><a href="#"><i class="pg-settings_small"></i> Settings</a>
                </li>
                <li><a href="#"><i class="pg-outdent"></i> Feedback</a>
                </li>
                <li><a href="#"><i class="pg-signals"></i> Help</a>
                </li>
                <li class="bg-master-lighter">
                  <a href="<?=base_url()?>logout" class="clearfix">
                    <span class="pull-left">Logout</span>
                    <span class="pull-right"><i class="pg-power"></i></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- END User Info-->
        </div>
      </div>
      <!-- END HEADER -->