<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Hasil;
use App\Models\Perbandingan;
use App\Models\Kriteria;

class AhpController extends Controller
{
    public function calculateAhp()
    {
        // Fetch data from the perbandingan_kriteria table
        $perbandingans = Perbandingan::all();

        // Fetch data from the kriteria table
        $kriterias = Kriteria::all();

        // Calculate the paired comparison matrix
        $pairedComparisonMatrix = $this->calculatePairedComparisonMatrix($kriterias, $perbandingans);

        // Calculate the normalized paired comparison matrix and row sums
        $normalizedMatrix = $this->calculateNormalizedMatrix($kriterias, $pairedComparisonMatrix);

        // Calculate the total of each column in the paired comparison matrix
        $columnTotals = $this->calculateColumnTotals($kriterias, $pairedComparisonMatrix);

        // Calculate the global priority vector for criteria
        $globalPriorityVector = $this->calculateGlobalPriorityVector($kriterias, $columnTotals);

        // Calculate eigenvalue and eigenvector
        $eigenData = $this->calculateEigenvalueEigenvector($normalizedMatrix);

        $eigenvaluesForCriteria = [];
        foreach ($kriterias as $kriteria) {
            $eigenvaluesForCriteria[$kriteria->kriteria_id] = $this->calculateEigenvalueForCriterion($normalizedMatrix, $kriteria->kriteria_id);
        }

        foreach ($kriterias as $kriteria) {
            $hasil = Hasil::where('kriteria_id', $kriteria->kriteria_id)->first();

            $globalEigenvalue = $eigenData['eigenvalue'];

            if ($hasil) {
                // Data sudah ada, lakukan update
                $hasil->eigenvalue = $eigenvaluesForCriteria[$kriteria->kriteria_id];
                $hasil->eigenvalue_global = $globalEigenvalue;
                $hasil->bobot_prioritas = $globalPriorityVector[$kriteria->kriteria_id];
                $hasil->save();
            } else {
                // Jika data belum ada, buat data baru
                $newHasil = new Hasil();
                $newHasil->kriteria_id = $kriteria->kriteria_id;
                $newHasil->eigenvalue = $eigenvaluesForCriteria[$kriteria->kriteria_id];
                $newHasil->eigenvalue_global = $globalEigenvalue;
                $newHasil->bobot_prioritas = $globalPriorityVector[$kriteria->kriteria_id];
                $newHasil->save();
            }
        }


        return view('ahp.index', [
            'pairedComparisonMatrix' => $pairedComparisonMatrix,
            'normalizedMatrix' => $normalizedMatrix,
            'columnTotals' => $columnTotals,
            'globalPriorityVector' => $globalPriorityVector,
            'eigenvalue' => $eigenData['eigenvalue'],
            'eigenvector' => $eigenData['eigenvector'],
            'eigenvaluesForCriteria' => $eigenvaluesForCriteria,
            'kriterias' => $kriterias,
        ]);
    }

    private function calculatePairedComparisonMatrix($kriterias, $perbandingans)
    {
        // Initialize the matrix
        $matrix = [];

        // Populate the matrix with values from the perbandingan_kriteria table
        foreach ($kriterias as $rowKriteria) {
            foreach ($kriterias as $colKriteria) {
                $pair = $perbandingans
                    ->where('kriteria_id1', $rowKriteria->kriteria_id)
                    ->where('kriteria_id2', $colKriteria->kriteria_id)
                    ->first();

                $matrix[$rowKriteria->kriteria_id][$colKriteria->kriteria_id] = $pair->nilai_perbandingan;
            }
        }

        return $matrix;
    }

    private function calculateNormalizedMatrix($kriterias, $pairedComparisonMatrix)
    {
        $normalizedMatrix = [];

        foreach ($kriterias as $rowKriteria) {
            $rowSum = array_sum($pairedComparisonMatrix[$rowKriteria->kriteria_id]);

            foreach ($kriterias as $colKriteria) {
                if ($rowSum != 0) {
                    $normalizedMatrix[$rowKriteria->kriteria_id][$colKriteria->kriteria_id] = $pairedComparisonMatrix[$rowKriteria->kriteria_id][$colKriteria->kriteria_id] / $rowSum;
                } else {
                    $normalizedMatrix[$rowKriteria->kriteria_id][$colKriteria->kriteria_id] = 0;
                }
            }
        }

        return $normalizedMatrix;
    }

