<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::with('prodi')->latest()->paginate(5);

        return view('dosen.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = \App\Models\Prodi::orderBy('nama_prodi')->get();

        return view('dosen.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDosenRequest $request)
    {
        Dosen::create($request->validated());

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        $prodis = \App\Models\Prodi::orderBy('nama_prodi')->get();

        return view('dosen.edit', compact('dosen', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDosenRequest $request, Dosen $dosen)
    {
        $dosen->update($request->validated());

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus!');
    }
}
