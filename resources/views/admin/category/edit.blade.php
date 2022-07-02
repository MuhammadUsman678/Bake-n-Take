@extends('admin.layout.admin')
@section('title','Edit Category')
@section('css')
<style>
    html body .content {
       margin-left: 130px !important;
    }
    </style>
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
                        <h2 class="content-header-title float-left mb-0">Edit Category</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item "> Category
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
                                        <a href="{{ url('/admin/category') }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                 
                                    
                                <form  method="post" class="form-horizontal" action="{{url('admin/category_update/'.$category->id)}}" enctype="multipart/form-data">
                                    <div class="row">
                                        @csrf
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                   
                                                    <label class="control-label mb-1">Category Name</label>
                                                    <span class="text-danger"> *</span>
                                                   
                                                    <input type="text" name="category_name" class="form-control" id="category_name" placeholder="category name" required data-validation-required-message='Category Name is required'  value="{{$category->category_name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label class="control-label mb-1">Category Image</label>
                                                    <span class="text-danger"> *</span>
                                               

                                                    <input type="file" name="image" class="btn btn-primary media-btn mt-2 p-2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label class="control-label mb-1">Category Status</label>
                                                    <span class="text-danger"> *</span>
                                                
                                                <select class="form-control" id="status" name="status" >
                                                    <option @if($category->status==1) selected @endif value="1">Publish</option>
                                                    <option @if($category->status==0) selected @endif value="0">UnPublish</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right mb-1">Edit Category</button>
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

@endsection
@section('js')
<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    @include('partials._form_validation-js')
    <!-- END: Page JS-->
@endsection
