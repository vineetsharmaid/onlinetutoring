
<!-- Footer -->
<footer data-bg-img="<?=base_url()?>assets/img/bg/bg-1.jpg" class="footer divider layer-overlay overlay-dark-9" id="footer" style="background-image: url(&quot;images/bg/bg-1.jpg&quot;);">
<div class="container">
  <div class="row border-bottom">
    <div class="col-sm-6 col-md-3">
      <div class="widget dark">
        <img src="<?=base_url()?>assets/img/logo.png" alt="" class="mt-5 mb-20">
        <p>Lorem lpsum 202,xyz</p>
        <ul class="list-inline mt-5">
          <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-color-2 mr-5"></i> <a href="#" class="text-gray">1(234) 567 8901</a> </li>
          <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-color-2 mr-5"></i> <a href="#" class="text-gray">info@yoursite.com</a> </li>
          <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-color-2 mr-5"></i> <a href="#" class="text-gray">www.yourdomain.com</a> </li>
        </ul>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="widget dark mt-30">
        <h4 class="widget-title">Useful Links</h4>
        <ul class="list angle-double-right list-border">
          <li><a href="about-us.html">About Us</a></li>
          <li><a href="how-it-work.html">How it works</a></li>
          <li><a href="contact-us.html">Contact us</a></li>
        </ul>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="widget dark mt-30">
        <h5 class="widget-title mb-10">Connect With Us</h5>
        <ul class="styled-icons icon-bordered icon-sm">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-skype"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        </ul>
      </div>
    </div>
    
    <div class="col-sm-6 col-md-3">
      <div class="widget dark mt-30">
        <h5 class="widget-title mb-10">Subscribe Us</h5>
        <!-- Mailchimp Subscription Form Starts Here -->
        <form class="newsletter-form"  method="post" name="SubscribeForm" id="subscribe_form">
          <div class="input-group">
            <input type="email" id="email" data-height="40px" class="form-control input-lg font-14" placeholder="Your Email"  name="email"  value="" style="height: 40px;" required>
            <span class="input-group-btn">
              <button  type="submit" class="btn bg-theme-color-2 text-white btn-xs m-0 font-14" data-height="40px" style="height: 40px; background:#00aad6;">Subscribe</button>
            </span>
          </div>
        </form>
        <script type="text/javascript">
        var url = '<?=base_url()?>home/get_subscribe_newsletter'
        $('#subscribe_form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
              type:"POST",
              url: url,
              data: $('#subscribe_form').serialize(),
              success:function(response){
                  alertify.success(response);
                  console.log('Response ==> ',response);
              },error:function(err){
                  console.log('Error Loading Data',err);
              }
            });
        });
        </script>
        <!-- Mailchimp Subscription Form Validation-->
<!--         <script type="text/javascript">
        $('#mailchimp-subscription-form-footer').ajaxChimp({
        callback: mailChimpCallBack,
        url: '//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;amp;id=49d6d30e1e'
        });
        function mailChimpCallBack(resp) {
        // Hide any previous response text
        var $mailchimpform = $('#mailchimp-subscription-form-footer'),
        $response = '';
        $mailchimpform.children(".alert").remove();
        if (resp.result === 'success') {
        $response = '&lt;div class="alert alert-success"&gt;&lt;button type="button" class="close" data-dismiss="alert" aria-label="Close"&gt;&lt;span aria-hidden="true"&gt;&amp;times;&lt;/span&gt;&lt;/button&gt;' + resp.msg + '&lt;/div&gt;';
        } else if (resp.result === 'error') {
        $response = '&lt;div class="alert alert-danger"&gt;&lt;button type="button" class="close" data-dismiss="alert" aria-label="Close"&gt;&lt;span aria-hidden="true"&gt;&amp;times;&lt;/span&gt;&lt;/button&gt;' + resp.msg + '&lt;/div&gt;';
        }
        $mailchimpform.prepend($response);
        }
        </script> -->
        <!-- Mailchimp Subscription Form Ends Here -->
      </div>
    </div>
  </div>
</div>
<div class="footer-bottom bg-black-333">
  <div class="container pt-20 pb-20">
    <div class="row">
      <div class="col-md-6">
        <p class="font-11 text-black-777 m-0">Copyright &copy;2016. All Rights Reserved</p>
      </div>
      <div class="col-md-6 text-right">
        <div class="widget no-border m-0">
          <ul class="list-inline sm-text-center mt-5 font-12">
            <li>
              <a href="#">FAQ</a>
            </li>
            <li>|</li>
            <li>
              <a href="#">Help Desk</a>
            </li>
            <li>|</li>
            <li>
              <a href="#">Support</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->
<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="<?=base_url()?>assets/js/custom.js"></script>
<script src="<?=base_url()?>assets/js/ion.rangeSlider.js"></script>
<script src="<?=base_url()?>assets/js/alertify.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/moment-with-locales.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-datetimepicker.js"></script>
<script src="<?=base_url()?>assets/js/angular/angular.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/angular/angular-route.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/angular/ui-bootstrap-tpls-2.5.0.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/angular/home/home.app.js"></script>
<script src="<?=base_url()?>assets/angular/home/home.routes.js"></script>
<script src="<?=base_url()?>assets/js/myCustom.js"></script>
</body>
</html>