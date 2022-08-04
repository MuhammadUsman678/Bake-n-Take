@extends('layouts.master')
@section('title','Cart')
@section('content')
  <!-- banner -->
  <section class="sb-banner sb-banner-xs sb-banner-color">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- main title -->
          <div class="sb-main-title-frame">
            <div class="sb-main-title">
              <h1 class="sb-h2">Your order.</h1>
              <ul class="sb-breadcrumbs">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('shop') }}">Shop</a></li>
                <li><a href="#.">Cart</a></li>
              </ul>
            </div>
          </div>
          <!-- main title end -->
        </div>
      </div>
    </div>
  </section>
  <!-- banner end -->

  <!-- cart -->
  <section class="sb-p-90-90">
    <div class="container">
      <div class="sb-cart-table">
        <div class="sb-cart-table-header">
          <div class="row">
            <div class="col-lg-6">Product</div>
            <div class="col-lg-3">Quantity</div>
            <div class="col-lg-1">Price</div>
            <div class="col-lg-1">Total</div>
            <div class="col-lg-1"></div>
          </div>
        </div>
        @php
            $total_amount=0;
        @endphp
        @forelse ($cart as $row)
        <div class="sb-cart-item item-{{ $row->id }}">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <a class="sb-product" href="{{ route('front.product.show',[$row->product->slug]) }}">
                  <div class="sb-cover-frame">
                    <img src="{{ $row->product->getFirstMediaurl('images') ? $row->product->getFirstMediaurl('images') : 'https://via.placeholder.com/270?text=No+Image+Found'  }}" alt="product">
                  </div>
                  <div class="sb-prod-description">
                    <h4 class="sb-mb-10">{{ $row->product->product_name }}</h4>
                    <p class="sb-text sb-text-sm"><span>tomatoes</span>, <span>nori</span>, <span>feta cheese</span>, <span>mushrooms</span>, <span>rice noodles</span>, <span>corn</span>, <span>shrimp</span>.</p>
                  </div>
                </a>
              </div>
              <div class="col-6 col-lg-3">
                <div class="sb-input-number-frame">
                  <div class="sb-input-number-btn sb-sub" data-id="{{ $row->id }}" data-price="{{ $row->product->price }}">-</div>
                  <input type="number" readonly id="quantity-{{ $row->id }}" data-quantity="{{ $row->id }}" value="{{ $row->quantity }}" min="1" max="100">
                  <div class="sb-input-number-btn sb-add" data-id="{{ $row->id }}" data-price="{{ $row->product->price }}">+</div>
                </div>
              </div>
              <div class="col-3 col-lg-1">
                <div class="sb-price-1"><span>Price: </span>Rs {{ $row->product->price }}</div>
              </div>
              <div class="col-3 col-lg-1">
                <div class="sb-price-2 product-total-{{ $row->id }}"><span>Total: </span>Rs {{ $row->product->price*$row->quantity }}</div>
              </div>
              <div class="col-1">
                <a href="#." data-id="{{ $row->id }}" data-price="{{ $row->product->price }}" class="sb-remove">+</a>
              </div>
            </div>
          </div>
          @php
              $total_amount +=$row->product->price*$row->quantity;
          @endphp
        @empty
        <div class="sb-cart-item text-center">
            Cart is Empty!
          </div>
        @endforelse
       

        <div class="row justify-content-end">
          <div class="col-lg-6">
            <div class="sb-cart-total">
              <div class="sb-realy-sum">
                <div class="row">
                  <div class="col-8">
                    <div class="sb-total-title">Total:</div>
                  </div>
                  <div class="col-4">
                    <div class="sb-price-2 text-right total-amount">Rs {{$total_amount  }}</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="sb-cart-btns-frame text-right">
              <!-- button -->
              <a href="{{ route('front.all.products')}}" class="sb-btn sb-btn-2 sb-btn-gray">
                <span class="sb-icon">
                  <img src="{{ asset('front/assets/img/ui/icons/arrow-2.svg')}}" alt="icon">
                </span>
                <span>Continue shopping</span>
              </a>
              <!-- button end -->
              <!-- button -->
              <a href="{{ route('front.checkout') }}" class="sb-btn sb-m-0">
                <span class="sb-icon">
                  <img src="{{ asset('front/assets/img/ui/icons/arrow.svg')}}" alt="icon">
                </span>
                <span>Checkout</span>
              </a>
              <!-- button end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- cart end -->
@endsection
@section('script')

@endsection