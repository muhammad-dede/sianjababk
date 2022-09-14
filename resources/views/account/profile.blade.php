@extends('layouts.app')

@section('title', __('Profil'))

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Profil') }}
                    </h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Profil') }}
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
                        <a class="list-group-item list-group-item-action d-flex align-items-center active"
                            href="{{ route('account.profile') }}">
                            {{ __('Profil') }}
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
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
                                        {{ __('Profil Saya') }}
                                    </h3>
                                    <div class="text-muted">
                                        {{ __('Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun') }}
                                    </div>
                                </div>
                            </div>
                            <form id="form" class="form" action="{{ route('account.profile') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label" for="name">
                                        {{ __('Nama') }}&nbsp;<span class="text-danger">*</span>
                                    </label>
                                    <div class="col">
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') ?? auth()->user()->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label" for="username">
                                        {{ __('Username') }}&nbsp;<span class="text-danger">*</span>
                                    </label>
                                    <div class="col">
                                        <input type="text" name="username" id="username"
                                            class="form-control @error('username') is-invalid @enderror"
                                            value="{{ old('username') ?? auth()->user()->username }}">
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label" for="email">
                                        {{ __('Email') }}&nbsp;<span class="text-danger">*</span>
                                    </label>
                                    <div class="col">
                                        <input type="email" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') ?? auth()->user()->email }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
