@extends('layouts.app_auth')

@section('content')
<div class="wrapper vh-100">
    <div class="row align-items-center h-100">
        <form method="POST" action="{{ route('login') }}" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
            @csrf

            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                    xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
            <h1 class="h6 mb-3">Sign in</h1>
            <div class="form-group">
                <label for="email" class="sr-only">{{ __('Email Address') }}</label>
                <input type="email" id="email" class="form-control form-control-lg"
                    @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                    autocomplete="email" autofocus placeholder="Email address">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="sr-only">{{ __('Password') }}</label>
                <input type="password" id="password" class="form-control form-control-lg" @error('password') is-invalid @enderror" name="password"
                required autocomplete="current-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
            </div>


            <div class="checkbox mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-lg btn-primary btn-block">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
    </div>
</div>

@endsection

