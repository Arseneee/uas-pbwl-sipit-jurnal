<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Navbar Styling */
        .navbar {
            background-color: #2c3e50;
            /* Darker background color */
        }

        .navbar-brand {
            color: #ecf0f1;
            margin-left: 8px;
        }

        .navbar-light .navbar-nav .nav-link {
            color: #ecf0f1;
            transition: color 0.3s ease-in-out;
            /* Smooth color transition */
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: #3498db;
            /* Change color on hover */
        }

        .nav-link.active,
        .nav-link:hover {
            color: #3498db !important;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav id="navbar" class="navbar navbar-expand-md navbar-light shadow-sm sticky-top">
            <div class="container">
                <img src="{{ asset('img/SI-PIT.png') }}" alt="SI-PIT" width="60" height="54">
                <a class="navbar-brand" href="{{ url('/') }}" style="padding:5px">
                    S I - P I T
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#beranda">BERANDA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tentang">TENTANG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#investasi">INVESTASI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#ranking">RANKING</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#link">BLOGROLL </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    </div>
</body>

<footer id="footer" class="dark" style="background-color:#2c3e50; color:white">
    <div class="container">
        <div class="footer-widgets-wrap">
            <div class="row col-mb-50">
                <div class="col-lg-8">
                    <div class="row col-mb-50">
                        <div class="col-md-6">
                            <div class="widget clearfix">
                                <img src="{{ asset('img/si-pit1.png') }}" alt="Image" class="footer-logo" width="200px">
                                <p id="link">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu DPMPTSP Kota Medan</p>
                                <div
                                    style="background: url('https\:\/\/investmedan\.pemkomedan\.go\.id\/public\/media\/_theme/images/world-map.png') no-repeat center center; background-size: 100%;">
                                    <address>
                                        <strong>Alamat :</strong>
                                        <br> Jl. Jenderal Besar A.H. Nasution No.32 <br>
                                    </address>
                                    <abbr title="Phone Number">
                                        <strong>Telepon:</strong>
                                    </abbr> (061) 78522537 <br>
                                    <abbr title="Email">
                                        <strong>Email:</strong>
                                        <a href="mailto:dpmtsp@pemkomedan.go.id">dpmtsp@pemkomedan.go.id</a>
                                    </abbr> <br>
                                    <abbr title="Email">
                                        <strong>Email:</strong>
                                        <a href="mailto:dpmtsp.kota.medan@oss.go.id">dpmtsp.kota.medan@oss.go.id</a>
                                    </abbr>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="widget widget_links clearfix">
                                <br>
                                <br>
                                <br>
                                <h4>Blogroll</h4>
                                <ul>
                                    <li><a href="https://investmedan.pemkomedan.go.id">Investmedan.id</a></li>
                                    <li><a href="http://dpmptsp.pemkomedan.go.id">DPMPTSP Medan</a></li>
                                    <li><a href="https://northsumatrainvest.id">North Sumatra Investment</a></li>
                                    <li><a href="https://sipandumedan.pemkomedan.go.id">Aplikasi SISPANDU</a></li>
                                    <li><a href="https://simbg.pu.go.id">Portal PUPR</a></li>
                                    <li><a href="https://oss.go.id">OSS.go.id</a></li>
                                    <li><a href="https://dpmptsp.pemkomedan.go.id/dpmptspwebaplikasi/modules/skm/">SKM
                                            Online</a></li>
                                    <li><a href="#">Hubungi Kami</a></li>
                                    <li><a href="{{ route('login') }}">Login Sistem</a></li>
                                </ul>
                            </div>
                            <div id="histats_counter" style="margin-top:25px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row col-mb-50">
                        <div class="col-md-12">
                            <br><br><br>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63715.11138666198!2d98.60721453124998!3d3.542563700000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031300853fb9103%3A0x6414a8d0bb1e2059!2sDinas%20Penanaman%20Modal%20dan%20PTSP%20Kota%20Medan!5e0!3m2!1sen!2sid!4v1676010601977!5m2!1sen!2sid"
                                width="100%" height="250px" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="copyrights">
        <div class="container">
            <div class="row col-mb-30">
                <div class="col-md-12 text-center text-md-start">
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navLinks = document.querySelectorAll(".nav-link");

        navLinks.forEach(function (navLink) {
            navLink.addEventListener("click", function () {
                navLinks.forEach(function (link) {
                    link.classList.remove("active");
                });

                this.classList.add("active");
            });
        });
    });
</script>

</html>