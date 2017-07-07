var homeApp = angular.module('homeApp', ['ngRoute', 'ui.bootstrap']);

	homeApp.controller('tutionsCtrl', function($interval,$timeout, $http, $scope, $rootScope, $routeParams) {

		$scope.Requirements = {};
		$scope.showLoader 	= true;

		/* Starts Pagination Setup */
    $scope.filteredTutors  = [];
    $scope.currentPage    = 1;
    $scope.itemsPerPage   = 5;

    $("body").removeClass("side-panel-open");
    
    $scope.changeResults = function(pageNo) {
      
        var begin = ((pageNo - 1) * $scope.itemsPerPage);
        var end   = begin + $scope.itemsPerPage;
        $scope.filteredTutors = $scope.Tutors.slice(begin, end);
    };
    
    $scope.pageChanged = function(pageNo) {
      $scope.changeResults(pageNo);
    };

    /* Ends Pagination Setup */

    $scope.getCountries = function() {
          $http.get( baseurl+'home/get_countries' ).success( function(response) { 
            
            console.log('country response', response);

            if ( response.status == 1 ) {
              
              $scope.Countries = response.data;

              // set default to united kingdom
          		$scope.Requirements.country 		= $scope.Countries[229];
          		$scope.Requirements.phonecode 	= $scope.Countries[229];
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
                $scope.Requirements.state   = $scope.States[0];
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
                $scope.Requirements.city   = $scope.Cities[0];
              } else {

                console.log(response);
              }
            }).error( function(err) {

            });
          }
        }


		if ( $routeParams.tutorId ) {

				$scope.specifiedTutor = $routeParams.tutorId;

				$http.get( baseurl+'home/get_tutor_details/'+$routeParams.tutorId ).success( function(response) {
					
					alertify.dismissAll();
					$scope.showLoader 	= false;

					if ( response.status == 1 ) {
						
						$scope.Tutor 					= response.data;
						$scope.selectedTutor 	= $scope.Tutor.firstname +' '+ $scope.Tutor.lastname;
						
						// console.log('Tutor =>', $scope.Tutor);
						
					} else {

						alertify.error( 'Unable to fetch list.' );
					}
				}).error(function(err) {
					
					console.log(err);
				});
		} else {

				$scope.specifiedTutor = {};
				$http.get( baseurl+'home/get_tutors_list' ).success( function(response) {
					
					alertify.dismissAll();			
					if ( response.status == 1 ) {
						
						$scope.Tutors = response.data;
						$rootScope.totalItems = $scope.Tutors.length;
						
						$timeout( function(){
                  
                  $scope.changeResults(1);
                  $scope.showLoader = false;
                }, 500 );

					} else {

						alertify.error( 'Unable to fetch list.' );
					}
				}).error(function(err) {
					
					console.log(err);
				});


		} // ends else

		

    /* fetch groups of subject  */
    $scope.getGroups  = function(groupId) {

      $http.get( baseurl+'home/get_subject_groups' ).success( function( response ) {
      	
        $scope.Groups   = response;
        

        console.log('Groups => ', $scope.Groups);
      }).error( function(err) {

        console.log(err);
      });

    }

    $scope.getTutors = function(groupId) {

      $http.get( baseurl+'home/get_tutors_list' ).success( function( response ) {

        $scope.Tutors           = response.data;
        console.log('Tutors => ', $scope.Tutors);
        
      }).error( function(err) {

        console.log(err);
      });

    }

    $scope.getSubjects = function(groupId) {

      /* fetch subjects based on group id  */
      $http.get( baseurl+'home/get_subjects/'+groupId ).success( function( response ) {
        
        $scope.Subjects = response;
        console.log('Subjects => ', $scope.Subjects);
      }).error( function(err) {

        console.log(err);
      });

    }
    
    $scope.getTutorsBySubject=function(){
   	
   		$scope.showLoader = true;
   		 
     $http.get( baseurl+'home/get_tutors_subjects/'+$scope.Subject.subject_id ).success( function( response ) {
        
        alertify.dismissAll();			
        console.log('Tutors by subject', response);

					if ( response.status == 1 ) {
						
						$scope.Tutors = response.data;
						$rootScope.totalItems = $scope.Tutors.length;
						
						$timeout( function(){
                  
                  $scope.changeResults(1);
                  $scope.showLoader = false;
                }, 500 );

					} else {

						alertify.error( 'Unable to fetch list.' );
					}
	
      }).error( function(err) {

        console.log(err);
      });



    }

    $scope.tst = function(dateTime){
    	console.log('day_and_time', dateTime);
    }


    $scope.saveRequirement = function(){

    	if( Object.keys($scope.specifiedTutor).length == 0 )
    	{
    		
    		$scope.Requirements.specific_tutor = '0';
    	} else {
    		
    		$scope.Requirements.specific_tutor = $scope.specifiedTutor;
    	}

      console.log('Requirements', $scope.Requirements);
      // return false;

      $http.post( baseurl+'home/save_requirement', $scope.Requirements ).success( function(response) {
      
        if ( response.status == '1' ) {

          $scope.Requirements = {};
          
          $timeout(function() {
			      $scope.addPostForm.$setPristine();
			      $scope.addPostForm.$setUntouched();
			      $scope.addPostForm.$submitted = false;
			    });

          $('#modalStudentpost').modal('hide');
      		alertify.alert(response.data, function() {
					  }).setHeader('<b> Congratulations </b> ');
        } else {
          
          alertify
					  .alert(response.data, function() {
					  }).setHeader('<b> Oops.. </b> ');
        }
        
      }).error( function(err) {

        console.log(err);
      } );
    }

		$timeout( function() {

			
        $('#datetimepicker1').datetimepicker({
        	format: 'MM-DD-YYYY hh:mm a'
        });
        $('#datetimepicker1').on('dp.change', function(e){ 
        	$('#day-and-time').change();
        });

      
		    $("#slider").slider({
		        range: "min",
		        animate: true,
		        value: 1,
		        min: 0,
		        max: 100,
		        step: 10,
		        slide: function (event, ui) {
		            update(1, ui.value); //changed
		        }
		    });

		    $("#slider2").slider({
		        start: [20, 80],
		        connect: true,
		        range: {
		        'min': 0,
		        'max': 100
		        }
		    });

		    //Added, set initial value.
		    $("#amount").val(0);
		    $("#amount-label").text(0);


		    update();
		    

		    //changed. now with parameter
		    function update(slider, val) {
		        //changed. Now, directly take value from ui.value. if not set (initial, will use current value.)
		        var $amount = slider == 1 ? val : $("#amount").val();

		        /* commented
		         $amount = $( "#slider" ).slider( "value" );
		         $duration = $( "#slider2" ).slider( "value" );
		         */

		        $("#amount").val($amount);
		        $("#amount-label").text($amount);

		        $('#slider a').html('<label>' + $amount + '</label><div class="ui-slider-label-inner"></div>');
		    }


			    var $range = $("#range1");
			    $range.ionRangeSlider({
			        type: "double",
			        min: 18,
			        max: 75,
			        from: 18,
			        to: 35
			    });

			    $range.on("change", function () {
			        var $this = $(this),
			            value = $this.prop("value").split(";");

			        console.log(value[0] + " - " + value[1]);
			    });

			    
			    var $range = $("#range");
			    $range.ionRangeSlider({
			        type: "double",
			        min: 10,
			        max: 250,
			        from: 10,
			        to: 100
			    });

			    $range.on("change", function () {
			        var $this = $(this),
			            value = $this.prop("value").split(";");

			        console.log(value[0] + " - " + value[1]);
			    });

			}, 500); 


	}); // ends tutionsCtrl
