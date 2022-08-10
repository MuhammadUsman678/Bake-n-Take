@extends('admin.layout.admin')
@section('title', 'Order Detail<b>')
@section('css')
<style>
    html body .content {
       margin-left: 130px !important;
    }
    </style>
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
                        <h2 class="content-header-title float-left mb-0">Order Detail</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Order Detail
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
                                        <h4 class="card-title">{{ "Order Detail" }}</h4>
                                    </div>
                                    <div class="col-md-8 col-lg-6 col-sm-6 col-xs-6 pull-right">

                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="row">
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
                                           <b> Payment Status : {{ $order->payment_status }}
                                        </div>
                                        
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped data-table" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Product Name</th>
                                                    <th>Shop Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($order->products as $key=>$row)
                                                <tr>
                                                    <td> {{ ++$key }} </td>
                                                    <td> {{ $row->productDetails->product_name }} </td>
                                                    <td> {{ $row->productDetails->shop->shop_name }} </td>
                                                    <td> {{ $row->quantity }} </td>
                                                    <td> {{ $row->productDetails->price }} </td>
                                                    <td> {{ $row->quantity * $row->productDetails->price }} </td>
                                                </tr>
                                                @empty
                                                    
                                                @endforelse

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Product Name</th>
                                                    <th>Shop Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Amount</th>
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
@endsection
