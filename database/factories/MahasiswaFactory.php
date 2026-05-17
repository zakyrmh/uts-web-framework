<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakerId = FakerFactory::create('id_ID');

        $daftarProdi = [
            'Teknologi Rekayasa Perangkat Lunak',
            'Manajemen Informatika',
            'Teknik Komputer',
            'Sistem Informasi',
            'Animasi',
        ];

        return [
            // Menghasilkan NIM unik 10 digit angka
            'nim' => $this->faker->unique()->numerify('##########'),
            'nama_lengkap' => $fakerId->name(),
            'tempat_lahir' => $fakerId->city(),
            // Tanggal lahir acak dengan rentang usia mahasiswa (sekitar 19 - 23 tahun lalu)
            'tanggal_lahir' => $this->faker->date('Y-m-d', '-19 years'),
            'prodi' => $this->faker->randomElement($daftarProdi),
            // Menghasilkan IPK acak antara 2.00 sampai 4.00 dengan 2 angka di belakang koma
            'ipk' => $this->faker->randomFloat(2, 2.00, 4.00),
            'alamat' => $fakerId->address(),
        ];
    }
}
