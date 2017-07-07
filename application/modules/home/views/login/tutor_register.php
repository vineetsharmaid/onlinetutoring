<div class="login-wrapper" id="register-page">
  <div class="bg-pic">
    <img src="<?=base_url()?>assets/img/bg/bg6-1.jpg" alt="" class="lazy">
    <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
      <h2 class="semi-bold text-white">
      Already have an account?</h2>
      <h5><a class="login-here" href="<?=base_url()?>login">Login Now</a></h5>
    </div>
  </div>

  <!-- START Login Right Container-->
  <div class="login-container bg-white">
    <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 p-b-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
      <div class="col-sm-12 col-sm-height col-middle">
        <a href="<?=base_url()?>"><img src="<?=base_url()?>assets/img/logo.png" alt="logo" data-src="<?=base_url()?>assets/img/logo.png" data-src-retina="<?=base_url()?>assets/img/logo_2x.png" width="210"></a>
        <h3 class="m-t-30">Connect with students looking for One-to-One instructions</h3>
        <p>Easily find students looking for help in your subjects.</p>
        <form id="form-register2" class="p-t-15" role="form" action="index.html">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group form-group-default">
                <label>First Name</label>
                <input type="text" name="fname" placeholder="John" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group form-group-default">
                <label>Last Names</label>
                <input type="text" name="lname" placeholder="Doe" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group form-group-default">
                <label>Email</label>
                <input type="email" name="email" placeholder="We will send loging details to this address" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group form-group-default">
                <label>Create Password</label>
                <input type="password" name="pass" placeholder="Minimum 6 Charactors" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group form-group-default">
                <label>Confirm Password</label>
                <input type="password" name="r-pass" placeholder="Retype your Password" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group form-group-default">
                <label>City/Town</label>
                <input type="email" name="email" placeholder="Ex: Chandigarh, India " class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group form-group-default">
                <label>Mobile Phone</label>
                <input type="email" name="email" placeholder="123-4567-890" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row m-t-10">
            <div class="col-md-6">
              <div class="checkbox ">
                <input type="checkbox" value="1" id="checkbox1">
                <label for="checkbox1">I agree to the <a href="#" class="text-info small">Terms</a> and <a href="#" class="text-info small">Privacy Policy</a>.</label>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-cons m-t-10" type="submit">Create a new account</button>
        </form>
        <!-- Sign Up with Facebook -->
        <div class="col-sm-12 no-padding m-t-20">
          <hr>
          <span class="align-center">OR</span>
          <h5>Connect Using</h5>
          <h5>
          <a class="social-login using-fb text-info" target=_blank" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
          <a class="social-login using-tw text-info" target=_blank" href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a>
          <a class="social-login using-lk text-info" target=_blank" href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
          </h5>
        </div>
      </div>
    </div>
  </div>
</div>