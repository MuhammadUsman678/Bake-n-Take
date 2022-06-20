@extends('layouts.master')
@section('title','Reset Password')
@section('content')
<section class="sb-banner sb-banner-color mt-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 offset-3">
                <div class="sb-contact-form-frame">
                    <div class="sb-form-content">
                        <div class="sb-main-content">
                            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                            <h3 class="sb-mb-30">Enter Email</h3>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="sb-btn sb-cf-submit sb-show-success">
                                            {{ __('Send  Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
