<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - UTS Web Framework</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <div class="card shadow border-0 p-5 rounded-4 bg-white bg-opacity-75 backdrop-blur">
                    <div class="card-body">
                        <span class="badge bg-primary px-3 py-2 rounded-pill uppercase mb-3 fw-semibold">Projek UTS Web
                            Framework</span>

                        <h1 class="display-4 fw-bold text-dark mb-3">Sistem Informasi <span class="text-primary">Data
                                Mahasiswa</span></h1>

                        <p class="lead text-muted mb-5">
                            Selamat datang di aplikasi manajemen data mahasiswa. Sistem ini dirancang untuk memenuhi
                            tugas UTS pemrograman web framework dengan fitur autentifikasi manual dan operasi CRUD yang
                            aman.
                        </p>

                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            @guest
                                <a href="{{ route('login') }}"
                                    class="btn btn-primary btn-lg px-4 gap-3 fw-semibold rounded-3 shadow-sm">
                                    Masuk Akun
                                </a>
                                <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-4 rounded-3">
                                    Daftar Baru
                                </a>
                            @endguest

                            @auth
                                <div class="card p-3 bg-light border-0 w-100 rounded-3">
                                    <p class="text-muted m-0 mb-2">Anda sedang login sebagai
                                        <strong>{{ auth()->user()->name }}</strong></p>
                                    <a href="{{ route('mahasiswa.index') }}"
                                        class="btn btn-success btn-lg px-4 fw-semibold rounded-3 shadow-sm">
                                        Buka Dashboard CRUD
                                    </a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-muted small">
                    &copy; {{ date('Y') }} &bull; TRPL Politeknik Negeri Padang. All Rights Reserved.
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
