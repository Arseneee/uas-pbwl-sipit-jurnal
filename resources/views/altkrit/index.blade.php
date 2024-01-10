@extends('layouts.admin')

@section('content')
<h2>Perbandingan Alternatif-Kriteria</h2>
<br>
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Return of Investment
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                Potensi keuntungan finansial yang dihasilkan oleh investasi.
            </div>
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
        @foreach ($rows as $row)
        @if (optional($row->kriteria)->kriteria_id == '1')
        <tr>
            <td>{{ optional($row->alternatif)->alt_investasi }}</td>
            <td>
                <div class="mb-3">
                    <select name="nilai_perbandingan[]" style="width:100%;" disabled>
                        <option value="1" {{ $row->nilai_perbandingan == '1' ? 'selected' : '' }}>1: Potensi Keuntungan
                            Sangat Sedikit
                        </option>
                        <option value="3" {{ $row->nilai_perbandingan == '3' ? 'selected' : '' }}>3: Potensi Keuntungan
                            Sedikit
                        </option>
                        <option value="5" {{ $row->nilai_perbandingan == '5' ? 'selected' : '' }}>5: Potensi Keuntungan
                            Mendekati Besar
                        </option>
                        <option value="7" {{ $row->nilai_perbandingan == '7' ? 'selected' : '' }}>7: Potensi
                            Keuntungannya Besar
                        </option>
                        <option value="9" {{ $row->nilai_perbandingan == '9' ? 'selected' : '' }}>9: Potensi Keuntungan
                            Sangat Besar
                        </option>
                    </select>
                </div>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Potensi Adaptasi Ekonomi
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                potensi investasi dapat mengikuti pertumbuhan ekonomi di Kota Medan.
            </div>
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
        @foreach ($rows as $row)
        @if (optional($row->kriteria)->kriteria_id == '2')
        <tr>
            <td>{{ optional($row->alternatif)->alt_investasi }}</td>
            <td>
                <div class="mb-3">
                    <select name="nilai_perbandingan[]" style="width:100%;" disabled>
                        <option value="1" {{ $row->nilai_perbandingan == '1' ? 'selected' : '' }}>1: Tidak Berpotensi
                        </option>
                        <option value="3" {{ $row->nilai_perbandingan == '3' ? 'selected' : '' }}>3: Hampir Tidak
                            Berpotensi
                        </option>
                        <option value="5" {{ $row->nilai_perbandingan == '5' ? 'selected' : '' }}>5: Hampir Berpotensi
                        </option>
                        <option value="7" {{ $row->nilai_perbandingan == '7' ? 'selected' : '' }}>7: Berpotensi
                        </option>
                        <option value="9" {{ $row->nilai_perbandingan == '9' ? 'selected' : '' }}>9: Sangat Berpotensi
                        </option>
                    </select>
                </div>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Infrastruktur
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                Evaluasi kondisi infrastruktur yang mendukung investasi. Seperti ketersediaan jalan dan transportasi,
                listrik dan sumber daya energi, dan ketersediaan fasilitas umum.
            </div>
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
        @foreach ($rows as $row)
        @if (optional($row->kriteria)->kriteria_id == '3')
        <tr>
            <td>{{ optional($row->alternatif)->alt_investasi }}</td>
            <td>
                <div class="mb-3">
                    <select name="nilai_perbandingan[]" style="width:100%;" disabled>
                        <option value="1" {{ $row->nilai_perbandingan == '1' ? 'selected' : '' }}>1: Tidak Mendukung
                        </option>
                        <option value="3" {{ $row->nilai_perbandingan == '3' ? 'selected' : '' }}>3: Hampir Tidak
                            Mendukung
                        </option>
                        <option value="5" {{ $row->nilai_perbandingan == '5' ? 'selected' : '' }}>5: mendekati Mendukung
                        </option>
                        <option value="7" {{ $row->nilai_perbandingan == '7' ? 'selected' : '' }}>7: Mendukung
                        </option>
                        <option value="9" {{ $row->nilai_perbandingan == '9' ? 'selected' : '' }}>9: Sangat Mendukung
                        </option>
                    </select>
                </div>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Skalabilitas
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                Kemampuan investasi untuk tumbuh atau beradaptasi dengan perubahan ukuran atau lingkungan bisnis.
            </div>
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
        @foreach ($rows as $row)
        @if (optional($row->kriteria)->kriteria_id == '4')
        <tr>
            <td>{{ optional($row->alternatif)->alt_investasi }}</td>
            <td>
                <div class="mb-3">
                    <select name="nilai_perbandingan[]" style="width:100%;" disabled>
                        <option value="1" {{ $row->nilai_perbandingan == '1' ? 'selected' : '' }}>1: Tidak Mampu
                            Beradaptasi
                        </option>
                        <option value="3" {{ $row->nilai_perbandingan == '3' ? 'selected' : '' }}>3: Hampir Tidak Mampu
                            Beradaptasi
                            penting dari
                        </option>
                        <option value="5" {{ $row->nilai_perbandingan == '5' ? 'selected' : '' }}>5: Hampir Mampu
                            Beradaptasi
                        </option>
                        <option value="7" {{ $row->nilai_perbandingan == '7' ? 'selected' : '' }}>7: Mampu Beradaptasi
                        </option>
                        <option value="9" {{ $row->nilai_perbandingan == '9' ? 'selected' : '' }}>9: Sangat Mampu
                            Beradaptasi
                    </select>
                </div>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Potensi Pasar
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                potensi pasar untuk produk atau layanan investasi. Seperti ukuran dan pertumbuhan pasar lokal dan
                tingkat konsumsi dan daya beli.
            </div>
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
        @foreach ($rows as $row)
        @if (optional($row->kriteria)->kriteria_id == '5')
        <tr>
            <td>{{ optional($row->alternatif)->alt_investasi }}</td>
            <td>
                <div class="mb-3">
                    <select name="nilai_perbandingan[]" style="width:100%;" disabled>
                        <option value="1" {{ $row->nilai_perbandingan == '1' ? 'selected' : '' }}>1: Tidak Berpotensi
                        </option>
                        <option value="3" {{ $row->nilai_perbandingan == '3' ? 'selected' : '' }}>3: Hampir Tidak
                            Berpotensi
                        </option>
                        <option value="5" {{ $row->nilai_perbandingan == '5' ? 'selected' : '' }}>5: Hampir Berpotensi
                        </option>
                        <option value="7" {{ $row->nilai_perbandingan == '7' ? 'selected' : '' }}>7: Berpotensi
                        </option>
                        <option value="9" {{ $row->nilai_perbandingan == '9' ? 'selected' : '' }}>9: Sangat Berpotensi
                        </option>
                    </select>
                </div>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Keamanan dan Stabilitas
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                Menilai tingkat keamanan dan stabilitas di Kota Medan. Termasuk tingkat kejahatan serta stabilitas
                politik dan sosial.
            </div>
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
        @foreach ($rows as $row)
        @if (optional($row->kriteria)->kriteria_id == '6')
        <tr>
            <td>{{ optional($row->alternatif)->alt_investasi }}</td>
            <td>
                <div class="mb-3">
                    <select name="nilai_perbandingan[]" style="width:100%;" disabled>
                        <option value="1" {{ $row->nilai_perbandingan == '1' ? 'selected' : '' }}>1: Sangat Rendah
                        </option>
                        <option value="3" {{ $row->nilai_perbandingan == '3' ? 'selected' : '' }}>3: Rendah
                        </option>
                        <option value="5" {{ $row->nilai_perbandingan == '5' ? 'selected' : '' }}>5: Menengah
                        </option>
                        <option value="7" {{ $row->nilai_perbandingan == '7' ? 'selected' : '' }}>7: Tinggi
                        </option>
                        <option value="9" {{ $row->nilai_perbandingan == '9' ? 'selected' : '' }}>9: Sangat Tinggi
                        </option>
                    </select>
                </div>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
<a href="{{ url('altkrit/edit') }}" class="btn btn-primary mb-3 float-end"><i class='fa fa-pencil-alt'></i>  Edit Data</a>
@endsection