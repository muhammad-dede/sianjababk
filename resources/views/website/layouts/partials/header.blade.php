<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('index') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('') }}logo.png" alt="logo">
            <span>{{ config('app.logoname') }}</span>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('index') }}">
                        {{ __('Home') }}
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('tentang') ? 'active' : '' }}" href="{{ route('tentang') }}">
                        {{ __('Tentang') }}
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('download') ? 'active' : '' }}" href="{{ route('download') }}">
                        {{ __('Download') }}
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">
                        {{ __('Kontak') }}
                    </a>
                </li>
                <li>
                    @guest
                        <a class="getstarted" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                    @endguest
                    @auth
                        <a class="getstarted" href="{{ route('dashboard') }}">
                            {{ __('Dashboard') }}
                        </a>
                    @endauth
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
