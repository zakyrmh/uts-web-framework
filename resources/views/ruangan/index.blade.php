@extends('layouts.app')

@section('title', 'Dashboard Ruangan')

@section('content')
<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold m-0 text-secondary">Daftar Ruangan</h4>
            <a href="{{ route('ruangan.create') }}" class="btn btn-primary fw-semibold">+ Tambah Ruangan</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm mb-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 5%">No</th>
                        <th>Kode Ruangan</th>
                        <th>Nama Ruangan</th>
                        <th>Gedung</th>
                        <th>Lantai</th>
                        <th>Jenis Ruangan</th>
                        <th>Kapasitas</th>
                        <th>Keterangan</th>
                        <th style="width: 15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ruangans as $index => $ruangan)
                    <tr>
                        <td>{{ $ruangans->firstItem() + $index }}</td>
                        <td class="fw-bold text-secondary">{{ $ruangan->kode_ruangan }}</td>
                        <td>{{ $ruangan->nama_ruangan }}</td>
                        <td>{{ $ruangan->gedung }}</td>
                        <td><span class="badge bg-info text-dark fw-semibold">{{ $ruangan->lantai }}</span></td>
                        <td class="fw-bold">{{ $ruangan->jenis_ruangan }}</td>
                        <td class="fw-bold">{{ $ruangan->kapasitas }}</td>
                        <td>{{ Str::limit($ruangan->keterangan, 40) }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('ruangan.edit', $ruangan->id) }}" class="btn btn-sm btn-warning fw-semibold">Edit</a>

                                <form action="{{ route('ruangan.destroy', $ruangan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger fw-semibold">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">Belum ada data Ruangan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            {{ $ruangans->links() }}
        </div>

    </div>
</div>
@endsection
