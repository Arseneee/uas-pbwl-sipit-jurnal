@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="dashboard-container">
                <h2>Sistem Pendukung Keputusan (AHP)</h2>
                <h5>---- Pemilihan Investasi Pada DPMPTSP Kota Medan ----</h5>
                <br>
                <img src="{{ asset('img/tes1.png') }}" alt="Investasi Image"
                    style="max-width: 100%; height: auto; margin-bottom: 20px;">

                <div id="grafikUsulan" style="height: 400px;"></div>

                <table class="table table-bordered" style="border-color: black;">
                    <thead style="background-color: #add8e6;">
                        <tr>
                            <th>Alternatif</th>
                            <th>Skor Sintesis</th>
                            <th>Rank</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rankedResults as $key => $result)
                        <tr>
                            <td>{{ $alternatifs->where('alternatif_id', $result->alternatif_id)->first()->alt_investasi
                                }}</td>
                            <td>{{ number_format($result->hasil_sintesis, 4) }}</td>
                            <td>{{ $key + 1 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
@endsection