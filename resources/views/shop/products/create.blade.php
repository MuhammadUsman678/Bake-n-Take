@extends('admin.layout.admin')
@section('title','Create Category')
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
                        <h2 class="content-header-title float-left mb-0"> Category</h2>
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
                                    {{ Form::open(array('route' => 'admin.category.store','method'=>'POST','class'=>'form-horizontal','novalidate')) }}
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    {{ Form::label('category_name', 'Category Name', array('class' => 'control-label mb-1')) }}
                                                    <span class="text-danger"> *</span>
                                                    {{ Form::text('category_name',null,['class'=>'form-control','id'=>'category_name','placeholder'=>'Category Name','required' ,'data-validation-required-message'=>'Category Name is required'] )  }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    {{ Form::label('image', 'Category Image', array('class' => 'control-label mb-1')) }}
                                                    <span class="text-danger"> *</span>
                                                    {{ Form::file('image',['class'=>'btn btn-primary media-btn mt-2 p-2','id'=>'image'] )  }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    {{ Form::label('status', 'Status', array('class' => 'control-label mb-1')) }}
                                                    <span class="text-danger"> *</span>
                                                    {{Form::select("status",['1' => 'Publish', '0' => 'Unpublish'],'1',
                                                    [
                                                        "class" => "form-control",
                                                        "placeholder" => "Select Status...",
                                                        'required' ,
                                                        'id'=>'status',
                                                        'data-validation-required-message'=>'Category Status is required'
                                                    ])
                                                }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right mb-1">Add Category</button>
                                {{ Form::close() }}

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
