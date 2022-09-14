@extends('layouts.auth')

@section('title', __('Reset Password'))

@section('content')
    <form class="card card-md" action="{{ route('password.update') }}" method="POST">
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('Reset Password') }}</h2>
            <p class="text-muted mb-4">
                {{ __('Password baru harus berbeda dari password sebelumnya!') }}
            </p>
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-3">
                <label class="form-label">{{ __('Email') }}</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="{{ __('Email') }}" value="{{ $email ?? old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Password Baru') }}</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="{{ __('Password Baru') }}">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Konfirmasi Password Baru') }}</label>
                <input type="password" name="password_confirmation" class="form-control"
                    placeholder="{{ __('Konfirmasi Password Baru') }}">
            </div>
            <div class="form-footer">
                <button class="btn btn-primary w-100" type="submit">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
    <div class="text-center text-muted mt-3">
        <a href="{{ route('login') }}">{{ __('kembali ke login') }}</a>
    </div>
@endsection
