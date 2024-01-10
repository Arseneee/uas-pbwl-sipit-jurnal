<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $rows = Kriteria::all();
        return view('kriteria.index', compact('rows'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        Kriteria::create([
            'kode_krit' => $request->kode_krit,
            'nama_kriteria' => $request->nama_kriteria,
            'deskripsi_kriteria' => $request->deskripsi_kriteria,
            'bobot_kriteria' => $request->bobot_kriteria
        ]);

        return redirect('kriteria');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $row = Kriteria::find($id);
        return view('kriteria.edit', compact('row'));
    }

    public function update(Request $request, string $id)
    {
        $row = Kriteria::findOrFail($id);

        $row->update([
            'kode_krit' => $request->kode_krit,
            'nama_kriteria' => $request->nama_kriteria,
            'deskripsi_kriteria' => $request->deskripsi_kriteria,
            'bobot_kriteria' => $request->bobot_kriteria
        ]);

        return redirect('kriteria');
    }

    public function destroy(string $id)
    {
        $row = Kriteria::findOrFail($id);

        $row->delete();

        return redirect('kriteria');
    }
}
