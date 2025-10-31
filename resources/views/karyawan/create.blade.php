@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Tambah Karyawan</h1>

    <form action="/karyawan/store/" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>

          <div class="mb-3">
            <label>Karyawan ID</label>
            <input type="text" name="karyawan_id" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Usia</label>
            <input type="number" name="usia" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal Mulai Aktif</label>
            <input type="date" name="tanggal_mulai_aktif" class="form-control">
        </div>

        <div class="mb-3">
            <label>Gaji</label>
            <input type="number" name="gaji" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
    </form>

</div>
@endsection
