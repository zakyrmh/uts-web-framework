@extends('layouts.main')

@section('title', 'Tambah Data Ruangan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 rounded-3 mb-5">
            <div class="card-body p-4">
                <h4 class="fw-bold text-primary mb-4">Tambah Data Ruangan</h4>

                <form action="{{ route('ruangan.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kode Ruangan</label>
                            <input type="text" name="kode_ruangan" class="form-control @error('kode_ruangan') is-invalid @enderror" value="{{ old('kode_ruangan') }}">
                            @error('kode_ruangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Ruangan</label>
                            <input type="text" name="nama_ruangan" class="form-control @error('nama_ruangan') is-invalid @enderror" value="{{ old('nama_ruangan') }}">
                            @error('nama_ruangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gedung</label>
                            <input type="text" name="gedung" class="form-control @error('gedung') is-invalid @enderror" value="{{ old('gedung') }}">
                            @error('gedung') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Lantai</label>
                            <input type="text" name="lantai" class="form-control @error('lantai') is-invalid @enderror" value="{{ old('lantai') }}">
                            @error('lantai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Ruangan</label>
                            <select name="jenis_ruangan" class="form-control @error('jenis_ruangan') is-invalid @enderror">
                                <option value="">Pilih Jenis Ruangan</option>
                                <option value="Teori" {{ old('jenis_ruangan') == 'Teori' ? 'selected' : '' }}>Teori</option>
                                <option value="Praktikum" {{ old('jenis_ruangan') == 'Praktikum' ? 'selected' : '' }}>Praktikum</option>
                            </select>
                            @error('jenis_ruangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kapasitas</label>
                            <input type="number" name="kapasitas" class="form-control @error('kapasitas') is-invalid @enderror" value="{{ old('kapasitas') }}" min="1">
                            @error('kapasitas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                        @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('ruangan.index') }}" class="btn btn-secondary px-4">Kembali</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
