@extends('layouts.master')
@section('title','Register')
@section('content')
<!-- banner -->
<section class="sb-banner sb-banner-color mt-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 offset-3">
                <div class="sb-contact-form-frame">
                    <div class="sb-form-content">
                        <div class="sb-main-content">
                            <h3 class="sb-mb-30">Register</h3>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="sb-group-input">
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  id="name"  placeholder="Enter Full Name">
                                            <span class="sb-bar"></span>
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
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"  placeholder="Enter email">
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
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  id="password"  placeholder="Password" >
                                            <span class="sb-bar"></span>
                                            <label>Password</label>
                                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-1">
                                        <div class="sb-group-input">
                                            <input type="password" name="password_confirmation" class="form-control "  id="password_confirmation"  placeholder="Confirm Password">
                                            <span class="sb-bar"></span>
                                            <label>Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- button -->
                                <button type="submit" class="sb-btn sb-cf-submit sb-show-success" >
                                    <span class="sb-icon">
                                        <img src="{{ asset('front/assets/img/ui/icons/arrow.svg')}}" alt="icon">
                                    </span>
                                    <span>Register</span>
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
<!-- banner end -->
@endsection
