@extends('layouts.frontend')

@section('content')
<style>
    .carousel-item {
        height: 400px;
        overflow: hidden;
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .carousel-caption {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        animation: slideIn 1s ease-in-out;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .carousel-caption h5,
    .carousel-caption p {
        font-size: 1.5em;
        margin: 0;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-100%) translateX(-50%) scale(0);
            opacity: 0;
        }

        to {
            transform: translateY(-50) translateX(-50%) scale(1);
            opacity: 1;
        }
    }

    .card {
        margin-top: 20px;
        border: none;
        box-shadow: 0 4px 8px black;
        margin-left: 15px;
        margin-right: 15px;
    }

    .card img {
        height: 150px;
        object-fit: cover;
    }

    .card-body {
        text-align: center;
    }

    .btn-primary {
        background-color: #3498db;
        border: none;
    }

    .btn-primary:hover {
        background-color: #2980b9;
    }

    #carouselExampleCaptions .carousel-control-prev,
    #carouselExampleCaptions .carousel-control-next {
        width: 5%;
        height: 70px;
        margin-top: 150px;
        background: none;
        border: none;
        font-size: 24px;
        color: #000;
        outline: none;
        cursor: pointer;
        opacity: 0.2;
        background-color: rgba(0, 0, 0, 0.5);
        transition: opacity 0.3s ease-in-out;
        transition: background-color: 0.3s ease-in-out;
    }

    #carouselExampleCaptions .carousel-control-prev:hover,
    #carouselExampleCaptions .carousel-control-next:hover {
        opacity: 1;
        color: #555;
        background-color: rgba(0, 0, 0, 0.6);
    }


    #cardCarousel .carousel-control-prev:hover,
    #cardCarousel .carousel-control-next:hover {
        color: #555;
    }

    #cardCarousel .carousel-control-prev-icon::before {
        content: '\2039';
    }

    #cardCarousel .carousel-control-next-icon::before {
        content: '\203A';
    }

    #cardCarousel .carousel-control-prev,
    #cardCarousel .carousel-control-next {
        width: 5%;
        height: 100px;
        margin-top: 150px;
        background: none;
        border: none;
        font-size: 24px;
        color: #fff;
        outline: none;
        cursor: pointer;
        opacity: 0;
        transition: opacity 0.3s;

    }

    #cardCarousel .carousel-control-prev:hover,
    #cardCarousel .carousel-control-next:hover {
        color: #555;
        opacity: 1;
        background-color: rgba(0, 0, 0, 0.5);
    }
</style>

