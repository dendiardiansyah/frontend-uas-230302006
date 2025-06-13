<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/', [DashboardController::class, 'index']);

Route::get('matkul', [matkulController::class, 'index'])->name('matkul.index');
Route::post('matkul', [matkulController::class, 'store']);
Route::get('matkul/edit/{id}', [matkulController::class, 'edit'])->name('matkul.edit');
Route::put('matkul/update/{id}', [matkulController::class, 'update'])->name('matkul.update');
Route::delete('matkul/delete/{id}', [matkulController::class, 'destroy'])->name('matkul.destroy');

Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::post('mahasiswa', [MahasiswaController::class, 'store']);
Route::get('mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
