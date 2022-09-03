 
 @if(\Request::is('/login')||\Request::is('/register'))
 <!-- preloader -->
 <div class="sb-preloader">
    <div class="sb-preloader-bg"></div>
    <div class="sb-preloader-body">
      <div class="sb-loading">
        <div class="sb-percent"><span class="sb-preloader-number" data-count="101">00</span><span>%</span></div>
      </div>
      <div class="sb-loading-bar">
        <div class="sb-bar"></div>
      </div>
    </div>
  </div>
  <!-- loader -->
  <div class="sb-load"></div>
  @endif
  <!-- preloader end -->
  <!-- click effect -->
  <div class="sb-click-effect"></div>
  <!-- top bar -->
  <div class="sb-top-bar-frame">
    <div class="sb-top-bar-bg"></div>
    <div class="container">
      <div class="sb-top-bar">
        <a href="#" class="sb-logo-frame">
          <!-- logo img -->
          <img src="{{asset('front/assets/logo.png')}}" class="header-logo" alt="Starbelly">
        </a>
        <!-- menu -->
        <div class="sb-right-side">
          <nav id="sb-dynamic-menu" class="sb-menu-transition">
            <ul class="sb-navigation">
              <li class="sb-has-children">
                <a data-no-swup href="{{ url('/') }}">Home</a>
              </li>
              <li class="sb-has-children">
                <a href="javascript:void(0);"  data-no-swup="">Categories</a>
                <ul>
                  @foreach($productCategories as $cat)
                    <li><a href="{{ route('front.category',[$cat->slug]) }}" ta-no-swup="">{{$cat->category_name}}</a></li>
                  @endforeach
                  {{-- <li><a href="{{ route('front.categories') }}" ta-no-swup="">View All Categories</a></li> --}}
                </ul>
              </li>
              <li class="sb-has-children">
                <a data-no-swup href="{{url('all_shop')}}">Shop</a>
              </li>
              <li class="sb-has-children">
                <a data-no-swup href="{{ route('front.all.products')}}">Products</a>
              </li>
             
           
            </ul>
          </nav>
          <div class="sb-buttons-frame">
            <!-- button -->
            <a href="#" data-target=".search-modal" data-toggle="modal" style="margin-right: 10px;margin-top: 10px;"> <i class="fa fa-search" style="font-size: 25px"><span></span></i></a> 
            @isUser
            <div class="sb-btn sb-btn-2 sb-btn-gray sb-btn-icon sb-m-0 sb-btn-cart">
              <span class="sb-icon">
                <img src="{{asset('front/assets/img/ui/icons/cart.svg')}}" alt="icon">
              </span>
              <i class="sb-cart-number">{{ $cartItems }}</i>
            </div>
            @endisUser
            {{-- <div class="sb-btn sb-btn-2 sb-btn-gray sb-btn-icon sb-m-0 sb-account-bar">
              <span class="sb-icon">
                <img style="width: 45px" src="{{asset('front/assets/img/ui/icons/account.svg')}}" alt="icon">
              </span>
            </div> --}}
            <!-- button end -->
            <!-- menu btn -->
            <div class="sb-menu-btn"><span><img style="width: 45px" src="{{asset('front/assets/img/ui/icons/menu.svg')}}" alt="icon"></span></div>
            <!-- info btn -->
            <div class="sb-info-btn"><span class="sb-icon">
              <img style="width: 45px" src="{{asset('front/assets/img/ui/icons/account.svg')}}" alt="icon">
            </span></div>
          </div>
        </div>
      </div>
    </div>
    <!-- info bar -->
    <div class="sb-info-bar">
      <div class="sb-infobar-content">
        <div class="sb-ib-title-frame sb-mb-30">
          <h4>Account</h4><i class="fas fa-arrow-down"></i>
        </div>
        <ul class="sb-list sb-mb-30">
          @if(empty(auth()->user()))
          <li>
            <a data-no-swup="" href="{{ route('login') }}">Login</a>
          </li>
          <li>
            <a data-no-swup="" href="{{ route('register') }}">Register</a>
          </li>
          @endif
          @isUser 
           
            <li> <a  data-no-swup="" href="{{url('/myaccount')}}"><b>My Account:</b> </a> </li>
          <li> <a data-no-swup="" href="{{ route('front.orders') }}"><b>Orders:</b> </a> </li>
          <li> <a  data-no-swup="" href="{{ route('front.quotation') }}"><b>View Quotations:</b> </a> </li>
            <li>
              <a data-no-swup="" href="{{ url('/request_quotation') }}" >Request Quotations</a>
            </li>
            @endisUser
          @auth  
            @if(auth()->user()->role_id !=2)
            <li >
              <a href="{{ (auth()->user()->role_id ==1) ? url('admin/dashboard') : 'shop/dashboard' }}" >Dashboard</a>
            </li>
            @endif
            <li>
              <a data-no-swup="" href="{{ url('/logout') }}" >Logout</a>
            </li>
          @endauth
          @guest  
            <li class="sb-has-children">
              <a href="{{url('shop/register')}}" >Register Shop</a>
            </li>
           
          @endguest
          
         
        </ul>
      </div>
    </div>
    <!-- info bar end -->
    <!-- minicart -->
    <div class="sb-minicart">
      <div class="sb-minicart-content">
       
      </div>
      
      <div class="sb-minicart-footer">
        @auth
        <!-- button -->
        <a data-no-swup href="{{ route('front.cart') }}" class="sb-btn sb-btn-gray sb-btn-text">
          <span>View order</span>
        </a>
        <!-- button end -->
        <!-- button -->
        <a data-no-swup href="{{ route('front.checkout') }}" class="sb-btn sb-btn-text">
          <span>Checkout</span>
        </a>
        @endauth
        <!-- button end -->
      </div>
    </div>
    <!-- minicart end -->

     
  </div>
  <!-- top bar end -->