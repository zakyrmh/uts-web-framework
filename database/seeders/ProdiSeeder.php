<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::create([
            'nama_prodi' => 'Teknologi Rekayasa Perangkat Lunak',
            'jenjang' => 'D4',
            'keterangan' => 'Fokus pada pengembangan software dan rekayasa sistem.'
        ]);

        Prodi::create([
            'nama_prodi' => 'Manajemen Informatika',
            'jenjang' => 'D3',
            'keterangan' => 'Fokus pada analisis bisnis dan sistem informasi.'
        ]);

        Prodi::create([
            'nama_prodi' => 'Teknik Komputer',
            'jenjang' => 'D3',
            'keterangan' => 'Fokus pada hardware, jaringan, dan IoT.'
        ]);
    }
}
