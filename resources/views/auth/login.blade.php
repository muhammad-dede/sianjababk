@extends('layouts.auth')

@section('title', __('Login'))

@section('content')
    <form class="card card-md" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('Login') }}</h2>
            <div class="mb-3">
                <label class="form-label">{{ __('Username atau Email') }}</label>
                <input type="text" name="username" id="username"
                    class="form-control @error('username') is-invalid @enderror" placeholder="Username atau Email"
                    autocomplete="off" value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label">
                    Password
                    <span class="form-label-description">
                        <a href="{{ route('password.request') }}">{{ __('Lupa Password') }}</a>
                    </span>
                </label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Password" autocomplete="off">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input"
                        {{ old('remember') ? 'checked' : '' }} />
                    <span class="form-check-label">{{ __('Ingat Saya') }}</span>
                </label>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
            </div>
        </div>
    </form>
@endsection
