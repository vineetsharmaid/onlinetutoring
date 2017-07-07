 <!-- BEGIN FOOTER -->
        <!-- BEGIN PRE-FOOTER -->
        <div class="page-prefooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>Om oss</h2>
                        <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam dolore. </p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs12 footer-block" ng-controller="headerCtrl">
                        <h2>Nyhetsbrev</h2>
                        <div class="subscribe-form">
                            <form  name="Subscribe" ng-submit="subscribeEmail()">
                                <div class="input-group">
                                    <input type="email" placeholder="mail@email.com" name="subscribe_email" ng-model="subscribe_email" class="form-control" required>
                                    <span class="input-group-btn">
                                        <input class="btn" type="submit" value="Skicka" ng-disabled="Subscribe.$invalid">
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>Följ oss på</h2>
                        <ul class="social-icons">
                            <li>
                                <a href="javascript:;" data-original-title="rss" class="rss"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="facebook" class="facebook"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="twitter" class="twitter"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="googleplus" class="googleplus"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="linkedin" class="linkedin"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="youtube" class="youtube"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="vimeo" class="vimeo"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>Kontakta Oss</h2>
                        <address class="margin-bottom-40"> Telefon: 800 123 3456
                            <br> E-post:
                            <a href="mailto:admin@admin.com">admin@admin.com</a>
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PRE-FOOTER -->
        <!-- BEGIN INNER FOOTER -->
        <div class="page-footer">
            <div class="container"> 2016 &copy; Tiluto. All right reserved. </div>
        </div>
        <div class="scroll-to-top">
            <i class="fa fa-arrow-circle-o-up"></i>
        </div>
        <!-- END INNER FOOTER -->
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="<?php echo base_url();?>/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url();?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url();?>/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->

        <script src="<?php echo base_url();?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>

        <!-- chart script for company profile page -->
        <script src="<?php echo base_url();?>/assets/js/chart.js/dist/Chart.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/angular-chart.min.js"></script>

        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url();?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url();?>/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url();?>/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url();?>/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url();?>/assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>

        <!-- color picker for project tags -->
        <script src="<?php echo base_url();?>/assets/js/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/js/bootstrap-colorpicker-plus.js" type="text/javascript"></script>
             <script type="text/javascript" src="<?php echo base_url();?>assets/global/scripts/highcharts.js?version=1"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/global/scripts/data.js?version=1"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/global/scripts/drilldown.js?version=1"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/global/scripts/exporting.js?version=1"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/global/scripts/export-csv.js?version=1"></script>


        <!-- END THEME LAYOUT SCRIPTS -->
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnoKQCm6XXmbAOh09XoD-m1laKE7Ce5Io&callback=initMap" type="text/javascript"></script>
         <script type="text/javascript">

/*            $("#aaaaaa").click(function(event){
                alert('ddd');
                $("#open-profile").show();
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: $("#open-profile").offset().top - 0 //scrollTop: '120px'
                }, 1000);
            });
*/

            // $("#hide-tab").click(function(){
            //     $("#open-profile").hide();
            // });

           
          $("#search-open").click(function() { 
            $(".search-form-modal").fadeIn("");
          });
          $("#cancel-button").click(function() { 
            $(".search-form-modal").fadeOut(""); 
          });
          $(".info-detail").click(function() { 
            $(".account-information").fadeIn("");
          });
          $("#closed").click(function() { 
            $(".account-information").fadeOut(""); 
          });
         $( "#refresh-page" ).click(function() {
            location.reload();
         });
         $( "#remove-main-box" ).click(function() {
            $("#first-category").fadeOut();
         });
        </script>

         <script type="text/javascript">

          $("#search-open2").click(function() { 
            $(".search-form-modal2").fadeIn("");
          });
            $("#cancel-button2").click(function() { 
            $(".search-form-modal2").fadeOut(""); 
          });
         $( "#refresh-page2" ).click(function() {
            location.reload();
         });
        </script>

         <script type="text/javascript">
          $("#color-open").click(function() { 
            $(".color-pallete").fadeIn("");
          });
          </script>

            <script>
    //         $(document).on('click', '#settingdiv li a', function (e) {
    //     e.preventDefault();
    //     var activeclass=$(this).attr('href');
    //     $('#tab_1_15').removeClass('active');
    //     $('#tab_1_16').removeClass('active');
    //     $('#tab_1_17').removeClass('active');
    //     $('#tab_1_18').removeClass('active');
    //     $(activeclass).addClass('active');
    //        console.log('ok',activeclass);
    // });
                $(function(){
                    var demo2 = $('#demo1');
                    var demo3 = $('#demo2');
                    demo2.colorpickerplus();
                    demo2.on('changeColor', function(e,color){
                        if(color==null) {
                          //when select transparent color
                          $('.color-fill-icon', $(this)).addClass('colorpicker-color');
                        } else {
                          $('.color-fill-icon', $(this)).removeClass('colorpicker-color');
                          $('.color-fill-icon', $(this)).css('background-color', color);
                          $('#tagColor').val(color);
                        }
                    });

                    demo3.colorpickerplus();
                    demo3.on('changeColor', function(e,color){
                        if(color==null) {
                          //when select transparent color
                          $('.color-fill-icon', $(this)).addClass('colorpicker-color');
                        } else {
                          $('.color-fill-icon', $(this)).removeClass('colorpicker-color');
                          $('.color-fill-icon', $(this)).css('background-color', color);
                          $('#EdittagColor').val(color);
                        }
                    });

                    $(document).on('click', 'ul.plans_ul li', function(event) {
                        
                        event.preventDefault();
                        var idd = $(this).attr('id');
                        $("#show-plan").html('');
                        $("#show-plan").html($("div[data-planid='pid_"+idd+"']").clone());
                        $("#minamodal").modal('show');
                        // show-plan
                    });

                 });
            </script>
    </body>

</html>