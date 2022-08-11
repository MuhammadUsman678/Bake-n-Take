 <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                        <div class="brand-logo"></div>
                       <a href="{{url('shop/dashboard')}}"> <h2 class="brand-text mb-0"style="color:#FFC107">BakeenTake</h2></a>
                    </li>
               
            </ul> 
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
               
                <li class="nav-item hover"><a href="{{ route('shop.product.index') }}"><i class="feather icon-eye"></i><span class="menu-title" data-i18n="Profile">View Products</span></a>
                </li>
      
                    <li class="nav-item"><a href="{{url('shop/rfq')}}"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Quill Editor">View Rfq</span></a>
                    </li>
                    <li class="nav-item"><a href="{{url('shop/chat')}}"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Quill Editor">Chat</span></a>
                    </li> 
                    {{-- <li class="nav-item"><a href="#"><i class="feather icon-search"></i><span class="menu-title" data-i18n="Quill Editor">View place Orders</span></a>
                    </li> --}}
                    <li class="nav-item has-sub "><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Ecommerce">Orders</span></a>
                        <ul class="menu-content" style="">
                            <li class="is-shown"><a href="{{ route('shop.orders.new') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">New Orders</span></a>
                            </li> 
                            <li class="is-shown"><a href="{{ route('shop.orders.pending') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">Pending Orders</span></a>
                            </li>
                            <li class="is-shown"><a href="{{ route('shop.orders.complete') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">Complete Orders</span></a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#"><i class="feather icon-eye-off"></i><span class="menu-title" data-i18n="Quill Editor">Report Buyer</span></a>
                    </li>
                    </ul>
                </li>
    
        
               
                
                
              
               
               
            </ul>
        </div>
    </div>