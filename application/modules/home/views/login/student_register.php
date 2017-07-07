<div class="login-wrapper" id="register-page">
  <div class="bg-pic">
    <img src="<?=base_url()?>assets/img/bg/bg6-2.jpg" alt="" class="lazy">
    <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
      <h2 class="semi-bold text-white">
      Already have an account?
      </h2>
      <h5>
        <a class="login-here" href="<?=base_url()?>login">Login Now</a>
        <a class="login-here" href="<?=base_url()?>">Home</a>
      </h5>
    </div>
  </div>
  <!-- START Login Right Container-->
  <div class="login-container bg-white">
    <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-10 p-b-50 m-t-10 sm-p-l-15 sm-p-r-15 sm-p-t-40">
      <div class="col-lg-12 col-middle">
        <a href="<?=base_url()?>">
          <img src="<?=base_url()?>assets/img/logo.png" alt="logo" data-src="<?=base_url()?>assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="210">
        </a>
        <h3 class="m-t-30">Register today!</h3>
        <p>Sign up for free access to tutor profiles and academic resources.</p>
        
        <form id="student-register" class="p-t-15 auth-form" name="studentRegisterForm" ng-submit="registerStudent()" novalidate ng-cloak >
          
          <div class="row">
            <div class="col-sm-12 p-b-10">
              
              <div class="form-group form-group-default container-btn-radio" ng-class="{has_errors:studentRegisterForm.role.$dirty && studentRegisterForm.role.$error.required}">
                <label for="sel1">Register As</label>
                <div data-toggle="buttons" class="col-sm-6 student">
                  <label class="btn btn-default label-btn-radio" ng-click="setRegisterRole(1)">
                    <input type="radio" ng-model="User.role" value="1" name="role"> Student
                  </label>
                </div>
                <div data-toggle="buttons" class="col-sm-6">
                  <label class="btn btn-default label-btn-radio" ng-click="setRegisterRole(2)">
                    <input type="radio" ng-model="User.role" value="2" name="role"> Tutor
                  </label>
                </div>
                <span class="errors" ng-show="studentRegisterForm.role.$dirty && studentRegisterForm.role.$error.required">This field is required</span>
                
                <!-- <select class="form-control" ng-model="User.role" name="role" required>
                  <option value="">Select One</option>
                  <option value="1">Student</option>
                  <option value="2">Tutor</option>
                </select>
                <span class="errors" ng-show="studentRegisterForm.role.$dirty && studentRegisterForm.role.$error.required">This field is required</span> -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 p-b-10">
              <div class="form-group form-group-default" ng-class="{has_errors:studentRegisterForm.firstname.$dirty && studentRegisterForm.firstname.$error.required}">
                <label>First Name</label>
                <input type="text" ng-model="User.firstname" name="firstname" placeholder="John" class="form-control" required>
              </div>
              <span class="errors" ng-show="studentRegisterForm.firstname.$dirty && studentRegisterForm.firstname.$error.required">First Name is required</span>
            </div>
            <div class="col-sm-6 p-b-10">
              <div class="form-group form-group-default" ng-class="{has_errors:studentRegisterForm.lastname.$dirty && studentRegisterForm.lastname.$error.required}">
                <label>Last Name</label>
                <input type="text" ng-model="User.lastname" name="lastname" placeholder="Doe" class="form-control" required>
              </div>
              <span class="errors" ng-show="studentRegisterForm.lastname.$dirty && studentRegisterForm.lastname.$error.required">Last Name is required</span>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 p-b-10">
              <div class="form-group form-group-default" ng-class="{has_errors:(studentRegisterForm.email.$dirty && studentRegisterForm.email.$error.required) || studentRegisterForm.email.$error.email || hideSubmit}">
                <label>Email</label>
                <input type="email" ng-keyup="emailCheck()" ng-blur="emailCheck()" ng-model="User.email" name="email" placeholder="We will send loging details to this address" class="form-control" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required>
              </div>
              <span class="errors" ng-show="studentRegisterForm.email.$dirty && studentRegisterForm.email.$error.required">Email is required</span>
              <span class="errors" ng-show="studentRegisterForm.email.$error.pattern">Please enter valid email</span>
              <span class="errors" ng-show="emailError && !studentRegisterForm.email.$error.required && hideSubmit">{{emailError}}</span>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-12 p-b-10">
              <div class="form-group form-group-default" ng-class="{has_errors:studentRegisterForm.password.$dirty && studentRegisterForm.password.$error.required}">
                <label>Create Password</label>
                <input type="password" id="password" ng-model="User.password" name="password" placeholder="Minimum 6 Charactors" class="form-control" required>
              </div>
              <span class="errors" ng-show="studentRegisterForm.password.$dirty && studentRegisterForm.password.$error.required">Password is required</span>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-12 p-b-10">
              <div class="form-group form-group-default" ng-class="{has_errors:studentRegisterForm.confirmPassword.$dirty && studentRegisterForm.confirmPassword.$error.required}">
                <label>Confirm Password</label>
                <input type="password"  ng-model="User.confirmPassword" name="confirmPassword" pw-check="password" placeholder="Retype your Password" class="form-control" required>
              </div>
              <span class="errors" ng-show="studentRegisterForm.confirmPassword.$dirty && studentRegisterForm.confirmPassword.$error.required">Confirm Password is required</span>
              <span class="errors" ng-if="User.password != User.confirmPassword && studentRegisterForm.confirmPassword.$dirty && !studentRegisterForm.confirmPassword.$error.required">Password does not match</span>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 p-b-10">
              <div class="form-group form-group-default" ng-class="{has_errors:studentRegisterForm.phone.$dirty && studentRegisterForm.phone.$error.required}">
                <label>Mobile Phone</label>
                <input type="tel" ng-model="User.phone" name="phone" placeholder="123-4567-890" class="form-control" required>
              </div>
              <span class="errors" ng-show="studentRegisterForm.phone.$dirty && studentRegisterForm.phone.$error.required">Phone is required</span>
            </div>
            <div class="col-sm-6 p-b-10" ng-init="getCountries()">
              <div class="form-group form-group-default srch-drpdwn" ng-class="{has_errors:studentRegisterForm.country.$dirty && studentRegisterForm.country.$error.required}">
                <label>Country</label>
                <select name="country" class="form-control" ng-model="User.country" ng-options="country.name for country in Countries" ng-change="getStates(User.country)" required>
                </select>
                <!-- <input placeholder="Search and Select a Country" class="form-control" type="text" name="country" ng-model="User.country" uib-typeahead="country as (country.name) for country in Countries | filter:$viewValue | limitTo:8" ng-blur="getStates(User.country)" required> -->
              </div>
              <span class="errors" ng-show="studentRegisterForm.country.$dirty && studentRegisterForm.country.$error.required">Country is required</span>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 p-b-10">
              <div class="form-group form-group-default srch-drpdwn" ng-class="{has_errors:studentRegisterForm.state.$dirty && studentRegisterForm.state.$error.required}">
                <label>State</label>
                <select name="state" class="form-control" ng-model="User.state" ng-options="state.name for state in States" ng-change="getCities(User.state)" required>
                </select>
                <!-- <input placeholder="Search and Select a State" class="form-control" type="text" name="state" ng-model="User.state" uib-typeahead="state as (state.name) for state in States | filter:$viewValue | limitTo:8" ng-blur="getCities(User.state)" required> -->
              </div>
              <span class="errors" ng-show="studentRegisterForm.state.$dirty && studentRegisterForm.state.$error.required">State is required</span>
            </div>
            <div class="col-sm-6 p-b-10">
              <div class="form-group form-group-default srch-drpdwn" ng-class="{has_errors:studentRegisterForm.city.$dirty && studentRegisterForm.city.$error.required}">
                <label>City</label>
                <select name="city" class="form-control" ng-model="User.city" ng-options="city.name for city in Cities" required>
                </select>
                <!-- <input placeholder="Search and Select a City" class="form-control" type="text" name="city" ng-model="User.city" uib-typeahead="city as (city.name) for city in Cities | filter:$viewValue | limitTo:8" required> -->
              </div>
              <span class="errors" ng-show="studentRegisterForm.city.$dirty && studentRegisterForm.city.$error.required">City is required</span>
            </div>
          </div>

          <p ng-show="!allowRegister">
            <span class="errors">Please choose {{errorField1}} {{errorField2}} {{errorField3}} from the list.</span>
          </p>

          <div class="row m-t-10">
            <div class="col-md-6">
              <div class="checkbox">
                <input type="checkbox" value="1" ng-model="User.terms" name="terms" id="checkbox1" required>
                <label for="checkbox1">I agree to the <a href="#" class="text-info small">Terms</a> and <a href="#" class="text-info small">Privacy Policy</a>.</label>
                <span class="errors" ng-show="studentRegisterForm.terms.$dirty && studentRegisterForm.terms.$error.required">This field is required</span>
              </div>
            </div>
          </div>
          
          <button class="btn btn-primary btn-cons m-t-10" type="submit"  ng-disabled="studentRegisterForm.$invalid || hideSubmit">  Create a new account
          </button>
        </form>
        <!-- Sign Up with Facebook -->
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
  </div>
</div>