@extends('layouts.admin')

@section('content')
<h2>Perbandingan Alternatif-Kriteria</h2>
<br>
<form action="{{ route('updateMultiple') }}" method="post">
    @csrf
    <div class="accordion" id="accordionExample">
        @foreach($kriteriaGroups as $kriteriaGroup)
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $kriteriaGroup[0]->kriteria_id }}" aria-expanded="false"
                    aria-controls="collapse{{ $kriteriaGroup[0]->kriteria_id }}">
                    {{ $kriteriaGroup[0]->kriteria->nama_kriteria }}
                </button>
            </h2>
            <div id="collapse{{ $kriteriaGroup[0]->kriteria_id }}" class="accordion-collapse collapse"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    {{ $kriteriaGroup[0]->kriteria->deskripsi }}
                </div>
            </div>
        </div>

        <table class="table table-bordered" style="border-color: black;">
            <thead style="background-color: #add8e6;">
                <tr>
                    <th width="300px">Alternatif</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriteriaGroup as $row)
                <tr>
                    <td>{{ optional($row->alternatif)->alt_investasi }}</td>
                    <td>
                        <div class="mb-3">
                            <select name="nilai_perbandingan[{{ $row->alternatif_kriteria_id }}]" style="width:100%;"
                                enabled>
                                <option value="1" {{ $row->nilai_perbandingan == '1' ? 'selected' : '' }}>1: Sangat
                                    Sedikit
                                </option>
                                <option value="3" {{ $row->nilai_perbandingan == '3' ? 'selected' : '' }}>3: Sedikit
                                </option>
                                <option value="5" {{ $row->nilai_perbandingan == '5' ? 'selected' : '' }}>5: Mendekati
                                    Besar
                                </option>
                                <option value="7" {{ $row->nilai_perbandingan == '7' ? 'selected' : '' }}>7: Besar
                                </option>
                                <option value="9" {{ $row->nilai_perbandingan == '9' ? 'selected' : '' }}>9: Sangat
                                    Besar
                                </option>
                            </select>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary" onclick="return alert('Perubahan Berhasil Disimpan')">Simpan Perubahan</button>
    <a href="{{ url('altkrit') }}" class="btn btn-primary mb-3 float-end">Kembali</a>
</form>
@endsection