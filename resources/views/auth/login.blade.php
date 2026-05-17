@extends('layouts.auth')

@section('title', 'Login - UTS Web Framework')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bundle="dismiss" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <h3 class="card-title text-center mb-4 fw-bold text-primary">Masuk Akun</h3>

                <form action="{{ route('login') }}" method="POST">
                    @csrf <div class="mb-3">
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
                               id="password" name="password" placeholder="Masukkan password Anda">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label text-muted" for="remember">Ingat Saya</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-2 fw-semibold">Masuk</button>
                </form>

                <hr class="text-muted my-4">

                <div class="text-center">
                    <span class="text-muted">Belum punya akun?</span>
                    <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">Daftar di sini</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
