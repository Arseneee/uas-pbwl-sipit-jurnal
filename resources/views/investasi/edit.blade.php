@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Investasi</h2>

    <form action="{{ url('investasi/'.$row->investasi_id) }}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        @csrf
        <div class="mb-3">
            <label for="nama_investasi">NAMA</label>
            <input type="text" name="nama_investasi" id="nama_investasi" class="form-control"
                value="{{ $row->nama_investasi }}" required>
        </div>
        <div class="mb-3">
            <label for="sektor">SEKTOR</label>
            <select name="sektor" id="sektor" class="form-control" required>
                <option value="">Pilih Sektor</option>
                <option value="Transportasi, Gudang dan Telekomunikasi" {{ $row->sektor == 'Transportasi, Gudang dan Telekomunikasi' ? 'selected' : '' }}>Transportasi, Gudang dan Telekomunikasi</option>
                <option value="Industri Makanan" {{ $row->sektor == 'Industri Makanan' ? 'selected' : '' }}>Industri Makanan</option>
                <option value="Jasa Lainnya" {{ $row->sektor == 'Jasa Lainnya' ? 'selected' : '' }}>Jasa Lainnya</option>
                <option value="Perdagangan dan Reparasi" {{ $row->sektor == 'Perdagangan dan Reparasi' ? 'selected' : '' }}>Perdagangan dan Reparasi</option>
                <option value="Perumahan, Kawasan Industri, dan Perkantoran" {{ $row->sektor == 'Perumahan, Kawasan Industri, dan Perkantoran' ? 'selected' : '' }}>Perumahan, Kawasan Industri, dan Perkantoran</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="deskripsi_investasi">DESKRIPSI</label>
            <textarea name="deskripsi_investasi" id="deskripsi_investasi" class="form-control form-control-lg"
                required>{{ $row->deskripsi_investasi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="alamat_investasi">ALAMAT</label>
            <input type="text" name="alamat_investasi" id="alamat_investasi" class="form-control"
                value="{{ $row->alamat_investasi }}" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </div>
    </form>
</div>
@endsection