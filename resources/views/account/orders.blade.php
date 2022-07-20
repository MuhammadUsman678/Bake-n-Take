@extends('layouts.master')
@section('title','Orders')
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
                <li><a href="{{ url('shop') }}">Shop</a></li>
                <li><a href="#.">Orders</a></li>
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
      <div class="row">
        <div class="col-lg-4">
            @include('account.account-sidebar')
        </div>
        <div class="col-lg-8">
          <div class="sb-pad-type-2 sb-sticky" data-margin-top="120">
                <div class="card">
                    <div class="card-header" style="    border: 0;background: none;">
                        <h3 class="mb-0">Your Orders</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @forelse ($orders as $order)
                                   <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ date('M  d ,Y',strtotime($order->created_at)) }}</td>
                                        <td>{{ strtoupper($order->status) }}</td>
                                        <td>Rs.{{ $order->total_amount }} for {{ $order->products->sum('quantity') }} item</td>
                                        <td><a href="{{ route('front.view.order',[$order->order_number]) }}" class="btn-small d-block" style="color: #f5c332">View</a></td>
                                    </tr>
                                   @empty
                                   <tr>
                                      No Orders Available
                                    </tr>
                                   @endforelse
                                    
                                </tbody>
                            </table>
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