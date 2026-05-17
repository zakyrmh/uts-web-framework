@extends('layouts.auth')

@section('title', 'Registrasi Akun - UTS Web Framework')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <h3 class="card-title text-center mb-4 fw-bold text-primary">Daftar Akun</h3>

                <form action="{{ route('register') }}" method="POST">
                    @csrf <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama Anda">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password" placeholder="Minimal 8 karakter">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control"
                               id="password_confirmation" name="password_confirmation" placeholder="Ulangi password">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-2 fw-semibold">Daftar Sekarang</button>
                </form>

                <hr class="text-muted my-4">

                <div class="text-center">
                    <span class="text-muted">Sudah punya akun?</span>
                    <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">Login di sini</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
