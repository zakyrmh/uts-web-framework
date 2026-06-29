@extends('layouts.auth')

@section('title', 'Registrasi Akun - UTS Web Framework')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <h1 class="h3 mb-5 fw-normal text-center">Daftar Akun</h1>

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap">
                        <label for="name">Nama Lengkap</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com">
                        <label for="email">Alamat Email</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password" placeholder="Minimal 8 karakter">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control"
                               id="password_confirmation" name="password_confirmation" placeholder="Ulangi password">
                        <label for="password_confirmation">Konfirmasi Password</label>
                    </div>
                    
                    <div class="mb-4">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <div class="border rounded p-1 bg-light d-inline-block">
                                {!! Captcha::img() !!}
                            </div>
                            <button type="button" class="btn btn-outline-secondary" onclick="refreshCaptcha()" title="Refresh Captcha">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('captcha') is-invalid @enderror"
                                   id="captcha" name="captcha" placeholder="Masukkan kode captcha" autocomplete="off">
                            <label for="captcha">Verification Code (Captcha)</label>
                            @error('captcha')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <script>
                        function refreshCaptcha() {
                            const captchaImg = document.querySelector('img[alt="captcha"]');
                            if (captchaImg) {
                                captchaImg.src = "{{ url('captcha/image') }}?t=" + Date.now();
                            }
                        }
                    </script>

                    <button type="submit" class="btn btn-primary w-100 py-2" style="font-weight: 500;">Daftar Sekarang</button>
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
