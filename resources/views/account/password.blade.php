@extends('layouts.app')

@section('title', __('Ubah Password'))

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Ubah Password') }}
                    </h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Ubah Password') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="text-success">{{ Session::get('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row g-4">
                <div class="col-lg-2 col-md-2 col-12">
                    <div class="d-flex py-1 align-items-center mb-3">
                        <span class="avatar me-2">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        <div class="flex-fill">
                            <div class="font-weight-medium">{{ auth()->user()->name }}</div>
                            <div class="text-muted">
                                {{ auth()->user()->username }}
                            </div>
                        </div>
                    </div>
                    <div class="list-group list-group-transparent mb-3 pt-3 border-top">
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="{{ route('account.profile') }}">
                            {{ __('Profil') }}
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center active"
                            href="{{ route('account.password') }}">
                            {{ __('Ubah Password') }}
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="{{ route('notification.index') }}">
                            {{ __('Notifikasi') }}
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-12">
                    <div class="card">
                        <div class="card-status-top bg-primary"></div>
                        <div class="card-body">
                            <div class="row align-items-center mb-3 pb-3 border-bottom">
                                <div class="col">
                                    <h3 class="card-title mb-1">
                                        {{ __('Ubah Password') }}
                                    </h3>
                                    <div class="text-muted">
                                        {{ __('Untuk keamanan akun Anda, mohon untuk tidak menyebarkan password Anda ke orang lain.') }}
                                    </div>
                                </div>
                            </div>
                            <form id="form" class="form" action="{{ route('account.password') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label" for="password_now">
                                        {{ __('Password Saat Ini') }}&nbsp;<span class="text-danger">*</span>
                                    </label>
                                    <div class="col">
                                        <input type="password" name="password_now" id="password_now"
                                            class="form-control @error('password_now') is-invalid @enderror">
                                        @error('password_now')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label" for="password">
                                        {{ __('Password Baru') }}&nbsp;<span class="text-danger">*</span>
                                    </label>
                                    <div class="col">
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="form-hint">
                                            Kata sandi harus terdiri dari 8-20 karakter, berisi huruf dan angka, dan
                                            tidak boleh mengandung spasi, karakter khusus, atau emoji.
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label" for="password_confirmation">
                                        {{ __('Konfirmasi Password') }}&nbsp;<span class="text-danger">*</span>
                                    </label>
                                    <div class="col">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-footer border-top py-3">
                                    <button type="submit" class="btn btn-primary me-1">{{ __('Simpan') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
