@extends('layouts.main')

@section('title', 'Edit Data Program Studi')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 rounded-3 mb-5">
            <div class="card-body p-4">
                <h4 class="fw-bold text-warning mb-4">Edit Data Program Studi</h4>

                <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Program Studi</label>
                            <input type="text" name="nama_prodi" class="form-control @error('nama_prodi') is-invalid @enderror" value="{{ old('nama_prodi', $prodi->nama_prodi) }}">
                            @error('nama_prodi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenjang</label>
                            <select name="jenjang" class="form-select @error('jenjang') is-invalid @enderror">
                                <option value="" disabled>-- Pilih Jenjang --</option>
                                <option value="D3" {{ old('jenjang', $prodi->jenjang) == 'D3' ? 'selected' : '' }}>D3 (Ahli Madya)</option>
                                <option value="D4" {{ old('jenjang', $prodi->jenjang) == 'D4' ? 'selected' : '' }}>D4 (Sarjana Terapan)</option>
                            </select>
                            @error('jenjang') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan tambahan (opsional)">{{ old('keterangan', $prodi->keterangan) }}</textarea>
                        @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('prodi.index') }}" class="btn btn-secondary px-4">Batal</a>
                        <button type="submit" class="btn btn-warning px-4 fw-semibold text-dark">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
