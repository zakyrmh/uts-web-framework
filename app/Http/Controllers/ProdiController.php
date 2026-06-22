<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Http\Requests\StoreProdiRequest;
use App\Http\Requests\UpdateProdiRequest;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis = Prodi::latest()->paginate(5);

        return view('prodi.index', compact('prodis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdiRequest $request)
    {
        Prodi::create($request->validated());

        return redirect()->route('prodi.index')->with('success', 'Data program studi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdiRequest $request, Prodi $prodi)
    {
        $prodi->update($request->validated());

        return redirect()->route('prodi.index')->with('success', 'Data program studi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        $prodi->delete();

        return redirect()->route('prodi.index')->with('success', 'Data program studi berhasil dihapus!');
    }
}
