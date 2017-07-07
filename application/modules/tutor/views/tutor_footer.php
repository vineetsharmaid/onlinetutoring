<!--START QUICKVIEW -->
<div id="quickview" class="quickview-wrapper" data-pages="quickview">
  <a class="icon-notifcation"><i class="fa fa-bell-o"></i></a>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="active">
      <a href="#quickview-alerts" data-toggle="tab">Notications</a>
    </li>
  </ul>
  <a class="btn-link quickview-toggle" data-toggle-element="#quickview" data-toggle="quickview"><i class="pg-close"></i></a>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- BEGIN Alerts !-->
    <div class="tab-pane active fade in no-padding" id="quickview-alerts">
      <div class="view-port clearfix" id="alerts">
        <!-- BEGIN Alerts View !-->
        <div class="view bg-white">
          <!-- BEGIN Alert List !-->
          <div data-init-list-view="ioslist" class="list-view boreded no-top-border">
            <!-- BEGIN List Group !-->
            <div class="list-view-group-container">
              <!-- BEGIN List Group Header!-->
              <div class="list-view-group-header text-uppercase">
                No Notifications
              </div>
              <!-- END List Group Header!-->
              <!-- <ul>
                <li class="alert-list">
                  <a href="javascript:;" class="" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                    <p class="col-xs-height col-middle">
                      <span class="text-warning fs-10"><i class="fa fa-circle"></i></span>
                    </p>
                    <p class="p-l-10 col-xs-height col-middle col-xs-9 overflow-ellipsis fs-12">
                      <span class="text-master">John Doe Birthday</span>
                    </p>
                    <p class="p-r-10 col-xs-height col-middle fs-12 text-right">
                      <span class="text-warning">Today <br></span>
                      <span class="text-master">All Day</span>
                    </p>
                  </a>
                </li>
                <li class="alert-list">
                  <a href="#" class="" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                    <p class="col-xs-height col-middle">
                      <span class="text-warning fs-10"><i class="fa fa-circle"></i></span>
                    </p>
                    <p class="p-l-10 col-xs-height col-middle col-xs-9 overflow-ellipsis fs-12">
                      <span class="text-master">Meeting at 2:30</span>
                    </p>
                    <p class="p-r-10 col-xs-height col-middle fs-12 text-right">
                      <span class="text-warning">Today</span>
                    </p>
                  </a>
                </li>
              </ul> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END QUICKVIEW-->
<!-- START OVERLAY -->
<div class="overlay hide" data-pages="search">
  <!-- BEGIN Overlay Content !-->
  <div class="overlay-content has-results m-t-20">
    <!-- BEGIN Overlay Header !-->
    <div class="container-fluid">
      <!-- BEGIN Overlay Logo !-->
      <img class="overlay-brand" src="<?=base_url()?>assets/img/logo.png" alt="logo" data-src="<?=base_url()?>assets/img/logo.png" data-src-retina="<?=base_url()?>assets/img/logo.png" width="125">
      <!-- END Overlay Logo !-->
      <!-- BEGIN Overlay Close !-->
      <a href="#" class="close-icon-light overlay-close text-black fs-16">
        <i class="pg-close"></i>
      </a>
      <!-- END Overlay Close !-->
    </div>
    <!-- END Overlay Header !-->
    <div class="container-fluid">
      <!-- BEGIN Overlay Controls !-->
      <input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">
      <br>
      <div class="inline-block">
        <div class="checkbox right">
          <input id="checkboxn" type="checkbox" value="1" checked="checked">
          <label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>
        </div>
      </div>
      <div class="inline-block m-l-10">
        <p class="fs-13">Press enter to search</p>
      </div>
      <!-- END Overlay Controls !-->
    </div>
  </div>
  <!-- END Overlay Content !-->
</div>
<!-- END OVERLAY -->
<!-- VENDOR JS -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/modernizr.custom.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/plugins/classie/classie.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/plugins/interactjs/interact.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/moment/moment-with-locales.min.js"></script>

<!-- PAGE LEVEL JS -->
<script src="<?=base_url()?>assets/pages/js/pages.calendar.js"></script>
<script src="<?=base_url()?>assets/pages/js/pages.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/form_wizard.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/tables.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/portlets.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/alertify.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/angular/angular.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/angular/angular-route.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/angular/ui-bootstrap-tpls-2.5.0.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>bower_components/angular-file-upload-master/dist/angular-file-upload.js" type="text/javascript"></script>
<script src="<?=base_url()?>bower_components/angular-xeditable/dist/js/xeditable.js"></script>
<script src="<?=base_url()?>assets/angular/tutor/tutor.app.js"></script>
<script src="<?=base_url()?>assets/angular/tutor/feed.app.js"></script>
<script src="<?=base_url()?>assets/angular/tutor/tutor.routes.js"></script>
<script src="<?=base_url()?>assets/js/myCustom.js"></script>

</body>
</html>