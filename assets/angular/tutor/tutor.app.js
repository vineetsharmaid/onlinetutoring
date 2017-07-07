var tutorApp   = angular.module('tutorApp', ['xeditable', 'ngRoute', 'ui.bootstrap', 'angularFileUpload']);
  
      
      tutorApp.controller('dashboardCtrl',function($interval,$timeout, $http, $scope, $rootScope, $window, FileUploader){

        $scope.Tutor      = {};
        $scope.showLoader = true;
        
        $scope.onLoad = function(){
          $http.get( baseurl+'tutor/dashboard' ).success( function( response ) {

            $scope.fullName = response.firstname+' '+response.lastname;
            $scope.Tutor    = response;
            var date = moment($scope.Tutor['dob'], "MM-DD-YYYY").toDate();
            
            // date to shown to users
            $scope.Tutor['nice_dob'] = $scope.Tutor['dob'];
            
            // create obj of date for datepicker
            $scope.Tutor['dob'] = new Date(date);
            console.log('Tutor', $scope.Tutor);

            // load countries list and set country to default
            $scope.getCountries( $scope.Tutor['country'] );
            
            if ($scope.Tutor['resume']) {
              $scope.cvUploaded = true;
            } 

          }).error( function(err) {

            console.log(err);
          });

          $http.get( baseurl+'tutor/get_diploma_details' ).success( function( response ) {

            if ( response.length != 0 ) {
            
              $scope.DiplomaDetails = response;

              console.log('DiplomaDetails', $scope.DiplomaDetails);
              
              var date = moment($scope.DiplomaDetails['ib_yog'], "YYYY").toDate();
              // date to shown to users
              $scope.DiplomaDetails['nice_ib_yog'] = $scope.DiplomaDetails['ib_yog'];
              // create obj of date for datepicker
              $scope.DiplomaDetails['ib_yog'] = new Date(date);
              
              // convert score string to number
              $scope.DiplomaDetails.final_ib_score = Number($scope.DiplomaDetails.final_ib_score);
            }
          }).error( function(err) {

            console.log(err);
          });

          $http.get( baseurl+'tutor/get_further_information' ).success( function( response ) {

            if ( response.length != 0 ) {

              $scope.furtherInfo = response;
            }

          }).error( function(err) {

            console.log(err);
          });


          /* fetch groups of subject  */
          $http.get( baseurl+'tutor/get_subject_groups' ).success( function( response ) {

            $scope.Groups = response;
          }).error( function(err) {

            console.log(err);
          });

          /* fetch IB subject details  */
          $http.get( baseurl+'tutor/get_subject_details' ).success( function( response ) {
            $scope.IBsubjects = {};
            $scope.IBsubjects.SubjectGroup1 = response[0];
            $scope.IBsubjects.SubjectGroup2 = response[1];
            $scope.IBsubjects.SubjectGroup3 = response[2];
            
            console.log($scope.IBsubjects.SubjectGroup1);

          }).error( function(err) {

            console.log(err);
          });

          /* fetch subjects */
          $http.get( baseurl+'tutor/get_subjects/' ).success( function( response ) {

            $scope.Subjects1 = $scope.Subjects2 = $scope.Subjects3 = response;
            $timeout( function(){
            
              $scope.showLoader   = false;
            }, 500 );
          }).error( function(err) {

            console.log(err);
          });

        }
        
        $scope.onLoad();

        /* Get all countries list */
        $scope.getCountries = function(countryId) {
            
          $http.get( baseurl+'home/get_countries' ).success( function(response) { 
            
            console.log('country response', response);

            if ( response.status == 1 ) {
              
              // $scope.DiplomaDetails = {};

              $scope.Countries = response.data;
              console.log('tutorCountry', countryId);
              // set default to united kingdom
              $scope.DiplomaDetails.ib_country  = $scope.Countries[countryId-1];
              // $scope.Requirements.phonecode     = $scope.Countries[tutorCountry];
            } else {

              console.log(response);
            }
          }).error( function(err) {

          });
        }

        $scope.getSubjects = function( subjectIndex, groupIndex, groupIdIndex ) {

          if ( groupIndex == 1 ) {

            var groupId     = $scope.IBsubjects.SubjectGroup1[groupIdIndex];
            var selectModel = $scope.IBsubjects.SubjectGroup1.subject_id;
          } else if ( groupIndex == 2 ) {
            
            var groupId = $scope.IBsubjects.SubjectGroup2[groupIdIndex];
            var selectModel = $scope.IBsubjects.SubjectGroup2.subject_id;
          } else {
            
            var groupId = $scope.IBsubjects.SubjectGroup3[groupIdIndex];
            var selectModel = $scope.IBsubjects.SubjectGroup3.subject_id;
          }

          // console.log(groupId);

          /* fetch subjects based on group id  */
          $http.get( baseurl+'tutor/get_subjects/'+groupId ).success( function( response ) {

            $scope[subjectIndex] = response;
            
            // initialize ng-model of selext box
            if ( groupIndex == 1 ) {
              $scope.IBsubjects.SubjectGroup1.subject_id = '';
            } else if ( groupIndex == 2 ) {
              $scope.IBsubjects.SubjectGroup2.subject_id = '';
            } else {
              $scope.IBsubjects.SubjectGroup3.subject_id = '';
            }
            
          }).error( function(err) {

            console.log(err);
          });
        }



        /* Save basic information of tutor */


        $scope.saveTutorProfile = function() {

          if ( $scope.Tutor.status == 0 ) 
          {

              $http.post( baseurl+'tutor/save_tutor_profile', $scope.Tutor ).success( function( response ) {

                $scope.showLoader     = false;

                // console.log(response);
                alertify.dismissAll();

                // successfull
                if ( response.status == 1 ) {
                  
                  // alertify.success(response.data);              
                } else {

                  alertify.error(response.data);
                }

              }).error( function( err ) {

              });
          
          } else {

            // do nothing
          }

        }


        /* Save diploma details of tutor */
        $scope.dDetails = {};
        $scope.save_diploma_details = function(){

          if ( $scope.Tutor.status == 0 ) 
          {
              console.log('DiplomaDetails', $scope.DiplomaDetails);
              
              $http.post( baseurl+'tutor/save_diploma_details', {'diploma_details': $scope.DiplomaDetails, 'ib_subjects': $scope.IBsubjects} ).success( function( response ) {
             
                $scope.showLoader     = false;

                console.log(response);
                alertify.dismissAll();

                // successfull
                if ( response.status == 1 ) {
                  
                  // alertify.success(response.data);              
                } else {

                  // alertify.error(response.data);
                  alertify.error('Error occured while saving information');
                }

              }).error( function( err ) {

              });

          } else {

            // do nothing
          }

        } // ends function save_diploma_details


        
        /* Save further information of tutor */

        $scope.save_further_info = function() {

        	$scope.showLoader = true;
          if ( $scope.Tutor.status == 0 ) 
          {
              console.log($scope.furtherInfo);
              $http.post( baseurl+'tutor/save_further_info', $scope.furtherInfo ).success( function( response ) {

                alertify.dismissAll();

                // successfull
                if ( response.status == 1 ) {
                  // $window.scrollTo(0, 0);
                  // $window.pageYOffset;
                  $timeout( function(){

	                  alertify.success(response.data);
	                  $scope.onLoad();
	                  $scope.showLoader = false;
                  }, 1000);
                } else {

                  // alertify.error(response.data);
                  alertify.error('Error occured while saving information');
                }

              }).error( function( err ) {

              });

          } else {
            
            // do nothing
          }

        } // ends function save_further_info



        var uploader = $scope.uploader = new FileUploader({
            url: baseurl+'tutor/cv_upload'
        });

        // FILTERS
      
        // a sync filter
        uploader.filters.push({
            name: 'syncFilter',
            fn: function(item /*{File|FileLikeObject}*/, options) {
                console.log('syncFilter', this.queue.length);
                return this.queue.length !== 1;
            }
        });
      
        // an async filter
        uploader.filters.push({
            name: 'asyncFilter',
            fn: function(item /*{File|FileLikeObject}*/, options, deferred) {
                console.log('asyncFilter');
                setTimeout(deferred.resolve, 1e3);
            }
        });

        // CALLBACKS

        uploader.onWhenAddingFileFailed = function(item /*{File|FileLikeObject}*/, filter, options) {
            console.info('onWhenAddingFileFailed', item, filter, options);
        };
        uploader.onAfterAddingFile = function(fileItem) {
            uploader.queue.length !== 1 && uploader.queue.pop(); // only one file in the queue
            console.info('onAfterAddingFile', fileItem);
            $scope.uploader.uploadAll();

        };
        uploader.onAfterAddingAll = function(addedFileItems) {
            console.info('onAfterAddingAll', addedFileItems);
        };
        uploader.onBeforeUploadItem = function(item) {
            console.info('onBeforeUploadItem', item);
        };
        uploader.onProgressItem = function(fileItem, progress) {
            console.info('onProgressItem', fileItem, progress);
        };
        uploader.onProgressAll = function(progress) {
            console.info('onProgressAll', progress);
        };
        uploader.onSuccessItem = function(fileItem, response, status, headers) {
            console.info('onSuccessItem', fileItem, response, status, headers);
        };
        uploader.onErrorItem = function(fileItem, response, status, headers) {
            console.info('onErrorItem', fileItem, response, status, headers);
        };
        uploader.onCancelItem = function(fileItem, response, status, headers) {
            console.info('onCancelItem', fileItem, response, status, headers);
        };
        uploader.onCompleteItem = function(fileItem, response, status, headers) {
            // console.info('onCompleteItem', fileItem, response, status, headers);
            console.info('onCompleteItem', response);
            console.info('onCompleteItem', response.data.upload_data);
            

            if ( response.status == 1 ) {
              $scope.cvUploaded   = true;
              $scope.Tutor.resume = response.data.upload_data['file_name'];
              alertify.success("Resume updated successfully");
            } else {
              $scope.cvUploaded   = false;
              $scope.cvMessage    = "Unable to update Resume";
              alertify.error("Unable to update Resume");
            }
            
            uploader.clearQueue();
        };
        uploader.onCompleteAll = function() {
            console.info('onCompleteAll');
        };

        console.info('uploader', uploader);




        /* Form Wizard settings */


        $timeout( function() {
            $('#rootwizard').bootstrapWizard({
                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;

                    // If it's the last tab then hide the last button and show the finish instead
                    if ($current >= $total) {
                        $('#rootwizard').find('.pager .next').hide();
                        $('#rootwizard').find('.pager .finish').show().removeClass('disabled hidden');
                    } else {
                        $('#rootwizard').find('.pager .next').show();
                        $('#rootwizard').find('.pager .finish').hide();
                    }

                    var li = navigation.find('li.active');

                    var btnNext = $('#rootwizard').find('.pager .next').find('button');
                    var btnPrev = $('#rootwizard').find('.pager .previous').find('button');

                    // remove fontAwesome icon classes
                    function removeIcons(btn) {
                        btn.removeClass(function(index, css) {
                            return (css.match(/(^|\s)fa-\S+/g) || []).join(' ');
                        });
                    }

                    if ($current > 1 && $current < $total) {

                        var nextIcon = li.next().find('.fa');
                        var nextIconClass = nextIcon.attr('class').match(/fa-[\w-]*/).join();

                        removeIcons(btnNext);
                        btnNext.addClass(nextIconClass + ' btn-animated from-left fa');

                        var prevIcon = li.prev().find('.fa');
                        var prevIconClass = prevIcon.attr('class').match(/fa-[\w-]*/).join();

                        removeIcons(btnPrev);
                        btnPrev.addClass(prevIconClass + ' btn-animated from-left fa');
                    } else if ($current == 1) {
                        // remove classes needed for button animations from previous button
                        btnPrev.removeClass('btn-animated from-left fa');
                        removeIcons(btnPrev);
                    } else {
                        // remove classes needed for button animations from next button
                        btnNext.removeClass('btn-animated from-left fa');
                        removeIcons(btnNext);
                    }
                },
                onNext: function(tab, navigation, index) {
                    console.log("Showing next tab");
                },
                onPrevious: function(tab, navigation, index) {
                    console.log("Showing previous tab");
                },
                onInit: function() {
                    $('#rootwizard ul').removeClass('nav-pills');
                }

            });
        }, 500);




        /* Datepicker Settings  */

        $scope.today = function() {
          $scope.dt = new Date();
        };

        $scope.today();

        $scope.clear = function() {
          $scope.dt = null;
        };

        $scope.inlineOptions = {
          showWeeks: false,
          customClass: getDayClass,
          minDate: new Date()
        };

        $scope.dateOptions = {
          dateDisabled: disabled,
          formatYear: 'yy',
          maxDate: new Date(2020, 5, 22),
          minDate: new Date(),
          startingDay: 1
        };

        $scope.yearOptions = {
          formatYear: 'yyyy',
          startingDay: 1,
          minMode: 'year'
        };

        // Disable weekend selection
        function disabled(data) {
          // var date = data.date,
          //   mode = data.mode;
          // return mode === 'day' && (date.getDay() === 0 || date.getDay() === 6);
        }

        $scope.toggleMin = function() {
          $scope.inlineOptions.minDate = $scope.inlineOptions.minDate ? null : new Date();
          $scope.dateOptions.minDate = $scope.inlineOptions.minDate;
        };

        $scope.toggleMin();

        $scope.open1 = function() {
          $scope.popup1.opened = true;
        };

        $scope.open2 = function() {
          $scope.popup2.opened = true;
        };

        $scope.setDate = function(year, month, day) {
          $scope.dt = new Date(year, month, day);
        };

        $scope.formats    = ['MM-dd-yyyy', 'yyyy/MM/dd', 'dd-MMMM-yyyy', 'yyyy'];
        $scope.format     = $scope.formats[0];
        $scope.yearFormat = $scope.formats[3];
        $scope.altInputFormats = ['M!/d!/yyyy'];

        $scope.popup1 = {
          opened: false
        };

        $scope.popup2 = {
          opened: false
        };

        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        var afterTomorrow = new Date();
        afterTomorrow.setDate(tomorrow.getDate() + 1);
        $scope.events = [
          {
            date: tomorrow,
            status: 'full'
          },
          {
            date: afterTomorrow,
            status: 'partially'
          }
        ];

        function getDayClass(data) {
          var date = data.date,
            mode = data.mode;
          if (mode === 'day') {
            var dayToCheck = new Date(date).setHours(0,0,0,0);

            for (var i = 0; i < $scope.events.length; i++) {
              var currentDay = new Date($scope.events[i].date).setHours(0,0,0,0);

              if (dayToCheck === currentDay) {
                return $scope.events[i].status;
              }
            }
          }

          return '';
        }


      });

  tutorApp.controller('scheduleCtrl',function($interval,$timeout, $http, $scope, $routeParams, $rootScope){
        
        $scope.containerClass   =  'my-calendar';
        $scope.hideBreadcrumbs  =  true;

        $scope.get_schedule_events = function () {

            $http.get( baseurl+'tutor/get_schedule_events' ).success( function(response) {
              
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

        $http.get( baseurl+'tutor/get_user_related_tutions' ).success( function(response) {
            
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
                    
                    $scope.selectedEvent = angular.isUndefined($scope.userEvents[event.index]) ? {} : $scope.userEvents[event.index];
                    
                    // console.log('onEventClick', $scope.selectedEvent);
                    setEventDetailsToForm(event, $scope.selectedEvent);
                },
                onEventDragComplete: function(event) {
                    
                    if (!$('#calendar-event').hasClass('open'))
                    $('#calendar-event').addClass('open');

                    selectedEvent = event;

                    $scope.selectedEvent = angular.isUndefined($scope.userEvents[event.index]) ? {} : $scope.userEvents[event.index];

                    setEventDetailsToForm(event, $scope.selectedEvent);

                },
                onEventResizeComplete: function(event) {
                    if (!$('#calendar-event').hasClass('open'))
                    $('#calendar-event').addClass('open');

                    selectedEvent = event;
                  
                    $scope.selectedEvent = angular.isUndefined($scope.userEvents[event.index]) ? {} : $scope.userEvents[event.index];
                  
                    setEventDetailsToForm(event, $scope.selectedEvent);
                },
                onTimeSlotDblClick: function(timeSlot) {
                    $('#calendar-event').removeClass('open');

                    //Adding a new Event on Slot Double Click
                    var newEvent = {
                        title: 'Title of class',
                        class: 'bg-success-lighter',
                        start: timeSlot.date,
                        end: moment(timeSlot.date).add(1, 'hour').format(),
                        allDay: false,
                        other: {
                            //You can have your custom list of attributes here
                            note: 'test'
                        }
                    };

                    var currentTime     = moment();
                    var eventStartTime  = moment(timeSlot.date);
                    
                    // current time - event time
                    $event_time_diff = currentTime.diff(eventStartTime);

                    // console.log($event_time_diff);

                    // event is in future
                    if ($event_time_diff < 0) {
                        
                      console.log('future');
                      selectedEvent = newEvent;
                      $scope.selectedEvent = {};
                      $('#myCalendar').pagescalendar('addEvent', newEvent);
                      // console.log('onTimeSlotDblClick', $scope.selectedEvent);
                      setEventDetailsToForm(event, $scope.selectedEvent);
                    } else {
                      console.log('past');
                      
                      alertify
                        .alert("Classes can be scheduled for future only!!", function(){
                          
                        }).setHeader('<b> Note </b> ');
                    }


                }
            });

            // Some Other Public Methods That can be Use are below \
            //console.log($('body').pagescalendar('getEvents'))
            //get the value of a property
            //console.log($('body').pagescalendar('getDate','MMMM'));

            function setEventDetailsToForm(event, scopeEvent) {

                $('#eventIndex').val(event.index);
                $scope.Schedule = {};

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

                  // set status when new event created by double click
                  $scope.Schedule.schedule_status = angular.isUndefined($scope.Schedule.schedule_status) ? 0 : $scope.Schedule.schedule_status;
                  
                }, 200);

                

                //Show Event date
                $('#event-date').html(moment(event.start).format('MMM, D dddd'));

                $('#lblfromTime').html(moment(event.start).format('h:mm A'));
                $('#lbltoTime').html(moment(event.end).format('h:mm A'));

                // $scope.currentEventStart  = event.start;
                // $scope.currentEventEnd    = event.end;
                
            }

            $scope.saveEvent = function(form) {
              console.log('saveEvent');
              if(form.$valid) {
                  
                  selectedEvent.title = $('#txtEventName').val();

                  //You can add Any thing inside "other" object and it will get save inside the plugin.
                  //Refer it back using the same name other.your_custom_attribute


                  $scope.Schedule.schedule_id = angular.isUndefined($scope.Schedule.schedule_id) ? '' : $scope.Schedule.schedule_id;

                  $http.post( baseurl+'tutor/add_schedule_event', $scope.Schedule ).success( function(response) {

                    console.log(response);
                    $scope.get_schedule_events();
                  }).error( function(err) {

                    console.log(err);
                  });
                  
                  $('#myCalendar').pagescalendar('updateEvent',selectedEvent);

                  $('#calendar-event').removeClass('open');

              } else {
                
              }
            }

            
            $('#eventDelete').on('click', function() {

                // console.log('selected event id', $scope.selectedEvent.schedule_id);
                // remove event index from calendar
                if( angular.isUndefined($scope.selectedEvent.schedule_id) )
                {
                
                    $('#myCalendar').pagescalendar('removeEvent', $('#eventIndex').val());
                    $('#calendar-event').removeClass('open');

                } else { // remove event index from calendar and db

                    $http.post( baseurl+'tutor/delete_scheduled_event', $scope.selectedEvent.schedule_id ).success( function(response) {
                      
                      if ( response == 'true' ) {

                        $('#myCalendar').pagescalendar('removeEvent', $('#eventIndex').val());
                        $('#calendar-event').removeClass('open');
                      } else {
                        
                        alertify.error('Unable to delete class.');
                      }
                    }).error( function(err) {

                      console.log(err);
                    });
                }
            });
    
      }, 1000); // ends timeout

    }); // ends scheduleCtrl


    


      