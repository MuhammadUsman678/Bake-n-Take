<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="{{asset('front/assets/logo.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- color of address bar in mobile browser -->
    <meta name="theme-color" content="#F5C332" />
    <title>@yield('title','Home') | {{ config('app.name', "Bake'n Take") }}</title>
 <!-- Start of Async Drift Code -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  // s1.src='https://embed.tawk.to/62c0054fb0d10b6f3e7a6e29/1g6v19h6e';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->
  <!-- End of Async Drift Code -->
    @include('layouts.style')
    
    @yield('style')
    <meta name="_token" content="{{csrf_token()}}" />
    <style>
      .no-start{
        color: rgb(182, 178, 178);
      }
    </style>
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
        .overlay{
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 999;
            background: rgba(255,255,255,0.8) url("/loader.gif") center no-repeat;
        }
        body.overlay{
           
        }
        /* Turn off scrollbar when body element has the loading class */
        body.loading{
            overflow: hidden;   
        }
        /* Make spinner image visible when body element has the loading class */
        body.loading .overlay{
            display: block;
            z-index: 10001;
            text-align: center;
        }
        .modal{
          z-index: 10000 !important;
        }
        .invalid-input{
           color: rgba(220, 53, 69, .9) !important;
           background-color: transparent !important;
           display: block !important;
           font-size:unset !important;
        }
        
    </style>

    <!-- page title -->
  </head>
  <body>

     <!-- app wrapper -->
  <div class="sb-app">
      @include('layouts.header')
      
        <!-- dynamic content -->
        <div id="sb-dynamic-content" class="sb-transition-fade">
          @include('sweet::alert')
            @yield('content')
        </div>    
      @include('layouts.footer')
      @include('layouts.popup')
  </div>
  <!-- app wrapper end -->

  @include('layouts.script')
  @yield('script')
  <!-- Start of Async Drift Code -->

  @include('layouts.add-to-cart')
  <!-- End of Async Drift Code -->
  <div class="overlay"></div>
  </body>
</html>
