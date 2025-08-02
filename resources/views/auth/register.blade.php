@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e0f7fa, #b2ebf2);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .register-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 80px;
    }

    .register-title {
        font-size: 24px;
        font-weight: 600;
        color: #2c4964;
        text-align: center;
        margin-bottom: 25px;
    }

    .form-label {
        font-weight: 500;
    }

    .custom-button {
        background: #2c4964;
        border: none;
        color: white;
        padding: 10px 25px;
        border-radius: 10px;
        font-weight: 600;
        transition: 0.3s;
    }

    .custom-button:hover {
        background:  #2c4964;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 150, 136, 0.3);
    }

    .login-link {
        font-weight: 500;
        color:  #2c4964;
        text-decoration: none;
    }

    .login-link:hover {
        text-decoration: underline;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="register-card">
                <div class="register-title">{{ __('Register') }}</div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <span class="invalid-feedback d-block mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback d-block mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password" required>
                        @error('password')
                            <span class="invalid-feedback d-block mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password"
                            class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="custom-button">
                            {{ __('Register') }}
                        </button>
                    </div>

                    <div class="mt-3 text-center">
                        <span>Sudah punya akun?</span>
                        <a href="{{ route('login') }}" class="login-link">Login di sini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
