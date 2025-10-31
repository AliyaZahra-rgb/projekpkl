@extends('layouts.app')

@section('title','Data Karyawan')

@section('content')
<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex align-items-center mb-3">
       <h2 class="me-3 mb-0">Data Karyawan</h2>
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary">+ Tambah Karyawan</a>
        <a href="{{ route('karyawan.export.spreadsheet') }}" class="btn btn-success">Download Excel</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Karyawan ID</th>
                <th>Jabatan</th>
                <th>Usia</th>
                <th>Mulai Aktif</th>
                <th>Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($karyawans as $karyawan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $karyawan->nama }}</td>
                    <td>{{ $karyawan->karyawan_id }}</td>
                    <td>{{ $karyawan->jabatan }}</td>
                    <td>{{ $karyawan->usia }}</td>
                    <td>{{ $karyawan->tanggal_mulai_aktif }}</td>
                    <td>Rp {{ number_format($karyawan->gaji,0,',','.') }}</td>
                    <td>
                        <a href="{{ route('karyawan.edit',$karyawan->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('karyawan.destroy',$karyawan->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
