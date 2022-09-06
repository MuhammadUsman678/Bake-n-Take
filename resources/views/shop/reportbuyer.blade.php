@extends('shop.layout.shop')





@section('main')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
               
            </div>
         
        </div>
        <div class="content-body">
            
            <!-- Zero configuration table -->
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-8  ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Report Buyer</h4>
                            </div>
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
                                   
                                </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" method="post" action="{{url('shop/post/reportbuyer')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Select Customer</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="user" requires>
                                                                @foreach($user as $users)
                                                                <option value="{{$users->id}}">
                                                                    {{$users->name}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Image</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                    <input type="file" class="dropify" name="image" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Reason</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                    <textarea class="form-control" name="reason" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                
                                              
                                                
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Update</button>
                                          
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </section>
            <!--/ Zero configuration table -->
         

         

       

      

           

        </div>
    </div>
</div>
   

        @endsection