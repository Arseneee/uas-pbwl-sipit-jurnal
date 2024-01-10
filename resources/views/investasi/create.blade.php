@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Investasi</h2>

    <form action="{{ url('investasi') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nama_investasi">NAMA</label>
            <input type="text" name="nama_investasi" id="nama_investasi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="sektor">SEKTOR</label>
            <select name="sektor" id="sektor" class="form-control" required>
                <option value="">Pilih Sektor</option>
                <option value="Transportasi, Gudang dan Telekomunikasi">Transportasi, Gudang dan Telekomunikasi</option>
                <option value="Industri Makanan">Industri Makanan</option>
                <option value="Jasa Lainnya">Jasa Lainnya</option>
                <option value="Perdagangan dan Reparasi">Perdagangan dan Reparasi</option>
                <option value="Perumahan, Kawasan Industri, dan Perkantoran">Perumahan, Kawasan Industri, dan Perkantoran</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="deskripsi_investasi">DESKRIPSI</label>
            <textarea name="deskripsi_investasi" id="deskripsi_investasi" class="form-control form-control-lg" required>
            </textarea>
        </div>
        <div class="mb-3">
            <label for="alamat_investasi">ALAMAT</label>
            <input type="text" name="alamat_investasi" id="alamat_investasi" class="form-control" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
    </form>
</div>
@endsection