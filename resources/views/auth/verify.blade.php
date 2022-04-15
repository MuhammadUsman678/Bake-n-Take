@extends('layouts.master')
@section('title','Verify email')
@section('content')
 <!-- banner -->
 <section class="sb-banner sb-banner-color mt-3" style="margin-bottom:50px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 offset-3">
                <div class="sb-contact-form-frame">
                    <div class="sb-form-content">
                        <div class="sb-main-content">
                            <h3 class="sb-mb-30">Email Verification</h3>
                            <div class="verify">
                                @if (session('resent'))
                                  <div class="alert alert-success" role="alert">
                                     {{ __('A fresh verification link has been sent to your email address.') }}
                                  </div>
                                 @endif
                                 {{ __('Before proceeding, please check your email for a verification link.') }}
                                 {{ __('If you did not receive the email') }},
                                 <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                     @csrf
                                     <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-4" style="height:20px"></section>
<!-- banner end -->
@endsection
