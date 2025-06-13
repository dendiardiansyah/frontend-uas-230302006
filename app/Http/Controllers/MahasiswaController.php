<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get(config('services.api.base_url') . '/mahasiswa', [
            'sort_by' => 'id',
            'order' => 'asc'
        ]);
        if ($response->successful()) {
            $datas = collect($response->json())->sortByDesc('id');
            return view('mahasiswa.index', compact('datas'));
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
            'npm' => 'required',
            'nama_mahasiswa' => 'required',
	        'email' => 'required',
            'id_user' => 'required',
            'kode_kelas' => 'required',
        ]);
        $response = Http::post(config('services.api.base_url') . '/mahasiswa', [
            'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'email' => $request->email,
            'id_user' => $request->id_user,
            'kode_kelas' => $request->kode_kelas
        ]);
        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil Ditambahkan!');
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
            config('services.api.base_url') . '/mahasiswa/' . $id
        );

        if ($response->successful()) {
            $data = $response->json();
            return view('mahasiswa.edit', ['mahasiswa' => $data['mahasiswa_byid']]);
        }
        return response()->json(['error' => 'Gagal Fetch Data'], 500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'npm' => 'required',
            'nama_mahasiswa' => 'required',
	        'email' => 'required',
            'id_user' => 'required',
            'kode_kelas' => 'required',
        ]);
        $response = Http::put(config('services.api.base_url') . '/mahasiswa', [
            'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'email' => $request->email,
            'id_user' => $request->id_user,
        ]);
        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil DI update!');
        }
        return back()->with('error', 'Gagal Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete(
            config('services.api.base_url') . '/mahasiswa/' . $id
        );

        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil Dihapus!');
        }
        return back()->with('error', 'gagal menghapus data');
    }
}
