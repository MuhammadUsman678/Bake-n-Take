@extends('layouts.master')
@section('title', 'Login')
@section('style')

@endsection
@section('content')
    <section class="sb-banner sb-banner-color mt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 offset-3">
                    <div class="sb-contact-form-frame">
                        <div class="sb-form-content">
                            <div class="sb-main-content">
                                <h3 class="sb-mb-30">Login</h3>
                                <form method="POST" action="{{ route('login') }}" autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="sb-group-input">
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    >
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
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  id="id_password" >
                                                <i class="far fa-eye" id="togglePassword" style="cursor: pointer;
                                                position: absolute;
                                                top: 17px;
                                                right: 12px;"></i>
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
                                            <div class="form-check float-left">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- button -->
                                    <button type="submit" class="sb-btn sb-cf-submit sb-show-success">
                                        <span class="sb-icon">
                                            <img src="{{ asset('front/assets/img/ui/icons/arrow.svg') }}" alt="icon">
                                        </span>
                                        <span>Login</span>
                                    </button>
                                    <!-- button end -->
                                    <div>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-4"></section>

@endsection
@section('script')
    <script>
        const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');
 
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
    </script>
@endsection
