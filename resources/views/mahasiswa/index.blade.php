@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold m-0 text-secondary">Daftar Mahasiswa</h4>
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary fw-semibold">+ Tambah Mahasiswa</a>
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
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Tempat, Tgl Lahir</th>
                        <th>Prodi</th>
                        <th>IPK</th>
                        <th>Alamat</th>
                        <th style="width: 15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mahasiswas as $index => $mhs)
                    <tr>
                        <td>{{ $mahasiswas->firstItem() + $index }}</td>
                        <td class="fw-bold text-secondary">{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama_lengkap }}</td>
                        <td>{{ $mhs->tempat_lahir }}, {{ \Carbon\Carbon::parse($mhs->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                        <td><span class="badge bg-info text-dark fw-semibold">{{ $mhs->prodi }}</span></td>
                        <td class="fw-bold">{{ $mhs->ipk }}</td>
                        <td>{{ Str::limit($mhs->alamat, 40) }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-sm btn-warning fw-semibold">Edit</a>

                                <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger fw-semibold">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">Belum ada data mahasiswa.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            {{ $mahasiswas->links() }}
        </div>

    </div>
</div>
@endsection
