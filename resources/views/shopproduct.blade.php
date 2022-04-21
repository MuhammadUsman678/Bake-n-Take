@extends('layouts.master')
@section('title','Shop Product')
@section('content')

<section class="sb-banner sb-banner-xs sb-banner-color">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- main title -->
          <div class="sb-main-title-frame">
            <div class="sb-main-title">
              <h1 class="sb-h2">{{$shop->shop_name}} Products</h1>
              <ul class="sb-breadcrumbs">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="#.">Products</a></li>
              </ul>
            </div>
          </div>
          <!-- main title end -->
        </div>
      </div>
    </div>

  </section>

  <section class="sb-short-menu sb-p-0-90 mt-4">
    <div class="sb-bg-2">
        <div></div>
    </div>
   


    <div class="container">
        <div class="sb-group-title sb-mb-30">
            <div class="sb-left sb-mb-30">
                <h2 class="sb-mb-30"><span>All</span> Products</h2>
                <p class="sb-text">All shop products of {{$shop->shop_name}}.</p>
            </div>
            <div class="sb-right sb-mb-30">
                <!-- slider navigation -->
                <div class="sb-slider-nav">
                    <div class="sb-prev-btn sb-short-menu-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"><i class="fas fa-arrow-left"></i></div>
                    <div class="sb-next-btn sb-short-menu-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"><i class="fas fa-arrow-right"></i></div>
                </div>
                <!-- slider navigation end -->
                <!-- button -->
                <a href="#" class="sb-btn">
                    <span class="sb-icon">
                        <img src="{{asset('front/assets/img/ui/icons/menu.svg')}}" alt="icon">
                    </span>
                    <span>All {{$shop->shop_name}} Products</span>
                </a>
                <!-- button end -->
            </div>
        </div>
        <div class="swiper-container sb-short-menu-slider-4i swiper-container-horizontal">
            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                
               @foreach ($shopproduct as  $product) 
               
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
                            @if($product->rating->count() > 0)
                            @php
                            $avgRating= (int)(($product->rating->sum('rating') / ($product->rating->count()*5))*5)
                            @endphp
                            <ul class="sb-stars">
                                <li><i class="fas fa-star {{ $avgRating >= 1 ?'' : 'no-start' }}" ></i></li>
                                <li><i class="fas fa-star {{ $avgRating >= 2 ?'' : 'no-start' }}"></i></li>
                                <li><i class="fas fa-star {{ $avgRating >= 3 ?'' : 'no-start' }}"></i></li>
                                <li><i class="fas fa-star {{ $avgRating >= 4 ?'' : 'no-start' }}"></i></li>
                                <li><i class="fas fa-star {{ $avgRating == 5 ?'' : 'no-start' }}"></i></li>
                            </ul>
                            @else
                            Not rated yet.
                            @endif
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
                            @isUser    
                                <a data-id="{{ $product->id }}"  href="#" class="sb-btn sb-atc sb-atc-add-to-cart float-right">
                                <span class="sb-icon">
                                    <img src="{{ asset('front/assets/img/ui/icons/cart.svg')}}" alt="icon">
                                </span>
                                <span class="sb-add-to-cart-text">Add to cart</span>
                                <span class="sb-added-text">Added</span>
                                </a>
                            @endisUser
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
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>






@endsection
