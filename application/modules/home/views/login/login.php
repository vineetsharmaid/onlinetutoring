    <div class="login-wrapper">
      <div class="bg-pic">
        <img src="<?=base_url()?>assets/img/bg/bg.jpg" data-src="<?=base_url()?>assets/img/bg/bg.jpg" data-src-retina="images/bg/bg.jpg" alt="" class="lazy">
        <div class="bg-caption pull-bottom sm-pull-bottom p-l-20 m-b-20">
          <h2 class="text-white normal">
            New to Rostrum? 
            <!-- Register as <a class="semi-bold" href="<?=base_url()?>student-register">Student</a> -->
          </h2>
          <h5 class="text-white">
            <!-- <span class="m-r-10 align-left">Or</span> -->
            <a class="register-here" href="<?=base_url()?>register">Register</a>
            <a class="register-here" href="<?=base_url()?>">Home</a>
          </h5>
        </div>
      </div>
      <!-- START Login Right Container-->
      <div class="login-container bg-white">
        <div class="p-l-40 m-l-10 p-r-40 m-r-10 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
        <a href="<?=base_url()?>">
          <img src="<?=base_url()?>assets/img/logo.png" alt="logo" data-src="<?=base_url()?>assets/img/logo.png" data-src-retina="<?=base_url()?>assets/img/logo_2x.png" width="210">
        </a>
          <h5 class="p-t-5">Sign into your Rostrum Account</h5>
          

          <!-- START Login Form -->
          <form id="form-login" class="p-t-15 auth-form" role="form" name="loginForm" ng-submit="submitForm()" novalidate ng-cloak ng-hide="forgetSection">
            <div class="col-sm-12 p-b-10 p-l-0 p-r-0">
              <div class="form-group form-group-default" ng-class="{has_errors:(loginForm.email.$dirty && loginForm.email.$error.required) || loginForm.email.$error.email}">
                <label>Login</label>
                <div class="controls">
                  <input type="text" ng-keyup="emailCheck()" ng-blur="emailCheck()" ng-model="User.email" name="email" placeholder="Email" class="form-control" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required>
                </div>
              </div>
              <span class="errors" ng-show="loginForm.email.$dirty && loginForm.email.$error.required">
              Please enter email</span>
              <span class="errors" ng-show="loginForm.email.$error.pattern">Please enter valid email</span>
              <span class="errors" ng-show="loginemailError && !loginForm.email.$error.required && !loginForm.email.$error.pattern" ng-bind="loginemailError"></span>
            </div>
            <div class="col-sm-12 p-b-10 p-l-0 p-r-0">
              <div class="form-group form-group-default" ng-class="{has_errors:(loginForm.password.$dirty && loginForm.password.$error.required) || loginForm.password.$error.password}">
                <label>Password</label>
                <div class="controls">
                  <input type="password" class="form-control" ng-model="User.password" name="password" placeholder="Credentials" required>
                </div>
              </div>
               <span class="errors" ng-show="loginForm.password.$dirty && loginForm.password.$error.required">
              Please enter password</span>
           </div>
            
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6  no-padding">
                <div class="checkbox ">
                  <input type="checkbox" ng-model="User.rememberMe" name="rememberMe" value="0" id="checkbox1">
                  <label for="checkbox1">Keep Me Signed in</label>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                <a href="#" class="text-info small" ng-click="forgetShow()">Forgot your Password?</a>
              </div>
            </div>
            
            <button class="btn btn-primary btn-cons m-t-10" type="submit" ng-disabled="loginForm.$invalid" >Sign in</button>
            <a class="btn btn-default btn-cons m-t-10" type="submit" href="<?=base_url()?>register">Sign up</a>
          </form>


           <!-- START Login Form -->
          <form id="form-forget" class="p-t-15 auth-form" role="form" name="forgetForm" ng-submit="forgetFormSubmit()" novalidate ng-cloak ng-show="forgetSection">
            <div class="col-sm-12 p-b-10 p-l-0 p-r-0">
              <div class="form-group form-group-default" ng-class="{has_errors:(forgetForm.email.$dirty && forgetForm.email.$error.required) || forgetForm.email.$error.email}">
                <label>Email</label>
                <div class="controls">
                  <input type="text" ng-keyup="emailCheck()" ng-blur="emailCheck()" ng-model="User.email" name="email" placeholder="Email" class="form-control" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required>
                </div>
              </div>
              
              <span class="errors" ng-show="forgetForm.email.$dirty && forgetForm.email.$error.required">
                Please enter email
              </span>
              
              <span class="errors" ng-show="forgetForm.email.$error.pattern">
                Please enter valid email
              </span>
              
              <span class="errors" ng-show="loginemailError && !forgetForm.email.$error.required && !forgetForm.email.$error.pattern" ng-bind="loginemailError">
              </span>
            </div>

            <div class="col-md-12 text-right">
              <a href="#" class="text-info small" ng-click="forgetShow()">Login</a>
            </div>
                        
            <button class="btn btn-primary btn-cons m-t-10" type="submit" ng-disabled="forgetForm.$invalid" >Send</button>
          </form>
          <!--END Login Form-->

          <!-- <div class="col-sm-12 no-padding m-t-20">
            <hr>
            <span class="align-center">OR</span>
            <h5>Connect Using</h5>
              <h5>
              <a class="social-login using-fb text-info" target=_blank" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
              <a class="social-login using-tw text-info" target=_blank" href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a>
              <a class="social-login using-lk text-info" target=_blank" href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
            </h5>
          </div> -->
        </div>
      </div>
      <!-- END Login Right Container-->
    </div>
