<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Perbandingan;
use Illuminate\Http\Request;

class PerbandinganController extends Controller
{
    public function index()
    {
        $rows = Perbandingan::all();
        return view('perbandingan.index', compact('rows'));
    }

    public function edit()
    {
        $rows = Perbandingan::all();
        return view('perbandingan.edit', compact('rows'));
    }

    public function update(Request $request)
    {
        foreach ($request->nilai_perbandingan as $perbandingan_kriteria_id => $nilai_perbandingan) {
            Perbandingan::where('perbandingan_kriteria_id', $perbandingan_kriteria_id)
                ->update(['nilai_perbandingan' => $nilai_perbandingan]);
        }

        return redirect()->back()->with('success', 'Perbandingan Kriteria updated successfully');
    }

    public function destroy(string $id)
    {
        $row = Perbandingan::findOrFail($id);

        $row->delete();

        return redirect('perbandingan');
    }
}
