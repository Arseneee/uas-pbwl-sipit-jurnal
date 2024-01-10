@extends('layouts.frontend')

@section('content')
<section id="page-title">
    <div class="container clearfix">
        <h1>Data Grafik Peringkat Investasi</h1>
        <span>Data Grafik Peringkat Investasi Kota Medan Per Tahun</span>
        <br>
    </div>
</section>
<br><br><br>
<figure class="text-center">
    <blockquote class="blockquote">
        <h2>GRAFIK TAHUN 2023</h2>
    </blockquote>
    <img src="{{ asset('img/chart2023.png') }}" alt="">
</figure>
<br><br><br>
<figure class="text-center">
    <blockquote class="blockquote">
        <h2>GRAFIK TAHUN 2024</h2>
    </blockquote>
    <img src="{{ asset('img/chart2023.png') }}" alt="...">
</figure>

@endsection