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
        $responseMahasiswa = Http::get(config('services.api.base_url') . '/mahasiswa', [
            'sort_by' => 'id',
            'order' => 'asc'
        ]);
        $responseDosen = Http::get(config('services.api.base_url') . '/dosen');
        if ($responseMahasiswa->successful() && $responseDosen->successful()) {
            $datas = collect($responseMahasiswa->json())->sortByDesc('id');
            $dosens = $responseDosen->json();

            return view('Mahasiswa.index', compact('datas','dosens'));
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
            'nama' => 'required|string|max:255',
            'nim' => 'required',
            'email' => 'required',
            'angkatan' => 'required|Max:9',
            'prodi' => 'required',
            'dosen_wali_id' => 'required'
        ]);
        $response = Http::post(config('services.api.base_url') . '/mahasiswa', [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'angkatan' => $request->angkatan,
            'prodi' => $request->prodi,
            'dosen_wali_id' => $request->dosen_wali_id
        ]);
        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil DItambahkan!');
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
            'nama' => 'required|string|max:255',
            'nim' => 'required',
            'email' => 'required',
            'angkatan' => 'required|Max:9',
            'prodi' => 'required',
            'dosen_wali_id' => 'required'
        ]);
        $response = Http::put(config('services.api.base_url') . '/mahasiswa/' . $id, [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'angkatan' => $request->angkatan,
            'prodi' => $request->prodi,
            'dosen_wali_id' => $request->dosen_wali_id
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
