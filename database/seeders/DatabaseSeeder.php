<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. BUAT AKUN UTAMA (Untuk Login Demo UTS)
        User::create([
            'name' => 'Admin Kampus',
            'email' => 'admin@pnp.ac.id',
            'password' => Hash::make('password123'), // Password untuk login
        ]);

        // 2. BUAT AKUN TAMBAHAN (Opsional, menggunakan Factory bawaan Laravel)
        User::factory()->count(4)->create();

        // 3. BUAT DATA MAHASISWA (Menggunakan Factory yang kita buat di Langkah 1)
        // Kita buat 25 data agar pagination (5 data per halaman) berfungsi dengan baik
        Mahasiswa::factory()->count(25)->create();

        // 4. BUAT DATA RUANGAN
        $this->call(RuanganSeeder::class);
    }
}
