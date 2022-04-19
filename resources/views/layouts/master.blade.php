<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="{{asset('front/assets/logo.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- color of address bar in mobile browser -->
    <meta name="theme-color" content="#F5C332" />
    <title>@yield('title','Home') | {{ config('app.name', "Bake'n Take") }}</title>
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
            @yield('content')
        </div>    
      @include('layouts.footer')
      @include('layouts.popup')
  </div>
  <!-- app wrapper end -->

  @include('layouts.script')
  @yield('script')

  </body>
</html>
