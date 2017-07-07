<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Student Profile | Rostrum</title>
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
    <link class="main-stylesheet" href="<?=base_url()?>assets/css/stripe-form.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <script type="text/javascript">var baseurl = '<?=base_url()?>'; var user = 'student';</script>
    
    

    <!--[if lte IE 9]>
  <link href="<?=base_url()?>assets/plugins/codrops-dialogFx/dialog.ie.css" rel="stylesheet" type="text/css" media="screen" />
  <![endif]-->
  </head>
  <body class="fixed-header horizontal-menu" ng-app="studentApp" ng-controller="dashboardCtrl">
    <!-- START PAGE-CONTAINER -->
    <div class="page-container " ng-init="test()">
      <!-- START HEADER -->
      <div class="header ">
        <!-- START MOBILE CONTROLS -->
        <div class="container-fluid relative">
          <!-- MIDDLE -->
          <div class="pull-center hidden-md hidden-lg">
            <div class="header-inner">
              <div class="brand inline">
                <a href="<?=base_url()?>">
                <img alt="logo" src="<?=base_url()?>assets/img/logo.png" alt="logo" data-src="<?=base_url()?>assets/img/logo.png" data-src-retina="<?=base_url()?>assets/img/logo.png" width="150">
                </a>
              </div>
            </div>
          </div>
          <!-- RIGHT SIDE -->
          <div class="pull-right full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="header-inner">
              <a href="#/" class="btn-link visible-xs-inline-block visible-sm-inline-block m-r-15" data-pages="horizontal-menu-toggle">
                <span class="pg pg-arrow_minimize"></span>
              </a>
              <a href="#/" class="btn-link visible-sm-inline-block visible-xs-inline-block m-r-10" data-toggle="quickview" data-toggle-element="#quickview">
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
                <img alt="logo" src="<?=base_url()?>assets/img/logo.png" alt="logo" data-src="<?=base_url()?>assets/img/logo.png" data-src-retina="images/logo.png" width="150" style="margin:10px 0 0 0;">
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
                            <a href="#/" class="text-complete pull-left">
                              <i class="pg-form fs-16 m-r-10"></i>
                              <span class="bold">Carrot Design</span>
                              <span class="fs-12 m-l-10" ng-bind="Student.firstname"></span>
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
                            <a href="#/" class="mark"></a>
                          </div>
                          <!-- END Notification Item Right Side-->
                        </div>
                        <!-- START Notification Body-->
                        <!-- START Notification Item-->
                        <div class="notification-item  clearfix">
                          <div class="heading">
                              <a  ng-click="clearnotification('assigned_tutor')">
                                <span class="bold" ng-if="notificationscount > 0">{{notificationscount}} new tutor has been assigned to your tution.<br /></span>
                              </a>
                              <a  ng-click="clearnotification('schedule_class')">
                                <span class="bold" ng-if="classnotificationscount > 0">{{classnotificationscount}} new class has been scheduled.<br /></span>
                              </a>
                                <span class="bold" ng-if="notificationscount == 0 && classnotificationscount == 0 ">No new Notifications.<br /></span>
                            <!-- <a href="#/" class="text-danger pull-left">
                              <i class="fa fa-exclamation-triangle m-r-10"></i>
                              <span class="bold">98% Server Load</span>
                              <span class="fs-12 m-l-10">Take Action</span>
                            </a> -->
                            <!-- <span class="pull-right time">2 mins ago</span> -->
                          </div>
                          <!-- START Notification Item Right Side-->
                          <div class="option">
                            <a href="#/" class="mark"></a>
                          </div>
                          <!-- END Notification Item Right Side-->
                        </div>
                        <!-- END Notification Item-->
                        <!-- START Notification Item-->
                        <!-- <div class="notification-item  clearfix">
                          <div class="heading">
                            <a href="#/" class="text-warning-dark pull-left">
                              <i class="fa fa-exclamation-triangle m-r-10"></i>
                              <span class="bold">Warning Notification</span>
                              <span class="fs-12 m-l-10">Buy Now</span>
                            </a>
                            <span class="pull-right time">yesterday</span>
                          </div> -->
                          <!-- START Notification Item Right Side-->
                          <!-- <div class="option">
                            <a href="#/" class="mark"></a>
                          </div> -->
                          <!-- END Notification Item Right Side-->
                        <!-- </div> -->
                        <!-- END Notification Item-->
                        <!-- START Notification Item-->
                        <div class="notification-item unread clearfix">
                        
                          <!-- START Notification Item Right Side-->
                          <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                            <a href="#/" class="mark"></a>
                          </div>
                          <!-- END Notification Item Right Side-->
                        </div>
                        <!-- END Notification Item-->
                      </div>
                      <!-- END Notification Body-->
                      <!-- START Notification Footer-->
                      <div class="notification-footer text-center">
                        <a href="#/" class="">Read all notifications</a>
                        <a data-toggle="refresh" class="portlet-refresh text-black pull-right" data-href="#/">
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
              <li class="p-r-15 inline">
                <a data-target="#modalStudentpost" data-toggle="modal" id="btnFillSizeToggler" class="icon-set menu-hambuger-plus " ng-click="getGroups(); getTutors(); getSubjects();"></a>
              </li>
              <!-- <li class="p-r-15 inline">
                <a href="#/" class="icon-set grid-box"></a>
              </li> -->
            </ul>
            <!-- END NOTIFICATIONS LIST -->
            <!-- <a href="#/" class="search-link" data-toggle="search"><i class="pg-search"></i>Type anywhere to <span class="bold">search</span></a>  -->

            </div>
        </div>
        <div class=" pull-right">
          <div class="header-inner">
            <!-- <a href="#/" class="btn-link icon-set menu-hambuger m-l-20 sm-no-margin hidden-sm hidden-xs" data-toggle="quickview" data-toggle-element="#quickview"></a> -->
          </div>
        </div>
        <div class=" pull-right">
          <!-- START User Info-->
          <div class="visible-lg visible-md m-t-10">
            <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
              <span class="semi-bold" ng-bind="Student.firstname"></span> 
              <span class="text-master" ng-bind="Student.lastname"></span>
            </div>
            <div class="dropdown pull-right">
              <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                <img src="<?=base_url();?>uploads/profile_imgs/<?=$user->profile_img?>" alt="" data-src="<?=base_url();?>uploads/profile_imgs/<?=$user->profile_img?>" data-src-retina="<?=base_url();?>uploads/profile_imgs/<?=$user->profile_img?>" width="32" height="32">
            </span>
              </button>
              <ul class="dropdown-menu profile-dropdown" role="menu">
                <li>
                  <a href="#/settings">
                  <i class="pg-settings_small"></i> Settings</a>
                </li>
                <li>
                  <a href="#/accountDetails">
                  <i class="pg-settings_small"></i> Account Details</a>
                </li>
                <!-- <li><a data-href="#/"><i class="pg-outdent"></i> Feedback</a>
                </li>
                <li><a data-href="#/"><i class="pg-signals"></i> Help</a>
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
         <?php /* ?>
         
          <!-- Modal -->
          <div class="modal fade fill-in" id="modalStudentpost" tabindex="-1" role="dialog" aria-hidden="true">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              <i class="pg-close"></i>
            </button>
            <div class="modal-dialog ">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="text-left p-b-5"><span class="semi-bold">Post A Requirement</span></h5>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
                    <!-- START PANEL -->
                    <div class="panel panel-transparent">
                      <div class="panel-body">
                        <form id="form-project" class="auth-form" name="addPostForm" ng-submit="saveRequirement()" role="form" autocomplete="off" novalidate >
                          <p>Basic Information</p>
                          <div class="form-group-attached">
                            <div class="row clearfix">
                              <div class="col-sm-6">
                                <div class="form-group form-group-default required">
                                  <label>Name</label>
                                  <input type="text" class="form-control" ng-model="Requirements.fullName" name="name"  required>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                  <label>Contact No.</label>
                                  <input type="text" class="form-control" ng-model="Requirements.phone" name="phone">
                                </div>
                              </div>
                            </div>
                            <div class="form-group form-group-default required">
                              <label>Email</label>
                              <input type="email" class="form-control" ng-model="Requirements.email" name="Email" required>
                            </div>
                          </div>
                          <p class="m-t-10">Advanced Information</p>
                          <div class="form-group-attached">
                            <div class="form-group form-group-default required">
                              <label>Title</label>
                              <textarea class="form-control" placeholder="Enter title for requirement" ng-model="Requirements.title" name="title" rows="1" required></textarea>
                            </div>
                            
                            <div class="form-group form-group-default required">
                              <label>Subject</label>
                                <select class=" cs-skin-slide cs-transparent form-control no-padding" data-init-plugin=""  ng-model="Requirements.subject_id" name="subject_id" required>
                                  <option value="">Select a subject</option>
                                  <option ng-repeat="Subject in Subjects" value="{{Subject.subject_id}}">
                                    {{Subject.subject_name}}
                                  </option>
                                </select>
                            </div>

                            <div class="form-group form-group-default">
                              <label>Preffered Day and Time</label>
                              <input type="text" ng-model="Requirements.day_and_time" name="day_and_time" class="form-control" placeholder="Enter your preffered day and time for tution">
                            </div>

                            <div class="row clearfix">
                              <div class="col-sm-6">
                                <div class="form-group form-group-default required">
                                  <label>Level</label>
                                  <select class=" cs-skin-slide cs-transparent form-control no-padding" data-init-plugin="" ng-model="Requirements.level" name="level" required>
                                    <option value="">Select Level</option>
                                    <option value="1">HL</option>
                                    <option value="2">SL</option>
                                    <option value="3">Ab Initio</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                  <label>No. of Hours</label>
                                  <select class=" cs-skin-slide cs-transparent form-control no-padding" data-init-plugin="" ng-model="Requirements.hours" name="hours">
                                      <option value="">Select Hours</option>
                                      <option value="1-2 hours/day">1-2 hours/day</option>
                                      <option value="1-2 hours/week">1-2 hours/week</option>
                                      <option value="2-4 hours/week">2-4 hours/week</option>
                                      <option value="4-6 hours/week">4-6 hours/week</option>
                                      <option value="6-8 hours/week">6-8 hours/week</option>
                                      <option value="8-10 hours/week">8-10 hours/week</option>
                                      <option value="10-12 hours/week">10-12 hours/week</option>
                                    </select>
                                </div>
                              </div>
                            </div>
                            <div class="form-group form-group-default required">
                              <label>Description</label>
                              <textarea class="form-control" id="description-text" placeholder="Enter detalis of your requirements here like - Topics, Timmings or any other" ng-model="Requirements.description" name="description" rows="10" cols="40" required></textarea>
                            </div>
                            <div class="row clearfix">
                              <div class="col-sm-6">
                                <div class="form-group form-group-default required">
                                  <label>Tier</label>
                                  <select class=" cs-skin-slide cs-transparent form-control no-padding" data-init-plugin="" ng-model="Requirements.tier" name="tier" required>
                                    <option value="">Select Tier</option>
                                    <option value="1">Tier 1</option>
                                    <option value="2">Tier 2</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                  <label>Any specific Tutor?:</label>
                                 <input class="form-control" type="text" ng-model="Requirements.specific_tutor" uib-typeahead="tutor as (tutor.firstname + ' ' + tutor.lastname) for tutor in Tutors | filter:$viewValue | limitTo:8">
                                </div>
                              </div>
                            </div>
                            <div class="row clearfix">
                              <div class="col-sm-6">
                                <div class="form-group form-group-default required">
                                  <label>Tution Method</label>
                                  <select class=" cs-skin-slide cs-transparent form-control no-padding" data-init-plugin="" ng-model="Requirements.tution_method" name="tution_method" required>
                                    <option value="">Select One</option>
                                    <option value="1">Onile Tutoring</option>
                                    <option value="2">Face to Face Tutoring</option>
                                    <option value="3">Other</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group form-group-default required">
                                  <label>Post Code</label>
                                  <input class="form-control" type="text" ng-model="Requirements.post_code" name="post_code" required>
                                </div>
                              </div>
                            </div>
                            <div class="form-group form-group-default">
                              <label>Any extra information?</label>
                              <textarea class="form-control" id="other-text" placeholder="Enter your text here" ng-model="Requirements.extra_info" rows="4"></textarea>
                            </div>
                          </div>
                          <br>
                          <div class="pull-left">
                            <div class="checkbox check-primary">
                              <input type="checkbox" checked="checked" value="1" id="checkbox-agree" ng-model="Requirements.true_info" required>
                              <label for="checkbox-agree">I hereby certify that the information above is true and accurate
                              </label>
                            </div>
                          </div>
                          <br>
                          <button class="btn btn-primary" type="submit" ng-disabled="addPostForm.$invalid">Submit</button>
                        </form>
                      </div>
                    </div>
                    <!-- END PANEL -->
                  </div>
                  </div>
                  <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? <a data-href="#/">Terms and conditions</a></p>
                </div>
                <div class="modal-footer">
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

          <?php */ ?>
          <!-- modalMsgtoAdmin -->
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
          <!-- Modal -->
          <div class="bar">
          <div class="container-fluid container-fixed-lg">
            <div class="pull-right">
              <a href="#/" class="text-black padding-10 visible-xs-inline visible-sm-inline pull-right m-t-10 m-b-10 m-r-10 on" data-pages="horizontal-menu-toggle">
                <i class="pg-close_line"></i>
              </a>
            </div>
            <div class="bar-inner">
              <ul>                
                <li class="horizontal">
                  <a href="#/">Profile</a>
                </li>
                <li><a href="#/schedule">My Schedule</a></li>
                
                <li class="horizontal">
                  <a href="#/">Resources</a>
                </li>

                <!-- <li class="horizontal">
                  <a href="javascript:;"><span class="semi-bold">Resources</span> <span class="arrow"></span></a>
                  <ul class="horizontal">
                    <li><a data-href="#/">Resources Category 1</a></li>
                    <li><a data-href="#/">Resources Category 2</a></li>
                    <li><a data-href="#/">Resources Category 3</a></li>
                    <li><a data-href="#/">Resources Category 4</a></li>
                  </ul>
                </li> -->
                <li class="horizontal">
                  <a href="#/transactions">Our Tutors</a>
                </li>

                <li class="horizontal">
                  <a href="#/transactions">Payment &amp; Transactions</a>
                </li>

                <!-- <li class="horizontal">
                  <a href="javascript:;"><span class="semi-bold">Payment &amp; Transactions</span> <span class="arrow"></span></a>
                  <ul class="horizontal">
                    <li><a data-href="#/">Transaction History</a></li>
                    <li><a data-href="#/">Widthdrawal Request</a></li>
                  </ul>
                </li> -->
                <!-- <li><a data-target="#modalMsgtoAdmin" data-toggle="modal" id="btnFillSizeToggler" class="label label-blue text-white" data-href="#/">Write to Us</a></li> -->
              </ul>
            </div>
           </div>
          </div>
          