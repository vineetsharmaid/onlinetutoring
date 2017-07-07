/** 
* Start Angular Js Application Routes
*/
studentApp.config(function($routeProvider) {
  
  $routeProvider
    .when('/', {
      controller:'feedCtrl',
      templateUrl:'assets/angular/student/templates/student-feed.html'
    })
    .when('/feeds/:feedId', {
      controller:'feedCtrl',
      templateUrl:'assets/angular/student/templates/feed-details.html'
    })
    .when('/profile', {
      controller:'dashboardCtrl',
      templateUrl:'assets/angular/student/templates/student-dashboard.html'
    })
    .when('/schedule', {
      controller:'scheduleCtrl',
      templateUrl:'assets/angular/student/templates/student-schedule.html'
    })
    .when('/transactions', {
      controller:'transactionCtrl',
      templateUrl:'assets/angular/student/templates/student-transactions.html'
    })
    .when('/settings', {
      controller:'settingsCtrl',
      templateUrl:'assets/angular/student/templates/student-settings.html'
    })
     .when('/accountDetails', {
      controller:'settingsCtrl',
      templateUrl:'assets/angular/student/templates/account-details.html'
    })
    .when('/companies', {
      controller:'companyCtrl',
      templateUrl:'../../assets/admin/angular/templates/index.html'
    })
    .when('/page/:pageId', {
      controller:'pagesCtrl',
      templateUrl:'../../assets/admin/angular/templates/staticPage.html'
    })   
    .when('/404', {
      templateUrl:'../../assets/admin/angular/templates/404.html'
    })
    .otherwise({
      redirectTo:'/404'
    });
})
