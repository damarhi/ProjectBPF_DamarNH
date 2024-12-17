@extends('layouts.app_auth')

@section('content')
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <div class="col-lg-4 col-md-6 col-10 mx-auto">
                <!-- Card for the login form -->
                <div class="card shadow-lg rounded-4" style="min-height: 500px;">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center p-5">
                        <!-- Centered SVG Logo -->
                        <a class="navbar-brand mx-auto flex-fill text-center mb-3" href="./index.html">
                            <img src="/light/assets/images/weblogo.png" alt=""
                        style="max-height: 180px; max-width: 100%;  object-fit: contain;">
                        </a>
                        <!-- Centered Title -->
                        <h1 class="h6 mb-4 text-center">Sign in</h1>
                        <!-- Form -->
                        <form method="POST" action="{{ route('login') }}" class="w-100">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email" class="sr-only">Email address</label>
                                <input id="email" type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary btn-block">
                                {{ __('Login') }}
                            </button>
                        </form>
                        <p class="mt-4 mb-0 text-muted">Belum memiliki akun? <a href="{{ route('register') }}">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
