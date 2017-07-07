/************************************
*
*   Controller Name: feedCtrl
*
*   Used to show feed on tutor dashboard and other functionalities on job feed
*
*
*************************************/



tutorApp.controller('feedCtrl',function($interval,$timeout, $http, $scope, $rootScope, $log, $routeParams, $location){


    /* Redirect to complete profile if tutor is not approved by admin */

    $scope.checkUserStatus = function(){
      $http.get( baseurl+'tutor/check_user_status' ).success( function(status) { 
        if ( status == 1 ) {
          
          // console.log('do nothing');
        } else {

          // console.log('redirect');
          $location.path( "/profile" );
        }
      }).error( function(err) {

      });
    }

    $scope.checkUserStatus();

    $scope.marginTopClass = 'm-t-50';
    $scope.showLoader     = true;

    
    /* Starts Pagination Setup */

    $scope.filteredFeeds  = [];
    $scope.currentPage    = 1;
    $scope.itemsPerPage   = 5;
    
    $scope.changeResults = function(pageNo) {
      
        var begin = ((pageNo - 1) * $scope.itemsPerPage);
        var end   = begin + $scope.itemsPerPage;
        $scope.filteredFeeds = $scope.Feeds.slice(begin, end);
    };
    
    $scope.pageChanged = function(pageNo) {
      $scope.changeResults(pageNo);
    };

    /* Ends Pagination Setup */


    if($routeParams.feedId) {
      
      /* Loads feed detail */
      $scope.feedDetails = function() { 

          $http.get( baseurl+'tutor/get_feed_details/'+$routeParams.feedId ).success( function(response) {

					$scope.feedFitlerParams = JSON.parse(localStorage.getItem("feedFitlerParams"));
          
          if ( response.status == 1 ) {
            $scope.Feed  = response.data;
            
            $timeout( function(){
              
              $scope.showLoader   = false;
            }, 500 );
          } else {
            
            $scope.Feeds = {};
            alertify.error( 'Unable to fetch feed.' );
          }
        }).error( function(err) {

          console.log(err);
        });

      }

      $scope.feedDetails();

    } else {
      
      $scope.savedData      = JSON.parse(localStorage.getItem("feedFitlerParams"));
      $scope.feedFilter = {}

        $scope.getCountries = function() {
            $http.get( baseurl+'tutor/get_countries' ).success( function(response) { 
              
              // console.log('country response', response);

              if ( response.status == 1 ) {
                
                $scope.Countries = response.data;

                // set default to united kingdom
                $scope.feedFilter.country     = $scope.Countries[229];
                $scope.feedFilter.phonecode   = $scope.Countries[229];
                $scope.getStates($scope.Countries[229]);
              } else {

                console.log(response);
              }
            }).error( function(err) {

            });
  
        }


        $scope.getStates = function( country ) {

          // console.log('country_id', country.country_id)

          if( !angular.isUndefined(country.country_id) ) {

            $http.get( baseurl+'tutor/get_states/'+country.country_id ).success( function( response ) {

              // console.log('states response', response);
              if ( response.status == 1 ) {
                
                $scope.States = response.data;
                $scope.getCities($scope.States[0]);
                $scope.feedFilter.state   = $scope.States[0];
              } else {

                console.log(response);
              }
            }).error( function(err) {

            });
          }
        }


        $scope.getCities = function( state ) {

          // console.log('state', state.state_id)

          if( !angular.isUndefined(state.state_id) ) {

            $http.get( baseurl+'tutor/get_cities/'+state.state_id ).success( function( response ) {

              // console.log('cities response', response);
              if ( response.status == 1 ) {
                
                $scope.Cities = response.data;
                $scope.feedFilter.city   = $scope.Cities[0];
              } else {

                console.log(response);
              }
            }).error( function(err) {

            });
          }
        }

        
        $scope.getFeed = function(tMethodID, country, state, city, status) {
            // console.log('filter tMethodID', tMethodID);
            // console.log('filter country', country);
            // console.log('filter state', state);
            // console.log('filter city', city);
            // console.log('filter status', status);
            // console.log('savedData.status', $scope.savedData['status']);

            // var groupId   = angular.isUndefined(groupId)    ? '' : groupId;
            // var subjectId = angular.isUndefined(subjectId)  ? '' : subjectId;
            
            var tMethodID   = angular.isUndefined(tMethodID)    ? '' : tMethodID;
            var country     = angular.isUndefined(country)      ? '' : country;
            var state       = angular.isUndefined(state)        ? '' : state;
            var city        = angular.isUndefined(city)         ? '' : city;
            var status      = angular.isUndefined(status)       ? '' : status;
            
            // var postCode  = angular.isUndefined(postCode)   ? '' : postCode;
            $scope.partialLoader = true;

            var feedFitlerParams =  { 'tMethodID':  tMethodID,
                                      'country':    country, 
                                      'state':      state, 
                                      'city':       city, 
                                      'status':     status, 
                                    }
            
            localStorage.setItem("feedFitlerParams", JSON.stringify(feedFitlerParams));

            console.log('feedFitlerParams', feedFitlerParams);

            /* Loads feed list */
            $http.post( baseurl+'tutor/get_tutor_feed', feedFitlerParams ).success( function(response) {

              if ( response.status == 1 ) {
                
                $scope.Feeds          = response.data;
                $rootScope.totalItems = $scope.Feeds.length;

                // console.log($scope.Feeds);

                $timeout( function(){
                  
                  $scope.changeResults(1);
        		      $scope.savedData      = JSON.parse(localStorage.getItem("feedFitlerParams"));
                  $scope.showLoader     = false;
                  $scope.partialLoader  = false;
                  
                }, 500 );
              } else {
                
                $scope.Feed = {};
                alertify.error( 'Unable to fetch feeds.' );
              }
            }).error( function(err) {

              console.log(err);
            });

        }

        $scope.cityFilter = function(tMethodID) {

          if ( tMethodID == 2 ) {
            $scope.showCity = true;
          } else {
            
            $scope.showCity = false;
          }
        }

        /* fetch groups of subject  */
        $scope.getGroups  = function(groupId) {

          $http.get( baseurl+'tutor/get_subject_groups' ).success( function( response ) {

            $scope.Groups   = response;
            // console.log('Groups => ', $scope.Groups);
          }).error( function(err) {

            console.log(err);
          });

        }


        $scope.getSubjects = function(groupId) {

          var group   = angular.isUndefined(groupId) ? '' : '/'+groupId;

          /* fetch subjects based on group id  */
          $http.get( baseurl+'tutor/get_subjects'+group ).success( function( response ) {
            
            $scope.Subjects = response;
            $scope.Subject  = {};

            // console.log('Subjects => ', $scope.Subjects);
          }).error( function(err) {

            console.log(err);
          });

        }

        $scope.getFeedsByGroup = function(groupId) {

          // update subjects list
          $scope.getSubjects(groupId);
          $scope.getFeed(groupId);
        }

        $scope.getFeedsBySubject = function(groupId, subjectId) {

          $scope.getFeed(groupId, subjectId);
        }

        $scope.getFeedsByTutionMethod = function(tMethodID, status) {

          $scope.getFeed(tMethodID, status);
        }

    }

    $scope.applyJob = function(tutionId) {

      $http.post( baseurl+'tutor/apply_job', tutionId ).success( function(response) {

        console.log(response);
        alertify.dismissAll();
        if ( response.status == 1 ) {
          $scope.feedDetails();
          alertify.success( response.data );
        } else {

          alertify.error( response.data );
        }
      }).error( function(err) { 

        console.log(err);
      });
    }

    $scope.respondToRequest = function( tutionId, status ) {

      alertify.confirm("Are you sure you want to do this ?",
      function(){
        
        var postData = {'tution_id': tutionId, 'status': status};
        
        $http.post( baseurl+'tutor/respond_to_request', postData ).success( function(response) {

          alertify.dismissAll();
          if ( response.status == 1 ) {
            $scope.feedDetails();
            alertify.success( response.data );
          } else {

            alertify.error( response.data );
          }
        }).error( function(err) { 

          console.log(err);
        });
      },
      function(){
        alertify.error('Cancel');
      }).setHeader('<b> Confirm </b> ');
      
    }

       /* Notifications */
        $scope.totalNotification = function(){

          $http.get( baseurl+'tutor/get_total_notification_count/' ).success( function(response) {

            $scope.notificationsdata = response.result;
            $scope.notificationscount = response.count;
            if($scope.notificationscount > 0){
                $scope.notification_count = 1;
            }else{
                $scope.notification_count = 0;
            }  
             

          }).error(function(err) {
            
            console.log(err);
          });

      }
      $scope.totalClassNotification = function(){

          $http.get( baseurl+'tutor/get_total_class_notification_count/' ).success( function(response) {

            $scope.classnotificationsdata = response.result;
            $scope.classnotificationscount = response.count;
            if($scope.classnotificationscount > 0){
                $scope.class_notification_count = 1;
            }else{
                $scope.class_notification_count = 0;
            }  
             

          }).error(function(err) {
            
            console.log(err);
          });

      }

      $scope.clearnotification = function(notification_type){

          $http.post( baseurl+'tutor/clear_notification',{notification_type:notification_type}).success( function(response) {
              if(notification_type == 'assigned_tutor'){
                $location.path( '/' );
              }else{
                $location.path( '/schedule' ); 
              }
            $timeout(function(){
              $scope.totalNotification();
              $scope.totalClassNotification(); 
            }, 500);  

          }).error(function(err) {
            
            console.log(err);
          });
      }   


      $scope.totalNotification();
      $scope.totalClassNotification();

      $interval(function(){
          $scope.totalNotification();
          $scope.totalClassNotification(); 
      }, 5000); 


});
