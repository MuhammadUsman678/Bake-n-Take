@extends('layouts.master')
@section('title','Checkout')
@section('content')
   <!-- banner -->
   <section class="sb-banner sb-banner-xs sb-banner-color">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- main title -->
          <div class="sb-main-title-frame">
            <div class="sb-main-title">
              <h1 class="sb-h2">Online shop</h1>
              <ul class="sb-breadcrumbs">
                <li><a href="home-1.html">Home</a></li>
                <li><a href="shop-1.html">Shop</a></li>
                <li><a href="#.">Product</a></li>
              </ul>
            </div>
          </div>
          <!-- main title end -->
        </div>
      </div>
    </div>
  </section>
  <!-- banner end -->

  <!-- product -->
  <section class="sb-p-90-0">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="sb-gallery-item sb-gallery-square sb-mb-90">
            <img src="{{ $product->getFirstMediaurl('images') }}" alt="photo">
            <div class="sb-badge sb-vegan"><i class="fas fa-leaf"></i> Vegan</div>
            <!-- button -->
            <a data-fancybox="menu" data-no-swup href="{{ $product->getFirstMediaurl('images') }}" class="sb-btn sb-btn-2 sb-btn-icon sb-btn-gray sb-zoom">
              <span class="sb-icon">
                <img src="{{ asset('front/assets/img/ui/icons/zoom.svg') }}" alt="icon">
              </span>
            </a>
            <!-- button end -->
          </div>
        </div>
        <div class="col-lg-6">
          <div class="sb-product-description sb-mb-90">
            <div class="sb-price-frame sb-mb-30">
              <h3>{{ $product->product_name }}</h3>
              <div class="sb-price"><sub>Rs</sub> {{ $product->price }}</div>
            </div>
            <ul class="sb-stars sb-mb-25">
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><span>(4 ratings)</span></li>
            </ul>
            <p class="sb-text sb-mb-30"><span>tomatoes</span>, <span>nori</span>, <span>feta cheese</span>, <span>mushrooms</span>, <span>rice noodles</span>, <span>corn</span>, <span>shrimp</span>.</p>
            <div class="row">
              <div class="col-lg-4">
                <div class="sb-features-item sb-features-item-sm sb-mb-30">
                  <div class="sb-number">01</div>
                  <div class="sb-feature-text">
                    <h4 class="sb-mb-15">Add to the cart and place an order</h4>
                    <p class="sb-text sb-text-sm">Porro comirton pera nemo veniam</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="sb-features-item sb-features-item-sm sb-mb-30">
                  <div class="sb-number">02</div>
                  <div class="sb-feature-text">
                    <h4 class="sb-mb-15">Enter your phone number and address</h4>
                    <p class="sb-text sb-text-sm">Eligendi adipisci numquam.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="sb-features-item sb-features-item-sm sb-mb-30">
                  <div class="sb-number">03</div>
                  <div class="sb-feature-text">
                    <h4 class="sb-mb-15">Enjoy your favorite food at home!</h4>
                    <p class="sb-text sb-text-sm">Nnecessitatibus praesentium</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="sb-buttons-frame">
              {{-- <div class="sb-input-number-frame">
                <div class="sb-input-number-btn sb-sub">-</div>
                <input type="number" value="1" min="1" max="10">
                <div class="sb-input-number-btn sb-add">+</div>
              </div> --}}
              <!-- button -->
              @auth    
                <a data-id="{{ $product->id }}"  href="#" class="sb-btn sb-atc sb-atc-add-to-cart float-right">
                <span class="sb-icon">
                    <img src="{{ asset('front/assets/img/ui/icons/cart.svg')}}" alt="icon">
                </span>
                <span class="sb-add-to-cart-text">Add to cart</span>
                <span class="sb-added-text">Added</span>
                </a>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="sb-btn sb-atc float-right">
                    <span class="sb-icon">
                        <img src="{{ asset('front/assets/img/ui/icons/cart.svg')}}" alt="icon">
                    </span>
                    <span class="sb-add-to-cart-text">Add to cart</span>
                    <span class="sb-added-text">Added</span>
                </a>
            @endguest
              
              <!-- button end -->
            </div>
          </div>
        </div>
      </div>
      <!-- filter -->
      <div class="sb-filter">
        {{-- <a href="#." data-filter=".sb-ingredients-tab" class="sb-filter-link sb-active">Ingredients</a> --}}
        <a href="#." data-filter=".sb-details-tab" class="sb-filter-link sb-active">Product details</a>
        <a href="#." data-filter=".sb-reviews-tab" class="sb-filter-link">Reviews</a>
      </div>
      <!-- filter end -->
      <div class="sb-masonry-grid sb-tabs">
        <div class="sb-grid-sizer"></div>
        <div class="sb-grid-item sb-details-tab">
          <div class="sb-tab">
            <p class="sb-text sb-mb-15">
            {{ $product->description }}.</p>
            <div class="sb-text">Consectetur adipisicing elit. Delectus quibusdam repellendus nesciunt cumque fugit numquam adipisci voluptatum quam, sapiente doloribus ut eaque natus laudantium alias illum quos maiores, quia perferendis.</div>
          </div>
        </div>
        <div class="sb-grid-item sb-reviews-tab" style="position: absolute">
          <div class="sb-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="sb-review-card sb-mb-60">
                  <div class="sb-review-header sb-mb-15">
                    <h4 class="sb-mb-10">Very tasty</h4>
                    <ul class="sb-stars">
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                    </ul>
                  </div>
                  <p class="sb-text sb-mb-15">Inventore possimus laudantium provident, rem eligendi velit. Aut molestias, ipsa itaque laborum, natus
                    tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit rem accusamus! Quibusdam labore, aliquam dolor harum!</p>
                  <div class="sb-author-frame">
                    <div class="sb-avatar-frame">
                      <img src="img/faces/1.jpg" alt="Guest">
                    </div>
                    <h4>Emma Newman</h4>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sb-review-card sb-mb-60">
                  <div class="sb-review-header sb-mb-15">
                    <h4 class="sb-mb-10">I have lunch here every day</h4>
                    <ul class="sb-stars">
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                    </ul>
                  </div>
                  <p class="sb-text sb-mb-15">Tempora ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit Reprehenderit rem accusamus! Quibusdam labore, aliquam dolor harum!</p>
                  <div class="sb-author-frame">
                    <div class="sb-avatar-frame">
                      <img src="img/faces/2.jpg" alt="Guest">
                    </div>
                    <h4>Paul Trueman</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- product end -->

  <!-- short menu -->
  <section class="sb-short-menu sb-p-0-90">
    <div class="sb-bg-2">
      <div></div>
    </div>
    <div class="container">
      <div class="sb-group-title sb-mb-30">
        <div class="sb-left sb-mb-30">
          <h2 class="sb-cate-title sb-mb-30">It is usually bought together with this product</h2>
          <p class="sb-text">Consectetur numquam poro nemo veniam<br>eligendi rem adipisci quo modi.</p>
        </div>
        <div class="sb-right sb-mb-30">
          <!-- slider navigation -->
          <div class="sb-slider-nav">
            <div class="sb-prev-btn sb-short-menu-prev"><i class="fas fa-arrow-left"></i></div>
            <div class="sb-next-btn sb-short-menu-next"><i class="fas fa-arrow-right"></i></div>
          </div>
          <!-- slider navigation end -->
        </div>
      </div>
      <div class="swiper-container sb-short-menu-slider-4i">
        <div class="swiper-wrapper">
            @foreach ($realtedProducts as $key => $product)    
            <div class="swiper-slide" style="width: 270px; margin-right: 30px;">
                <a data-fancybox="menu" data-no-swup="" href="{{ $product->getFirstMediaurl('images') ? $product->getFirstMediaurl('images') : 'https://via.placeholder.com/270?text=No+Image+Found'  }}" class="sb-menu-item">
                    <div class="sb-cover-frame">
                        <img src="{{ $product->getFirstMediaurl('images') ? $product->getFirstMediaurl('images') : 'https://via.placeholder.com/270?text=No+Image+Found'  }}" alt="{{ $product->product_name}}">
                        <div class="sb-badge sb-vegan">{{ $product->category->category_name }}</div>
                    </div>
                    <div class="sb-card-tp">
                        <h4 class="sb-card-title">{{ $product->product_name }}</h4>
                        <div class="sb-price"><sub>Rs.</sub> {{ $product->price }}</div>
                    </div>
                    <div class="sb-description">
                        <p class="sb-text sb-mb-15">{{ \Str::limit($product->product_description,67,'...') }}</p>
                        <ul class="sb-stars">
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="sb-card-buttons-frame">
                        <!-- button -->
                        <a href="{{ route('front.single.product',[$product->slug]) }}" class="sb-btn sb-btn-2 sb-btn-gray sb-btn-icon sb-m-0 float-left">
                          <span class="sb-icon">
                            <img src="{{ asset('front/assets/img/ui/icons/arrow.svg')}}" alt="icon">
                          </span>
                        </a>
                        <!-- button end -->
                        <!-- button -->
                        @auth    
                            <a data-id="{{ $product->id }}"  href="#" class="sb-btn sb-atc sb-atc-add-to-cart float-right">
                            <span class="sb-icon">
                                <img src="{{ asset('front/assets/img/ui/icons/cart.svg')}}" alt="icon">
                            </span>
                            <span class="sb-add-to-cart-text">Add to cart</span>
                            <span class="sb-added-text">Added</span>
                            </a>
                        @endauth
                        @guest
                           <a href="{{ route('login') }}" class="sb-btn sb-atc float-right">
                                <span class="sb-icon">
                                    <img src="{{ asset('front/assets/img/ui/icons/cart.svg')}}" alt="icon">
                                </span>
                                <span class="sb-add-to-cart-text">Add to cart</span>
                                <span class="sb-added-text">Added</span>
                            </a>
                        @endguest
                        
                        <!-- button end -->
                      </div>
                </a>
            </div>
           @endforeach
        </div>
      </div>
    </div>
  </section>
  <!-- short menu end -->

@endsection
@section('script')

<script type="text/javascript">
    $(document).ready(function() {
        $('.search-close').click();
    });
</script>    


@endsection