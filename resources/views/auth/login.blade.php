@extends('layouts.auth')

@section('title', 'Login - UTS Web Framework')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-4">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <h1 class="h3 mb-5 fw-normal text-center">Please sign in</h1>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com">
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check text-start my-3">
                            <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>

                        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
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
