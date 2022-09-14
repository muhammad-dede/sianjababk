@extends('layouts.app')

@section('title', __('Edit Role'))

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Edit Role') }}
                    </h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('role.index') }}">{{ __('Role') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Edit') }}
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
                                        <a href="#" class="text-reset">{{ __('Form Role') }}</a>
                                    </h3>
                                    <div class="text-muted">
                                        {{ __('Input dengan tanda') }}
                                        <span class="text-danger">*</span>
                                        {{ __('wajib diisi!') }}
                                    </div>
                                </div>
                            </div>
                            <form id="form" class="form" action="{{ route('role.update', $role->id) }}"
                                method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label" for="name">
                                        {{ __('Name') }}&nbsp;<span class="text-danger">*</span>
                                    </label>
                                    <div class="col">
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') ?? $role->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="form-label col-3 col-form-label">
                                        {{ __('Permission') }}&nbsp;<span class="text-danger">*</span>
                                    </label>
                                    <div class="col">
                                        <div class="card bg-primary-lt">
                                            <div class="card-body">
                                                @foreach (permissions() as $row)
                                                    <label class="form-check form-check-inline mb-3">
                                                        <input name="permission[]" class="form-check-input" type="checkbox"
                                                            value="{{ $row->id }}"
                                                            {{ is_array($rolePermissions) && in_array($row->id, $rolePermissions) ? 'checked' : '' }}>
                                                        <span class="form-check-label">{{ $row->name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-footer border-top py-3">
                                    <button type="submit" class="btn btn-primary me-1">{{ __('Simpan') }}</button>
                                    <a href="{{ route('role.index') }}" class="btn btn-light">{{ __('Batal') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
