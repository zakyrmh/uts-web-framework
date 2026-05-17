# UTS Pemrograman Web Framework - Sistem Informasi Data Mahasiswa

Aplikasi ini dibangun menggunakan **Laravel 13** dan **Bootstrap 5.3** untuk memenuhi tugas Ujian Tengah Semester (UTS) pada mata kuliah Pemrograman Web Framework. Sistem ini mencakup arsitektur autentikasi manual (tanpa starter kit pihak ketiga seperti Breeze/Jetstream), manajemen data mahasiswa (CRUD), pagination otomatis, serta pengujian fitur terotomatisasi menggunakan **Pest PHP**.

---

## Identitas Mahasiswa

* **Nama:** Zaky Ramadhan
* **NIM:** 2411082024
* **Kelas:** TRPL 2C

---

## Fitur Utama Aplikasi

1. **Landing Page Modern:** Halaman penjelajah (*guest landing page*) responsif menggunakan Bootstrap 5.3 yang dilengkapi dengan logika deteksi status login secara cerdas menggunakan direktif `@auth` dan `@guest`.
2. **Autentikasi Manual (Lapis Aman):** Fitur Registrasi, Login, dan Logout yang dibangun secara mandiri menggunakan `Auth::attempt`, enkripsi password (`Hash::make`), perlindungan token `@csrf`, serta pengamanan rute komprehensif via `Route::middleware('auth')`.
3. **Manajemen Data Mahasiswa (CRUD):**
* **Create:** Validasi input ketat (termasuk batasan nilai IPK `0.00 - 4.00` dan keunikan NIM di database).
* **Read:** Menampilkan data mahasiswa langsung di Dashboard utama dalam bentuk tabel dinamis yang ringkas.
* **Update:** Form edit data yang secara otomatis memuat nilai lama (*old values*) dan record database terkini.
* **Delete:** Dilengkapi dengan konfirmasi alert JavaScript interaktif sebelum proses penghapusan data ke database terjadi.


4. **Pagination Terintegrasi Bootstrap 5.3:** Mengonfigurasi `AppServiceProvider` untuk membagi daftar mahasiswa (5 data per halaman) secara rapi dengan gaya asli Bootstrap 5.
5. **Automated Testing (Pest PHP):** Menyediakan skenario pengujian fitur terotomatisasi (`AuthTest` dan `MahasiswaTest`) lengkap dengan konfigurasi database *in-memory* SQLite untuk menjamin keandalan kode tanpa merusak data utama.
6. **Data Seeding Terlokalisasi (Faker Indonesia):** Mengisi database secara instan dengan 25 data mahasiswa tiruan menggunakan *locale* `id_ID` (nama, tempat lahir, dan alamat khas Indonesia).

---

## Tech Stack yang Digunakan

* **Backend Framework:** Laravel 13 (PHP >= 8.5)
* **Frontend Styling:** Bootstrap 5.3 (via Official CDN v5.3.3)
* **Testing Framework:** Pest PHP v4.x
* **Database Driver:** MySQL (Development via Laragon) / SQLite (Testing Mode)

---

## 📂 Struktur Tabel Utama (Skema Database)

### 1. Tabel `users` (Akun Pengelola / Admin)

* `id` (Primary Key, Auto Increment)
* `name` (String, 255)
* `email` (String, Unique)
* `password` (String)
* `timestamps` (`created_at`, `updated_at`)

### 2. Tabel `mahasiswas` (Data Inti)

* `id` (Primary Key, Auto Increment)
* `nim` (String, 10, Unique)
* `nama_lengkap` (String, 150)
* `tempat_lahir` (String, 50)
* `tanggal_lahir` (Date)
* `prodi` (String, 100)
* `ipk` (Decimal, 3, 2)
* `alamat` (Text)
* `timestamps` (`created_at`, `updated_at`)

---

## 🚀 Langkah Instalasi & Menjalankan Projek

Ikuti langkah-langkah di bawah ini untuk memasang dan menjalankan proyek ini di lingkungan lokal Anda:

### 1. Clone Projek & Masuk ke Direktori
```bash
git clone 
cd uts-web-framework
```

### 2. Install Dependensi Composer
```bash
composer install
```

### 3. Duplikasi & Sesuaikan Konfigurasi `.env`

Salin file `.env.example` menjadi `.env`:
cp .env.example .env

Buka file `.env` dan sesuaikan pengaturan database Anda (misalnya jika menggunakan Laragon/MySQL):
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=app_2_trpl_2c
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key
```bash
php artisan key:generate
```
### 5. Jalankan Migrasi & Database Seeder

Perintah ini akan membersihkan database, menjalankan struktur tabel, sekaligus mengisi otomatis **25 data mahasiswa tiruan** serta **1 akun admin utama**:
```bash
php artisan migrate:fresh --seed
```

### 6. Jalankan Server Lokal Laravel
```bash
php artisan serve
```
Aplikasi sekarang dapat diakses melalui browser di alamat: http://127.0.0.1:8000

---

## Akun Demo Pengujian (Login)

Anda dapat langsung menggunakan akun yang digenerate oleh *Seeder* untuk masuk ke dalam sistem dashboard tanpa harus melakukan registrasi manual terlebih dahulu:

* **Email:** admin@pnp.ac.id
* **Password:** password123

---

## Cara Menjalankan Pengujian Otomatis (Pest PHP)

Proyek ini telah lulus uji kelayakan fitur menggunakan Pest PHP dengan database *in-memory*. Untuk memverifikasi keandalan kode, jalankan perintah:
```bash
php artisan test
```
Atau menggunakan binary Pest secara langsung:
```bash
vendor/bin/pest
```
Semua skenario tes (`AuthTest` dan `MahasiswaTest`) dipastikan akan memunculkan indikator warna **hijau (PASS)** dengan durasi eksekusi yang optimal.
