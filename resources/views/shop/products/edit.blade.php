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
                        <h2 class="content-header-title float-left mb-0"> Edit Product</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('shop.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item "> 
                                    <a href="{{ route('shop.product.index') }}">Product</a>
                                </li>
                                <li class="breadcrumb-item active">Create
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
                                    @if(count($errors) > 0)
                                    <div class="alert alert-danger" role="alert">
                                      <ul>
                                        @foreach($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                        @endforeach
                                      </ul>
                                  </div>
                                    @endif
                                    <div class="pull-right">
                                        <a href="{{ route('shop.product.index') }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <form  method="post" class="form-horizontal" action="{{url('shop/product/'.$shop->id)}}" enctype="multipart/form-data">
                                        <div class="row">
                                            @csrf
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                       
                                                        <label class="control-label mb-1">Product Name</label>
                                                        <span class="text-danger"> *</span>
                                                       
                                                        <input type="text" name="product_name" class="form-control" id="producr_name" placeholder="Product name" required data-validation-required-message='Product Name is required' value="{{$shop->product_name}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                       
                                                        <label class="control-label mb-1">Select Category</label>
                                                        <span class="text-danger"> *</span>
                                                        <select class="form-control" id="category" name="category" >
                                                           
                                                            @foreach($category as $categories)
                                                            
                                                            <option value="{{$categories->id}}" @if($categories->id==$shop->category->id) selected @endif>{{$categories->category_name}}</option>
                                                           @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                       
                                                        <label class="control-label mb-1">Product Quantity</label>
                                                        <span class="text-danger"> *</span>
                                                       
                                                        <input type="number" name="product_quantity" class="form-control" id="producr_quantity" placeholder="Product Quantity" required data-validation-required-message='Product Quantity is required' value="{{$shop->quantity}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                       
                                                        <label class="control-label mb-1">Product Price</label>
                                                        <span class="text-danger"> *</span>
                                                       
                                                        <input type="number" name="product_price" class="form-control" id="producr_price" placeholder="Product Price" required data-validation-required-message='Product Price is required' value="{{$shop->price}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                       
                                                        <label class="control-label mb-1">Product Description</label>
                                                        <span class="text-danger"> *</span>
                                                        <textarea class="form-control" id="summary-ckeditor" name="product_description">{{$shop->product_description}}</textarea>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                       
                                                        <label class="control-label mb-1">Product Sku</label>
                                                        <span class="text-danger"> *</span>
                                                       
                                                        <input type="text" name="product_sku" class="form-control" id="producr_price" placeholder="Product Sku" required data-validation-required-message='Product Price is required' value="{{$shop->SKU}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label class="control-label mb-1">Product Status</label>
                                                        <span class="text-danger"> *</span>
                                                    
                                                        <select class="form-control" id="status" name="status" >
                                                            <option @if($shop->status==1) selected @endif value="1">Publish</option>
                                                            <option @if($shop->status==0) selected @endif value="0">UnPublish</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right mb-1">Updateproduct</button>
                                        </form>
    

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
