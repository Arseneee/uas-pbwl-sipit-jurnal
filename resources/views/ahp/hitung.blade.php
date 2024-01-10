@extends('layouts.admin')

@section('content')
<h2>Matriks Perbandingan Alternatif-Kriteria</h2>

<table class="table table-bordered" style="border-color: black;">
    <thead style="background-color: #add8e6;">
        <tr>
            <th></th>
            @foreach ($kriteriaIds as $kriteriaId)
            <th>{{ $kriterias->where('kriteria_id', $kriteriaId)->first()->nama_kriteria }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($alternatifIds as $alternatifId)
        <tr>
            <td style="background-color: #add8e6;"><strong>{{ $alternatifs->where('alternatif_id', $alternatifId)->first()->alt_investasi }}</strong></td>
            @foreach ($kriteriaIds as $kriteriaId)
            <td>{{ $perbandinganMatrix[$kriteriaId][$alternatifId] }}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>

<h2>Normalisasi Matriks Perbandingan Alternatif-Kriteria</h2>

<table class="table table-bordered" style="border-color: black;">
    <thead style="background-color: #add8e6;">
        <tr>
            <th></th> {{-- Kolom kosong di sudut kiri atas --}}
            @foreach ($kriteriaIds as $kriteriaId)
            <th>{{ $kriterias->where('kriteria_id', $kriteriaId)->first()->nama_kriteria }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($alternatifIds as $alternatifId)
        <tr>
            <td style="background-color: #add8e6;"><strong>{{ $alternatifs->where('alternatif_id', $alternatifId)->first()->alt_investasi }}</strong></td>
            @foreach ($kriteriaIds as $kriteriaId)
            <td>{{ number_format($normalizedMatrix[$kriteriaId][$alternatifId], 4)}}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>

<h2>Perangkingan Alternatif</h2>

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
            <td>{{ $alternatifs->where('alternatif_id', $result->alternatif_id)->first()->alt_investasi }}</td>
            <td>{{ number_format($result->hasil_sintesis, 4) }}</td>
            <td>{{ $key + 1 }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection