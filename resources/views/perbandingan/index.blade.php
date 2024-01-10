@extends('layouts.admin')

@section('content')
<?php $no = 1 ?>
<h2>Perbandingan Kriteria</h2>

<table class="table table-bordered" style="border-color: black;">
    <thead style="background-color: #add8e6;">
        <tr>
            <th>Kriteria 1</th>
            <th>Nilai Perbandingan</th>
            <th>Kriteria 2</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
        <tr>
            <td>{{ optional($row->kriteria1)->nama_kriteria }}</td>
            <td>
                <div class="mb-3">
                    <select name="nilai_perbandingan[]" style="width:100%;" disabled>
                        <option value="1" {{ $row->nilai_perbandingan == '1' ? 'selected' : '' }}>1: Sama penting dari
                        </option>
                        <option value="2" {{ $row->nilai_perbandingan == '2' ? 'selected' : '' }}>2: Mendekati sedikit
                            lebih penting dari
                        </option>
                        <option value="3" {{ $row->nilai_perbandingan == '3' ? 'selected' : '' }}>3: Sedikit lebih
                            penting dari
                        </option>
                        <option value="4" {{ $row->nilai_perbandingan == '4' ? 'selected' : '' }}>4: Mendekati lebih
                            penting dari
                        </option>
                        <option value="5" {{ $row->nilai_perbandingan == '5' ? 'selected' : '' }}>5: Lebih penting dari
                        </option>
                        <option value="6" {{ $row->nilai_perbandingan == '6' ? 'selected' : '' }}>6: Mendekati sangat
                            penting dari
                        </option>
                        <option value="7" {{ $row->nilai_perbandingan == '7' ? 'selected' : '' }}>7: Sangat penting dari
                        </option>
                        <option value="8" {{ $row->nilai_perbandingan == '8' ? 'selected' : '' }}>8: Mendekati mutlak
                            dari
                        </option>
                        <option value="9" {{ $row->nilai_perbandingan == '9' ? 'selected' : '' }}>9: Mutlak lebih
                            penting dari
                        </option>
                        <option value="0.5" {{ $row->nilai_perbandingan == '0.5' ? 'selected' : '' }}>0.5: 1 bagi
                            mendekati sedikit lebih penting dari
                        </option>
                        <option value="0.333" {{ $row->nilai_perbandingan == '0.333' ? 'selected' : '' }}>0.333: 1 bagi
                            sedikit lebih penting dari
                        </option>
                        <option value="0.25" {{ $row->nilai_perbandingan == '0.25' ? 'selected' : '' }}>0.25: 1 bagi
                            mendekati lebih penting dari
                        </option>
                        <option value="0.2 " {{ $row->nilai_perbandingan == '0.2' ? 'selected' : '' }}>0.2 : 1 bagi
                            lebih penting dari
                            dari
                        </option>
                        <option value="0.167" {{ $row->nilai_perbandingan == '0.167' ? 'selected' : '' }}>0.167: 1 bagi
                            mendekati sangat penting dari
                            dari
                        </option>
                        <option value="0.143" {{ $row->nilai_perbandingan == '0.143' ? 'selected' : '' }}>0.143: 1 bagi
                            sangat penting dari
                            dari
                        </option>
                        <option value="0.125" {{ $row->nilai_perbandingan == '0.125' ? 'selected' : '' }}>0.125: 1 bagi
                            mendekati mutlak dari
                            dari
                        </option>
                        <option value="0.1" {{ $row->nilai_perbandingan == '0.1' ? 'selected' : '' }}>0.1: 1 bagi mutlak
                            sangat penting dari
                        </option>
                    </select>
                </div>
            </td>
            <td>{{ optional($row->kriteria2)->nama_kriteria }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ url('perbandingan/edit') }}" class="btn btn-primary mb-3 float-end"><i class='fa fa-pencil-alt'></i>  Edit Data</a>
@endsection