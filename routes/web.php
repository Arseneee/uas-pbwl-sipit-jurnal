<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\InvestasiController::class, 'welcome'])->name('welcome');

Route::get('/investasi', [App\Http\Controllers\InvestasiController::class, 'index']);
Route::get('/investasi/create', [App\Http\Controllers\InvestasiController::class, 'create']);
Route::post('/investasi', [App\Http\Controllers\InvestasiController::class, 'store']);
Route::get('/investasi/edit/{id}', [App\Http\Controllers\InvestasiController::class, 'edit']);
Route::patch('/investasi/{id}', [App\Http\Controllers\InvestasiController::class, 'update']);
Route::delete('/investasi/{id}', [App\Http\Controllers\InvestasiController::class, 'destroy']);

Route::get('/kriteria', [App\Http\Controllers\KriteriaController::class, 'index']);
Route::get('/kriteria/create', [App\Http\Controllers\KriteriaController::class, 'create']);
Route::post('/kriteria', [App\Http\Controllers\KriteriaController::class, 'store']);
Route::get('/kriteria/edit/{id}', [App\Http\Controllers\KriteriaController::class, 'edit']);
Route::patch('/kriteria/{id}', [App\Http\Controllers\KriteriaController::class, 'update']);
Route::delete('/kriteria/{id}', [App\Http\Controllers\KriteriaController::class, 'destroy']);

Route::get('/alternatif', [App\Http\Controllers\AlternatifController::class, 'index']);
Route::get('/alternatif/create', [App\Http\Controllers\AlternatifController::class, 'create']);
Route::post('/alternatif', [App\Http\Controllers\AlternatifController::class, 'store']);
Route::get('/alternatif/edit/{id}', [App\Http\Controllers\AlternatifController::class, 'edit']);
Route::patch('/alternatif/{id}', [App\Http\Controllers\AlternatifController::class, 'update']);
Route::delete('/alternatif/{id}', [App\Http\Controllers\AlternatifController::class, 'destroy']);

Route::get('/perbandingan', [App\Http\Controllers\PerbandinganController::class, 'index']);
Route::get('/perbandingan/edit', [App\Http\Controllers\PerbandinganController::class, 'edit'])->name('perbandingan-kriteria.edit');
Route::patch('/perbandingan/update', [App\Http\Controllers\PerbandinganController::class, 'update'])->name('perbandingan-kriteria.update');
Route::get('/perbandingan/create', [App\Http\Controllers\PerbandinganController::class, 'create']);
Route::post('/perbandingan', [App\Http\Controllers\PerbandinganController::class, 'store']);
Route::delete('/perbandingan/{id}', [App\Http\Controllers\PerbandinganController::class, 'destroy']);

Route::get('/ahp', [App\Http\Controllers\AhpController::class, 'calculateAhp']);
Route::get('/ahp.hitung', [App\Http\Controllers\AhpController::class, 'calculateAhp']);

Route::get('/altkrit', [App\Http\Controllers\AltkritController::class, 'index']);
Route::get('/altkrit/edit', [App\Http\Controllers\AltkritController::class, 'edit'])->name('edit');
Route::post('/altkrit/updateMultiple', [App\Http\Controllers\AltkritController::class, 'updateMultiple'])->name('updateMultiple');
Route::get('/ahp.hitung', [App\Http\Controllers\AltkritController::class, 'calculateAhp']);
