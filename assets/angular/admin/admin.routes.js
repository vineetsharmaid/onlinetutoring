/** 
* Start Angular Js Application Routes
*/
adminApp.config(function($routeProvider) {
  
  $routeProvider
    .when('/', {
      controller:'dashboardCtrl',
      templateUrl:'assets/angular/admin/templates/admin-dashboard.html'
    })
    
    .when('/tutors-request', {
      controller:'rtutorCtrl',
      templateUrl:'assets/angular/admin/templates/tutors-request.html'
    })

    .when('/tutors-request/:tutorId', {
      controller:'rtutorCtrl',
      templateUrl:'assets/angular/admin/templates/requested-tutor-details.html'
    })

    .when('/students-list', {
      controller:'studentCtrl',
      templateUrl:'assets/angular/admin/templates/students-list.html'
    })

    .when('/students-list/:studentId', {
      controller:'studentCtrl',
      templateUrl:'assets/angular/admin/templates/student-details.html'
    })

    .when('/subjects-group', {
      controller:'settingsCtrl',
      templateUrl:'assets/angular/admin/templates/subjects-group.html'
    })

    .when('/subjects', {
      controller:'settingsCtrl',
      templateUrl:'assets/angular/admin/templates/subjects.html'
    })

    .when('/subjects-group/:groupId', {
      controller:'settingsCtrl',
      templateUrl:'assets/angular/admin/templates/subjects.html'
    })

    .when('/schedule/:userId', {
      controller:'scheduleCtrl',
      templateUrl:'assets/angular/admin/templates/user-schedule.html'
    })

    .when('/transactions', {
      controller:'transactionCtrl',
      templateUrl:'assets/angular/admin/templates/admin-transactions.html'
    })

    .when('/transactions/:transactionId', {
      controller:'transactionCtrl',
      templateUrl:'assets/angular/admin/templates/admin-transaction-details.html'
    })

    .when('/pages', {
      controller:'settingsCtrl',
      templateUrl:'assets/angular/admin/templates/pages.html'
    })

    .when('/pages/create', {
      controller:'settingsCtrl',
      templateUrl:'assets/angular/admin/templates/page-create.html'
    })

    .when('/pages/edit/:pageId', {
      controller:'settingsCtrl',
      templateUrl:'assets/angular/admin/templates/page-edit.html'
    })

    .when('/tution-requests', {
      controller:'studentRequestsCtrl',
      templateUrl:'assets/angular/admin/templates/tution-requests.html'
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
