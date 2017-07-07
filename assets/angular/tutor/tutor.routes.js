/** 
* Start Angular Js Application Routes
*/
tutorApp.config(function($routeProvider) {
  
  $routeProvider
    .when('/', {
      controller:'feedCtrl',
      templateUrl:'assets/angular/tutor/templates/tutor-feed.html'
    })
    .when('/feeds/:feedId', {
      controller:'feedCtrl',
      templateUrl:'assets/angular/tutor/templates/feed-details.html'
    })
    .when('/profile', {
      controller:'dashboardCtrl',
      templateUrl:'assets/angular/tutor/templates/tutor-dashboard.html'
    })
    .when('/schedule', {
      controller:'scheduleCtrl',
      templateUrl:'assets/angular/tutor/templates/tutor-schedule.html'
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
