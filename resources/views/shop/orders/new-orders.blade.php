@extends('shop.layout.shop')
@section('title', 'New Orders')
@section('css')
@include('partials._datatable-css')
@endsection
@section('main')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">New Orders</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('shop/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">New Orders
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- Column selectors with Export Options and print table -->
            <section id="column-selectors">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-12">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="col-md-4 col-lg-6 col-sm-6 col-xs-6">
                                        <h4 class="card-title">{{ "New Orders" }}</h4>
                                    </div>
                                    <div class="col-md-8 col-lg-6 col-sm-6 col-xs-6 pull-right">

                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">

                                    <div class="table-responsive">
                                        <table class="table table-striped data-table" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Order#</th>
                                                    <th>Products</th>
                                                    <th>Delivery Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @php
                                                    $orders=$orders->first();
                                                    // dd($orders->shopProducts);
                                                    dd();
                                                @endphp --}}
                                                @forelse ($orders as $key=>$row)
                                                @if($count=$row->shopProducts->reject(function($q){
                                                    return $q->productDetails->shop_id != auth()->user()->shop->id;
                                                  })->count() > 0)
                                                <tr>
                                                    <td> {{ ++$key }} </td>
                                                    <td> {{ $row->order_number }} </td>
                                                    <td> {{ $count }} 
                                                    </td>
                                                    <td> {{ date('Y-F-d H:i:A',strtotime($row->delivery_date)) }} </td>
                                                    <td>
                                                        <a href="{{ route('shop.order.detail',[$row->id]) }}" class="btn btn-primary btn-sm">Order Detail</a>
                                                        <a href="{{ url('shop/chat',[$row->user_id]) }}" class="btn btn-warning btn-sm"><i class="feather icon-message-square"></i></a>
                                                    </td>
                                                </tr>
                                                @endif
                                                @empty
                                                    
                                                @endforelse

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Order#</th>
                                                    <th>Products</th>
                                                    <th>Delivery Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Column selectors with Export Options and print table -->
        </div>
    </div>
</div>
<!-- END: Content-->

@endsection
@section('js')
    <!-- BEGIN: Page Vendor JS-->
    @include('partials._datatable-js')
    <!-- END: Page Vendor JS-->
    <!-- END: Page JS-->
    <script type="text/javascript">
        $(function () {
          var table = $('#datatable').DataTable();
    });

      </script>
@endsection
