<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    /** @use HasFactory<\Database\Factories\ProdiFactory> */
    use HasFactory;

    protected $fillable = [
        'nama_prodi',
        'jenjang',
        'keterangan'
    ];

    /**
     * Dapatkan semua dosen yang terdaftar di program studi ini.
     */
    public function dosens(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Dosen::class);
    }

    /**
     * Dapatkan semua mahasiswa yang terdaftar di program studi ini.
     */
    public function mahasiswas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
