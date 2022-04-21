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
              <h1 class="sb-h2">Checkout.</h1>
              <ul class="sb-breadcrumbs">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('front.orders') }}">Orders</a></li>
                <li><a href="#.">View Order</a></li>
              </ul>
            </div>
          </div>
          <!-- main title end -->
        </div>
      </div>
    </div>
  </section>
  <!-- banner end -->

  <!-- checkout -->
  <section class="sb-p-90-90">
    <div class="container" data-sticky-container>
      
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
      <div class="row">
        <div class="row">
          <div class="col-md-12 alert alert-warning d-block">
            Order Status is <span class="text-info"> {{ ucfirst($order->status) }} </span>
        </div>
          <div class="col-md-12 alert alert-success d-block">
            Payment Status is <span class="text-primary">{{ ucfirst($order->payment_status) }} </span>
        </div>
          <div class="col-md-6">
             <b> Full Name</b> : {{ $order->full_name }}
          </div>
          <div class="col-md-6">
             <b> Email </b>: {{ $order->email }}
          </div>
          <div class="col-md-6">
             <b> Phone</b> : {{ $order->phone }}
          </div>
          <div class="col-md-6">
             <b> City</b> : {{ $order->city }}
          </div>
          <div class="col-md-6">
             <b> Country </b>: {{ $order->country }}
          </div>
          <div class="col-md-6">
             <b> Street</b> : {{ $order->street }}
          </div>
          <div class="col-md-6">
             <b> Delivery Date </b> : {{ $order->delivery_date }}
          </div>
          <div class="col-md-6">
             <b> Payment Method  </b>: {{ $order->payment_method }}
          </div>
          <div class="col-md-6">
             <b> Payment Status : </b> {{ $order->payment_status }}
          </div>
      </div>
      </div>
      <div class="col-lg-12 mt-5">
        <div class="sb-pad-type-2 sb-sticky" data-margin-top="120">
          <div class="sb-co-cart-frame">
            <div class="sb-cart-table">
              <div class="sb-cart-table-header">
                <div class="row">
                  <div class="col-lg-6">Product</div>
                  <div class="col-lg-{{ ($order->status==='delivered') ?'3' :'6' }} text-right">Total</div>
                  @if($order->status==='delivered')
                    <div class="col-lg-3 text-right">Review</div>
                  @endif
                </div>
              </div>
              @php
                  $total_amount=0;
              @endphp
              
              @foreach ($products as $row)
              <div class="sb-cart-item">
                  <div class="row align-items-center">
                    <div class="col-lg-6">
                      <a class="sb-product" href="{{ route('front.single.product',[$row['slug']]) }}">
                        <div class="sb-cover-frame"> 
                          <img src="{{ $row['image'] ?? 'https://via.placeholder.com/270?text=No+Image+Found'  }}" alt="product">
                        </div>
                        <div class="sb-prod-description">
                          <h4 class="sb-mb-10">{{ $row['name'] }}</h4>
                          <p class="sb-text sb-text-sm">x{{ $row['quantity'] }}</p>
                          <p class="sb-text sb-text-sm"><small class="badge badge-info">{{ $order->status==='delivered' ? 'Delivered' : $row['status'] }}</small></p>
                        </div>
                        <a data-no-swup="" href="{{url('front/chat/'.$row['shop_id'])}}" class="btn-small d-block" style="color: #f5c332"><i class="fas fa-comment"></i> Chat Now</a>

                      </a>
                    </div>
                    <div class="col-lg-{{ ($order->status==='delivered') ?'3' :'6' }} text-md-right">
                      <div class="sb-price-2"><span>Total: </span>Rs {{ $row['price']*$row['quantity'] }}</div>
                      @php
                          $total_amount+=$row['price']*$row['quantity'];
                      @endphp
                    </div>
                    @if($order->status==='delivered')
                      <div class="col-lg-3 text-md-right">
                        <div class="sb-price-2">
                          <a data-no-swup href="{{ route('front.product.review',[base64_encode($order->id),base64_encode($row['product_id'])]) }}" class="btn sb-btn  ">Rating</a>
                        </div>
                      </div>
                    @endif
                  </div>
                </div>
              @endforeach
              
              <div class="sb-cart-total sb-cart-total-2">
                <div class="sb-sum">
                  <div class="row">
                    <div class="col-6">
                      <div class="sb-total-title">Subtotal:</div>
                    </div>
                    <div class="col-{{ ($order->status==='delivered') ?'3' :'6' }}">
                      <div class="sb-price-1 text-right">Rs {{ $total_amount }}</div>
                    </div>
                  </div>
                </div>
                <div class="sb-realy-sum">
                  <div class="row">
                    <div class="col-6">
                      <div class="sb-total-title">Total:</div>
                    </div>
                    <div class="col-{{ ($order->status==='delivered') ?'3' :'6' }}">
                      <div class="sb-price-2 text-right">Rs {{ $total_amount }}</div>
                    </div>
                  </div>
                </div>
                @if($order->payment_status ==='paid')
                  <div class="sb-realy-sum">
                    <div class="row">
                      <div class="col-6">
                        <div class="sb-total-title">Paid:</div>
                      </div>
                      <div class="col-6">
                        <div class="sb-price-2 text-right">Rs {{ $total_amount }}</div>
                      </div>
                    </div>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
@section('script')
@endsection