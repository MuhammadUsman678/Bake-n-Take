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
    <title>Chat Application - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="{{url('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/pages/app-chat.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/style.css')}}">
    <!-- END: Custom CSS-->

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern content-left-sidebar chat-application navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">

    <!-- BEGIN: Header-->
  
  
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                     
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>
                                <div class="bookmark-input search-input">
                                    <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="0" data-search="template-list">
                                    <ul class="search-list search-list-bookmark"></ul>
                                </div>
                                <!-- select.bookmark-select-->
                                <!--   option Chat-->
                                <!--   option email-->
                                <!--   option todo-->
                                <!--   option Calendar-->
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                      
                        
            
                       
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{auth()->user()->name}}</span></div><span></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{ url('logout') }}"><i class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0"style="color:#FFC107">BakeenTake</h2>
                    </li>
               
            </ul> 
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item"><a href="{{url('shop/dashboard')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Quill Editor">Dashboard</span></a>
                </li>
                <li class="nav-item hover"><a href="{{ route('shop.product.index') }}"><i class="feather icon-eye"></i><span class="menu-title" data-i18n="Profile">View Products</span></a>
                </li>
      
                    <li class="nav-item"><a href="#"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Quill Editor">View Rfq</span></a>
                    </li>
                    <li class="nav-item"><a href="{{url('shop/chat')}}"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Quill Editor">Chat With Admin</span></a>
                    </li> 
                    <li class="nav-item"><a href="#"><i class="feather icon-search"></i><span class="menu-title" data-i18n="Quill Editor">View place Orders</span></a>
                    </li>
                    <li class="nav-item"><a href="#"><i class="feather icon-eye-off"></i><span class="menu-title" data-i18n="Quill Editor">Report Buyer</span></a>
                    </li>
                    </ul>
                </li>
    
        
               
                
                
              
               
               
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
           
            <div class="content-right">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="chat-overlay"></div>
                        <section class="chat-app-window">
                           
                            <div class="active-chat">
                                <div class="chat_navbar">
                                    <header class="chat_header d-flex justify-content-between align-items-center p-1">
                                        <div class="vs-con-items d-flex align-items-center">
                                            <div class="sidebar-toggle d-block d-lg-none mr-1"><i class="feather icon-menu font-large-1"></i></div>
                                            <div class="avatar user-profile-toggle m-0 m-0 mr-1">
                                                <img src="{{ asset('profileimages/'.$users->image)}}" alt="" height="40" width="40" />
                                                <span class="avatar-status-busy"></span>
                                            </div>
                                            <h6 class="mb-0">{{ $users->name}}</h6>
                                        </div>
                                        <span class="favorite"><i class="feather icon-star font-medium-5"></i></span>
                                    </header>
                                </div>
                                <div class="user-chats" style="height:400px;overflow:scroll">
                                    <div class="chats" id="comment">
                                       @include('admin.partials.chat')
                                   </div>s
                            </div>
                            <div class="chat-app-form">
                                {{-- <form class="chat-app-input d-flex" onsubmit="enter_chat();" action="javascript:void(0);">
                                    <input type="text" class="form-control message mr-1 ml-50" id="iconLeft4-1" placeholder="Type your message">
                                    <button type="button" class="btn btn-primary send" onclick="enter_chat();"><i class="fa fa-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Send</span></button>
                                </form> --}}
                                <form id="restore">
                                    @csrf
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <textarea rows="3" cols="8" class="form-control" type="text" name="message" id="messages"></textarea>
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                    <input type="hidden" name="sender_id" value="{{$users->id}}">
                                   
                                    <button type="submit"  class="position-relative btn btn-primary float-right bg-primary" style="margin: -48px 6px;border-radius:2px; border-color: #348cd4!important; "><i class="fe-send"></i>Send </button>
                                </form>
                            </div>
                        </div>
                      
                        </section>
                        <!-- User Chat profile right area -->
                        <div class="user-profile-sidebar">
                            <header class="user-profile-header">
                                <span class="close-icon">
                                    <i class="feather icon-x"></i>
                                </span>
                                <div class="header-profile-sidebar">
                                    <div class="avatar">
                                        <img src="{{ asset('profileimages/'.$users->image)}}" alt="user_avatar" height="70" width="70">
                                        <span class="avatar-status-busy avatar-status-lg"></span>
                                    </div>
                                    <h4 class="chat-user-name">{{$users->name}}</h4>
                                </div>
                            </header>
                            <div class="user-profile-sidebar-area p-2">
                                <h6>email:</h6>
                                <p>{{$users->email}}</p>
                            </div>
                        </div>
                        <!--/ User Chat profile right area -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>




    <!-- BEGIN: Vendor JS-->
    <script src="{{url('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{url('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{url('app-assets/js/core/app.js')}}"></script>
    <script src="{{url('app-assets/js/scripts/components.js')}}s"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{url('app-assets/js/scripts/pages/app-chat.js')}}"></script>
    <!-- END: Page JS-->
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                      });
    
                $('#restore').on('submit',function(e){
                    e.preventDefault();
                   let obj = $('textarea[name="message"]').val() ;
                   let user = $('input[name="user_id"]').val();
                   let sender = $('input[name="sender_id"]').val();
                    $.post( "{{url('/chat/store/messages')}}", {'message': obj , 'user' : user,'sender':sender })
                        .done(function( data ) {
                            document.getElementById("#restore").reset();
                           
                            $('#comment').html(data);
                        
                    });
                });
            function resetForm(restore) {
                $('#' + formid + ' :input').each(function(){
                    $(this).val('').attr('checked',false).attr('selected',false);
                });
            }
        });
            function refreshComments() {
                let id = $('input[name="user_id"]').val();
                let id2 = $('input[name="sender_id"]').val();
                let url = '{{url("/get-message")}}';
                $.get(url,{user: id,sender:id2},function (data) {
                 $('#comment').html(data);
                });
               
            }
            setInterval("refreshComments()",3000);
    
        </script>
</body>
<!-- END: Body-->

</html>