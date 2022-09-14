@extends('layouts.auth')

@section('title', __('Daftar'))

@section('content')
    <form class="card card-md" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('Daftar') }}</h2>
            <div class="mb-3">
                <label class="form-label">{{ __('Nama') }}</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
                    placeholder="{{ __('Nama') }}" autocomplete="off" value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Email') }}</label>
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}"
                    autocomplete="off" value="{{ old('email') }}">
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label">{{ __('Password') }}</label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}"
                    autocomplete="off">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label">{{ __('Konfirmasi Password') }}</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                    placeholder="{{ __('Konfirmasi Password') }}">
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Daftar') }}</button>
            </div>
        </div>
    </form>
@endsection
