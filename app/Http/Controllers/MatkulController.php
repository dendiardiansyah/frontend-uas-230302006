<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get(config('services.api.base_url') . '/matkul', [
            'sort_by' => 'id',
            'order' => 'asc'
        ]);
        if ($response->successful()) {
            $datas = collect($response->json())->sortByDesc('id');
            return view('matkul.index', compact('datas'));
        }
        return response()->json(['error' => 'Gagal Mengambil Data dari API'], 500);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
	        'sks' => 'required',
        ]);
        $response = Http::post(config('services.api.base_url') . '/matkul', [
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
        ]);
        if ($response->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Data berhasil Ditambahkan!');
        }
        return back()->with('error', 'Gagal Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get(
            config('services.api.base_url') . '/matkul/' . $id
        );

        if ($response->successful()) {
            $data = $response->json();
            return view('matkul.edit', ['matkul' => $data['matkul_byid']]);
        }
        return response()->json(['error' => 'Gagal Fetch Data'], 500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
	        'sks' => 'required',
        ]);
        $response = Http::post(config('services.api.base_url') . '/matkul', [
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
        ]);
        if ($response->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Data berhasil DI update!');
        }
        return back()->with('error', 'Gagal Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete(
            config('services.api.base_url') . '/matkul/' . $id
        );

        if ($response->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Data berhasil Dihapus!');
        }
        return back()->with('error', 'gagal menghapus data');
    }
}
