@extends('layouts.master')
@section('title','All Products')
@section('content')

<section class="sb-banner sb-banner-xs sb-banner-color">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- main title -->
          <div class="sb-main-title-frame">
            <div class="sb-main-title">
              <h1 class="sb-h2">All Products</h1>
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

   <!-- shop list -->
   <section class="sb-menu-section sb-p-90-60">
    <div class="sb-bg-1">
      <div></div>
    </div>
    <div class="container">
      <div class="row">
        @foreach ($products as $product)    
          <div class="col-lg-3">
          <div class="sb-menu-item sb-mb-30">
            <a href="{{ route('front.single.product',[$product->slug]) }}" class="sb-cover-frame">
                <img src="{{ $product->getFirstMediaurl('images') ? $product->getFirstMediaurl('images') : 'https://via.placeholder.com/270?text=No+Image+Found'  }}" alt="{{ $product->product_name}}">
            </a>
            <div class="sb-card-tp">
              <h4 class="sb-card-title"><a href="{{ route('front.single.product',[$product->slug]) }}">{{ $product->product_name }}</a></h4>
              <div class="sb-price"><sub>Rs</sub> {{ $product->price }}</div>
            </div>
            <div class="sb-description">
              <p class="sb-text sb-mb-15"><span>tomatoes</span>, <span>nori</span>, <span>feta cheese</span>, <span>mushrooms</span>, <span>rice noodles</span>, <span>corn</span>, <span>shrimp</span>.</p>
            </div>
            <div class="sb-card-buttons-frame">
              <!-- button -->
              <a href="{{ route('front.single.product',[$product->slug]) }}" class="sb-btn sb-btn-2 sb-btn-gray sb-btn-icon sb-m-0">
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
          </div>
          </div>
        @endforeach
      </div>
      <div>
        {{ $products->links() }}
        {{-- <ul class="sb-pagination">
          <li class="sb-active"><a href="#.">1</a></li>
          <li><a href="shop-list-2.html">2</a></li>
          <li><a href="shop-list-2.html">3</a></li>
          <li><a href="shop-list-2.html">4</a></li>
          <li><a href="shop-list-2.html">...</a></li>
        </ul> --}}
      </div>
    </div>
  </section>
  <!-- shop list end -->





@endsection