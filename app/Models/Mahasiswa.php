<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'prodi_id',
        'ipk',
        'alamat'
    ];

    /**
     * Dapatkan Program Studi (Prodi) yang menaungi mahasiswa ini.
     */
    public function prodi(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Prodi::class);
    }
}
