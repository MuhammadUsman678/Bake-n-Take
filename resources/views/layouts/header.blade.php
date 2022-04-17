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
  <!-- preloader end -->
  <!-- click effect -->
  <div class="sb-click-effect"></div>
  <!-- loader -->
  <div class="sb-load"></div>
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
                <a href="{{ url('/') }}">Home</a>
              </li>
              <!-- <li class="sb-active sb-has-children">
                <a href="about-1.html">Pages</a>
                <ul>
                  <li><a href="about-1.html">About 1</a></li>
                  <li><a href="about-2.html">About 2</a></li>
                  <li><a href="blog-1.html">Blog style 1</a></li>
                  <li><a href="blog-2.html">Blog style 2</a></li>
                  <li><a href="blog-3.html">Blog style 3</a></li>
                  <li><a href="publication-1.html">Publication 1</a></li>
                  <li><a href="publication-2.html">Publication 2</a></li>
                  <li><a href="publication-3.html">Publication 3</a></li>
                  <li><a href="gallery.html">Gallery</a></li>
                  <li><a href="gallery-2.html">Gallery 2</a></li>
                  <li><a href="reviews.html">Reviews</a></li>
                  <li><a href="reservation.html">Reservation</a></li>
                  <li><a href="faq.html">FAQ</a></li>
                  <li><a href="404.html">404</a></li>
                </ul>
              </li>
              <li class="sb-has-children">
                <a href="menu-1.html">Menu</a>
                <ul>
                  <li><a href="menu-1.html">Menu style 1</a></li>
                  <li><a href="menu-2.html">Menu style 2</a></li>
                  <li><a href="menu-3.html">Menu style 3</a></li>
                  <li><a href="menu-4.html">Menu style 4</a></li>
                  <li><a href="menu-5.html">Menu style 5</a></li>
                  <li><a href="menu-6.html">Menu style 6</a></li>
                </ul>
              </li>
              <li class="sb-has-children">
                <a href="shop-1.html">Shop</a>
                <ul>
                  <li><a href="shop-1.html">Shop style 1</a></li>
                  <li><a href="shop-2.html">Shop style 2</a></li>
                  <li><a href="shop-list-1.html">Shop list 1</a></li>
                  <li><a href="shop-list-2.html">Shop list 2</a></li>
                  <li><a href="product.html">Product page</a></li>
                  <li><a href="cart.html">Cart</a></li>
                  <li><a href="checkout.html">Checkout</a></li>
                </ul>
              </li> -->
              <!-- <li>
                <router-link to="/shop">Shop</router-link>
              </li> -->
              @if(empty(auth()->user()))
              <li>
                <a href="{{ route('login') }}">Login</a>
              </li>
              <li>
                <a href="{{ route('register') }}">Register</a>
              </li>
              @endif
              @auth 
                <li>
                  <a href="{{ url('/logout') }}" >Logout</a>
                </li>
                @if(auth()->user()->role_id !=2)
                <li >
                  <a href="{{ (auth()->user()->role_id ==1) ? url('admin/dashboard') : 'shop/dashboard' }}" >Dashboard</a>
                </li>
                @endif
              @endauth
            </ul>
          </nav>
          <div class="sb-buttons-frame">
            <!-- button -->
            <div class="sb-btn sb-btn-2 sb-btn-gray sb-btn-icon sb-m-0 sb-btn-cart">
              <span class="sb-icon">
                <img src="{{asset('front/assets/img/ui/icons/cart.svg')}}" alt="icon">
              </span>
              <i class="sb-cart-number">5</i>
            </div>
            <!-- button end -->
            <!-- menu btn -->
            <div class="sb-menu-btn"><span></span></div>
            <!-- info btn -->
            <div class="sb-info-btn"><span></span></div>
          </div>
        </div>
      </div>
    </div>
    <!-- info bar -->
    <div class="sb-info-bar">
      <div class="sb-infobar-content">
        <div class="sb-ib-title-frame sb-mb-30">
          <h4>Contact</h4><i class="fas fa-arrow-down"></i>
        </div>
        <ul class="sb-list sb-mb-30">
          <li><b>Address:</b><span>Montréal, 1510 Rue Sauvé</span></li>
          <li><b>Working hours:</b><span>09:00 - 23:00</span></li>
          <li><b>Phone:</b><span>+02 (044) 756-X6-52</span></li>
          <li><b>Email:</b><span>starbelly@mail.com</span></li>
        </ul>
        <div class="sb-ib-title-frame sb-mb-30">
          <h4>Instagram</h4><i class="fas fa-arrow-down"></i>
        </div>
        <ul class="sb-instagram sb-mb-30">
          <li><a href="#."><img src="{{asset('front/assets/img/instagram/1.jpg')}}" alt="instagram"></a></li>
          <li><a href="#."><img src="{{asset('front/assets/img/instagram/2.jpg')}}" alt="instagram"></a></li>
          <li><a href="#."><img src="{{asset('front/assets/img/instagram/3.jpg')}}" alt="instagram"></a></li>
          <li><a href="#."><img src="{{asset('front/assets/img/instagram/4.jpg')}}" alt="instagram"></a></li>
          <li><a href="#."><img src="{{asset('front/assets/img/instagram/5.jpg')}}" alt="instagram"></a></li>
          <li><a href="#."><img src="{{asset('front/assets/img/instagram/6.jpg')}}" alt="instagram"></a></li>
        </ul>
        <hr>
        <div class="sb-ib-title-frame sb-mb-30">
          <h4>Latest publications</h4><i class="fas fa-arrow-down"></i>
        </div>
        <a href="#" class="sb-blog-card sb-blog-card-sm sb-mb-30">
          <div class="sb-cover-frame">
            <img src="{{asset('front/assets/img/blog/1.jpg')}}" alt="cover">
          </div>
          <div class="sb-blog-card-descr">
            <h5 class="sb-mb-5">Simple Homemade Tomato Soup</h5>
            <p class="sb-text sb-text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero optio, sed expedita.</p>
          </div>
        </a>
        <a href="#" class="sb-blog-card sb-blog-card-sm sb-mb-30">
          <div class="sb-cover-frame">
            <img src="{{asset('front/assets/img/blog/2.jpg')}}" alt="cover">
          </div>
          <div class="sb-blog-card-descr">
            <h5 class="sb-mb-5">Thai Coconut Soup with Tofu and Rice</h5>
            <p class="sb-text sb-text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero optio, sed expedita.</p>
          </div>
        </a>
        <a href="#" class="sb-blog-card sb-blog-card-sm sb-mb-30">
          <div class="sb-cover-frame">
            <img src="{{asset('front/assets/img/blog/3.jpg')}}" alt="cover">
          </div>
          <div class="sb-blog-card-descr">
            <h5 class="sb-mb-5">21 Things You Should Absolutely Be Buying at ALDI</h5>
            <p class="sb-text sb-text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero optio, sed expedita.</p>
          </div>
        </a>
      </div>
      <div class="sb-info-bar-footer">
        <ul class="sb-social">
          <li><a href="#."><i class="fab fa-twitter"></i></a></li>
          <li><a href="#."><i class="fab fa-instagram"></i></a></li>
          <li><a href="#."><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#."><i class="fab fa-youtube"></i></a></li>
        </ul>
      </div>
    </div>
    <!-- info bar end -->
    <!-- minicart -->
    <div class="sb-minicart">
      <div class="sb-minicart-content">
        <div class="sb-ib-title-frame sb-mb-30">
          <h4>Your order.</h4><i class="fas fa-arrow-down"></i>
        </div>
        <a href="#" class="sb-menu-item sb-menu-item-sm sb-mb-15">
          <div class="sb-cover-frame">
            <img src="{{asset('front/assets/img/menu/4.jpg')}}" alt="product">
          </div>
          <div class="sb-card-tp">
            <h4 class="sb-card-title">Saumon Gravlax</h4>
            <div class="sb-price"><sub>$</sub> 9</div>
          </div>
        </a>
        <a href="#" class="sb-menu-item sb-menu-item-sm sb-mb-15">
          <div class="sb-cover-frame">
            <img src="{{asset('front/assets/img/menu/1.jpg')}}" alt="product">
          </div>
          <div class="sb-card-tp">
            <h4 class="sb-card-title">Chevrefrit au miel</h4>
            <div class="sb-price"><sub>$</sub> 14</div>
          </div>
        </a>
        <a href="#" class="sb-menu-item sb-menu-item-sm sb-mb-15">
          <div class="sb-cover-frame">
            <img src="{{asset('front/assets/img/menu/2.jpg')}}" alt="product">
          </div>
          <div class="sb-card-tp">
            <h4 class="sb-card-title">Croustillant de poisson</h4>
            <div class="sb-price"><sub>$</sub> 4</div>
          </div>
        </a>
        <a href="#" class="sb-menu-item sb-menu-item-sm sb-mb-15">
          <div class="sb-cover-frame">
            <img src="{{asset('front/assets/img/menu/3.jpg')}}" alt="product">
          </div>
          <div class="sb-card-tp">
            <h4 class="sb-card-title">Stracciatella</h4>
            <div class="sb-price"><sub>$</sub> 11</div>
          </div>
        </a>
        <a href="#" class="sb-menu-item sb-menu-item-sm sb-mb-15">
          <div class="sb-cover-frame">
            <img src="{{asset('front/assets/img/menu/5.jpg')}}" alt="product">
          </div>
          <div class="sb-card-tp">
            <h4 class="sb-card-title">Carpaccio de daurade</h4>
            <div class="sb-price"><sub>$</sub> 19</div>
          </div>
        </a>
      </div>
      <div class="sb-minicart-footer">
        <!-- button -->
        <a href="#" class="sb-btn sb-btn-gray sb-btn-text">
          <span>View order</span>
        </a>
        <!-- button end -->
        <!-- button -->
        <a href="#" class="sb-btn sb-btn-text">
          <span>Checkout</span>
        </a>
        <!-- button end -->
      </div>
    </div>
    <!-- minicart end -->
  </div>
  <!-- top bar end -->