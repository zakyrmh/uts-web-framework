<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use function Pest\Laravel\{get, post, assertDatabaseHas, assertAuthenticatedAs};

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

test('halaman login dapat diakses', function () {
    get('/login')
        ->assertStatus(200)
        ->assertSee('Please sign in');
});

test('user baru dapat melakukan registrasi', function () {
    $response = post('/register', [
        'name' => 'Zaky Ramadhan',
        'email' => 'zaky@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    // Indikator 1: Berhasil masuk ke database
    assertDatabaseHas('users', [
        'email' => 'zaky@example.com'
    ]);

    // Indikator 2: Dialihkan ke halaman /mahasiswa
    $response->assertRedirect('/mahasiswa');
});

test('user dapat login dengan kredensial yang benar', function () {
    // Membuat user tiruan terlebih dahulu
    $user = User::create([
        'name' => 'Admin UTS',
        'email' => 'admin@uts.com',
        'password' => Hash::make('secret123')
    ]);

    // Mencoba login
    $response = post('/login', [
        'email' => 'admin@uts.com',
        'password' => 'secret123'
    ]);

    $response->assertRedirect('/dashboard');
    assertAuthenticatedAs($user);
});
