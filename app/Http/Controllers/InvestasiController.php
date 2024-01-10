<?php

namespace App\Http\Controllers;

use App\Models\Investasi;
use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\AlternatifKriteria;
use App\Models\Ranking;

class InvestasiController extends Controller
{
    public function index()
    {
        $rows = Investasi::all();
        return view('investasi.index', compact('rows'));
    }

    public function create()
    {
        return view('investasi.create');
    }

    public function store(Request $request)
    {
        Investasi::create([
            'nama_investasi' => $request->nama_investasi,
            'sektor' => $request->sektor,
            'deskripsi_investasi' => $request->deskripsi_investasi,
            'alamat_investasi' => $request->alamat_investasi
        ]);

        return redirect('investasi');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $row = Investasi::find($id);
        return view('investasi.edit', compact('row'));
    }

    public function update(Request $request, string $id)
    {
        $row = Investasi::findOrFail($id);

        $row->update([
            'nama_investasi' => $request->nama_investasi,
            'sektor' => $request->sektor,
            'deskripsi_investasi' => $request->deskripsi_investasi,
            'alamat_investasi' => $request->alamat_investasi
        ]);

        return redirect('investasi');
    }

    public function destroy(string $id)
    {
        $row = Investasi::findOrFail($id);

        $row->delete();

        return redirect('investasi');
    }

    public function welcome()
    {
        $perbandingans = AlternatifKriteria::all();
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::all();
        $rankings = Ranking::all();

        $alternatifIds = $perbandingans->pluck('alternatif_id')->unique();
        $kriteriaIds = $perbandingans->pluck('kriteria_id')->unique();

        $alternatifData = Alternatif::join('ranking', 'alternatif.alternatif_id', '=', 'ranking.alternatif_id')
            ->select('alternatif.alt_investasi', 'ranking.hasil_sintesis')
            ->orderBy('ranking.hasil_sintesis', 'desc')
            ->get();

        $alternatifNames = $alternatifData->pluck('alt_investasi')->toArray();
        $usulanScores = $alternatifData->pluck('hasil_sintesis')->toArray();

        $rankedResults = Ranking::orderBy('hasil_sintesis', 'desc')->get();

        return view('welcome', compact('usulanScores', 'rankedResults', 'alternatifs', 'alternatifData', 'alternatifNames'));
    }
}
