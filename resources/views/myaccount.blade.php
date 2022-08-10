@extends('layouts.master')
@section('title','My Account')

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

@section('content')
  <!-- banner -->
  <section class="sb-banner sb-banner-xs sb-banner-color">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- main title -->
          <div class="sb-main-title-frame">
            <div class="sb-main-title">
              <h1 class="sb-h2">My Account.</h1>
              <ul class="sb-breadcrumbs">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/myaccount') }}">Account</a></li>
                <li><a href="#.">My Account</a></li>
              </ul>
            </div>
          </div>
          <!-- main title end -->
        </div>
      </div>
    </div>
  </section>
  <!-- banner end -->
  <section class="sb-banner sb-banner-color mt-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-2">
                <div class="sb-contact-form-frame">
                    <div class="sb-form-content">
                        <div class="sb-main-content">
                            <h3 class="sb-mb-30">My Account</h3>
                            <form method="POST" action="{{ route('front.updateregister') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <input type="file"   name="file"  data-default-file="{{url('profileimages/'.auth()->user()->image)}}" class="dropify" data-height="100">
                                            <span class="sb-bar" ></span>
                                            <label>Image</label>
                                            @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control @error('name') is-invalid @enderror"  id="name"  placeholder="Enter Full Name">
                                            <span class="sb-bar" ></span>
                                            <label>Full Name</label>
                                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"  placeholder="Enter email" value="{{auth()->user()->email}}">
                                            <span class="sb-bar"></span>
                                            <label>Email address</label>
                                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-1">
                                        <div class="sb-group-input">
                                            <input type="password" name="c_password" class="form-control @error('password') is-invalid @enderror"  id="id_password"  placeholder="Password" >
                                            <i class="far fa-eye" id="togglePassword" style="cursor: pointer;
                                                position: absolute;
                                                top: 17px;
                                                right: 12px;"></i>
                                            <span class="sb-bar"></span>
                                            <label>Old Password</label>
                                            @error('c_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-1">
                                        <div class="sb-group-input">
                                            <input type="password" name="new_password" class="form-control "  id="password_confirmation"  placeholder="Confirm Password">
                                            <i class="far fa-eye" id="togglePassword2" style="cursor: pointer;
                                            position: absolute;
                                            top: 17px;
                                            right: 12px;"></i>
                                            <span class="sb-bar"></span>
                                            <label>New Password</label>
                                            @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-1">
                                        <div class="sb-group-input">
                                            <input type="password" name="confirm_password" class="form-control "  id="password_confirmation"  placeholder="Confirm Password">
                                            <i class="far fa-eye" id="togglePassword2" style="cursor: pointer;
                                            position: absolute;
                                            top: 17px;
                                            right: 12px;"></i>
                                            <span class="sb-bar"></span>
                                            <label>Confirm Password</label>
                                            @error('confirm_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- button -->
                                <button type="submit" class="sb-btn sb-cf-submit sb-show-success" >
                                    <span class="sb-icon">
                                        <img src="{{ asset('front/assets/img/ui/icons/arrow.svg')}}" alt="icon">
                                    </span>
                                    <span>Update Account</span>
                                </button>
                                <!-- button end -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-4"></section>
  <!-- checkout -->



@section('script')

@endsection