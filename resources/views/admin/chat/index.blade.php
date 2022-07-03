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
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-danger badge-up">{{ App\notification_user::where('user_id',Auth::user()->id)->where('is_read',false)->count() }}</span></a>
                                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                    <li class="dropdown-menu-header">
                                        <div class="dropdown-header m-0 p-2">
                                            <h3 class="white">{{ App\notification_user::where('user_id',Auth::user()->id)->where('is_read',false)->count() }}</h3><span class="notification-title">Notifications</span>
                                        </div>
                                    </li>
                                    <li class="scrollable-container media-list">
                                        @forelse (App\notification_user::where('user_id',Auth::user()->id)->where('is_read',false)->latest()->get() as $notification)
                                            <a class="d-flex justify-content-between {{ $notification->is_read === 0 ? 'bg-light' : '' }}" href="{{ route('see_all_notifications',Auth::user()->id)  }}">
                                                <div class="media d-flex align-items-start">
                                                    <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                                    <div class="media-body">
                                                    
                                                        @foreach ($notification as $item)
                                                         <small class="notification-text"> {{ $item }}</small>
                                                        @endforeach
    
                                                    </div>
                                                    <small><time class="media-meta" datetime="{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}"> {{\Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</time></small>
                                                </div>
                                            </a>
                                        @empty
                                            <a class="d-flex justify-content-between" href="javascript:void(0)">
                                                <div class="media d-flex align-items-start">
                                                    <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                                    <div class="media-body">
                                                        <h6 class="danger media-heading yellow darken-3">Notification Warning</h6><small class="notification-text">You Have No New Notifications.</small>
                                                    </div><small>
                                                        <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                                </div>
                                            </a>
                                        @endforelse
    
    
    
    
    
    
                                        {{-- <a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                                <div class="media-body">
                                                    <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                            </div>
                                        </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                                <div class="media-body">
                                                    <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6><small class="notification-text">Server have 99% CPU usage.</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                            </div>
                                        </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>
                                                <div class="media-body">
                                                    <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                            </div>
                                        </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                                                <div class="media-body">
                                                    <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                            </div>
                                        </a></li> --}}
                                    <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="{{ route('see_all_notifications',Auth::user()->id)  }}">View all notifications</a></li>
                                </ul>
                            </li>
                   
                    <ul class="nav navbar-nav float-right">
                      
                        
            
                       
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{auth()->user()->name}}</span></div><span></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{ url('admin/editprofile') }}"><i class="feather icon-setting"></i>Edit Profile</a>
                                <a class="dropdown-item" href="{{ url('logout') }}"><i class="feather icon-power"></i> Logout</a>
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
                        <h2 class="brand-text mb-0" style="color:#FFC107">BakeenTake</h2>
                    </li>
               
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item has-sub"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Ecommerce">Sellers</span></a>
                    <ul class="menu-content" style="">
                        <li class="is-shown"><a href="{{url('admin/approvedshop')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">Approved Seller</span></a>
                        </li>
                        <li class="is-shown"><a href="{{url('admin/pendingapproved')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">Pending Approvals</span></a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item"><a href="{{url('admin/chat')}}"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Quill Editor">Chat With Buyer</span></a>
                </li> 

                <li class="nav-item"><a href="{{url('admin/category')}}"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Quill Editor">Category</span></a>
                </li>
                <li class="nav-item has-sub "><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Ecommerce">Orders</span></a>
                    <ul class="menu-content" style="">
                        <li class="is-shown"><a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">Pending Orders</span></a>
                        </li>
                        <li class="is-shown"><a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">Complete Orders</span></a>
                        </li>
                        
                    </ul>
                </li>
                    <li class="nav-item"><a href="#"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Quill Editor">Manage Complains</span></a>
                    </li>
                    <li class="nav-item"><a href="#"><i class="feather icon-briefcase"></i><span class="menu-title" data-i18n="Quill Editor">Manage Transactions</span></a>
                    </li> 
                    <li class="nav-item"><a href="#"><i class="feather icon-search"></i><span class="menu-title" data-i18n="Quill Editor">Detect Fake Reviews</span></a>
                    </li> 
                
                {{-- <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">Customers</span></a>
                    <ul class="menu-content">
                        <li><a href="app-user-list.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Verified Customers</span></a>
                        </li>
                        <li><a href="app-user-view.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">Non Verified Customers</span></a>
                        </li>
     
                        </li>
                    </ul>
                </li> --}}
    
        
               
                
                
              
               
               
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div class="sidebar">
                    <!-- User Chat profile area -->
                    <div class="chat-profile-sidebar">
                        <header class="chat-profile-header">
                            <span class="close-icon">
                                <i class="feather icon-x"></i>
                            </span>
                            <div class="header-profile-sidebar">
                                <div class="avatar">
                                    <img src="@if(!empty(auth()->user()->image)) {{ asset('profileimages/'.auth()->user()->image)}} @else {{ asset('app-assets/images/portrait/small/avatar-s-11.jpg')}} @endif" alt="user_avatar" height="70" width="70">
                                    <span class="avatar-status-online avatar-status-lg"></span>
                                </div>
                                <h4 class="chat-user-name">{{ auth()->user()->name }}</h4>
                            </div>
                        </header>
                        <div class="profile-sidebar-area">
                            <div class="scroll-area">
                                <h6>About</h6>
                                <div class="about-user">
                                    <fieldset class="mb-0">
                                        <textarea data-length="120" class="form-control char-textarea" id="textarea-counter" rows="5" placeholder="About User">Main Admin Of Bake'n Take That Manage All The Records.</textarea>
                                    </fieldset>
                                    <small class="counter-value float-right"><span class="char-count">108</span> / 120 </small>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--/ User Chat profile area -->
                    <!-- Chat Sidebar area -->
                    <div class="sidebar-content card">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="chat-fixed-search">
                            <div class="d-flex align-items-center">
                                <div class="sidebar-profile-toggle position-relative d-inline-flex">
                                    <div class="avatar">
                                        <img src="@if(!empty(auth()->user()->image)) {{ asset('profileimages/'.auth()->user()->image)}} @else {{ asset('app-assets/images/portrait/small/avatar-s-11.jpg')}} @endif" alt="user_avatar" height="40" width="40">
                                        <span class="avatar-status-online"></span>
                                    </div>
                                    <div class="bullet-success bullet-sm position-absolute"></div>
                                </div>
                                <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                                    <input type="text" class="form-control round" id="chat-search" placeholder="Search or start a new chat">
                                    <div class="form-control-position">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div id="users-list" class="chat-user-list list-group position-relative">
                            <h3 class="primary p-1 mb-0">Chats</h3>
                            <ul class="chat-users-list-wrapper media-list">
                                @foreach ($user as $row )
                                <a href="{{ url('admin/chat/'.$row->id) }}">
                                <li class="
                               
                                ">
                                    <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="{{ asset('profileimages/'.$row->image)}}" height="42" width="42" alt="No Image">
                                            <i></i>
                                        </span>

                                    </div>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">{{ $row->shop->shop_name }} </h5>
                                            {{-- <p class="truncate">Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing</p> --}}
                                        </div>
                                        <div class="contact-meta">
                                            {{-- <span class="float-right mb-25">4:14 PM</span> --}}
                                            {{-- <span class="badge badge-primary badge-pill float-right">3</span> --}}
                                        </div>
                                    </div>
                                </li>
                            </a>
                                @endforeach
                            </ul>
                         
                           
                        </div>
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="chat-overlay"></div>
                        <section class="chat-app-window">
                            @if(empty($users))
                            <div class="start-chat-area">
                                <span class="mb-1 start-chat-icon feather icon-message-square"></span>
                                <h4 class="py-50 px-1 sidebar-toggle start-chat-text">Start Conversation</h4>
                            </div>
                            @else
                            <div class="active-chat">
                                <div class="chat_navbar">
                                    <header class="chat_header d-flex justify-content-between align-items-center p-1">
                                        <div class="vs-con-items d-flex align-items-center">
                                            <div class="sidebar-toggle d-block d-lg-none mr-1"><i class="feather icon-menu font-large-1"></i></div>
                                            <div class="avatar user-profile-toggle m-0 m-0 mr-1">
                                                <img src="{{ asset('profileimages/'.$users->image)}}" alt="" height="40" width="40" />
                                                <span class="avatar-status-busy"></span>
                                            </div>
                                            <h6 class="mb-0">{{ $users->shop->shop_name}}</h6>
                                        </div>
                                        <span class="favorite"><i class="feather icon-star font-medium-5"></i></span>
                                    </header>
                                </div>
                                <div class="user-chats" style="height:400px;overflow:scroll">
                                    <div class="chats" id="comment">
                                       @include('admin.partials.chat')
                                   </div>
                            </div>
                            <div class="chat-app-form">
                                {{-- <form class="chat-app-input d-flex" onsubmit="enter_chat();" action="javascript:void(0);">
                                    <input type="text" class="form-control message mr-1 ml-50" id="iconLeft4-1" placeholder="Type your message">
                                    <button type="button" class="btn btn-primary send" onclick="enter_chat();"><i class="fa fa-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Send</span></button>
                                </form> --}}
                                <form id="restore">
                                    @csrf
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <textarea rows="3" cols="8" class="form-control" type="text" name="message">{{old('message')}}</textarea>
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                    <input type="hidden" name="sender_id" value="{{$users->id}}">
                                    <button type="submit"  class="position-relative btn btn-primary float-right bg-primary" style="margin: -48px 6px;border-radius:2px; border-color: #348cd4!important; "><i class="fe-send"></i>Send </button>
                                </form>
                            </div>
                        </div>
                        @endif
                        </section>
                        <!-- User Chat profile right area -->
                        <div class="user-profile-sidebar">
                            <header class="user-profile-header">
                                <span class="close-icon">
                                    <i class="feather icon-x"></i>
                                </span>
                                <div class="header-profile-sidebar">
                                    <div class="avatar">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="user_avatar" height="70" width="70">
                                        <span class="avatar-status-busy avatar-status-lg"></span>
                                    </div>
                                    <h4 class="chat-user-name">Felecia Rower</h4>
                                </div>
                            </header>
                            <div class="user-profile-sidebar-area p-2">
                                <h6>About</h6>
                                <p>Toffee caramels jelly-o tart gummi bears cake I love ice cream lollipop. Sweet liquorice croissant candy danish dessert icing. Cake macaroon gingerbread toffee sweet.</p>
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
                            $('#restore').trigger('reset');
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