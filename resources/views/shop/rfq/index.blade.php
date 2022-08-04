@extends('shop.layout.shop')
@section('title','Create product')
@section('css')

@include('partials._form_validation-css')
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
                        <h2 class="content-header-title float-left mb-0"> Rfq</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('shop.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item "> 
                                    <a href="{{ route('shop.product.index') }}">Rfq</a>
                                </li>
                                <li class="breadcrumb-item active">View Rfq
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
                                   
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">

                                    <div class="table-responsive">
                                        <table class="table table-striped data-table" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>User Name</th>
                                                    >
                                                    <th>Product Name</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Dilevery Date</th>
                                                    
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                  $no=1  
                                                @endphp
                                                @foreach($detail as $cate)
                                                @php
                                                $user=App\User::where('id',$cate->quotation->user_id)->first();
                                                $category=App\Category::where('id',$cate->quotation->category)->first();
                                                @endphp
                                                <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$user->name}}</td>
                                               
                                                <td>{{$cate->quotation->name}}</td>
                                                @if(!empty($category))
                                                <td>{{$category->category_name}}</td>
                                                
                                                    
                                                @else
                                                   <td></td> 
                                                @endif
                                                <td>{{$cate->quotation->price}}</td>
                                                <td>{{$cate->quotation->date}}</td>
                                                
                                                <td width="20px"><a href="{{url('shop/chat/'.$user->id)}}"><i class="feather icon-message-square"></i><a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>User Name</th>
                                                    <th>Address</th>
                                                    <th>Product Name</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Dilevery Date</th>
                                                    
                                                    <th width="20px">Action</th>
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
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endsection
@section('js')
<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    @include('partials._form_validation-js')
    <!-- END: Page JS-->
   
@endsection
