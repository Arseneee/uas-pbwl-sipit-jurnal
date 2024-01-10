@extends('layouts.admin')

@section('content')
<?php $no = 1 ?>
<h2>Data Investasi</h2>

<a href="{{ url('investasi/create') }}" class="btn btn-primary mb-3 float-end">+ Tambah Data</a>
<table class="table table-bordered" style="border-color: black;">
    <thead style="background-color: #add8e6;">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>SEKTOR</th>
            <th>DESKRIPSI</th>
            <th>ALAMAT</th>
            <th style="width: 9%;">ACTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->nama_investasi }}</td>
            <td>{{ $row->sektor }}</td>
            <td class="text-start">{{ $row->deskripsi_investasi }}</td>
            <td>{{ $row->alamat_investasi }}</td>
            <td>
                <div class='norebuttom'>
                    <a class="btn btn-warning" href="{{ url('investasi/edit/' . $row->investasi_id) }}"
                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><i
                            class='fa fa-pencil-alt'></i></a>
                    <form action="{{ url('investasi/' . $row->investasi_id) }}" method="post" style="display: inline;">
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