<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
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

Route::get('dosen', [DosenController::class, 'index'])->name('dosen.index');
Route::post('dosen', [DosenController::class, 'store']);
Route::get('dosen/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
Route::put('dosen/update/{id}', [DosenController::class, 'update'])->name('dosen.update');
Route::delete('dosen/delete/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');

Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::post('mahasiswa', [MahasiswaController::class, 'store']);
Route::get('mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
