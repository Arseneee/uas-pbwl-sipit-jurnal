<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $rows = Alternatif::all();
        return view('alternatif.index', compact('rows'));
    }

    public function create()
    {
        return view('alternatif.create');
    }

    public function store(Request $request)
    {
        alternatif::create([
            'alt_investasi' => $request->alt_investasi,
        ]);

        return redirect('alternatif');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $row = Alternatif::find($id);
        return view('alternatif.edit', compact('row'));
    }

    public function update(Request $request, string $id)
    {
        $row = Alternatif::findOrFail($id);

        $row->update([
            'alt_investasi' => $request->alt_investasi,
        ]);

        return redirect('alternatif');
    }

    public function destroy(string $id)
    {
        $row = Alternatif::findOrFail($id);

        $row->delete();

        return redirect('alternatif');
    }
}
