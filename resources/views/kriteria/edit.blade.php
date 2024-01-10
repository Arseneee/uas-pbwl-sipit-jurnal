@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Kriteria</h2>

    <form action="{{ url('kriteria/'.$row->kriteria_id) }}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        @csrf
        <div class="mb-3">
            <label for="kode_krit">KODE</label>
            <input type="text" name="kode_krit" id="kode_krit" class="form-control"
                value="{{ $row->kode_krit }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_kriteria">NAMA</label>
            <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control"
                value="{{ $row->nama_kriteria }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi_kriteria">DESKRIPSI</label>
            <textarea name="deskripsi_kriteria" id="deskripsi_kriteria" class="form-control form-control-lg"
                required>{{ $row->deskripsi_kriteria }}</textarea>
        </div>
        <div class="mb-3">
            <label for="bobot_kriteria">BOBOT NILAI</label>
            <input type="text" name="bobot_kriteria" id="bobot_kriteria" class="form-control"
                value="{{ $row->bobot_kriteria }}" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </div>
    </form>
</div>
@endsection