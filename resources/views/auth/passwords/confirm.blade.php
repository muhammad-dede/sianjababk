@extends('layouts.auth')

@section('title', __('Konfirmasi Password'))

@section('content')
    <form class="card card-md" action="{{ route('password.confirm') }}" method="POST">
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('Konfirmasi Password') }}</h2>
            <p class="text-muted mb-4">
                {{ __('Harap konfirmasi password Anda sebelum melanjutkan.') }}
            </p>
            <div class="mb-3">
                <label class="form-label">{{ __('Password') }}</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="{{ __('Password Baru') }}">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-footer">
                <button class="btn btn-primary w-100" type="submit">
                    {{ __('Konfirmasi Password') }}
                </button>
            </div>
        </div>
    </form>
    @if (Route::has('password.request'))
        <div class="text-center text-muted mt-3">
            <a href="{{ route('password.request') }}">{{ __('Lupa Password?') }}</a>
        </div>
    @endif
@endsection
