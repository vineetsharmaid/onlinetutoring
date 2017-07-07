<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Login | Rostrum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="icon" type="image/x-icon" href="<?=base_url()?>assets/img/favicon.png">
    <link rel="apple-touch-icon" href="<?=base_url()?>assets/pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/pages/ico/76.png">
    <link class="main-stylesheet" href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>assets/pages/ico/120.png">
    <link href="<?=base_url()?>assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="<?=base_url()?>assets/pages/css/pages.css" rel="stylesheet" type="text/css" />
    <link class="main-stylesheet" href="<?=base_url()?>assets/css/alertify.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>bower_components/angular-xeditable/dist/css/xeditable.css" rel="stylesheet">
    <script type="text/javascript">
    var baseurl = '<?=base_url()?>';
    
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/pages/css/windows.chrome.fix.css" />'
    }
    </script>
  </head>

  <body class="fixed-header" ng-app="loginApp" ng-controller="loginController">
    <div id="rostrum_fullloader"></div>
    <div id="rostrum_partialloader" ng-show="showLoader" ng-cloak></div>