/** 
* Start Angular Js Application Routes
*/
adminApp.config(function($routeProvider) {
  var resolveProjects = {
    projects: function (Projects) {
      return Projects.fetch();
    }
  };
 
  $routeProvider
    .when('/', {
      controller:'dashboardCtrl',
      templateUrl:'../../assets/admin/angular/templates/dashboard.html'
    })
    .when('/companies', {
      controller:'companyCtrl',
      templateUrl:'../../assets/admin/angular/templates/index.html'
    })
    .when('/page/:pageId', {
      controller:'pagesCtrl',
      templateUrl:'../../assets/admin/angular/templates/staticPage.html'
    })
    .when('/header', {
      controller:'pagesCtrl',
      templateUrl:'../../assets/admin/angular/templates/menus.html'
    })
    .when('/footer', {
      controller:'pagesCtrl',
      templateUrl:'../../assets/admin/angular/templates/footer.html'
    })
    .when('/footer_social', {
      controller:'pagesCtrl',
      templateUrl:'../../assets/admin/angular/templates/footer_social.html'
    })
    .when('/footer_address', {
      controller:'pagesCtrl',
      templateUrl:'../../assets/admin/angular/templates/footer_address.html'
    })
    .when('/analytics_script', {
      controller:'pagesCtrl',
      templateUrl:'../../assets/admin/angular/templates/analytics_script.html'
    })
    .when('/projects', {
      controller:'projectsCtrl',
      templateUrl:'../../assets/admin/angular/templates/projectsList.html'
    })
    .when('/project/edit/:id', {
      controller:'projectsCtrl',
      templateUrl:'../../assets/admin/angular/templates/projectEdit.html'
    })
     .when('/project/view/:id', {
      controller:'projectsCtrl',
      templateUrl:'../../assets/admin/angular/templates/projectView.html'
    })
    .when('/user/edit/:id', {
      controller:'dashboardCtrl',
      templateUrl:'../../assets/admin/angular/templates/userEdit.html'
    })
    .when('/connects', {
      controller:'dashboardCtrl',
      templateUrl:'../../assets/admin/angular/templates/connectsHistory.html'
    })
    .when('/credits', {
      controller:'creditsCtrl',
      templateUrl:'../../assets/admin/angular/templates/credits.html'
    })
    .when('/price', {
      controller:'creditsCtrl',
      templateUrl:'../../assets/admin/angular/templates/price.html'
    })
    .when('/update-price/:id', {
      controller:'creditsCtrl',
      templateUrl:'../../assets/admin/angular/templates/updatePrice.html'
    })
    .when('/plans', {
      controller:'plansCtrl',
      templateUrl:'../../assets/admin/angular/templates/plans.html'
    })
    .when('/update-plan/:id', {
      controller:'plansCtrl',
      templateUrl:'../../assets/admin/angular/templates/updatePlan.html'
    })
    .when('/connect-requests', {
      controller:'plansCtrl',
      templateUrl:'../../assets/admin/angular/templates/connectRequests.html'
    })
     .when('/profile', {
      controller:'settingsCtrl',
      templateUrl:'../../assets/admin/angular/templates/settings.html'
    })
     .when('/profile/edit/:id', {
      controller:'settingsCtrl',
      templateUrl:'../../assets/admin/angular/templates/settings.html'
    })
     .when('/support', {
      controller:'settingsCtrl',
      templateUrl:'../../assets/admin/angular/templates/support-request.html'
    })
     .when('/invoice', {
      controller:'plansCtrl',
      templateUrl:'../../assets/admin/angular/templates/invoice.html'
    })
     .when('/invoice_history', {
      controller:'plansCtrl',
      templateUrl:'../../assets/admin/angular/templates/invoice_history.html'
    })
     .when('/subscribers',{
      controller:'settingsCtrl',
      templateUrl:'../../assets/admin/angular/templates/subscriber.html'
     })
    .when('/404', {
      templateUrl:'../../assets/admin/angular/templates/404.html'
    })
    .otherwise({
      redirectTo:'/404'
    });
})
