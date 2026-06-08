<?php

namespace Database\Factories;

use App\Models\Ruangan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ruangan>
 */
class RuanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gedung = $this->faker->randomElement(['A', 'C', 'E']);
        $lantai = (string) $this->faker->numberBetween(1, 4);
        $nomorRuangan = $this->faker->numberBetween(1, 99);
        $kodeRuangan = sprintf('%s%s%02d', $gedung, $lantai, $nomorRuangan);
        $jenisRuangan = $this->faker->randomElement(['Teori', 'Praktikum']);

        if ($jenisRuangan === 'Praktikum') {
            $labPilihan = $this->faker->randomElement(['Sistem Informasi', 'Jaringan', 'Multimedia', 'Pemrograman']);
            $nomorLab = $this->faker->numberBetween(1, 3);
            $namaRuangan = 'Lab ' . $labPilihan . ' ' . $nomorLab;
        } else {
            $namaRuangan = 'Kelas ' . $kodeRuangan;
        }

        $keterangan = $jenisRuangan === 'Praktikum'
            ? 'Labor lantai ' . $lantai
            : $this->faker->randomElement(['Gedung Pustaka', 'Ruang Kuliah Umum']);

        return [
            'kode_ruangan'  => $kodeRuangan,
            'nama_ruangan'  => $namaRuangan,
            'gedung'        => 'Gedung ' . $gedung,
            'lantai'        => $lantai,
            'jenis_ruangan' => $jenisRuangan,
            'kapasitas'     => $jenisRuangan === 'Praktikum'
                ? $this->faker->numberBetween(20, 35)
                : $this->faker->numberBetween(30, 50),
            'keterangan'    => $keterangan,
        ];
    }
}
