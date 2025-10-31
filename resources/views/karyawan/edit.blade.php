@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Karyawan</h1>

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $karyawan->nama }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" value="{{ $karyawan->jabatan }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Usia</label>
            <input type="number" name="usia" value="{{ $karyawan->usia }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal Mulai Aktif</label>
            <input type="date" name="tanggal_mulai_aktif" value="{{ $karyawan->tanggal_mulai_aktif }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Gaji</label>
            <input type="number" name="gaji" value="{{ $karyawan->gaji }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>
    </form>

</div>
@endsection
