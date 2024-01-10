@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Alternatif</h2>

    <form action="{{ url('alternatif/'.$row->alternatif_id) }}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        @csrf
        <div class="mb-3">
            <label for="alt_investasi">KODE</label>
            <input type="text" name="alt_investasi" id="alt_investasi" class="form-control"
                value="{{ $row->alt_investasi }}" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </div>
    </form>
</div>
@endsection