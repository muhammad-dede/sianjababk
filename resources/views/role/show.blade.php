@extends('layouts.app')

@section('title', __('Detail User'))

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Detail User') }}
                    </h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ __('User') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Detail') }}
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
            <div class="card">
                <div class="card-status-top bg-success"></div>
                <div class="card-body">
                    <div class="row align-items-center mb-3">
                        <div class="col">
                            <h3 class="card-title mb-1">
                                <a href="#" class="text-reset">{{ $user->name }}</a>
                            </h3>
                            <div class="text-muted">
                                <i>
                                    Role:
                                    {{ $user->roles->pluck('name')[0] }}
                                </i>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="dropdown">
                                <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="1" />
                                        <circle cx="12" cy="19" r="1" />
                                        <circle cx="12" cy="5" r="1" />
                                    </svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ route('user.index') }}"
                                        class="dropdown-item">{{ __('Kembali ke Daftar') }}</a>
                                    <a href="{{ route('user.create') }}" class="dropdown-item">{{ __('Tambah Baru') }}</a>
                                    <a href="{{ route('user.edit', $user->id) }}"
                                        class="dropdown-item">{{ __('Edit') }}</a>
                                    <button class="dropdown-item text-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modal-delete">{{ __('Hapus') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-start border-success border-3">
                        <table class="table table-vtop">
                            <tbody>
                                <tr>
                                    <td>
                                        <strong class="text-success">{{ __('Nama') }}</strong>
                                    </td>
                                    <td class="w-75">{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong class="text-success">{{ __('Username') }}</strong>
                                    </td>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong class="text-success">{{ __('Email') }}</strong>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong class="text-success">{{ __('Role') }}</strong>
                                    </td>
                                    <td>{{ $user->roles->pluck('name')[0] }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong class="text-success">{{ __('Status') }}</strong>
                                    </td>
                                    <td>{{ $user->active ? __('Aktif') : __('Tidak Aktif') }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong class="text-success">{{ __('Tanggal Buat') }}</strong>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->isoFormat('D MMMM Y') }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong class="text-success">{{ __('Tanggal Edit') }}</strong>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($user->updated_at)->isoFormat('D MMMM Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <div class="modal-title">{{ __('Anda yakin ingin menghapus user') }}?</div>
                        <div>{{ __('Data user tidak dapat dikembalikan') }}.</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary me-auto"
                            data-bs-dismiss="modal">{{ __('Batal') }}</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Hapus') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
