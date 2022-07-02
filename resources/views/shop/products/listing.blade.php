@extends('shop.layout.shop')
@section('title', 'Add Products')
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
                        <h2 class="content-header-title float-left mb-0">Products</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Products
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
                                        <h4 class="card-title">{{ "Products" }}</h4>
                                    </div>
                                    <div class="col-md-8 col-lg-6 col-sm-6 col-xs-6 pull-right">

                                                <a class="btn btn-primary pull-right" href="{{ route('shop.product.create') }}" > Create Products</a>
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
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>SKU</th>
                                                    <th>Category</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>SKU</th>
                                                    <th>Category</th>
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
    <script type="text/javascript">
        $(function () {
            
          var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('shop.product.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'product_name', name: 'product_name'},
                {data: 'quantity', name: 'quantity'},
                {data: 'price', name: 'price'},
                {data: 'SKU', name: 'SKU'},
                {data: 'category', name: 'category'},
                {data: 'action', name: 'action', orderable: false},
            ]
        });
    });

      </script>
    <!-- END: Page JS-->
@endsection
