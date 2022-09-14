<div class="sticky-top">
    <header class="navbar navbar-expand-md navbar-light sticky-top d-print-none">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href="{{ url('/') }}" class="me-2">
                    <img src="{{ asset('') }}logo.png" width="110" height="32" alt="Tabler"
                        class="navbar-brand-image">
                </a>
                <strong>{{ config('app.logoname') }}</strong>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
                {{-- <div class="d-none d-md-flex">
                    <div class="nav-item dropdown d-none d-md-flex me-3">
                        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                            aria-label="Show notifications">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                            </svg>
                            @if (auth()->user()->unreadNotifications->count() > 0)
                                <span class="badge bg-red"></span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title me-2">{{ __('Notifikasi') }}</h3>
                                </div>
                                <div class="list-group list-group-flush list-group-hoverable">
                                    @forelse (auth()->user()->unreadNotifications as $notification)
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col text-truncate">
                                                    <a href="{{ route('notification.read', $notification->id) }}"
                                                        class="text-body d-block">
                                                        {{ $notification->data['title'] }}
                                                    </a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        {{ \Str::words($notification->data['body'], '6') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto text-center">
                                                    <span class="text-muted">{{ __('Tidak ada notifikasi') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{ route('notification.index') }}">{{ __('Tampilkan Semua') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                        aria-label="Open user menu">
                        <span class="avatar avatar-sm">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ auth()->user()->name }}</div>
                            <div class="mt-1 small text-muted">
                                {{ auth()->user()->username }}
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="{{ route('account.profile') }}" class="dropdown-item">{{ __('Profil') }}</a>
                        <a href="{{ route('account.password') }}" class="dropdown-item">{{ __('Ubah Password') }}</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar navbar-light">
                <div class="container-xl">
                    <ul class="navbar-nav">
                        <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <span class="nav-link-title">
                                    {{ __('Dashboard') }}
                                </span>
                            </a>
                        </li>
                        @role('admin')
                            <li class="nav-item {{ Request::is('user') || Request::is('user/*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    <span class="nav-link-title">
                                        {{ __('Pengguna') }}
                                    </span>
                                </a>
                            </li>
                        @endrole
                        <li
                            class="nav-item {{ Request::is('unit-kerja') || Request::is('unit-kerja/*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('unit-kerja.index') }}">
                                <span class="nav-link-title">
                                    {{ __('Unit Kerja') }}
                                </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('skpd') || Request::is('skpd/*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('skpd.index') }}">
                                <span class="nav-link-title">
                                    {{ __('SKPD') }}
                                </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('jabatan') || Request::is('jabatan/*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('jabatan.index') }}">
                                <span class="nav-link-title">
                                    {{ __('Jabatan') }}
                                </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('analisa') || Request::is('analisa/*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('analisa.index') }}">
                                <span class="nav-link-title">
                                    {{ __('Anjab dan ABK') }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
