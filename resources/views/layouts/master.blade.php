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
<!-- Start of Async Drift Code -->
<!-- Start of Async Drift Code -->
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
  "use strict";
  
  !function() {
    var t = window.driftt = window.drift = window.driftt || [];
    if (!t.init) {
      if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
      t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
      t.factory = function(e) {
        return function() {
          var n = Array.prototype.slice.call(arguments);
          return n.unshift(e), t.push(n), t;
        };
      }, t.methods.forEach(function(e) {
        t[e] = t.factory(e);
      }), t.load = function(t) {
        var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
        o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
        var i = document.getElementsByTagName("script")[0];
        i.parentNode.insertBefore(o, i);
      };
    }
  }();
  drift.SNIPPET_VERSION = '0.3.1';
  drift.load('6iwsa6prir7y');
  </script>
  <!-- End of Async Drift Code -->
  <!-- End of Async Drift Code -->
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
          @if (session()->has('success'))

          <script>
              swal("{{session()->get('success')}}", "", "success", {
                  button: "Close",
          
              });
          </script>
          @endif
          
          @if (session()->has('error'))
          
          <script>
              swal("{{session()->get('error')}}", "", "error", {
                  button: "Close",
          
              });
          </script>
          @endif
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