    private function calculateColumnTotals($kriterias, $pairedComparisonMatrix)
    {
        $columnTotals = [];

        // Iterate through each column
        foreach ($kriterias as $colKriteria) {
            $total = 0;

            // Sum the values in the column
            foreach ($kriterias as $rowKriteria) {
                $total += $pairedComparisonMatrix[$rowKriteria->kriteria_id][$colKriteria->kriteria_id];
            }

            // Store the total for the column
            $columnTotals[$colKriteria->kriteria_id] = $total;
        }

        return $columnTotals;
    }

    private function calculateGlobalPriorityVector($kriterias, $columnTotals)
    {
        $globalPriorityVector = [];

        foreach ($kriterias as $kriteria) {
            $globalPriorityVector[$kriteria->kriteria_id] = $columnTotals[$kriteria->kriteria_id] / count($kriterias);
        }

        return $globalPriorityVector;
    }

    private function calculateEigenvalueEigenvector($normalizedMatrix)
    {
        $n = count($normalizedMatrix);

        // Convert the normalized matrix to a 2D array
        $matrix = [];
        foreach ($normalizedMatrix as $row) {
            $matrix[] = array_values($row);
        }

        // Calculate eigenvector using power iteration method
        $maxIterations = 1000;
        $tolerance = 1e-6;
        $eigenvector = array_fill(0, $n, 1);

        for ($iteration = 0; $iteration < $maxIterations; $iteration++) {
            $newEigenvector = $this->multiplyMatrixVector($matrix, $eigenvector);
            $magnitude = $this->calculateVectorMagnitude($newEigenvector);
            $eigenvector = $this->scalarMultiplyVector($newEigenvector, 1 / $magnitude);

            if ($this->calculateConvergence($eigenvector, $newEigenvector, $tolerance)) {
                break;
            }
        }

        // Calculate eigenvalue using Rayleigh quotient
        $eigenvalue = $this->calculateRayleighQuotient($matrix, $eigenvector);

        return [
            'eigenvalue' => $eigenvalue,
            'eigenvector' => $eigenvector,
        ];
    }

    private function multiplyMatrixVector($matrix, $vector)
    {
        $result = [];
        $n = count($matrix);

        for ($i = 0; $i < $n; $i++) {
            $sum = 0;
            for ($j = 0; $j < $n; $j++) {
                $sum += $matrix[$i][$j] * $vector[$j];
            }
            $result[] = $sum;
        }

        return $result;
    }

    private function calculateVectorMagnitude($vector)
    {
        return sqrt(array_sum(array_map('pow', $vector, array_fill(0, count($vector), 2))));
    }

    private function scalarMultiplyVector($vector, $scalar)
    {
        return array_map(function ($element) use ($scalar) {
            return $element * $scalar;
        }, $vector);
    }

    private function calculateConvergence($vector1, $vector2, $tolerance)
    {
        $difference = array_map('abs', $this->vectorSubtract($vector1, $vector2));
        return max($difference) < $tolerance;
    }

    private function vectorSubtract($vector1, $vector2)
    {
        return array_map(function ($a, $b) {
            return $a - $b;
        }, $vector1, $vector2);
    }

    private function calculateRayleighQuotient($matrix, $vector)
    {
        $numerator = $this->multiplyMatrixVector($matrix, $vector);
        $denominator = $this->calculateVectorMagnitude($vector);
        return $numerator[0] / $denominator;
    }

    private function calculateEigenvalueForCriterion($normalizedMatrix, $criterionId)
    {
        $n = count($normalizedMatrix);

        // Ambil matriks perbandingan untuk kriteria tertentu
        $matrixForCriterion = array_column($normalizedMatrix, $criterionId);

        // Hitung eigenvalue untuk matriks perbandingan kriteria tertentu
        $eigenDataForCriterion = $this->calculateEigenvalueEigenvector([$matrixForCriterion]);

        return $eigenDataForCriterion['eigenvalue'];
    }

}