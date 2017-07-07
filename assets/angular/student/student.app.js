var studentApp   = angular.module('studentApp', ['ngRoute','ngAnimate','ui.bootstrap'] );
      
      // directive appends html to specified place
      studentApp.directive('demoDisplay', function($compile) {
        return {
          scope: {
            demoDisplay: "=", //import referenced model to our directives scope
            demoDays: "="
          },
          templateUrl: baseurl+'assets/angular/student/templates/template.html',
          link: function(scope, elem, attr, ctrl) {
        
          }
        }
      });

      studentApp.controller('dashboardCtrl',function($interval,$timeout, $http, $scope, $rootScope,$location){

        $scope.Student = {};

        $scope.onLoad = function(){
          $http.get( baseurl+'student/dashboard' ).success( function( response ) {

            $scope.fullName     = response.firstname+' '+response.lastname;
            $scope.Student      = response;
            
            // console.log('Student => ', $scope.Student);

            // initialize student info to be used in requirements form
            $scope.Requirements = { 
                                    'fullName': $scope.fullName, 
                                    'phone':    $scope.Student.phone, 
                                    'email':    $scope.Student.email 
                                  };
            
          }).error( function(err) {

            console.log(err);
          });

        }
        
        $scope.onLoad();
        $scope.Requirements = {};

        /* fetch groups of subject  */
        $scope.getGroups  = function(groupId) {

          $http.get( baseurl+'student/get_subject_groups' ).success( function( response ) {

            $scope.Groups   = response;
            // console.log('Groups => ', $scope.Groups);
          }).error( function(err) {

            console.log(err);
          });

        }

        $scope.getTutors = function(groupId) {

          $http.get( baseurl+'student/get_tutors_list' ).success( function( response ) {

            // $scope.Tutors.fullName  = response.firstname+' '+response.lastname;
            $scope.Tutors           = response.data;

            // console.log('Tutors => ', $scope.Tutors);
            
          }).error( function(err) {

            console.log(err);
          });

        }

        $scope.getSubjects = function(groupId) {

          /* fetch subjects based on group id  */
          $http.get( baseurl+'student/get_subjects/'+groupId ).success( function( response ) {
            
            $scope.Subjects = response;

            // console.log('Subjects => ', $scope.Subjects);
          }).error( function(err) {

            console.log(err);
          });

        }

        $scope.transactionList = function() {

          /* fetch subjects based on group id  */
          $http.get( baseurl+'student/get_requested_transactions').success( function( response ) {
            
            $scope.requestedTransactions = response;

            // console.log('Subjects => ', $scope.Subjects);
          }).error( function(err) {

            console.log(err);
          });

        }

        $scope.saveRequirement = function(){

          $scope.Requirements.mytime = $('#gettimefilter').val();

          $http.post( baseurl+'student/save_requirement', $scope.Requirements ).success( function(response) {

            if ( response.status == '1' ) {

              $scope.Requirements = {};
              alertify.success( response.data );

              $('#modalStudentpost').modal('hide');
              $rootScope.getFeeds();
            } else {
              
              alertify.error( response.data );
            }
            
          }).error( function(err) {

            console.log(err);
          } );
        }

        $scope.totalNotification = function(){

          $http.get( baseurl+'student/get_total_notification_count/' ).success( function(response) {

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

          $http.get( baseurl+'student/get_total_class_notification_count/' ).success( function(response) {

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

          $http.post( baseurl+'student/clear_notification',{notification_type:notification_type}).success( function(response) {
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








    studentApp.controller('feedCtrl',function($interval,$timeout, $http, $scope, $routeParams, $rootScope){

      var counter = 0;
      $scope.data = {
        fields: []
      }

      $scope.days = ['Day', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

      $scope.addField = function() {
        $scope.data.fields.push({
          name: "test " + counter++
        });
      };

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
              $scope.currentFeedType  = JSON.parse(localStorage.getItem("currentFeedType"));
              //$scope.Feed.cuurent = '33'; 
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
       // console.log('initial', $scope.currentFeedType);
        $rootScope.getFeeds = function(status) {
            //alert(status);
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


        /* Datepicker Settings  */

    $scope.format = 'yyyy/MM/dd';
    $scope.min = null;
    $scope.max = null;


     $scope.initTimePicker = function(selectedDate) {
        var min = new Date(selectedDate.getTime());
        min.setHours(2);
        min.setMinutes(0);
        $scope.min = min;

        var max = new Date(selectedDate.getTime());
        max.setHours(4);
        max.setMinutes(0);
        $scope.max = max;
    }

    
    $scope.init = function() {
        $scope.Requirements.day_and_time = new Date();
        $scope.initTimePicker($scope.Requirements.day_and_time);
    };
    $scope.init();

    $scope.clear = function() {
        $scope.Requirements.day_and_time = null;
    };

    $scope.open = function() {
        $scope.popup.opened = true;
    };

   
    $scope.popup = {
        opened: false
    };

   
  
            $scope.dateChange = function() { 
                $scope.initTimePicker($scope.Requirements.day_and_time);
            }
            
          /* Time Picker */
          $scope.Requirements.mytime = new Date();

          $scope.hstep = 1;
          $scope.mstep = 15;

          $scope.options = {
            hstep: [1, 2, 3],
            mstep: [1, 5, 10, 15, 25, 30]
          };

          $scope.ismeridian = true;

          $scope.toggleMode = function() {
            $scope.ismeridian = ! $scope.ismeridian;
          };

          $scope.changed = function () {
            //alert($('#gettimefilter').val());
            //$scope.Requirements.mytime = {{ Requirements.mytime | date:'shortTime'}}
            //console.log('Time changed to: ' + $scope.Requirements.mytime);
          };

          setTimeout(function() {

            $('#datetimepicker1').datetimepicker({
               format: 'MM-DD-YYYY hh:mm a'
            });

            $('#datetimepicker1').on('dp.change', function(e){ 
              $('#day-and-time').change();
            });
          }, 1000);

});


    



    studentApp.controller('scheduleCtrl',function($interval,$timeout, $http, $scope, $routeParams, $rootScope){
        
        $scope.containerClass   =  'my-calendar';
        $scope.hideBreadcrumbs  =  true;

        $scope.get_schedule_events = function () {
            $http.get( baseurl+'student/get_schedule_events' ).success( function(response) {
                
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

        $http.get( baseurl+'student/get_user_related_tutions' ).success( function(response) {
            
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
                    setEventDetailsToForm(event, $scope.selectedEvent);
                },
            });

            // Some Other Public Methods That can be Use are below \
            //console.log($('body').pagescalendar('getEvents'))
            //get the value of a property
            //console.log($('body').pagescalendar('getDate','MMMM'));

            function setEventDetailsToForm(event, scopeEvent) {

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
                $('#lbltoTime').html(moment(event.end).format('h:mm A'));

            }

            $scope.update_event_status = function(status) {

              var postData = {schedule_id: $scope.selectedEvent.schedule_id, schedule_status: status}
              
              $http.post( baseurl+'student/update_event_status', postData ).success( function(response) {
                  
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


    
    studentApp.controller('settingsCtrl',function($interval,$timeout, $http, $scope, $rootScope){

      $scope.checkcurrentpassword = function(){
        console.log($scope.usr);
          $http.post(baseurl+'student/checkoldpassword',{pass: $scope.usr.current_password}).success(function(response){

              if(response == 'Matched'){
                  $scope.check_pass = '';
                  $scope.pass_old = 'matched';
              }else{
                  $scope.pass_old = 'Not Matched';
                  $scope.check_pass = 'Please Enter Current Password';
              } 

          }).error(function(err){

          });

      }

      $scope.changepasswordForm = function(){
         
        if($scope.usr.new_password == $scope.usr.confirm_password && $scope.pass_old == 'matched'){
          
          $http.post(baseurl+'student/updatenewpass',$scope.usr).success(function(response){
              alertify.success( response.data );
          }).error(function(err){
              alertify.error( response.data );
          });

        }else{

        }
            
      }

      $scope.show_div = function(divIndex) {

        $scope.showDiv = divIndex;

        // card detals section
        if ( divIndex == 2 ) {
          $timeout(function(){
            $http.get( baseurl+'student/check_saved_card' ).success( function( response ) {
              
              console.log('response', response);
              if ( response.status == 1 ) {

                $scope.cardSaved    = true;
                $scope.cardDetails  = response.data;
              } else {

                $scope.cardSaved    = false;
                $scope.cardDetails  = response.data;
              }
            }).error( function(err) {

            });
         }, 500);   
        }
      }



      /* STRIPE PAYMENT FORM SETTINGS JS */
      $timeout( function() {

        var stripe = Stripe('pk_test_xCvzaNQtmFntTG0WnSmKK1NI');
        var elements = stripe.elements();

        var card = elements.create('card', {
          style: {
            base: {
              iconColor: '#666EE8',
              color: '#31325F',
              lineHeight: '40px',
              fontWeight: 300,
              fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
              fontSize: '15px',

              '::placeholder': {
                color: '#CFD7E0',
              },
            },
          }
        });

        // dynamically creates input fields in form
        card.mount('#card-element');
        
        // binds change event on input fields
        card.on('change', function(event) {
          setOutcome(event);
          console.log('change');
        });

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
          var displayError = document.querySelector('.error');
          if (event.error) {
            console.log('event.error', event.error);
            displayError.textContent = event.error.message;
          } else {
            displayError.textContent = '';
            console.log('no event.error');
          }
        });

        // on click of submit 
        $scope.submitCard = submitCard;

        // Form Submit Button Click
        function submitCard() {
          console.log('submitCard');
            var errorElement = document.querySelector('.error');
            errorElement.classList.remove('visible');
            createToken();
        }

        // Send data directly to stripe server to create a token (uses stripe.js)
        function createToken() {
            stripe.createToken(card).then(setOutcome);
        }

        // Common SetOutcome Function
        function setOutcome(result) {
            console.log('setOutcome', result);
            var successElement  = document.querySelector('.success');
            var errorElement    = document.querySelector('.error');
            var submitElement   = document.querySelector('.save_card');
            errorElement.classList.remove('visible');
            submitElement.classList.remove('disabled');
            if (result.token) {
              // console.log('result.token', result.token);
              
              // show loader
              $scope.partialLoader = true;
              
              // Use the token to create a charge or a customer
              stripeTokenHandler(result.token);
              // successElement.querySelector('.token').textContent = result.token.id;
              successElement.classList.add('visible');
            } else if (result.error) {
              console.log('error on submit', result.error);
              // hide loader
              $scope.partialLoader     = false;
              errorElement.textContent = result.error.message;
              errorElement.classList.add('visible');
              submitElement.classList.add('disabled');
            }
        }

        // Response Handler callback to handle the response from Stripe server
        function stripeTokenHandler(token) {
            // console.log('token', token);
            $http.post( baseurl+'student/save_stripe_customer', token ).success( function(response) {
              console.log('response', response);
              $scope.cardSaved = true;
              $timeout( function() {

                $scope.partialLoader = false;
                
                if ( response.status == '1' ) {


                  alertify.success( response.data );
                } else {
                  
                  alertify.error( response.data );
                }
              }, 500);
              
            }).error( function(err) {

              console.log(err);
            } );
        }
        




            
        // document.querySelector('form').addEventListener('submit', function(e) {
        //   e.preventDefault();
        //   var form = document.querySelector('form');
        //   var extraDetails = {
        //     name: form.querySelector('input[name=cardholder-name]').value,
        //   };
        //   stripe.createToken(card, extraDetails).then(setOutcome);
        // });
      }, 1500 );
    });

/*Transactions Controller*/

    