@extends('layouts.master')
@section('title','All Products')

<style>
   #range-slider {
            max-width  : 80%;
            margin     : 0 auto;
            padding-top: 50px;
        }

        /* #slider-range { background-color: #df4a4a; } */

        .ui-slider-horizontal .ui-slider-range {
            background-color: #2EAC9D!important;
        }

        .w__84 {
            display      : flex;
            width        : 84%;
            padding-right: var(--bs-gutter-x, .75rem);
            padding-left : var(--bs-gutter-x, .75rem);
            margin-right : auto;
            margin-left  : auto;
        }

        .ui-slider .ui-slider-handle {
            box-shadow   : 0 0 5px 0 rgba(0, 0, 0, 0.20);
            border-radius: 50%;
            height       : 20px;
            width        : 20px;
        }

        /* .ui-widget-content {
	border: 1px solid #dddddd;
	background: #F5F5F5 !important;
	color: #333333;
} */

        .ui-state-default,
        .ui-widget-content .ui-state-default {
            border     : 1px solid #c5c5c5;
            background : #2EAC9D !important;
            font-weight: normal;
            color      : #454545;
        }

        #amount {
            font-size  : 1.75em;
            font-weight: 300;
            line-height: 1.6875em;
            color      : #2EAC9D;
            text-align : center;
            width      : 100%;
            margin-top : 20px;
        }

        /* end slider */
  </style>

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
    <div id="range-slider" class="rounded-pill">

      <div id="slider-range"></div>
      <p>
          <input type="text" id="amount" readonly style="border:0;">
      </p>
  </div> <!-- close range-slider div -->

 

 
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
@section('script')
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(function() {
  $("#slider-range").slider({
      range: true,
      min: 1500,
      max: 10000,
      step: 100,
      values: [3000, 6000],
      slide: function(event, ui) {
          $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
      }
  });
  $("#amount").val("$" + $("#slider-range").slider("values", 0) +
      " - $" + $("#slider-range").slider("values", 1));
});
</script>
@endsection