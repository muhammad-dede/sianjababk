@extends('layouts.app')

@section('title', __('Tambah Permission'))

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Tambah Permission') }}
                    </h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('permission.index') }}">{{ __('Permission') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Tambah') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-status-top bg-primary"></div>
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col">
                                    <h3 class="card-title mb-1">
                                        <a href="#" class="text-reset">{{ __('Form Permission') }}</a>
                                    </h3>
                                    <div class="text-muted">
                                        {{ __('Input dengan tanda') }}
                                        <span class="text-danger">*</span>
                                        {{ __('wajib diisi!') }}
                                    </div>
                                </div>
                            </div>
                            <form id="form" class="form" action="{{ route('permission.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label" for="name">
                                        {{ __('Nama') }}&nbsp;<span class="text-danger">*</span>
                                    </label>
                                    <div class="col">
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-footer border-top py-3">
                                    <button type="submit" class="btn btn-primary me-1">{{ __('Simpan') }}</button>
                                    <a href="{{ route('permission.index') }}"
                                        class="btn btn-light">{{ __('Batal') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
