<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with('prodi')->latest('created_at')->paginate(5);
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = \App\Models\Prodi::orderBy('nama_prodi')->get();
        return view('mahasiswa.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMahasiswaRequest $request)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswas,nim',
            'nama_lengkap' => 'required|string|max:150',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'prodi_id' => 'required|exists:prodis,id',
            'ipk' => 'required|numeric|between:0,4.00',
            'alamat' => 'required|string',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodis = \App\Models\Prodi::orderBy('nama_prodi')->get();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            // Validasi unik NIM mengabaikan ID mahasiswa yang sedang diubah
            'nim' => 'required|string|max:10|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama_lengkap' => 'required|string|max:150',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'prodi_id' => 'required|exists:prodis,id',
            'ipk' => 'required|numeric|between:0,4.00',
            'alamat' => 'required|string',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}
