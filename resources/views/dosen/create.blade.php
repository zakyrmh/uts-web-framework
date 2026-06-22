@extends('layouts.main')

@section('title', 'Tambah Data Dosen')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 rounded-3 mb-5">
            <div class="card-body p-4">
                <h4 class="fw-bold text-primary mb-4">Tambah Data Dosen</h4>

                <form action="{{ route('dosen.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIDN</label>
                            <input type="text" name="nidn" class="form-control @error('nidn') is-invalid @enderror" value="{{ old('nidn') }}" placeholder="Contoh: 123456789012345678">
                            @error('nidn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Dosen</label>
                            <input type="text" name="nama_dosen" class="form-control @error('nama_dosen') is-invalid @enderror" value="{{ old('nama_dosen') }}" placeholder="Nama Lengkap dengan Gelar">
                            @error('nama_dosen') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Contoh: dosen@pnp.ac.id">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">No. Telepon / WA</label>
                            <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp') }}" placeholder="Contoh: 08123456789">
                            @error('no_telp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <select name="prodi_id" class="form-select @error('prodi_id') is-invalid @enderror">
                            <option value="" selected disabled>-- Pilih Program Studi --</option>
                            @foreach($prodis as $prodi)
                                <option value="{{ $prodi->id }}" {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>
                                    {{ $prodi->nama_prodi }} ({{ $prodi->jenjang }})
                                </option>
                            @endforeach
                        </select>
                        @error('prodi_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat tinggal saat ini">{{ old('alamat') }}</textarea>
                        @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('dosen.index') }}" class="btn btn-secondary px-4">Kembali</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