<div data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="0" class="scrollspy-example" tabindex="0">
    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" id="beranda">
            <div class="carousel-item active">
                <img src="{{ asset('img/bg.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p class="fs-4"><strong>Mulailah Investasi Anda Hari Ini!</strong></p>
                    <p class="fs-5">investasi adalah langkah bijak untuk membangun masa depan yang lebih stabil dan
                        sejahtera.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/bg2.jfif') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p class="fs-4"><strong>Banyak Peluang Untuk Berinvestasi</strong></p>
                    <p class="fs-5">Di Salah Satu Kota Sibuk dan Strategis di Asia Tenggara, Kota Medan</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/bg3.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p class="fs-4"><strong>Menjamin Masa Depan</strong></p>
                    <p class="fs-5">Bangun fondasi untuk merencanakan masa depan yang lebih terjamin dan mewujudkan
                        pencapaian impian hidup.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>

    <div class="container clearfix" style="margin-bottom: 20px">
        <div class="row justify no-gutters">
            <div class="col-2">
                <a href="https://oss.go.id" target="_blank" \><img
                        src="https://investmedan.pemkomedan.go.id/public/media/_theme/images/banner_oss.jpg"
                        height="100px"></a>
            </div>
            <div class="col-8 align-self-center text-center">
                <img src="https://investmedan.pemkomedan.go.id/public/media/_theme/images/banner_a.jpg" height="100px">
            </div>
            <div class="col-2 align-self-center">
                <a href="umkm" title="Featured Local Product">
                    <img src="https://investmedan.pemkomedan.go.id/public/media/_theme/images/banner_fp.jpg"
                        height="100px">
                </a>
            </div>
        </div>
    </div>

    <figure class="text-center mt-4">
        <blockquote class="blockquote">
            <h2 id="tentang">TENTANG SI-PIT</h2>
        </blockquote>
        <figcaption class="blockquote-footer">
            Sistem Pendukung Keputusan Pemilihan Investasi
        </figcaption>
    </figure>

    <div class="row align-items-center gutter-40 col-mb-50" style="margin-left:10px; margin-right:10px">
        <div class="col-md-5">
            <img src="{{ asset('img/si-pit2.png') }}" alt="SI_PIT" width="400px">
        </div>
        <div class="col-md-7">
            <!-- Right Column Content -->
            <blockquote>SI-PIT merupakan suatu sistem yang canggih dan efisien yang dirancang khusus untuk mendukung
                proses
                pengambilan keputusan investasi. Dengan menggunakan metode Analytical Hierarchy Process (AHP), SI-PIT
                mampu menganalisis
                kriteria-kriteria
                penting dalam pemilihan investasi dan merangkum preferensi pengguna berdasarkan pertimbangan hierarki
                yang
                telah ditentukan.</blockquote>
            <blockquote>SI-PIT tidak hanya memberikan kemudahan dalam analisis kriteria investasi, tetapi juga
                memberikan kejelasan dan transparansi dalam proses pengambilan keputusan. Dengan metode AHP yang
                terintegrasi, SI-PIT menyajikan solusi yang dapat diandalkan untuk menyeleksi opsi investasi yang paling
                optimal. Keunggulan sistem ini terletak pada kemampuannya dalam mengatasi kompleksitas keputusan
                investasi dengan menyederhanakan dan mengorganisir informasi, memastikan bahwa setiap faktor
                berkontribusi sesuai dengan tingkat signifikansinya.</blockquote>
            <blockquote>Tak hanya itu, SI-PIT juga menyediakan tampilan visual yang intuitif, mempermudah pemahaman dan
                interpretasi hasil analisis. Dengan demikian, para pengguna dapat dengan cepat dan efektif merespon
                dinamika pasar serta mengambil keputusan investasi yang cerdas. SI-PIT tidak hanya sekadar sebuah
                platform, tetapi mitra terpercaya dalam membangun portofolio investasi yang tangguh dan sesuai dengan
                tujuan finansial pengguna. Dengan SI-PIT, masa depan investasi Anda menjadi lebih terarah dan terjamin.
            </blockquote>
        </div>
    </div>
    <br>

    <figure class="text-center">
        <blockquote class="blockquote">
            <h2 id="investasi">PELUANG INVESTASI</h2>
        </blockquote>
        <figcaption class="blockquote-footer">
            Potensi dan Peluangan Investasi Unggulan</cite>
        </figcaption>
    </figure>
    <!-- Cards Carousel -->
    <div id="cardCarousel" class="carousel slide mt-4" style>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#cardCarousel" data-bs-slide-to="0" class="active"
                aria-current="true"></button>
            <button type="button" data-bs-target="#cardCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#cardCarousel" data-bs-slide-to="2"></button>
            <!-- Add more indicators if needed -->
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('img/medan_zoo.jpg') }}" class="card-img-top" alt="Medan Zoo">
                            <div class="card-body">
                                <h5 class="card-title">Medan Zoo</h5>
                                <p class="card-text">Potensial sebagai tempat rekreasi terpadu antara lain kebun
                                    binatang
                                    modern, berbagai jenis museum, taman rekreasi keluarga berbasis teknologi canggih.
                                </p>
                                <a href="https://investmedan.pemkomedan.go.id/opportunity?id=4"
                                    class="btn btn-primary">READ
                                    MORE</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('img/deli_youth.jpg') }}" class="card-img-top"
                                alt="Deli Youth Center & Swimming Pool">
                            <div class="card-body">
                                <h5 class="card-title">Deli Youth Center & Swimming Pool</h5>
                                <p class="card-text">Terletak di jantung Kota Medan, tanah seluas 2 hektar. Digunakan
                                    untuk arena olah raga di samping kolam renang.</p>
                                <a href="https://investmedan.pemkomedan.go.id/opportunity?id=1"
                                    class="btn btn-primary">READ
                                    MORE</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('img/02.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Waste Management into Gas Energy</h5>
                                <p class="card-text">Sampah di tempat pembuangan akhir (TPA) bisa diolah
                                    menjadi
                                    energi gas, Dampak negatif gas TPA dapat dikurangi.</p>
                                <a href="https://investmedan.pemkomedan.go.id/opportunity?id=2"
                                    class="btn btn-primary">READ
                                    MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('img/parking_building.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">GEDUNG PARKIR</h5>
                                <p class="card-text">Terdapat 41 kantor di sekitar lokasi dan 120 mobil parkir di bahu
                                    jalan. Pembangunan gedung parkir dengan sistem robotik
                                    menggunakan elevator.</p>
                                <a href="https://investmedan.pemkomedan.go.id/opportunity?id=7"
                                    class="btn btn-primary">READ
                                    MORE</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('img/03.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Waste Management Into Compost</h5>
                                <p class="card-text">Pengolahan sampah yang menggunakan teknologi tepat guna melalui
                                    kolaborasi multisektor yaitu Refuse
                                    Derived
                                    Fuel.</p>
                                <a href="https://investmedan.pemkomedan.go.id/opportunity?id=3"
                                    class="btn btn-primary">READ
                                    MORE</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('img/city_gallery.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">City Gallery / Gallery UMKM</h5>
                                <p class="card-text">Aset Pemerintah Kota Medan dengan luas 7,940 M2. Lahan ini terletak
                                    di
                                    tengah kota, di samping Medan Fair Plaza, Jalan Jend. Gatot Subroto</p>
                                <a href="https://investmedan.pemkomedan.go.id/opportunity?id=5"
                                    class="btn btn-primary">READ
                                    MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br><br>

    <figure class="text-center">
        <blockquote class="blockquote">
            <h2 id="ranking">Ranking & Grafik</h2>
        </blockquote>
        <figcaption class="blockquote-footer">
            Urutan Investasi Terbaik Untuk Tahun 2024</cite>
        </figcaption>
    </figure>

    <br>
    <div class="row align-items-center gutter-40 col-mb-50" style="margin-left:10px; margin-right:10px">
        <!-- Right Column Content -->
        <blockquote>Dalam dunia investasi yang penuh tantangan, grafik usulan ini tidak hanya mencerminkan sejarah
            sukses, tetapi juga meramalkan masa depan yang menjanjikan. Menggabungkan data akurat dan analisis mendalam,
            grafik ini menjadi panduan yang dapat diandalkan bagi anda yang mencari peluang dengan risiko terukur.
            Peringkat investasi kami, yang disusun dengan cermat, membantu mengidentifikasi aset yang memiliki potensi
            pertumbuhan yang kuat, memberikan dasar yang kokoh bagi keputusan investasi yang cerdas.</blockquote>
    </div><br><br>

    <div id="grafikUsulan" style="height: 400px;"></div>
</div>

<div class="d-grid gap-2 bg-secondary p-2">
    <a href="https://investmedan.pemkomedan.go.id/investment" class="btn text-white">
        Lihat Data Realisasi Investasi Kota Medan. <strong>Lihat Selengkapnya</strong>
        <i class="fas fa-chevron-right ms-2"></i>
    </a>
</div>




<!-- Load Highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<!-- Script untuk menggambar grafik -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Data from the "alternatif" table
        var alternatifData = @json($alternatifData);

        // Data from the "ranking" table (e.g., synthesized scores)
        var usulanScores = @json($usulanScores);

        var colors = ['#4572A7', '#AA4643', '#89A54E', '#80699B', '#3D96AE', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92'];


        // Chart data
        var chartData = [];
        for (var i = 0; i < alternatifData.length; i++) {
            chartData.push({
                name: alternatifData[i].alt_investasi,
                y: usulanScores[i],
                color: colors[i % colors.length]
            });
        }

        // Highcharts chart configuration
        var chartOptions = {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Usulan'
            },
            xAxis: {
                categories: alternatifData.map(function (data) {
                    return data.alt_investasi;
                })
            },
            yAxis: {
                title: {
                    text: 'Skor Usulan'
                }
            },
            series: [{
                name: 'Skor Usulan',
                data: chartData
            }]
        };

        // Draw the Highcharts chart in the element with id "grafikUsulan"
        Highcharts.chart('grafikUsulan', chartOptions);
    });
</script>

<script>
    $(document).ready(function () {
        // Membuat carousel otomatis bergerak setiap 3 detik
        $('#cardCarousel').carousel({
            interval: 5000
        });
    });
</script>
@endsection