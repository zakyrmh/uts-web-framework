@extends('layouts.main')

@section('title', 'Dashboard Dosen')

@section('content')
<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold m-0 text-secondary">Daftar Dosen</h4>
            <a href="{{ route('dosen.create') }}" class="btn btn-primary fw-semibold">+ Tambah Dosen</a>
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
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                        <th>Email</th>
                        <th>No. Telp</th>
                        <th>Program Studi</th>
                        <th>Alamat</th>
                        <th style="width: 15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dosens as $index => $dosen)
                    <tr>
                        <td>{{ $dosens->firstItem() + $index }}</td>
                        <td class="fw-bold text-secondary">{{ $dosen->nidn }}</td>
                        <td>{{ $dosen->nama_dosen }}</td>
                        <td>{{ $dosen->email }}</td>
                        <td>{{ $dosen->no_telp }}</td>
                        <td>
                            @if($dosen->prodi)
                                <span class="badge bg-info text-dark fw-semibold">{{ $dosen->prodi->nama_prodi }}</span>
                            @else
                                <span class="badge bg-danger fw-semibold">Tidak Ada Prodi</span>
                            @endif
                        </td>
                        <td>{{ Str::limit($dosen->alamat, 40) }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-sm btn-warning fw-semibold">Edit</a>

                                <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger fw-semibold">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">Belum ada data dosen.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            {{ $dosens->links() }}
        </div>

    </div>
</div>
@endsection
