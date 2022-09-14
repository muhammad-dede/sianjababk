@extends('layouts.app')

@section('title', __('Notifikasi'))

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Notifikasi') }}
                    </h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Notifikasi') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
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
                        <a class="list-group-item list-group-item-action d-flex align-items-center"
                            href="{{ route('account.password') }}">
                            {{ __('Ubah Password') }}
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center active"
                            href="{{ route('notification.index') }}">
                            {{ __('Notifikasi') }}
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-12">
                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-status-top bg-primary"></div>
                                <div class="card-header d-flex justify-content-between">
                                    <h3 class="card-title m-0 me-3">
                                        {{ __('Notifikasi') }}
                                    </h3>
                                    @if (auth()->user()->notifications->count() > 0)
                                        <div>
                                            <a href="{{ route('notification.read.all') }}">
                                                {{ __('Tandai semua sebagai sudah dibaca') }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="list-group list-group-flush">
                                    @forelse (auth()->user()->notifications as $notification)
                                        <div class="list-group-item {{ $notification->read_at ? 'active' : '' }}">
                                            <div class="row align-items-center">
                                                <div class="col text-truncate">
                                                    <a href="{{ route('notification.read', $notification->id) }}"
                                                        class="text-reset d-block fw-bold">
                                                        {{ $notification->data['title'] }}
                                                    </a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        {{ $notification->data['body'] }}
                                                    </div>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        <small>
                                                            {{ \Carbon\Carbon::parse($notification->created_at)->isoFormat('DD-MM-Y HH:mm') }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="{{ route('notification.read', $notification->id) }}">
                                                        {{ __('Tampil Rincian') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="list-group-item">
                                            <div class="empty">
                                                <div class="empty-img"><img
                                                        src="{{ asset('') }}public/assets/ilustrations/no-data.svg"
                                                        height="128" alt="">
                                                </div>
                                                <p class="empty-title">{{ __('Tidak ada notifikasi') }}</p>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
