@extends('layouts.app_auth',['title' => 'Register'])

@section('content')
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <div class="col-lg-6 col-md-8 col-10 mx-auto">
                <!-- Card for the register form -->
                <div class="card shadow-lg rounded-4" style="min-height: 400px; max-width: 700px; margin: auto;">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center p-5">
                        <!-- Centered SVG Logo -->
                        <a class="navbar-brand mx-auto flex-fill text-center mb-3" href="">
                            <img src="/light/assets/images/weblogo.png" alt=""
                        style="max-height: 180px; max-width: 100%;  object-fit: contain;">
                        </a>
                        <!-- Centered Title -->
                        <h1 class="h6 mb-4 text-center">Sign Up</h1>
                        <!-- Form -->
                        <form method="POST" action="{{ route('register') }}" class="w-100">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="sr-only">Nama</label>
                                <input id="name" type="text"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Masukkan Nama">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="nik" class="sr-only">NIK</label>
                                <input id="nik" type="text"
                                    class="form-control form-control-lg @error('nik') is-invalid @enderror" name="nik"
                                    value="{{ old('nik') }}" required autocomplete="nik" autofocus placeholder="Masukkan NIK">

                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="sr-only">Email address</label>
                                <input id="email" type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" placeholder="Masukkan Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <input id="password-confirm" type="password" class="form-control form-control-lg"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Konfirmasi Password">
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary btn-block">
                                {{ __('Register') }}
                            </button>
                        </form>
                        <p class="mt-4 mb-0 text-muted">Sudah memiliki akun? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
