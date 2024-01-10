<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Hasil;
use App\Models\Ranking;

class AltkritController extends Controller
{
    public function index()
    {
        $rows = AlternatifKriteria::all();
        return view('altkrit.index', compact('rows'));
    }

    public function edit()
    {
        $rows = AlternatifKriteria::with(['alternatif', 'kriteria'])
            ->orderBy('kriteria_id')
            ->orderBy('alternatif_id')
            ->get();

        $kriteriaGroups = $rows->groupBy('kriteria_id');

        return view('altkrit.edit', compact('kriteriaGroups'));
    }

    public function updateMultiple(Request $request)
    {
        // Validasi request sesuai kebutuhan

        $nilaiPerbandingan = $request->input('nilai_perbandingan');

        foreach ($nilaiPerbandingan as $alternatifKriteriaId => $nilai) {
            AlternatifKriteria::where('alternatif_kriteria_id', $alternatifKriteriaId)
                ->update(['nilai_perbandingan' => $nilai]);
        }

        return redirect()->back()->with('success', 'Perubahan berhasil disimpan.');
    }

    public function calculateAhp()
    {
        // Fetch data from the alternatif_kriteria table
        $perbandingans = AlternatifKriteria::all();

        // Fetch data from the kriteria table
        $kriterias = Kriteria::all();

        // Fetch data from the alternatif table
        $alternatifs = Alternatif::all();

        // Fetch unique alternatif IDs
        $alternatifIds = $perbandingans->pluck('alternatif_id')->unique();

        // Fetch unique kriteria IDs
        $kriteriaIds = $perbandingans->pluck('kriteria_id')->unique();

        // Calculate the perbandingan matrix
        $perbandinganMatrix = $this->calculatePerbandinganMatrix($kriteriaIds, $alternatifIds, $perbandingans);

        // Calculate the normalized matrix
        $normalizedMatrix = $this->calculateNormalizedMatrix($kriteriaIds, $alternatifIds, $perbandinganMatrix);

        // Calculate synthesis results for each alternative
        $synthesisResults = $this->calculateSynthesisResults($alternatifIds, $kriteriaIds, $normalizedMatrix);

        // Retrieve the ranked results from the database
        $rankedResults = Ranking::orderBy('hasil_sintesis', 'desc')->get();

        return view('ahp.hitung', [
            'alternatifIds' => $alternatifIds,
            'kriteriaIds' => $kriteriaIds,
            'perbandinganMatrix' => $perbandinganMatrix,
            'normalizedMatrix' => $normalizedMatrix,
            'synthesisResults' => $synthesisResults,
            'rankedResults' => $rankedResults,
            'alternatifs' => $alternatifs,
            'kriterias' => $kriterias,
        ]);
    }

    private function calculatePerbandinganMatrix($kriteriaIds, $alternatifIds, $perbandingans)
    {
        $matrix = [];

        foreach ($kriteriaIds as $kriteriaId) {
            foreach ($alternatifIds as $alternatifId) {
                // Get the nilai from the perbandingans table based on kriteria_id and alternatif_id
                $nilai = $perbandingans
                    ->where('kriteria_id', $kriteriaId)
                    ->where('alternatif_id', $alternatifId)
                    ->first()->nilai_perbandingan;

                $matrix[$kriteriaId][$alternatifId] = $nilai;
            }
        }

        return $matrix;
    }

    private function calculateNormalizedMatrix($kriteriaIds, $alternatifIds, $perbandinganMatrix)
    {
        $normalizedMatrix = [];

        // Step 1: Calculate Row Sums
        $rowSums = [];
        foreach ($kriteriaIds as $kriteriaId) {
            $rowSums[$kriteriaId] = array_sum($perbandinganMatrix[$kriteriaId]);
        }

        // Step 2: Normalize Each Element
        foreach ($kriteriaIds as $kriteriaId) {
            foreach ($alternatifIds as $alternatifId) {
                // Check for division by zero
                if ($rowSums[$kriteriaId] != 0) {
                    $normalizedMatrix[$kriteriaId][$alternatifId] = $perbandinganMatrix[$kriteriaId][$alternatifId] / $rowSums[$kriteriaId];
                } else {
                    $normalizedMatrix[$kriteriaId][$alternatifId] = 0;
                }
            }
        }

        return $normalizedMatrix;
    }

    private function calculateSynthesisResults($alternatifIds, $kriteriaIds, $normalizedMatrix)
    {
        $results = [];

        foreach ($alternatifIds as $alternatifId) {
            $synthesis = 0;

            foreach ($kriteriaIds as $kriteriaId) {
                // Get the normalized value from the matrix
                $normalizedValue = $normalizedMatrix[$kriteriaId][$alternatifId];

                // Get the bobot_prioritas value from the hasil table
                $priorityWeight = Hasil::where('kriteria_id', $kriteriaId)->value('bobot_prioritas');

                // Calculate synthesis result for the alternative
                $synthesis += $normalizedValue * $priorityWeight;
            }

            // Save the synthesis result to the database
            $this->saveSynthesisResult($alternatifId, $synthesis);

            // Save the synthesis result to the array
            $results[$alternatifId] = $synthesis;
        }

        return $results;
    }

    private function saveSynthesisResult($alternatifId, $synthesis)
    {
        // Save the synthesis result to the database (table hasil_sintesis_alternatif)
        Ranking::updateOrCreate(
            ['alternatif_id' => $alternatifId],
            ['hasil_sintesis' => $synthesis]
        );
    }
}
