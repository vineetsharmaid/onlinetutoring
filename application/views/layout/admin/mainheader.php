<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tiluto Admin </title>

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/admindesign/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/admindesign/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/admindesign/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url();?>assets/admindesign/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/admindesign/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/admindesign/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/admindesign/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url();?>assets/admindesign/global/css/components.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url();?>assets/admindesign/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url();?>assets/admindesign/pages/css/pricing.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/admindesign/pages/css/profile-2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/admindesign/layouts/layout/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/admindesign/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url();?>assets/admindesign/layouts/layout/css/custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/admindesign/apps/css/todo-2.css" rel="stylesheet" type="text/css" />

        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />

    <!-- sweet alert -->
    <link href="<?php echo base_url();?>assets/admin/css/sweetalert2.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/tinymce.css" rel="stylesheet" >



  </head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" ng-app="tilutoAdmin">
    <span us-spinner="{radius:30, width:8, length: 16}"></span>
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.html">
                        <img src="<?php echo base_url();?>assets/admindesign/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu" ng-controller="mainNavCtrl" ng-init="menuInit()" ng-cloak>
                    <ul class="nav navbar-nav pull-right">
                        <li role="presentation" class="dropdown">
                          <a href="#/support#new_requests" id="request_support" class="dropdown-toggle info-number"  aria-expanded="false" title="Customer Support Requests">
                            <i class="fa fa-life-ring"></i>
                            <span class="badge bg-green" ng-bind="$root.pendingRequests || '' "></span>
                          </a>
                          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                          </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                          <a href="#/projects" class="dropdown-toggle info-number"  aria-expanded="false" title="Inactive Projects">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-green" ng-bind="$root.newProjects || ''"></span>
                          </a>
                          <ul id="menu2" class="dropdown-menu list-unstyled msg_list" role="menu">
                          </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                          <a href="#/companies" class="dropdown-toggle info-number"  aria-expanded="false" title="Companies">
                            <i class="fa fa-building-o"></i>
                            <span class="badge bg-green" ng-bind="$root.newCompanies || ''"></span>
                          </a>
                          <ul id="menu2" class="dropdown-menu list-unstyled msg_list" role="menu">
                          </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                          <a href="#/connect-requests" id="request_connect" class="dropdown-toggle info-number"  aria-expanded="false" title="connect requests">
                            <i class="fa fa-bell"></i>
                            <span class="badge bg-green" ng-bind="$root.planRequests || ''"></span>
                          </a>
                          <ul id="menu2" class="dropdown-menu list-unstyled msg_list" role="menu">
                          </ul>
                        </li>

                        
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="<?php echo base_url();?>assets/admin/images/img.jpg" />
                                <span class="username username-hide-on-mobile" ng-cloak> Welcome, {{ $root.user.username }} </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                               <!-- <li>
                                    <a href="#/profile">
                                        <i class="fa fa-user"></i> My Profile </a>
                                </li> -->
                               <!--   <li>
                                    <a href="javascript:void(0);">
                                        <i class="fa fa-lock"></i> Lock Screen </a>
                                </li> -->
                                <li>
                                    <a href="javascript:void(0)" ng-click="logout()">
                                        <i class="fa fa-sign-out"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse" ng-controller="mainNavCtrl">
                    <!-- BEGIN SIDEBAR MENU -->
                    
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 17px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="side-user-profiles" >
                            <div class="row">
                                <div class="col-md-4 padding-right-zero">
                                    <div class="inner-side-user">
                                        <img alt="" class="img-circle" src="<?php echo base_url();?>assets/admin/images/img.jpg" />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <span class="side-user-desp">Welcome, <span class="move-down" ng-bind="$root.user.username">Dear John</span></span>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item start active open">
                            <a href="#/" class="nav-link nav-toggle">
                                <i class="fa fa-tachometer"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                            </a>                            
                        </li>
                        <li class="nav-item" id="list_companies">
                            <a href="#/companies" class="nav-link nav-toggle">
                                <i class="fa fa-building-o"></i>
                                <span class="title">Companies</span>
                            </a>

                        </li>
                        <li class="nav-item" id="list_projects">
                            <a href="#/projects" class="nav-link nav-toggle">
                                <i class="fa fa-tasks"></i>
                                <span class="title">Projects</span>                                
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link nav-toggle">
                                <i class="fa fa-share-alt"></i>
                                <span class="title">Connects</span>
                                <span class="arrow"></span>                                
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="#/connects" class="nav-link ">
                                        <span class="title">View History</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link nav-toggle">
                                <i class="fa fa-sitemap"></i>
                                <span class="title">Static Pages</span>
                                <span class="arrow"></span>                                
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="#/header" class="nav-link">
                                        <span class="title">Pages</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#/footer" class="nav-link">
                                        <span class="title">Footer</span>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="#/footer_social" class="nav-link">
                                        <span class="title">Footer Social Icons</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#/footer_address" class="nav-link">
                                        <span class="title">Footer Address</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#/analytics_script" class="nav-link">
                                        <span class="title">Analytic Script</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a ng-click="loadPage()" href="#/page/our_services" class="nav-link">
                                        <span class="title">Our Services</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a ng-click="loadPage()" href="#/page/work_with_us" class="nav-link">
                                        <span class="title">Work With Us</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a ng-click="loadPage()" href="#/page/contact_us" class="nav-link">
                                        <span class="title">Contact Us</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#/credits" class="nav-link nav-toggle">
                                <i class="fa fa-credit-card"></i>
                                <span class="title">Credit Management</span>                                
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#/price" class="nav-link nav-toggle">
                                <i class="fa fa-money"></i>
                                <span class="title">Price Management</span>                                
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#/plans" class="nav-link nav-toggle">
                                <i class="fa fa-usd"></i>
                                <span class="title">Subscription Plan</span>                                
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link nav-toggle">
                                <i class="fa fa-credit-card"></i>
                                 <span class="arrow"></span>  
                                <span class="title">Invoices</span>                                
                            </a>
                             <ul class="sub-menu">
                              <li class="nav-item">
                            <a href="#/invoice" class="nav-link nav-toggle">
                                <span class="title">Add Invoice</span>                                
                            </a>
                            </li>
                              <li class="nav-item">
                                <a href="#/invoice_history" class="nav-link nav-toggle">
                              
                                <span class="title">Invoice History</span>                                
                                 </a>
                              </li>

                        </ul>
                        </li>
                       
                        <li class="nav-item" id="connect_request">
                            <a href="#/connect-requests" class="nav-link nav-toggle">
                                <i class="fa fa-bell"></i>
                                <span class="title">Connect Requests</span>                                
                            </a>
                        </li>
                        <li class="nav-item" id="support_request">
                            <a href="#/support" class="nav-link nav-toggle">
                                <i class="fa fa-life-ring"></i>
                                <span class="title">Support Request</span>                                
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#/subscribers" class="nav-link nav-toggle">
                                <i class="fa fa-bell"></i>
                                <span class="title">Subscribers</span>                                
                            </a>
                        </li>
                         <!-- <li class="nav-item">
                            <a href="#/invoice" class="nav-link nav-toggle">
                                <i class="fa fa-bug"></i>
                                <span class="title">Invoice</span>                                
                            </a>
                        </li> -->
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
        <!-- /top navigation -->