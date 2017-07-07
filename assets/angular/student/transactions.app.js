studentApp.controller('transactionCtrl',function($interval,$timeout, $http, $scope, $routeParams, $rootScope){

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

      $http.get( baseurl+'student/get_feed_details/'+$routeParams.feedId ).success( function(response) {

        // console.log(response);

        if ( response.status == 1 ) {
          $scope.Feed  = response.data;
          
          $timeout( function(){
            
            $scope.showLoader   = false;
          }, 500 );
        } else {
          
          $scope.Feed = {};
          alertify.error( 'Unable to fetch feed.' );
        }
      }).error( function(err) {

        console.log(err);
      });

    }

    $scope.feedDetails();

  } else {

    $scope.currentFeedType  = JSON.parse(localStorage.getItem("currentFeedType"));
    console.log('initial', $scope.currentFeedType);
    $rootScope.getFeeds = function(status) {
        
        status   = angular.isUndefined(status) ? 0 : status;
        $scope.showLoader       = true;
        
        localStorage.setItem("currentFeedType", JSON.stringify(status));
        
        $http.get( baseurl+'student/get_student_feed/'+status ).success( function( response ) {
        
        // console.log(response);

        if ( response.status == 1 ) {

          $scope.Feeds = response.data;
          $rootScope.totalItems = $scope.Feeds.length;
          $scope.changeResults(1);

          $timeout( function() {

            $scope.showLoader       = false;
            $scope.currentFeedType  = JSON.parse(localStorage.getItem("currentFeedType"));
          }, 500);
          // console.log('Feeds => ', $scope.Feeds);
        } else {

          $scope.Feeds = {};
          alertify.error( 'Unable to fetch feeds.' );
        }

      }).error( function(err) {

        console.log(err);
      });


    }

  }


});
