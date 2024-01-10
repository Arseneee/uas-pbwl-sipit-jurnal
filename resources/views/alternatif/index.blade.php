@extends('layouts.admin')

@section('content')
<h2>Tambah Alternatif</h2>

<form action="{{ url('alternatif') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="alt_investasi">NAMA</label>
        <input type="text" name="alt_investasi" id="alt_investasi" class="form-control" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">SAVE</button>
    </div>
</form>

<?php $no = 1 ?>
<h2>Data Alternatif</h2>
<table class="table table-bordered" style="border-color: black;">
    <thead style="background-color: #add8e6;">
        <tr>
            <th>NO</th>
            <th>ALTERNATIF INVESTASI</th>
            <th style="width: 9%;">ACTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->alt_investasi }}</td>
            <td>
                <div class='norebuttom'>
                    <a class="btn btn-warning" href="{{ url('alternatif/edit/' . $row->alternatif_id) }}"
                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><i
                            class='fa fa-pencil-alt'></i></a>
                    <form action="{{ url('alternatif/' . $row->alternatif_id) }}" method="post" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"
                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                            onclick="return confirm('Are you sure you want to delete this item?')">
                            <i class='fa fa-trash-alt'></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection