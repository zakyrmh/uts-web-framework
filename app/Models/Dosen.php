<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nidn',
        'nama_dosen',
        'email',
        'no_telp',
        'prodi_id',
        'alamat'
    ];

    /**
     * Dapatkan Program Studi (Prodi) yang menaungi dosen ini.
     */
    public function prodi(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Prodi::class);
    }
}
