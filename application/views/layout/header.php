<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Tiluto | <?php echo $title;?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url();?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url();?>/assets/global/css/components.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url();?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url();?>/assets/layouts/layout3/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>/assets/layouts/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url();?>/assets/layouts/layout3/css/custom.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
    
        <link href="<?php echo base_url();?>/assets/pages/css/search.css" rel="stylesheet" type="text/css" />
        <!-- <link href="<?php echo base_url();?>/assets/pages/css/faq.css" rel="stylesheet" type="text/css" /> -->
        <link href="<?php echo base_url();?>/assets/pages/css/pricing.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>/assets/pages/css/profile.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url();?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />


        <!-- color picker css -->
        <link href="<?php echo base_url();?>/assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>/assets/css/bootstrap-colorpicker-plus.css" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="favicon.ico" /> </head>
         <script src="<?php echo base_url();?>/assets/global/plugins/angularjs/angular.min.js" type="text/javascript"></script>
         <script data-require="ui-bootstrap@*" data-semver="0.12.1" src="<?php echo base_url();?>/assets/angularControllers/ui-bootstrap-tpls-0.12.1.min.js"></script>
         <script src="<?php echo base_url();?>/assets/angularControllers/app.js" type="text/javascript"></script>
         <script src="<?php echo base_url();?>/assets/angularControllers/service.js" type="text/javascript"></script>
         <script src="<?php echo base_url();?>/assets/angularControllers/controllers.js" type="text/javascript"></script>
          <script src="<?php echo base_url();?>/assets/angularControllers/companydashboardcontrollers.js" type="text/javascript"></script>
     <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url();?>/assets/layouts/layout/css/sweetalert.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url();?>/assets/layouts/layout/scripts/sweetalert-dev.js" type="text/javascript"></script>
      
    <!-- END HEAD -->

    <body class="page-container-bg-solid" ng-app="tilutoapp">
        <!-- BEGIN HEADER -->
        <div class="page-header" ng-controller="headerCtrl">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">
                <div class="container">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?php echo base_url();?>dashboard">
                            <img src="<?php echo base_url();?>/assets/layouts/layout3/img/logo-default.png" alt="logo" class="logo-default">
                        </a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                   <i class="fa fa-envelope-o"></i>
                                   Besvara Forfragningar
                                </a>                                
                            </li> -->
                            <!-- END NOTIFICATION DROPDOWN -->

                            <!-- notifcations -->
                            <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" ng-init="getNotifications()" ng-cloak>
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" ng-click="notificationsRead()" data-close-others="true" ng-cloak>
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                    Aviseringar {{notificationsCount}} <span class="caret"></span>
                                    <!-- <span ng-if="connects < '15' && connects!= '0'">{{ notifications.length +1 }}</span><span ng-if="connects == '0'">{{ notifications.length +1 }}</span><span ng-if="connects >= '15'">{{notifications.length}}</span> -->
                                </a>
                                <ul class="dropdown-menu profile-monitoring">
                                    <li ng-if="notificationsCount == 0 && connects != '0' && !notifications.length">
                                    <a  href="#">Inga anmälningar hittades</a>
                                    </li>
                                    <!-- <li ng-if="!notificationsCount && connects < 15 ">
                                    <a  href="#">No Notifications Found</a>
                                    </li> -->
                                    <li ng-if="connects == '0' "><a href="javascript:void(0);">Ingen Ansluter Vänster</a></li>
                                    <li ng-repeat="notification in notifications">
                                        <a ng-if="notification.n_type === '1'" ng-click="markRead(notification.id, 'reply')" href="javascript:void(0)">Nytt projekt har tilldelats</a>
                                        <a ng-if="notification.n_type === '2'" ng-click="markRead(notification.id, 'review')" href="javascript:void(0)">Ny granskning har gett</a>
                                        <a ng-if="notification.n_type === '5' && connects != 0 " ng-click="markRead(notification.id, 'invoice#/tab_1_1_3')" href="javascript:void(0)">Mindre än 15 Ansluter Vänster</a>
                                        <!-- <a ng-if="notification.n_type === '5' && connects == '0' " ng-click="markRead(notification.id, 'invoice#/tab_1_1_3')" href="javascript:void(0)">No connects Left</a> -->
                                    </li>
                                    <!-- <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 112px;" data-handle-color="#637283">

                                        </ul>
                                    </li> -->
                                </ul>
                     
                            </li>

                            <!-- # notifications end -->

                            <!-- BEGIN TODO DROPDOWN -->
                            <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-cog"></i>
                                    Inställningar
                                </a>
                                <ul class="dropdown-menu profile-monitoring">
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 150px;" data-handle-color="#637283">
                                            <li>
                                                <a ng-click="changetab('/tab_1_1_1')" href="<?php echo base_url();?>user/profile#tab_1_1_1"> Konto</a>
                                            </li>
                                            <li>
                                                <a ng-click="changetab('/tab_1_1_2')" id="secondTab" href="<?php echo base_url();?>user/profile#tab_1_1_2"> Övervakning Profil</a>
                                            </li>
                                            <li>
                                                <a ng-click="changetab('/tab_1_1_3')" href="<?php echo base_url();?>user/profile#tab_1_1_3"> Konto Miljö </a>
                                            </li>
                                            <li>
                                                <a ng-click="changetab('/tab_1_1_4')" href="<?php echo base_url();?>user/profile#tab_1_1_4"> Insticksprogram </a>
                                            </li> 
                                             <li>
                                                <a href="<?php echo base_url() ?>review"> Omdömen</a>
                                            </li>                                                                                      
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END TODO DROPDOWN -->
                           
                            <!-- BEGIN INBOX DROPDOWN -->
                            <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-cubes"></i>
                                    Avtal &amp; Fakturor 
                                </a>
                                <ul class="dropdown-menu profile-monitoring">
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 112px;" data-handle-color="#637283">
                                            <li>
                                                <a href="<?php echo base_url();?>/invoice#tab_1_1_1">Kontosammanstallning</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url();?>/invoice#tab_1_1_2">Fakturor &amp; Betalningar</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url();?>/invoice#tab_1_1_3">Affärspaket</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END INBOX DROPDOWN -->
                             <li class="droddown dropdown-separator">
                                <span class="separator"></span>
                            </li>
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    
                                    <img alt="" class="img-circle" src="<?php if(!empty($userinfo['image'])){ echo base_url()."/assets/uploads/user_avatar/".$userinfo['image'];}else{ echo base_url()."/assets/layouts/layout3/img/avatar9.png";} ?>">
                                    <span class="username username-hide-mobile"><?php if($userinfo['username']){ echo $userinfo['username'];}else{ echo "....";} ?></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                     <li>
                                        <a href="{{makeLink(<?php echo $userinfo['id'];?>)}} ">
                                            <i class="fa fa-user"></i> Publik profil </a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url();?>home/companylist">
                                            <i class="fa fa-building"></i> Företagskatalog </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url();?>dashboard/lockscreen">
                                            <i class="fa fa-lock"></i> Låsskärm </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url();?>dashboard/logout">
                                            <i class="fa fa-sign-out"></i> Logga ut </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">
                <div class="container">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN MEGA MENU -->
                    <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                    <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                    <div class="hor-menu  ">
                        <ul class="nav navbar-nav">
                            <li class="account-balance">
                                <div class="account-balance">
                                    <h5 class="nav-link nav-toggle">
                                        <span class="title">Min konto balans <span class="balance-count" ng-cloak>{{connects}}</span></span>                                
                                    </h5>
                                    <p class="connects" ng-init="myconnectsleft()"></p>
                                    <a class="info-detail" href="javascript:void(0);"><i class="fa fa-question-circle-o"></i></a>
                                </div>
                                <!-- <div class="st-info"><i class="fa fa-file-archive-o"></i>4 ST*</div> -->

                                <div class="account-information" style="display: none;">
                                    <h4>Kontosaldo</h4>
                                    <a class="close" id="closed" href="javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <p><i class="fa fa-file-archive-o"></i>Det är en väletablerad faktum att en läsare kommer att distraheras av läsbar innehållet på en sida när man tittar på dess layout.</p>
                                    <div class="footer">
                                        <a href="<?php echo base_url(); ?>invoice#/tab_1_1_3"><button type="text" class="btn purple">Ga till Kontosammanstallning</button></a>
                                    </div>
                                </div>
                            </li>


                            <li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?> menu-dropdown classic-menu-dropdown ">
                                <a href="<?php echo base_url();?>dashboard"> Inkorg
                                    <span class="arrow"></span>
                                </a>
                            </li>
                            <li class="menu-dropdown mega-menu-dropdown <?php if($this->uri->segment(1)=="reply"){echo "active";}?> ">
                                <a href="<?php echo base_url();?>reply"> Svara
                                    <span class="arrow"></span>
                                </a>

                                <!-- <ul class="dropdown-menu sub-menu-label">
                                    <li>
                                        <div class="mega-menu-content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul class="mega-menu-submenu">
                                                        <li>
                                                            <h2>Etiketter<span><a href="javascript:void(0);"><i class="fa fa-plus-square" aria-hidden="true"></i></a></span></h2>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" class="nav-link ">
                                                                <span class="title"><i class="fa fa-square light"></i>Osorterade (1)</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" class="nav-link ">
                                                                <span class="title"><i class="fa fa-square light-blue"></i>Anaxa Fixar</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" class="nav-link ">
                                                                <span class="title"><i class="fa fa-square light-green"></i> david Fixar (12)</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" class="nav-link ">
                                                                <span class="title"><i class="fa fa-square light-red"></i> Ej Tiluto (28)</span>
                                                            </a>
                                                        </li>
                                                         <li>
                                                            <a href="javascript:void(0);" class="nav-link ">
                                                                <span class="title"><i class="fa fa-square light-orange"></i> English Speaker</span>
                                                            </a>
                                                        </li>
                                                         <li>
                                                            <a href="javascript:void(0);" class="nav-link ">
                                                                <span class="title"><i class="fa fa-square light-yellowish"></i> Fell Kund (28)</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </li>
                                </ul> -->
                            </li>
                            <!-- <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="<?php echo base_url();?>search"> Search All
                                    <span class="arrow"></span>
                                </a>
                            </li> -->
                            
                        </ul>
                    </div>
                    <!-- END MEGA MENU -->
                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->