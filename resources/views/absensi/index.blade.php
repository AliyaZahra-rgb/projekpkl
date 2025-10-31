@extends('layouts.app')

@section('title', 'Data Absensi')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
  <h2 class="fw-bold mb-4 text-center">📋 Data Absensi Karyawan</h2>

  <!-- Filter Tanggal -->
  <form method="GET" class="row g-3 mb-4">
    <div class="col-md-3">
      <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}">
    </div>
    <div class="col-md-3">
      <button type="submit" class="btn btn-dark w-100">Filter</button>
    </div>
  </form>

  <!-- Tabel Data -->
  <div class="card shadow rounded-4">
    <div class="card-body">
      <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark text-center">
          
          <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Waktu Absen</th>
            <th>Tanggal</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($absensis as $index => $a)
          <tr class="text-center">
            <td>{{ $index + 1 }}</td>
            <td>{{ $a->karyawan->nama }}</td>
            <td>{{ $a->waktu_absen }}</td>
            <td>{{ $a->tanggal }}</td>
            <td>
              @if ($a->status == 'masuk')
                <span class="badge bg-success">Masuk</span>
              @elseif ($a->status == 'pulang')
                <span class="badge bg-primary">Pulang</span>
              @else
                <span class="badge bg-secondary">Tidak Diketahui</span>
              @endif
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center text-muted">Belum ada data absensi.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
