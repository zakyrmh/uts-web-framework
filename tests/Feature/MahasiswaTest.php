<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use function Pest\Laravel\{get, actingAs, post, assertDatabaseHas};

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

test('guest tidak boleh melihat dashboard mahasiswa dan dialihkan ke login', function () {
    get('/mahasiswa')
        ->assertRedirect('/login');
});

test('user yang sudah login dapat melihat dashboard mahasiswa', function () {
    $user = User::create([
        'name' => 'Dosen Penguji',
        'email' => 'dosen@pnp.ac.id',
        'password' => Hash::make('password')
    ]);

    // Bertindak sebagai (actingAs) user yang sudah login
    actingAs($user)
        ->get('/mahasiswa')
        ->assertStatus(200)
        ->assertSee('Daftar Mahasiswa');
});

test('user dapat menambahkan data mahasiswa baru', function () {
    $user = User::create([
        'name' => 'Dosen Penguji',
        'email' => 'dosen@pnp.ac.id',
        'password' => Hash::make('password')
    ]);

    actingAs($user);

    $response = post('/mahasiswa', [
        'nim' => '2211022001',
        'nama_lengkap' => 'Reynaldi',
        'tempat_lahir' => 'Padang',
        'tanggal_lahir' => '2004-05-15',
        'prodi' => 'Teknologi Rekayasa Perangkat Lunak',
        'ipk' => '3.85',
        'alamat' => 'Jl. Limau Manis No. 45, Padang'
    ]);

    // Memastikan data masuk ke database mahasiswas
    assertDatabaseHas('mahasiswas', [
        'nim' => '2211022001',
        'nama_lengkap' => 'Reynaldi'
    ]);

    $response->assertRedirect('/mahasiswa');
});
