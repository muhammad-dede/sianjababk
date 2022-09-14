@extends('layouts.auth')

@section('title', __('Login'))

@section('content')
    <form class="card card-md" action="{{ route('verification.resend') }}" method="POST">
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('Verifikasi Email Anda') }}</h2>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('Link verifikasi baru telah dikirim ke alamat email Anda.') }}
                </div>
            @endif
            {{ __('Sebelum melanjutkan, harap periksa email Anda untuk link verifikasi.') }}
            {{ __('Jika Anda tidak menerima email') }},
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('klik di sini untuk meminta yang lain') }}</button>
            </div>
        </div>
    </form>
@endsection
