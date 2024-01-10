@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Kriteria</h2>

    <form action="{{ url('kriteria') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="kode_krit">KODE</label>
            <input type="text" name="kode_krit" id="kode_krit" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nama_kriteria">NAMA</label>
            <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi_kriteria">DESKRIPSI</label>
            <textarea name="deskripsi_kriteria" id="deskripsi_kriteria" class="form-control form-control-lg" required>
            </textarea>
        </div>
        <div class="mb-3">
            <label for="bobot_kriteria">BOBOT NILAI</label>
            <input type="text" name="bobot_kriteria" id="bobot_kriteria" class="form-control" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
    </form>
</div>
@endsection