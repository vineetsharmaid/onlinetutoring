/** 
* Start Angular Js Application Routes
*/
homeApp.config(function($routeProvider) {
  
  $routeProvider
    .when('/', {
      controller:'tutionsCtrl',
      templateUrl:'assets/angular/home/templates/search-tutor.html'
    })
    .when('/request', {
      controller:'tutionsCtrl',
      templateUrl:'assets/angular/home/templates/request-tutor.html'
    })
    .when('/tutor/:tutorId', {
      controller:'tutionsCtrl',
      templateUrl:'assets/angular/home/templates/tutor-details.html'
    })
    .when('/profile', {
      controller:'dashboardCtrl',
      templateUrl:'assets/angular/home/templates/tutor-dashboard.html'
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
