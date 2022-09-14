<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @hasSection('title')
        <title>@yield('title')&nbsp;|&nbsp;{{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <link rel="icon" type="image/x-icon" href="{{ asset('') }}logo.png" />
    <!-- CSS files -->
    <link href="{{ asset('') }}template/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}template/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}template/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}template/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}template/dist/css/demo.min.css" rel="stylesheet" />
    <!-- Libs CSS -->
    <link href="{{ asset('') }}assets/vendors/dataTables/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendors/select2/select2.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendors/select2/select2-bootstrap-5-theme.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendors/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    @stack('css')
</head>

<body>
    <div class="page">
        @include('layouts.partials.header')
        <div class="page-wrapper">
            @yield('content')
            @include('layouts.partials.footer')
        </div>
    </div>
    </div>

    <!-- Tabler Core -->
    <script src="{{ asset('') }}template/dist/js/tabler.min.js" defer></script>
    <script src="{{ asset('') }}template/dist/js/demo.min.js" defer></script>
    <!-- Libs JS -->
    <script src="{{ asset('') }}assets/vendors/jquery/jquery-3.5.1.js"></script>
    <script src="{{ asset('') }}assets/vendors/dataTables/jquery.dataTables.js"></script>
    <script src="{{ asset('') }}assets/vendors/dataTables/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}assets/vendors/select2/select2.full.min.js"></script>
    <script src="{{ asset('') }}assets/vendors/sweetalert2/dist/sweetalert2.min.js"></script>

    @stack('js')
</body>

</html>
