<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>User Profile | Rostrum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="icon" type="image/x-icon" href="<?=base_url()?>assets/img/favicon.png">
    <link rel="apple-touch-icon" href="<?=base_url()?>assets/pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>assets/pages/ico/120.png">
    <link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
	  <script type="text/javascript" src="/cometchat/cometchatjs.php" charset="utf-8"></script>
    <link href="<?=base_url()?>assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?=base_url()?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/pages/css/pages.css" rel="stylesheet" class="main-stylesheet" type="text/css" />
    <link class="main-stylesheet" href="<?=base_url()?>assets/css/alertify.min.css" rel="stylesheet" type="text/css" />
    <link class="main-stylesheet" href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript"> var baseurl = '<?=base_url()?>'; var user = 'tutor'; </script>
  </head>
  <body class="fixed-header horizontal-menu" ng-app="tutorApp" ng-controller="feedCtrl">
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
      <!-- START HEADER -->
      <div class="header ">
        <!-- START MOBILE CONTROLS -->
        <div class="container-fluid relative">
          <!-- MIDDLE -->
          <div class="pull-center hidden-md hidden-lg">
            <div class="header-inner">
              <div class="brand inline">
                <a href="#">
                  <img alt="logo" src="<?=base_url()?>assets/img/logo.png" alt="logo" data-src="<?=base_url()?>assets/img/logo.png" data-src-retina="<?=base_url()?>assets/img/logo.png" width="150">
                </a>
              </div>
            </div>
          </div>
          <!-- RIGHT SIDE -->
          <div class="pull-right full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="header-inner">
              <a href="#" class="btn-link visible-xs-inline-block visible-sm-inline-block m-r-15" data-pages="horizontal-menu-toggle">
                <span class="pg pg-arrow_minimize"></span>
              </a>
              <a href="#" class="btn-link visible-sm-inline-block visible-xs-inline-block m-r-10" data-toggle="quickview" data-toggle-element="#quickview">
                <span class="icon-set menu-hambuger"></span>
              </a>
            </div>
            <!-- END ACTION BAR -->
          </div>
        </div>
        <!-- END MOBILE CONTROLS -->
        <div class=" pull-left sm-table hidden-xs hidden-sm">
          <div class="header-inner">
            <div class="brand inline">
              <a href="<?=base_url()?>">
                <img alt="logo" src="<?=base_url()?>assets/img/logo.png" alt="logo" data-src="<?=base_url()?>assets/img/logo.png" data-src-retina="<?=base_url()?>assets/img/logo.png" width="125">
              </a>
            </div>
            <!-- START NOTIFICATION LIST -->
            <ul class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
              <li class="p-r-15 inline">
                <div class="dropdown">
                  <a href="javascript:;" id="notification-center" class="icon-set bell" data-toggle="dropdown">
                     <span class="bubble" ng-cloak>{{ notification_count + class_notification_count }}</span>
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
                          <!-- <div class="heading open">
                            <a href="#" class="text-complete pull-left">
                              <i class="pg-form fs-16 m-r-10"></i>
                              <span class="bold">Carrot Design</span>
                              <span class="fs-12 m-l-10">John Doe</span>
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
                          <!-- div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                            <a href="#" class="mark"></a>
                          </div> -->
                          <!-- END Notification Item Right Side-->
                        </div>
                        <!-- START Notification Body-->
                        <!-- START Notification Item-->
                        <div class="notification-item  clearfix">
                          <div class="heading">
                            <a  ng-click="clearnotification('assigned_tutor')">
                                <span class="bold" ng-if="notificationscount > 0">{{notificationscount}} new student has been assigned to you.<br /></span>
                              </a>
                              <a  ng-click="clearnotification('decline_class')">
                                <span class="bold" ng-if="classnotificationscount > 0">{{classnotificationscount}} class has been declined by the student.<br /></span>
                              </a>
                                <span class="bold" ng-if="notificationscount == 0 && classnotificationscount == 0 ">No new Notifications.<br /></span>
                            <!-- <span class="pull-right time">2 mins ago</span> -->
                          </div>
                          <!-- START Notification Item Right Side-->
                          <div class="option">
                            <a href="#" class="mark"></a>
                          </div>
                          <!-- END Notification Item Right Side-->
                        </div>
                        <!-- END Notification Item-->
                        <!-- START Notification Item-->
                        <!-- <div class="notification-item  clearfix">
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
                             
                            </div> -->
                            <!-- <a href="#" class="text-complete pull-left">
                              <span class="bold">Revox Design Labs</span>
                              <span class="fs-12 m-l-10">Owners</span>
                            </a>
                            <span class="pull-right time">11:00pm</span>
                          </div> -->
                          <!-- START Notification Item Right Side-->
                          <!-- <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
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
                <a data-target="#modalFillIn" data-toggle="modal" id="btnFillSizeToggler" href="#" class="icon-set menu-hambuger-plus "></a>
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
              <!-- <a href="#" class="btn-link icon-set menu-hambuger m-l-20 sm-no-margin hidden-sm hidden-xs" data-toggle="quickview" data-toggle-element="#quickview"></a> -->
            </div>
          </div>
          <div class=" pull-right">
            <!-- START User Info-->
            <div class="visible-lg visible-md m-t-10">
              <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
                <span class="semi-bold"><?=$user->firstname?></span> 
              <span class="text-master"><?=$user->lastname?></span>
              </div>
              <div class="dropdown pull-right">
                <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                  <img src="<?=base_url();?>uploads/profile_imgs/<?=$user->profile_img?>" alt="" data-src="<?=base_url();?>uploads/profile_imgs/<?=$user->profile_img?>" data-src-retina="<?=base_url();?>uploads/profile_imgs/<?=$user->profile_img?>" width="32" height="32" >
                </span>
                </button>
                <ul class="dropdown-menu profile-dropdown" role="menu">
                  <li><a href="#/profile"><i class="pg-settings_small"></i> My Profile</a>
                </li>
                <!-- <li><a href="#"><i class="pg-outdent"></i> Contact Admin</a>
                </li>
                <li><a href="#"><i class="pg-signals"></i> Help</a>
                </li> -->
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
  <!-- START PAGE CONTENT WRAPPER -->
  <div class="page-content-wrapper profile-page">
    <!-- START PAGE CONTENT -->
    <div class="content">
      <!-- Modal -->
      <div class="modal fade fill-in" id="modalFillIn" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="pg-close"></i>
        </button>
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-left p-b-5"><span class="semi-bold">Add a new post</span></h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12">
                  <!-- START PANEL -->
                  <div class="panel panel-transparent">
                    <div class="panel-body">
                      <form id="form-project" role="form" autocomplete="off">
                        <p>Basic Information</p>
                        <div class="form-group-attached">
                          <div class="form-group form-group-default required">
                            <label>Project name</label>
                            <input type="text" class="form-control" name="projectName" required>
                          </div>
                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default required">
                                <label>First name</label>
                                <input type="text" class="form-control" name="firstName" required>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group form-group-default">
                                <label>Last name</label>
                                <input type="text" class="form-control" name="lastName">
                              </div>
                            </div>
                          </div>
                        </div>
                        <p class="m-t-10">Advanced Information</p>
                        <div class="form-group-attached">
                          <div class="form-group form-group-default">
                            <label>Investor <i class="fa fa-info text-complete m-l-5"></i>
                            </label>
                            <input type="text" class="form-control" name="investor">
                          </div>
                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default required">
                                <label>Starting date</label>
                                <input id="start-date" type="text" class="form-control date" name="startDate" required>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group form-group-default">
                                <label>Deadline</label>
                                <input id="end-date" type="text" class="form-control date" name="endDate">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group form-group-default required">
                                <label>Website</label>
                                <input type="text" class="form-control" name="url">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group form-group-default input-group">
                                <label class="inline">Availability</label>
                                <span class="input-group-addon bg-transparent">
                                  <input type="checkbox" data-init-plugin="switchery" data-size="small" data-color="primary" checked="checked" />
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-group form-group-default input-group">
                                <label>Budget</label>
                                <input type="text" class="form-control usd" required>
                                <span class="input-group-addon">USD</span>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group form-group-default input-group">
                                <label>Profit</label>
                                <input type="text" class="form-control usd">
                                <span class="input-group-addon">USD</span>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group form-group-default input-group">
                                <label>Revenue</label>
                                <input type="text" class="form-control usd">
                                <span class="input-group-addon">USD</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="pull-left">
                          <div class="checkbox check-primary">
                            <input type="checkbox" checked="checked" value="1" id="checkbox-agree">
                            <label for="checkbox-agree">I hereby certify that the information above is true and accurate
                            </label>
                          </div>
                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-default"><i class="pg-close"></i> Clear</button>
                      </form>
                    </div>
                  </div>
                  <!-- END PANEL -->
                </div>
              </div>
              <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? <a href="#">Terms and conditions</a></p>
            </div>
            <div class="modal-footer">
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- modalMsgtoAdmin -->
      <?php /* ?>
      <div class="modal fade fill-in" id="modalMsgtoAdmin" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="pg-close"></i>
        </button>
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-left p-b-5"><span class="semi-bold">Write a message to Admin</span></h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12">
                  <form id="form-msgtoadmin" class="form-horizontal" role="form" autocomplete="off">
                    <div class="form-group">
                      <label for="position" class="col-sm-3 control-label">Subject</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="position" placeholder="" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-3 control-label">Message</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="name" placeholder="Type your message"></textarea>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-12">
                        <button class="btn btn-primary pull-right" type="submit">Send</button>
                        <button class="btn btn-default pull-right m-r-5"><i class="pg-close"></i> Clear</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal-footer">
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php */ ?>
      <!-- Modal -->
      <div class="bar">
        <div class="container-fluid container-fixed-lg">
          <div class="pull-right">
            <a href="#" class="text-black padding-10 visible-xs-inline visible-sm-inline pull-right m-t-10 m-b-10 m-r-10 on" data-pages="horizontal-menu-toggle">
              <i class="pg-close_line"></i>
            </a>
          </div>

          <div class="bar-inner">
            <?php if( $user->status == 1 ) { ?>
            <ul>
              <li class="horizontal">
                  <a href="#/">
                    <span class="semi-bold">Dashboard</span> 
                    <!-- <span class="arrow"></span> -->
                  </a>
                  <!-- <ul class="horizontal">
                    <li>
                      <a href="#/" ng-dblclick="getFeed( '', Subject.subject_id, 0)">
                      Jobs</a>
                    </li>
                    <li>
                      <a href="#/" ng-click="getFeed( '', Subject.subject_id, 1)">Requested</a>
                    </li>
                    <li>
                      <a href="#/" ng-click="getFeed( '', Subject.subject_id, 2)">Ongoing</a>
                    </li>
                    <li>
                      <a href="#/" ng-click="getFeed( '', Subject.subject_id, 3)">Completed</a>
                    </li>
                  </ul> -->
                </li>
              <li><a href="#/profile" class="p-t-15 p-b-15">My Profile</a></li>
              <li><a href="#/schedule" class="p-t-15 p-b-15">My Schedule</a></li>
              <!-- <li><a href="#/">Messages</a></li> -->
              <li class="horizontal">
                <a href="javascript:;"><span class="semi-bold">Resources</span> <span class="arrow"></span></a>
                <ul class="horizontal">
                  <li><a href="#" class="p-t-15 p-b-15">Resources Category 1</a></li>
                  <li><a href="#" class="p-t-15 p-b-15">Resources Category 2</a></li>
                  <li><a href="#" class="p-t-15 p-b-15">Resources Category 3</a></li>
                  <li><a href="#" class="p-t-15 p-b-15">Resources Category 4</a></li>
                </ul>
              </li>
              <li class="horizontal">
                <a href="javascript:;"><span class="semi-bold">Payment &amp; Transactions</span> <span class="arrow"></span></a>
                <ul class="horizontal">
                  <!-- <li><a href="transaction-invoice.html">Invoices</a></li> -->
                  <li><a href="#/" class="p-t-15 p-b-15">Transaction History</a></li>
                  <li><a href="#/" class="p-t-15 p-b-15">Widthdrawal Request</a></li>
                </ul>
              </li>
              <!-- <li><a data-target="#modalMsgtoAdmin" data-toggle="modal" id="btnFillSizeToggler" class="label label-blue text-white" href="#">Write to Us</a></li> -->
            </ul>
            <?php } ?>
          </div>
        </div>
      </div>