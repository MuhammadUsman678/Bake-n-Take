<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Shop Dashboard</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/tour/tour.css')}}">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->
    <!-- END: Custom CSS-->
    @yield('css')
    {{-- <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('7e3258345f5b5323ac90', {
          cluster: 'mt1'
        });
    
        var channel = pusher.subscribe('Bake;n Take');
        channel.bind('Notification', function(data) {
            $(".count").css("display","block");
      op +='<a href="'+data['id']+'" class="dropdown-item py-3">'+
                '<p class="mb-0 font-weight-medium float-left">'+data['msg']+'</p>'+  
              '</a>';

                      
        
    
      $(".append_noti").append(op);
        });
      </script> --}}
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('shop.layout.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
   @include('shop.layout.menu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        @yield('main')
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
  >
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    {{-- <script src="{{asset('app-assets/vendors/js/extensions/tether.min.js')}}"></script> --}}
    {{-- <script src="{{asset('app-assets/vendors/js/extensions/shepherd.min.js')}}"></script> --}}
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('app-assets/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify();
   
</script>
    <!-- END: Page JS-->
    <!-- END: Custom JS-->
    @yield('js')
</body>
<!-- END: Body-->

</html>