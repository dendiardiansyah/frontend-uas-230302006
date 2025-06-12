<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswa = Http::get(config('services.api.base_url') . '/mahasiswa');
        $dosen = Http::get(config('services.api.base_url') . '/dosen');
        // dd($prodi->json()['data_prodi']);
        $mahasiswa = count($mahasiswa->json()['data']);
        $dosen = count($dosen->json()['data']);

        return view('index', compact('mahasiswa', 'dosen'));
    }
}
