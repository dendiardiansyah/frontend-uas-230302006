<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
{
    $mahasiswaRes = Http::get(config('services.api.base_url') . '/mahasiswa');
    $matkulRes = Http::get(config('services.api.base_url') . '/matkul');
    if (!$mahasiswaRes->ok() || !$matkulRes->ok()) {
        return response()->json(['error' => 'Gagal mengambil data dari API'], 500);
    }

    $mahasiswaData = $mahasiswaRes->json();
    $matkulData = $matkulRes->json();

    $mahasiswa = isset($mahasiswaData['data']) ? count($mahasiswaData['data']) : 0;
    $matkul = isset($matkulData['data']) ? count($matkulData['data']) : 0;

    return view('index', compact('mahasiswa', 'matkul'));
}

}
