@extends('layouts.master')
@section('title','Quotation')

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<!-- BEGIN: Head-->


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




@section('content')

<body class="vertical-layout vertical-menu-modern content-left-sidebar chat-application navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">

   



    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content" style="margin-left:0px;">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div class="sidebar">
                    <!-- User Chat profile area -->
                    {{-- <div class="chat-profile-sidebar">
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
                    </div> --}}
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
                                @foreach ($quotation as $row )
                                @php
                                $shop=App\shop::where('id',$row->shop_id)->first();
                               
                                @endphp
                                <a data-no-swup=""  href="{{ url('front/chat/'.$shop->id) }}">
                                <li class="
                               
                                ">
                                    <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="{{ asset('profileimages/'.$shop->image)}}" height="42" width="42" alt="No Image">
                                            <i></i>
                                        </span>

                                    </div>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">{{ $shop->shop_name }} </h5>
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
                                                <img src="{{url('profileimages/'.$users->image)}}" alt="" height="40" width="40" />
                                                <span class="avatar-status-busy"></span>
                                            </div>
                                            <h6 class="mb-0">{{ $users->shop->shop_name}}</h6>
                                        </div>
                                        <span class="favorite"><i class="feather icon-star font-medium-5"></i></span>
                                    </header>
                                </div>
                                <div class="user-chats" style="height:400px;overflow:scroll">
                                    <div class="chats" id="comment">
                                       @include('partials.chat')
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
                        @endif
                        </section>
                        @if(!empty($users))
                        <!-- User Chat profile right area -->
                        <div class="user-profile-sidebar">
                            <header class="user-profile-header">
                                <span class="close-icon">
                                    <i class="feather icon-x"></i>
                                </span>
                                <div class="header-profile-sidebar">
                                    <div class="avatar">
                                        <img src="{{url('profileimages/'.$users->image)}}" alt="user_avatar" height="70" width="70">
                                        <span class="avatar-status-busy avatar-status-lg"></span>
                                    </div>
                                    <h4 class="chat-user-name">{{$users->shop->shop_name}}</h4>
                                </div>
                            </header>
                            <div class="user-profile-sidebar-area p-2">
                                <h6>About shop</h6>
                                <p>{{$users->shop->description}}</p>
                                <h6>Address</h6>
                                <p>{{$users->shop->address}}</p>
                                <h6>Phone</h6>
                                <p>{{$users->shop->phone}}</p>
                               
                            </div>
                        </div>
                        <!--/ User Chat profile right area -->
@endif
                    </div>
                </div>
            </div>
        </div>
    </div>




<script src="{{url('app-assets/vendors/js/vendors.min.js')}}"></script>
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

  @endsection 


 <!-- BEGIN: Vendor JS-->
 
 <!-- BEGIN Vendor JS-->

 <!-- BEGIN: Page Vendor JS-->
 <!-- END: Page Vendor JS-->

 <!-- BEGIN: Theme JS-->

