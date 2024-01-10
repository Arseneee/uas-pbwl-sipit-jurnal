@extends('layouts.admin')

@section('content')
<style>
    h3 {
        margin-top: 20px;
    }
</style>

<div class="container">
    <div class="mt-4">
        <h3>Matriks Perbandingan Berpasangan</h3>
        <table class="table table-bordered  border-dark">
            <thead class="thead-dark">
                <tr style="background-color:#add8e6">
                    <th>Kriteria</th>
                    @foreach ($kriterias as $kriteria)
                    <th>{{ $kriteria->kode_krit }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($kriterias as $rowKriteria)
                <tr>
                    <th style="background-color:#add8e6">{{ $rowKriteria->kode_krit }}</th>
                    @php
                    $rowTotal = 0;
                    @endphp
                    @foreach ($kriterias as $colKriteria)
                    <td>{{ $pairedComparisonMatrix[$rowKriteria->kriteria_id][$colKriteria->kriteria_id] }}</td>
                    @php
                    $rowTotal += $pairedComparisonMatrix[$rowKriteria->kriteria_id][$colKriteria->kriteria_id];
                    @endphp
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <h3>Normalisasi Matriks Perbandingan Berpasangan</h3>
        <table class="table table-bordered border-dark">
            <thead class="thead-dark">
                <tr style="background-color:#add8e6">
                    <th>Kriteria</th>
                    @foreach ($kriterias as $kriteria)
                    <th>{{ $kriteria->kode_krit }}</th>
                    @endforeach

                </tr>
            </thead>
            <tbody>
                @foreach ($kriterias as $rowKriteria)
                <tr>
                    <th style="background-color:#add8e6">{{ $rowKriteria->kode_krit }}</th>
                    @php
                    $rowSum = array_sum($pairedComparisonMatrix[$rowKriteria->kriteria_id]);
                    @endphp
                    @foreach ($kriterias as $colKriteria)
                    <td>
                        @if ($rowSum != 0)
                        {{ number_format($pairedComparisonMatrix[$rowKriteria->kriteria_id][$colKriteria->kriteria_id] /
                        $rowSum, 2) }}
                        @else
                        0
                        @endif
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <h3>Vektor Prioritas Global untuk Kriteria</h3>
        <table class="table table-bordered border-dark">
            <thead class="thead-dark">
                <tr style="background-color:#add8e6">
                    <th>Kode Kriteria</th>
                    <th>Nama Kriteria</th>
                    <th>eigenvalue</th>
                    <th>Bobot Prioritas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriterias as $kriteria)
                <tr>
                    <td>{{ $kriteria->kode_krit }}</td>
                    <td>{{ $kriteria->nama_kriteria }}</td>
                    <td>{{ number_format($eigenvaluesForCriteria[$kriteria->kriteria_id], 2)}}</td>
                    <td>{{ number_format($globalPriorityVector[$kriteria->kriteria_id], 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection