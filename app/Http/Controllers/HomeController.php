<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\AlternatifKriteria;
use App\Models\Ranking;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
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

        return view('home', compact('usulanScores', 'rankedResults', 'alternatifs', 'alternatifData', 'alternatifNames'));
    }
}
