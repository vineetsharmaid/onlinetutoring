var adminApp   = angular.module('adminApp', ['ngRoute', 'ui.bootstrap'] );
	
	adminApp.controller('dashboardCtrl', function($interval,$timeout, $http, $scope, $location){
			
			// shows loader each time controller is loaded 
			$scope.showLoader	= true;

			$location.path( '/tutors-request' );


			$scope.tableList = function(){
				$timeout(function(){
				$('#setDataTable').DataTable({
			        dom: 'Bfrtip',
			        "lengthMenu": [ 10, 25, 50, 75, 100 ],
			        buttons: [
						          {
						             extend: 'collection',
						             text: 'Export',
						             buttons: [ 'pdfHtml5', 'csvHtml5', 'copyHtml5', 'excelHtml5' ]
						          }
			       	]
			    } );
				}, 200);
			}

			$scope.totalNotification = function(){

				$http.get( baseurl+'admin/get_total_notification_count/' ).success( function(response) {

					console.log('Res ===>', response);

					$scope.notificationsdata = response.result;
					$scope.notificationscount = response.count;

				}).error(function(err) {
					
					console.log(err);
				});

			}

			$scope.clearnotification = function(notification_for,notification_type){

				$scope.notificationData = {};
				$scope.notificationData.user_type = notification_for;
				$scope.notificationData.notification_type = notification_type;

				$http.post( baseurl+'admin/clear_notification',$scope.notificationData ).success( function(response) {

					if(notification_for == 'student'){
						$location.path( '/students-list' );
					}else if(notification_for == 'tutor'){
						$location.path( '/tutors-request' );
					}else if(notification_for == 'admin' && notification_type == 'schedule_class'){
						$location.path( '/tutors-request' ); 	
					}else{
						$location.path( '/tution-requests' ); 
					}
					$timeout(function(){
						$scope.totalNotification();
					}, 500);	

				}).error(function(err) {
					
					console.log(err);
				});
			}		


			$scope.totalNotification();
			$interval(function(){
		          $scope.totalNotification();
		     }, 5000);		


	});
	

	

	/*
		Controller Name : studentCtrl

		Used in admin panel for handling students functionalities like 
		- listing of students

	*/



	adminApp.controller('studentCtrl', function($interval,$timeout, $http, $scope, $routeParams){
			
			// shows loader each time controller is loaded 
			$scope.showLoader	= true;

			$scope.tableList = function(){
				$timeout(function(){
				$('#setDataTable').DataTable({
			        dom: 'Bfrtip',
			        "lengthMenu": [ 10, 25, 50, 75, 100 ],
			        buttons: [
						          {
						             extend: 'collection',
						             text: 'Export',
						             buttons: [ 'pdfHtml5', 'csvHtml5', 'copyHtml5', 'excelHtml5' ]
						          }
			       	]
			    } );
				}, 200);
			}


			$http.get( baseurl+'admin/get_students_list' ).success( function(response) {

				// console.log( response );

				if ( response.status == 1 ) {

					$scope.Students = response.data;

					$timeout(function(){
						$scope.showLoader	= false;
					}, 200);

				} else {
					
					$scope.Students = {};
				}

			}).error( function(err) {

				console.log(err);
			});



			if($routeParams.studentId){
         
					$http.get( baseurl+'admin/get_student_details/'+$routeParams.studentId ).success( function(response) {


						if ( response.status == 1 ) {

							$scope.Student = response.data;
							
							console.log( $scope.Student );

							$timeout(function(){
								$scope.showLoader	= false;
							}, 500);
						} else {
							
							$scope.Student = {};
						}

					}).error( function(err) {

						console.log(err);
					});

			}


	});



	

	/*
		Controller Name : studentRequestsCtrl

		Used in admin panel for handling students request functionalities like 
		- handling requests by students

	*/




	adminApp.controller('studentRequestsCtrl', function($interval,$timeout, $http, $scope, $uibModal, $log, $document){
			
			// shows loader each time controller is loaded 
			$scope.noLeftPadding	= true;
			$scope.showLoader			= true;
			
			$scope.getRequestsCount = function(status) {

				$http.get( baseurl+'admin/get_requests_count/' ).success( function(response) {

					$scope.allReqCount = response.all;
					$scope.reqReqCount = response.requested;
					$scope.assReqCount = response.assigned;
					$scope.accReqCount = response.accepted;
					$scope.decReqCount = response.declined;
				}).error(function(err) {
					
					console.log(err);
				});
			}

			$scope.getRequests = function(status) {

				// alertify.dismissAll();
				$http.get( baseurl+'admin/get_requests_list/'+status ).success( function(response) {
					
					$scope.Requests = response.data;
					// variable to show highlighted tab dynamically
					$scope.showRequestType 	= status;
					$scope.showLoader				= false;


					// show first tution by default
					$scope.Tution 	= $scope.Requests[0];
					$scope.getRequest( $scope.Tution.tr_id );
				}).error(function(err) {
					
					$scope.Requests = {};
					alertify.error('Unable to fetch list.');
					console.log(err);
				});
			}

			$scope.getRequest = function(requestId) {

				// alertify.dismissAll();
				$http.get( baseurl+'admin/get_feed_details/'+requestId ).success( function(response) {
					
					$scope.Tution 	= response.data;
					$scope.singleTutionId = response.data.tr_id;
					
					if ( $scope.Tution.specific_tutor != null ) {

						$http.get( baseurl+'admin/get_tutor_details/'+$scope.Tution.specific_tutor ).success( function(response) {

							$scope.specifiedTutor = response.data;
							// console.log( $scope.specifiedTutor );
						}).error( function(err){

							$scope.specifiedTutor = {};
							console.log(err);
						});
					}

					if ( $scope.Tution.status == 1  ) {

						$http.get( baseurl+'admin/get_assigned_tutor/'+requestId ).success( function(response) {

							$scope.assignedTutor = response.data;

						}).error( function(err){

							$scope.assignedTutor = {};
							console.log(err);
						});
					} else {
						
						$scope.assignedTutor = {};
					}

				}).error(function(err) {
					
					$scope.Tution = {};
					alertify.error('Unable to fetch data.');
					console.log(err);
				});


				$http.get( baseurl+'admin/get_applied_tutors/'+requestId ).success( function(response) {
					
					$scope.appliedTutors = response.data;
					// console.log($scope.appliedTutors);
				}).error(function(err) {
					
					$scope.appliedTutors = {};
					alertify.error('Unable to fetch tutors list.');
					console.log(err);
				});

				$timeout( function(){

					$scope.showLoader = false;
				}, 500);

			}


			/* Modal settings */
			$scope.open = function (size, parentSelector, mytemplateUrl, scopeItem, submitUrl) {
		    var parentElem = parentSelector ? 
		      
		      angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
		    	
		    	var modalInstance = $uibModal.open({
			      ariaLabelledBy: 'modal-title',
			      ariaDescribedBy: 'modal-body',
			      templateUrl: mytemplateUrl,
			      controller: 'ModalInstanceCtrl',
			      scope: $scope,
			      size: size,
			      appendTo: parentElem,
			      resolve: {
			        
			      }
		    	});

		    	$scope.Tutor 			= scopeItem;
		    	$scope.submitUrl 	= submitUrl;

		    modalInstance.result.then(function () {
		      
		      $scope.showLoader = true;
		      $scope.Tution 		= {};

		      $timeout( function(){

			      $scope.getRequestsCount();
			      $scope.getRequests($scope.showRequestType);
			      $scope.showLoader = false;

			      // $scope.getRequest( $scope.tutionId );
		      }, 500);

		      // console.log('Ok here');
		    }, function () {
		      
		      $log.info('Modal dismissed');
		    });
		  };

	});




	

	/*
		Controller Name : rtutorCtrl

		Used in admin panel for handling tutors functionalities like 
		- lsiting of tutors

	*/





	adminApp.controller('rtutorCtrl', function($interval,$timeout, $http, $scope, $routeParams, $uibModal, $log){
		// shows loader each time controller is loaded 
		$scope.showLoader	= true;

		$scope.tableList = function(){
			$timeout(function(){
			$('#setDataTable').DataTable({
		        dom: 'Bfrtip',
		        "lengthMenu": [ 10, 25, 50, 75, 100 ],
		        buttons: [
					          {
					             extend: 'collection',
					             text: 'Export',
					             buttons: [ 'pdfHtml5', 'csvHtml5', 'copyHtml5', 'excelHtml5' ]
					          }
		       	]
		    } );
			}, 200);


			$http.get( baseurl+'admin/get_reqested_tutors' ).success( function(response) {

				if ( response.status == 1 ) {

					$scope.requestedTutors = response.data;
					
					$timeout(function(){
						$scope.showLoader	= false;
					}, 200);

				} else {
					
					$scope.requestedTutors = {};
				}

			}).error( function(err) {

				console.log(err);
			});

		}

		if($routeParams.tutorId){
         
			$http.get( baseurl+'admin/get_reqested_tutor_details/'+$routeParams.tutorId ).success( function(response) {

				console.log( response );

				if ( response.status == 1 ) {

					$scope.Tutor = response.data;

					$timeout(function(){
						$scope.showLoader	= false;
					}, 200);
				} else {
					
					$scope.Tutor = {};
				}

			}).error( function(err) {

				console.log(err);
			});



			/* Change the status of the tutor */

			$scope.changeTutorStatus = function(status){

				$http.post( baseurl+'admin/change_status', {'status': status, 'user_id': $routeParams.tutorId } ).success( function(response) {

					// console.log(response);
					
					alertify.dismissAll();
					
					$timeout(function(){
						$scope.showLoader	= false;
					}, 200);

					if ( response.status == 1 ) {

						$scope.Tutor.status = status;
						alertify.success(response.data);
					} else {
						
						alertify.success(response.data);
					}

				}).error( function(err) {

					console.log(err);
				});
			}
    
    }


    /* Modal settings */
			$scope.open = function (size, parentSelector, mytemplateUrl, submitUrl, afterSave, editData) {
		    var parentElem = parentSelector ? 
		      angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
		    	
		    	var modalInstance = $uibModal.open({
			      ariaLabelledBy: 'modal-title',
			      ariaDescribedBy: 'modal-body',
			      templateUrl: mytemplateUrl,
			      controller: 'ModalInstanceCtrl',
			      scope: $scope,
			      size: size,
			      appendTo: parentElem,
			      resolve: {
			        
			      }
		    	});


		    // set function where form will be submited in scope
		    $scope.submitUrl 	= submitUrl;
		    
		    if ( editData ) {

		    	$scope.formData = editData;
		    } else {

		    	$scope.formData = {};
		    }

		    modalInstance.result.then(function () {
		      
		      $log.info('Modal closed');
		    }, function () {
		      
		      $log.info('Modal dismissed');
		    });
		  };
		

	});


	

	/*
		Controller Name : settingsCtrl

		Used in admin panel for settings
		

	*/



	adminApp.controller('settingsCtrl', function($interval,$timeout, $http, $scope, $uibModal, $log, $document, $routeParams){
			
			// shows loader each time controller is loaded 
			$scope.showLoader	= true;
			
			tinymce.init({
			  selector: 'textarea.tinyMce',
			  height: 500,
			  menubar: false,
			  plugins: [
			    'advlist autolink lists link image charmap print preview anchor',
			    'searchreplace visualblocks code fullscreen',
			    'insertdatetime media table contextmenu paste code'
			  ],
			  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			  content_css: '//www.tinymce.com/css/codepen.min.css'
			});

			/* load datatable */

			$scope.tableList = function(){

					$timeout(function(){
					$scope.table = $('#setDataTable').DataTable({
				        dom: 'Bfrtip',
				        "lengthMenu": [ 10, 25, 50, 75, 100 ],
				        buttons: [
							          {
							             extend: 'collection',
							             text: 'Export',
							             buttons: [ 'pdfHtml5', 'csvHtml5', 'copyHtml5', 'excelHtml5' ]
							          }
				       	]
				    } );
					}, 500);

			}


			$scope.getSubjectGroups = function() {

					$http.get( baseurl+'admin/get_subject_groups' ).success( function(response) {

						console.log(response);
						
						$scope.Groups = response;
						
						$timeout(function(){
							$scope.showLoader	= false;
						}, 200);

					}).error( function(err) {

						console.log(err);
					});

			}

			$scope.deleteAction = function( index, index_name, table_name ) {
					alertify.dismissAll();
					alertify.confirm("Are you sure you want to do this!!",
					  function(){
					  	
					  	var postData = { 'index_id': index, 'index_name': index_name, 'table_name': table_name };

							$http.post( baseurl+'admin/delete_action', postData ).success( function(response) {

					  		if ( response.status == 1 ) {

					  			table_name == 'subjects' ? $scope.getSubjects() : $scope.getSubjectGroups();
					  			alertify.success(response.data);
					  		} else {
					  			
					  			alertify.error(response.data);
					  		}

					  	}).error( function(err) {
					  		
					  		console.log(err);
					  	});
					  },
					  function(){
					    alertify.error('Action Canceled');
					  });
			}



			// if($routeParams.groupId){
         
					$scope.getSubjects = function() {
						// $scope.currentGroupId = $routeParams.groupId;

						$http.get( baseurl+'admin/get_subjects/' ).success( function(response) {
								
								$scope.Subjects = response;
								console.log(response);


								var keys = Object.keys($scope.Subjects);
								var len = keys.length - 1;

								if ( $scope.table === "undefined" ) {

									$scope.table.row.add( $scope.Subjects[len] ).draw();
								}
								
								$scope.check = 1;

								$timeout(function(){
									$scope.showLoader	= false;
								}, 500);
							
						}).error( function(err) {

							console.log(err);
						});

					}
			// }


			/* Modal settings */
			$scope.open = function (size, parentSelector, mytemplateUrl, submitUrl, afterSave, editData) {
		    var parentElem = parentSelector ? 
		      angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
		    	
		    	var modalInstance = $uibModal.open({
			      ariaLabelledBy: 'modal-title',
			      ariaDescribedBy: 'modal-body',
			      templateUrl: mytemplateUrl,
			      controller: 'ModalInstanceCtrl',
			      scope: $scope,
			      size: size,
			      appendTo: parentElem,
			      resolve: {
			        
			      }
		    	});


		    // set function where form will be submited in scope
		    $scope.submitUrl = submitUrl;

		    if ( editData ) {

		    	$scope.formData = editData;
		    } else {

		    	$scope.formData = {};
		    }

		    modalInstance.result.then(function () {
		      if ( afterSave == 'group' ) {

		    		$timeout( function() { 
		    			$scope.getSubjectGroups(), 500 
		    		});

		      } else if ( afterSave == 'subject' ) {

		      	$timeout( function() { 
		    			$scope.getSubjects(), 500 
		    		});
		      }
		    }, function () {
		      
		      // $log.info('Modal dismissed');
		    });
		  };


		  /* Pages crud */
		  $scope.getPages = function() {

		  	$http.get( baseurl+'admin/get_pages' ).success( function(response) {

		  		if ( response.status == 1 ) {

		  			console.log( response );
			  		$scope.Pages = response.data;
			  		$timeout( function(){

			  			$scope.showLoader = false;
			  		}, 500);
		  		} else {
		  			
		  			alertify.error('Unable to fetch data.');
		  		}

		  	}).error(function(err) {
		  		
		  		console.log(err);
		  	});
		  }

	});

	adminApp.controller('ModalInstanceCtrl', function ($scope, $uibModalInstance, $http, $timeout) {
  
  $scope.ok = function () {
  	if ( $scope.submitUrl ) 
  	{
  		// console.log($scope.formData);
	  	alertify.dismissAll();
	  	$http.post( baseurl+'admin/'+$scope.submitUrl, $scope.formData ).success( function(response) {
	  		
	  		// console.log(response);
	  		if ( response.status == 1 ) {
	  			
	  			$timeout( function(){

	  				alertify.success(response.data);
    				$uibModalInstance.close();
	  			}, 500);
	  		} else {
	  			
	  			alertify.error(response.data);
	  		}

	  	}).error( function(err) {
	  		
	  		console.log(err);
	  	});

  	}


  };

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };


});


