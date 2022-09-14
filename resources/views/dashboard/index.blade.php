@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        {{ __('Selamat Datang') }}
                    </div>
                    <h2 class="page-title">
                        {{ auth()->user()->name }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card card-md">
                        <div class="card-stamp card-stamp-lg">
                            <div class="card-stamp-icon bg-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                                    <line x1="10" y1="10" x2="10.01" y2="10" />
                                    <line x1="14" y1="10" x2="14.01" y2="10" />
                                    <path d="M10 14a3.5 3.5 0 0 0 4 0" />
                                </svg>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h3 class="h1">{{ config('app.logoname') }}</h3>
                                    <div class="markdown text-muted">
                                        {{ config('app.name') }}
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ route('analisa.index') }}" class="btn btn-primary"
                                            rel="noopener">Analisa Jabatan & Beban Kerja</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Master</div>
                            </div>
                            <div class="h1 mb-3">{{ unitKerja()->count() }}</div>
                            <div class="d-flex mb-2">
                                <div>Unit Kerja</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Master</div>
                            </div>
                            <div class="h1 mb-3">{{ skpd()->count() }}</div>
                            <div class="d-flex mb-2">
                                <div>SKPD</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Data</div>
                            </div>
                            <div class="h1 mb-3">{{ jabatan()->count() }}</div>
                            <div class="d-flex mb-2">
                                <div>Data Jabatan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
