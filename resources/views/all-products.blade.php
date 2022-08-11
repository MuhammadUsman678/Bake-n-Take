@extends('layouts.master')
@section('title','All Products')
@section('style')
<link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap-slider.css') }}" referrerpolicy="no-referrer" />

@endsection
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
   
    {{-- <div id="range-slider" class="rounded-pill">

      <div id="slider-range"></div>
      <p>
          <input type="text" id="amount" readonly style="border:0;">
      </p>
  </div> <!-- close range-slider div --> --}}

 

 
    <div class="sb-bg-1">
      <div></div>
    
    </div>
    <div class="container">
      Filter by price interval: </br> 
      <b class="mr-2">RS {{ $min }}</b> <input id="ex2" type="text" class="span2 ml-2 mr-2" value="" data-slider-min="{{ $min }}" data-slider-max="{{ $max }}" data-slider-step="5" data-slider-value="[{{ $min }},{{ $max }}]"/> <b class="ml-2">RS {{ $max }}</b>
      <span id="ex6CurrentSliderValLabel">Price Range: <span id="ex6SliderVal">{{ $min }}  , {{ $max }}</span></span>
      <form method="post" id="rangeSearchForm" action="{{ route('front.rangeSearch') }}">
        @csrf
          <input type="hidden" name="range" id="rangeInput">
          <button class="btn btn-primary">Search</button>
      </form>
      <div class="row mt-5">
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
              <p class="sb-text sb-mb-15">{{ \Str::limit($product->product_description,67,'...') }}</p>
              @if($product->rating->count() > 0)
              <ul class="sb-stars">
                  <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') >= 1 ?'' : 'no-start' }}" ></i></li>
                  <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') >= 2 ?'' : 'no-start' }}"></i></li>
                  <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') >= 3 ?'' : 'no-start' }}"></i></li>
                  <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') >= 4 ?'' : 'no-start' }}"></i></li>
                  <li><i class="fas fa-star {{ (int) $product->rating->sum('rating') == 5 ?'' : 'no-start' }}"></i></li>
              </ul>
              @else
              Not rated yet.
              @endif
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
@section('script')
<script src="{{ asset('front/assets/js/bootstrap-slider.js') }}" referrerpolicy="no-referrer"></script>
<script>
$(function() {
      // Without JQuery
    var slider = new Slider("#ex2");
    slider.on("slide", function(sliderValue) {
      document.getElementById("ex6SliderVal").textContent = sliderValue;
      $('#rangeInput').val(sliderValue);
  });
});
</script>
@endsection