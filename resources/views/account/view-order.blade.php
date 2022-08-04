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
       
        <div class="col-lg-7">
          <div class="alert alert-warning d-block">
            Order Status is <span class="text-info"> {{ ucfirst($order->status) }} </span>
        </div>
        <div class="alert alert-success d-block">
          Payment Status is <span class="text-primary">{{ ucfirst($order->payment_status) }} </span>
      </div>
          <form role="form"  method="post" action="#" data-cc-on-check="false" class="sb-checkout-form needs-validation"  novalidate>
            <div class="sb-mb-30">
              <h3>Billing details</h3>
            </div>
            <div class="row">
                
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input type="text" name="full_name" readonly id="full_name" readonly value="{{ $order->full_name }}" required>
                  <span class="sb-bar"></span>
                  <label class="filled-input-label" >Full name</label>
                 
                </div>
                
              </div>
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input type="text" name="country" readonly id="country" readonly value="{{ ucfirst($order->country) }}" required>
                  <span class="sb-bar"></span>
                  <label class="filled-input-label">Country</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input name="city" id="city" readonly value="{{ ucfirst($order->city) }}" type="text" required>
                  <span class="sb-bar"></span>
                  <label>City</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input type="text" id="state" readonly value="{{ $order->state }}" name="state" required>
                  <span class="sb-bar"></span>
                  <label class="filled-input-label">State / Province</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input type="text" id="street" readonly value="{{ $order->street }}" name="street" required>
                  <span class="sb-bar"></span>
                  <label class="filled-input-label">Street</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input type="number" id="post_code" readonly value="{{ $order->post_code }}" name="post_code" required>
                  <span class="sb-bar"></span>
                  <label class="filled-input-label">Postcode</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input type="tel" id="phone" readonly value="{{ $order->phone }}" name="phone" required>
                  <span class="sb-bar"></span>
                  <label class="filled-input-label">Phone</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="sb-group-input">
                  <input type="email"  name="email" readonly value="{{ $order->email }}" required>
                  <span class="sb-bar"></span>
                  <label class="filled-input-label">Email</label>
                </div>
              </div>
            </div>
            <div class="sb-mb-30">
              <h3>Additional information</h3>
            </div>
            <div class="sb-group-input">
              <textarea name="notes" readonly>{{ $order->notes }}</textarea>
              <span class="sb-bar"></span>
              <label class="filled-input-label">Order notes</label>
            </div>
            <div class="sb-mb-30">
              <h3 class="sb-mb-30">Payment method</h3>
              {{ ucfirst($order->payment_method) }}
            </div>
          </form>
        </div>
        <div class="col-lg-5">
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
                          </div>
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
    </div>
  </section>

@endsection
@section('script')
@endsection