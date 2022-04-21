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
                    <div class="col-md-6 offset-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Profile</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" method="post" action="{{url('shop/updateprofile')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Name</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" name="name" placeholder="Enter Your name" value="{{$user->name}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Email</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                    <input type="email" id="email-id" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Image</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                    <input type="file" id="image" class="form-control dropify" name="image" placeholder="Image" data-default-file="{{asset('profileimages/'.$user->image)}}"  >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Old Password</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="password" id="password" class="form-control" name="c_password" placeholder="OldPassword">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>New  Password</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="password" id="password" class="form-control" name="new_password" placeholder="New Password">
                                                        </div>
                                                        @if($errors->has('new_password'))

                                                        <span style="color: red">
                                                                <strong>{{$errors->first('new_password')}}</strong>
                                                            </span>
                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Confirm  Password</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="password" id="password" class="form-control " name="confirm_password" placeholder="Confirm Password">
                                                        </div>
                                                        @if($errors->has('confirm_password'))

                                                        <span style="color: red">
                                                                <strong>{{$errors->first('confirm_password')}}</strong>
                                                            </span>
                                                    @endif
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