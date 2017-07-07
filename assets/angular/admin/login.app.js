var login   = angular.module('loginApp', ['xeditable', 'ui.bootstrap'] );
      
      login.directive('pwCheck', [function () {
          return {
              require: 'ngModel',
              link: function (scope, elem, attrs, ctrl) {
                  var firstPassword = '#' + attrs.pwCheck;
                  elem.add(firstPassword).on('keyup', function () {
                      scope.$apply(function () {
                          // console.info(elem.val() === $(firstPassword).val());
                          ctrl.$setValidity('pwmatch', elem.val() === $(firstPassword).val());
                      });
                  });
              }
          }
      }]);
      

      login.controller('loginController',function($interval,$timeout, $http, $scope,$window){

        $scope.User = {};
        $scope.forgetSection  = false;
        $scope.showLoader     = false;
        $scope.allowRegister  = true;

        $scope.getCountries = function() {
          $http.get( baseurl+'home/get_countries' ).success( function(response) { 
            
            console.log('country response', response);

            if ( response.status == 1 ) {
              
              $scope.Countries = response.data;
              $scope.User.country     = $scope.Countries[229];
              $scope.getStates($scope.Countries[229]);
            } else {

              console.log(response);
            }
          }).error( function(err) {

          });
        
        }


        $scope.getStates = function( country ) {

          console.log('country_id', country.country_id)

          if( !angular.isUndefined(country.country_id) ) {

            $http.get( baseurl+'home/get_states/'+country.country_id ).success( function( response ) {

              console.log('states response', response);
              if ( response.status == 1 ) {
                
                $scope.States = response.data;
                $scope.getCities($scope.States[0]);
                $scope.User.state   = $scope.States[0];
              } else {

                console.log(response);
              }
            }).error( function(err) {

            });
          }
        }


        $scope.getCities = function( state ) {

          console.log('state', state.state_id)

          if( !angular.isUndefined(state.state_id) ) {

            $http.get( baseurl+'home/get_cities/'+state.state_id ).success( function( response ) {

              console.log('cities response', response);
              if ( response.status == 1 ) {
                
                $scope.Cities = response.data;
                $scope.User.city   = $scope.Cities[0];
              } else {

                console.log(response);
              }
            }).error( function(err) {

            });
          }
        }

        /* Login */
        $scope.submitForm = function(){
          
          $scope.showLoader     = true;
          $http.post( baseurl+'home/login', $scope.User ).success( function( response ) {
            
            // successfull login
            if ( response.status == 1 ) {
              
              // response( response );
              
              // redirect to specified location
              $window.open(response.redirect,'_blank');
              $timeout(function(){
              window.location.href = baseurl;
              },500);
            } else {

              $scope.showLoader     = false;
              alertify.dismissAll();
              alertify.error('Incorrect Password');
            }

          }).error( function( err ){
            
            $scope.showLoader     = false;
            console.log(err);
          });

        }

        $scope.forgetFormSubmit = function() {

          // shows loader
          $scope.showLoader = true;

          $http.post( baseurl+'home/forget_password', $scope.User ).success( function( response ) {

            console.log(response);
            $scope.forgetSection  = $scope.showLoader = false;
            
            alertify.dismissAll();
            
            if ( response.status == 1 ) {

              alertify.success( response.data );
            } else {
              
              alertify.error( response.data );
            }
            
          }).error(function( err ) {
            
            console.log(err);
            $scope.showLoader = false;
          });
        }


        $scope.setRegisterRole = function(selectedRole) {

          $scope.User.role = selectedRole;
        }


        /* Student registration */
        $scope.registerStudent = function(){

          console.log('country', $scope.User.country['country_id']);
          
          $scope.allowRegister = true;

          if( angular.isUndefined($scope.User.country['country_id']) ) {

            $scope.allowRegister       = false
            $scope.errorField1  = "Country";
          } else {
            
            $scope.errorField1  = null;
          }

          if( angular.isUndefined($scope.User.state['state_id']) ) {

            $scope.allowRegister       = false
            $scope.errorField2  = "State";
          } else {
            
            $scope.errorField2  = null;
          }

          if( angular.isUndefined($scope.User.city['city_id']) ) {

            $scope.allowRegister       = false
            $scope.errorField3  = "City";
          } else {
            
            $scope.errorField3  = null;
          }

          console.log('errorField1', $scope.errorField1);
          console.log('errorField2', $scope.errorField2);
          console.log('errorField3', $scope.errorField3);
          console.log('allowRegister', $scope.allowRegister);

          if ( $scope.allowRegister == true ) {

            $http.post( baseurl+'home/register', $scope.User ).success( function( response ) {

              if(response.status == 1){
                
                // redirect to specified location
                window.location.href = response.data;

              } else {
                
                alertify.error(response.data);
              }

            }).error( function( err ){
              
              console.log(err);
            });

          } else {

          }
          
        }

        // $scope.count = 0;
        // $scope.myFunc = function() {
        //   $scope.count++;
        // };

        $scope.emailCheck = function() {
          
          // console.log($scope);

          if ( angular.isDefined($scope.studentRegisterForm) ) 
          {
            var form = $scope.studentRegisterForm;
          }
          else if ( angular.isDefined($scope.forgetForm) ) {
            
            var form = $scope.forgetForm;
          }
          else
          {
            var form = $scope.loginForm;
          }

          // if email is valid
          if( form.email.$valid ) {
            
            $http.post( baseurl+'home/unique_email', {email: $scope.User.email} ).success( function( response ) {

              if ( response > 0 ) {

                // email used in register case
                $scope.emailError = 'Email already exist';
                $scope.hideSubmit = true;
                $scope.loginemailError = false;
              } else {
                
                // variable used in login case
                $scope.loginemailError = 'Email does not exist';
                $scope.hideSubmit = false;
              }
              
            }).error( function( err ){
              
            });
            
          } else { // when email is invalid
            
            $scope.loginemailError = false;
            $scope.hideSubmit = true;
          }


        }

        $scope.forgetShow = function() {

          $scope.forgetSection = !$scope.forgetSection;
        }
      
      });