<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangans = Ruangan::latest('created_at')->paginate(5);
        return view('ruangan.index', compact('ruangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_ruangan'  => 'required','string','unique:ruangans,kode_ruangan','regex:/^[ACE][1-4]\d{2}$/',
            'nama_ruangan'  => 'required', 'string', 'max:255',
            'gedung'        => 'required', 'string', 'in:Gedung A,Gedung C,Gedung E',
            'lantai'        => 'required', 'string', 'in:1,2,3,4',
            'jenis_ruangan' => 'required', 'string', 'in:Teori,Praktikum',
            'kapasitas'     => 'required', 'integer', 'min:1',
            'keterangan'    => 'nullable', 'string', 'max:500',
        ]);

        Ruangan::create($validated);

        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil ditambahkan!');
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
    public function edit(Ruangan $ruangan)
    {
        return view('ruangan.edit', compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        $validated = $request->validate([
            'kode_ruangan'  => 'required','string','unique:ruangans,kode_ruangan','regex:/^[ACE][1-4]\d{2}$/',
            'nama_ruangan'  => 'required', 'string', 'max:255',
            'gedung'        => 'required', 'string', 'in:Gedung A,Gedung C,Gedung E',
            'lantai'        => 'required', 'string', 'in:1,2,3,4',
            'jenis_ruangan' => 'required', 'string', 'in:Teori,Praktikum',
            'kapasitas'     => 'required', 'integer', 'min:1',
            'keterangan'    => 'nullable', 'string', 'max:500',
        ]);

        $ruangan->update($request->all());

        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil dihapus!');
    }
}
