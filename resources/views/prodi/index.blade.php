@extends('layouts.main')

@section('title', 'Dashboard Program Studi')

@section('content')
<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold m-0 text-secondary">Daftar Program Studi</h4>
            <a href="{{ route('prodi.create') }}" class="btn btn-primary fw-semibold">+ Tambah Prodi</a>
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
                        <th>Nama Program Studi</th>
                        <th>Jenjang</th>
                        <th>Keterangan</th>
                        <th style="width: 15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prodis as $index => $prodi)
                    <tr>
                        <td>{{ $prodis->firstItem() + $index }}</td>
                        <td class="fw-bold text-secondary">{{ $prodi->nama_prodi }}</td>
                        <td>
                            @if($prodi->jenjang == 'D4')
                                <span class="badge bg-primary fw-semibold">D4 (Sarjana Terapan)</span>
                            @else
                                <span class="badge bg-warning text-dark fw-semibold">D3 (Ahli Madya)</span>
                            @endif
                        </td>
                        <td>{{ $prodi->keterangan ?? '-' }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('prodi.edit', $prodi->id) }}" class="btn btn-sm btn-warning fw-semibold">Edit</a>

                                <form action="{{ route('prodi.destroy', $prodi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger fw-semibold">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada data program studi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            {{ $prodis->links() }}
        </div>

    </div>
</div>
@endsection
