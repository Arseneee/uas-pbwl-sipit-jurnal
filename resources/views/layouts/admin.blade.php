<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-... (integrity)" crossorigin="anonymous" />
    <style>
        body {
            display: flex;
        }

        #app {
            flex: 1;
            display: flex;
        }

        .sidebar {
            min-width: 190px;
            max-width: 190px;
            background: #2c3e50;
            color: #ecf0f1;
            transition: all 0.3s;
            position: fixed;
            height: 100%;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 16px;
            color: #ecf0f1;
            display: block;
            transition: all 0.3s;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar a:hover {
            background: #3498db;
            color: #fff;
        }

        .logo {
            max-width: 180px;
            margin-right: 1000px
        }

        .content {
            flex: 1;
            padding: 20px;
            margin-left: 190px;
        }

        .category {
            margin-top: 10px;
            margin-bottom: 10px;
            padding-left: 15px;
        }

        .dropdown-toggle {
            cursor: pointer;
        }

        .dropdown-menu {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="sidebar">
            <div class="navbar-brand">
                <img src="{{ asset('img/SI-PIT.png') }}" alt="Logo" class="logo">
            </div>
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-home"></i> Home
            </a>

            @guest
            @if (Route::has('login'))
            <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
            @endif
            @else
            <a href="{{ url('/home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>

            <div class="category">
                <span>----- Main Data</span>
                <a href="{{ url('/investasi') }}"><i class="fas fa-chart-line"></i> Investasi</a>
                <a href="{{ url('/kriteria') }}"><i class="fas fa-cogs"></i> Kriteria</a>
                <a href="{{ url('/alternatif') }}"><i class="fas fa-list-alt"></i> Alternatif</a>
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false" v-pre>
                    <i class="fas fa-balance-scale"></i> Perbandingan
                </a>

                <div class="dropdown-menu dropdown-menu-end bg-secondary" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/perbandingan') }}">
                        <i class="fas fa-cogs"></i> Kriteria
                    </a>
                    <a class="dropdown-item" href="{{ url('/altkrit') }}">
                        <i class="fas fa-list-alt"></i> Alternatif
                    </a>
                </div>
            </div>

            <div class="category">
                <span>----- Algoritma AHP</span>
                <a href="{{ url('/ahp') }}"><i class="fas fa-table"></i> Matriks</a>
                <a href="{{ url('/ahp.hitung') }}"><i class="fas fa-calculator"></i> Perhitungan</a>
            </div>

            <div class="category">
                <span>----- Account</span>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i
                        class="fas fa-sign-out-alt"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            @endguest
        </div>

        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

</html>