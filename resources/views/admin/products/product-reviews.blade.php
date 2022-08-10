@extends('admin.layout.admin')
@section('title', 'Product Reviews')
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
                        <h2 class="content-header-title float-left mb-0">Product Reviews</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Reviews
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
                                        <h4 class="card-title">{{ "Product Reviews" }}</h4>
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
                                                    <th>Product Name</th>
                                                    <th>Shop Name</th>
                                                    <th>Ratig</th>
                                                    <th>Spam</th>
                                                    <th>Status</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($reviews as $key=>$row)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td> {{ $row->product->product_name }}</td>
                                                    <td> {{ $row->product->shop->shop_name }}</td>
                                                    <td> {{ $row->rating }}</td>
                                                    <td>  
                                                        @if($row->is_spam==1)
                                                        <span class="label label-danger"> Spam Detected </span> 
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $row->status }}
                                                    </td>
                                                    <td>
                                                        @if($row->is_spam !=1)
                                                            @if($row->status =='approved')
                                                            <a href="{{ route('admin.product.review.status-change',[$row->id,'pending']) }}" class="btn btn-danger"> Click to Disapprove </a>
                                                            @else
                                                            <a href="{{ route('admin.product.review.status-change',[$row->id,'approved']) }}" class="btn btn-success"> Click to Approve </a>
                                                            @endif
                                                        @endif    
                                                    </td>
                                                </tr>
                                                @empty
                                                    
                                                @endforelse

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Product Name</th>
                                                    <th>Shop Name</th>
                                                    <th>Ratig</th>
                                                    <th>Spam</th>
                                                    <th>Status</th>
                                                    <th width="280px">Action</th>
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
