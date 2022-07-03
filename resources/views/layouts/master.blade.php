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
  s1.src='https://embed.tawk.to/62c0054fb0d10b6f3e7a6e29/1g6v19h6e';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->
  <!-- End of Async Drift Code -->
    @include('layouts.style')
    
    @yield('style')

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
  </body>
</html>
