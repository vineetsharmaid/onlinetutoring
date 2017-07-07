  <footer ng-controller="footercontrollerforanalytics" >

        <div class="footer-widget" ng-init="loadFootermenus()">
            <div class="container">
                <div class="row">
                <div class="col-lg-3 col-sm-4 text-left">
                    <div class="widget-box">
                    <h4>Company Info</h4>

                    <ul>
                        <li ng-repeat="fmenu in allfootermenus" ng-if="fmenu.category =='company_info'"><a href="<?php echo base_url(); ?>pages/{{fmenu.url}}" ng-cloak>{{fmenu.name}}</a></li>
                        <!-- <li><a href="#">Press</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Private Policy</a></li>
                        <li><a href="#">Trust &amp; Safety</a></li> -->
                    </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 text-left">
                    <div class="widget-box">
                    <h4>Connect With Us</h4>
                    <ul>
                     <li ng-repeat="fmenu in allfootermenus" ng-if="fmenu.category == 'connect_with_us'"><a href="<?php echo base_url(); ?>pages/{{fmenu.url}}" ng-cloak>{{fmenu.name}}</a></li>
                        <!-- <li><a href="#">Connect your business</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Support</a></li> -->
                    </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4 text-right" ng-init="GetFooterAddress()">
                    <!-- <div class="widget-box">
                    <h4>Tiluto</h4>
                        <p>ABC Street</p>
                        <p>Wonderland, XYZ 12345</p>
                        <p>Stockholm</p>
                        <p><a href="#">info@yoursite.com</a></p>
                        <p><a href="#">1(234) 567 890</a></p>
                    </div> -->
                    
                    <div ng-bind-html="footeraddress"></div>
                </div>
                </div>
            </div>
        </div>
        <div class="copyright row">
            <div class="container">
                <div class="col-lg-12">
                    <h3 class="section-heading">Follow us</h3>
                    <div class="social-links" ng-init="getFooterSocial()">
                        <a href="{{soc.url}}" ng-repeat="soc in socialicon"><i class="{{soc.icon}} fa-3x wow bounceIn"></i></a>
                       <!--  <a href="#"><i class="fa fa-google-plus fa-3x wow bounceIn"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-3x wow bounceIn"></i></a>
                        <a href="#"><i class="fa fa-youtube-play fa-3x wow bounceIn"></i></a>
                        <a href="#"><i class="fa fa-linkedin fa-3x wow bounceIn"></i></a> -->
                    </div>
                </div>
            <p>&copy; 2016. All Rights Reserved</p>
            </div>

    </footer>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url();?>/assets/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/jquery.fittext.js"></script>
    <script src="<?php echo base_url();?>/assets/js/wow.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/creative.js"></script>
    <script src="//code.jquery.com/jquery-2.2.1.min.js"></script> 
    

    <!-- Custom JavaScript -->
    <script type="text/javascript">
        function fileUpForm4(file) {
            console.log('file', file)
            document.getElementById("uploadFile").value = file.value;
        }

        document.getElementById("uploadBtn").onchange = function () {
            alert("uploadFile")
            document.getElementById("uploadFile").value = this.value;
        };
        $('.filter a').click(function(e) {
          e.preventDefault();
          var a = $(this).attr('href');
          a = a.substr(1);
          $('.gallery a').each(function() {
            if (!$(this).hasClass(a) && a != 'all')
              $(this).addClass('hide');
            else
              $(this).removeClass('hide');
          });

        });
    </script>
    <script type="text/javascript">
        $('#myModal').on('shown.bs.modal', function () {
        $('#myModal').modal('show')
        })
    </script>

<!--      <script src="<?php echo base_url();?>/assets/js/jquery.js"></script>

    Bootstrap Core JavaScript
    <script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script> -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
    <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
    <script>
      $(function() {

        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
        var delay = 0;
        var offset = 300;

        document.addEventListener('invalid', function(e){
           $(e.target).addClass("invalid");
           $('html, body').animate({scrollTop: $($(".invalid")[0]).offset().top - offset }, delay);
        }, true);
        document.addEventListener('change', function(e){
           $(e.target).removeClass("invalid")
        }, true);

      });
    </script>

<!--     <script type="text/javascript">
        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("uploadFile").value = this.value;
        };
    </script> -->
<script>

  // $.validate({
  //   modules : 'location, date, security, file',
  //   onModulesLoaded : function() {
  //   //  $('#country').suggestCountry();
  //   }
  // });

  // Restrict presentation length
  //$('#presentation').restrictLength( $('#pres-max-length') );

</script>
</body>

</html>