adminApp.controller('scheduleCtrl',function($interval,$timeout, $http, $scope, $routeParams, $rootScope){
        
        $scope.containerClass   = 'my-calendar';
        $scope.hideBreadcrumbs  = true;
        $scope.showLoader  			= true;
        $scope.noPadding  			= true;
        
        $http.get( baseurl+'admin/get_user_details/'+$routeParams.userId ).success( function(response) {
            	
          if ( response.status == 1 ) {

            $scope.userDetails = response;
          } else {

            alertify.error( 'Unable to User details.' );
            $scope.userEvents = response.data;
          }
        }).error( function(err){

            console.log(err);
        });

      $scope.get_schedule_events = function () {
            $http.get( baseurl+'admin/get_schedule_events/'+$routeParams.userId ).success( function(response) {
            	
              if ( response.status == 1 ) {

                $scope.userEvents = response.data;
              } else {

                alertify.error( 'Unable to fetch data.' );
                $scope.userEvents = response.data;
              }
            }).error( function(err){

                console.log(err);
            });

        }

        $scope.get_schedule_events();    

        $http.get( baseurl+'admin/get_user_related_tutions/'+$routeParams.userId ).success( function(response) {
            
          if ( response.status == 1 ) {

            $scope.userTutions = response.data;
            console.log($scope.userTutions);
          } else {

            alertify.error( 'Unable to fetch data.' );
            $scope.userTutions = response.data;
          }
        }).error( function(err){

            console.log(err);
        });

        
        $timeout( function() {

            var selectedEvent;
            $('#myCalendar').pagescalendar({
            	 ui: {
                  year: {
                      visible: true,
                      format: 'YYYY',
                      startYear: '2014',
                      endYear: moment().add(15, 'year').format('YYYY'),
                      eventBubble: true
                  },
                  month: {
                      visible: true,
                      format: 'MMM',
                      eventBubble: true
                  },
                  date: {
                      format: 'MMMM YYYY, D dddd'
                  },
                  week: {
                      day: {
                          format: 'D'
                      },
                      header: {
                          format: 'dd'
                      },
                      eventBubble: true,
                      startOfTheWeek: '0',
                      endOfTheWeek:'6'
                  },
                  grid: {
                      dateFormat: 'D dddd',
                      timeFormat: 'h A',
                      eventBubble: true,
                      slotDuration: '30'
                  }
                },
                minTime:7,
                maxTime:24,
                //Loading Dummy EVENTS for demo Purposes, you can feed the events attribute from 
                //Web Service
                events: $scope.userEvents,
                view:"week",
                onViewRenderComplete: function() {
                    //You can Do a Simple AJAX here and update 
                },
                onEventClick: function(event) {
                    //Open Pages Custom Quick View
                    if (!$('#calendar-event').hasClass('open'))
                        $('#calendar-event').addClass('open');


                    selectedEvent = event;
                    // $scope.selectedEvent = $scope.userEvents[event.index];
                    $scope.selectedEvent   = angular.isUndefined($scope.userEvents[event.index]) ? {} : $scope.userEvents[event.index];
                    // setEventDetailsToForm(selectedEvent);
                    console.log('selectedEvent', $scope.selectedEvent);
                    setEventDetailsToForm(event, $scope.selectedEvent);
                },
            });

            $scope.showLoader  			= false;

            // Some Other Public Methods That can be Use are below \
            //console.log($('body').pagescalendar('getEvents'))
            //get the value of a property
            //console.log($('body').pagescalendar('getDate','MMMM'));

            function setEventDetailsToForm(event, scopeEvent) {
            		console.log('scopeEvent', scopeEvent);
                $('#eventIndex').val(event.index);

                $timeout(function(){
                  
                  // get index of selected tution
                  $selected_tution_index = $scope.userTutions.map( (el) => el.tr_id ).indexOf(scopeEvent.tution_id);
                  
                  // get selected tution data by its index
                  $selected_tution = $scope.userTutions[$selected_tution_index];

                  // set scope for event form
                  $scope.Schedule = { title: scopeEvent.title, 
                                      description: scopeEvent.description, 
                                      start: event.start, 
                                      end: event.end, 
                                      description: scopeEvent.description, 
                                      tutionData: $selected_tution, 
                                      schedule_id: scopeEvent.schedule_id, 
                                      schedule_status: scopeEvent.schedule_status, 
                                    };
                }, 200);

                //Show Event date
                $('#event-date').html(moment(event.start).format('MMM, D dddd'));

                $('#lblfromTime').html(moment(event.start).format('h:mm A'));
                $('#lbltoTime').html(moment(event.end).format('H:mm A'));

            }

            $scope.update_event_status = function(status) {

              var postData = {schedule_id: $scope.selectedEvent.schedule_id, schedule_status: status}
              
              $http.post( baseurl+'admin/update_event_status', postData ).success( function(response) {
                  
                  $scope.get_schedule_events();

                  // change class of event based on status
                  switch (status) {
                    case 2:
                      $('div[data-index = '+selectedEvent.index+']').addClass('bg-danger-lighter');
                      break;
                    case 0:
                      $('div[data-index = '+selectedEvent.index+']').removeClass('bg-danger-lighter');
                      $('div[data-index = '+selectedEvent.index+']').addClass('bg-success-lighter');
                      break;
                  }

                  
                  console.log('declined', response);
                }).error( function(err) {

                  console.log(err);
                });
                $('#myCalendar').pagescalendar('removeEvent', $('#eventIndex').val());
                $('#calendar-event').removeClass('open');
            }

      }, 1000); // ends timeout for schedule calendar

    }); // ends scheduleCtrl


    



