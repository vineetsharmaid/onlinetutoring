<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tiluto</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
                
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="<?php echo base_url();?>/assets/font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap-chosen.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/layouts/layout3/css/layout.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/global/css/components.css" type="text/css">
         <script src="<?php echo base_url();?>/assets/global/plugins/angularjs/angular.min.js" type="text/javascript"></script>
        <script data-require="ui-bootstrap@*" data-semver="0.12.1" src="<?php echo base_url();?>/assets/angularControllers/ui-bootstrap-tpls-0.12.1.min.js"></script>
                <script src="<?php echo base_url();?>/assets/js/chart.js/dist/Chart.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/angular-chart.min.js"></script>
         <script src="<?php echo base_url();?>/assets/angularControllers/app.js" type="text/javascript"></script>
         <script src="<?php echo base_url();?>/assets/angularControllers/frontendcontroller.js" type="text/javascript"></script>
     <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url();?>/assets/layouts/layout/css/sweetalert.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url();?>/assets/layouts/layout/scripts/sweetalert-dev.js" type="text/javascript"></script>

    <!-- END HEAD -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.<?php echo base_url();?>/assets/js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" ng-app="tilutoapp">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="top-header">
                    <div class="container">
                        <div class="col-lg-8 col-lg-offset-4 col-sm-12">
                            <div class="header-info">
                                <ul>
                                <li><a href="<?php echo base_url();?>home/companylist">Företagskatalog</a></li>
                                <li class="mail-id"><a href="#"><span class="icon"><i class="fa fa-envelope-o wow bounceIn"></i></span>admin@tiluto.com</a></li>
                                <li><a href="#"><i class="fa fa-facebook wow bounceIn"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter wow bounceIn"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin wow bounceIn"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play wow bounceIn"></i></a></li>
                                <li class="call"><a href="#"><span class="icon"><i class="fa fa-phone wow bounceIn"></i></span>1(234) 567 8901</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                <div class="navbar-header col-lg-3">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="<?php echo base_url();  ?>"><div class="logo"><img class="img-responsive logo-img" src="<?php echo base_url();?>/assets/img/logo.png" alt="logo"></div></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-lg-6 col-sm-8" ng-controller="menucontroller">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
            
                    <li ng-repeat="menus in allmenus" ng-cloak>
                        <a class="page-scroll" href="<?php echo base_url();?>pages/{{menus.url}}" ng-cloak>{{menus.name}}</a>
                    </li>
                <!--     <li>
                        <a class="page-scroll" href="<?php echo base_url(); ?>home/work_withus">Work With Us</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url(); ?>home/contact">Contact Us</a>
                    </li>-->
                    <?php if($this->session->userdata['logged_in']['role'] == 'company'){?>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url();?>dashboard">Dashboard</a>
                    </li> 
                        <?php }else{ ?>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url();?>login">Logga In</a>
                    </li>  
                       <?php  }
                        ?>
                   
                </ul>
            </div>
        </div>

            <div class="col-lg-3 col-sm-12 post-ad">
                <div class="btn-group">
                    <a href="<?php echo base_url();?>login/signup" class="btn btn-default btn-lg" type="button" aria-haspopup="true" aria-expanded="false">Anslut ditt företag</a>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>