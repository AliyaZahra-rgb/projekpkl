@extends('layouts.layout')

@section('content')
<div class="container">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h3>Absensi Hari Ini</h3>

    @php $absenHariIni = $absenHariIni ?? null; @endphp

    {{-- CASE 1 — Belum Check In --}}
    @if(!$absenHariIni)
        <form action="{{ route('absensi.checkin') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Check In</button>
        </form>

    {{-- CASE 2 — Sudah Check In tapi belum Check Out --}}
    @elseif($absenHariIni && !$absenHariIni->waktu_pulang)
        <p>Waktu Masuk: {{ $absenHariIni->waktu_masuk ? $absenHariIni->waktu_masuk->format('Y-m-d H:i:s') : '-' }}</p>

        <form action="{{ route('absensi.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger mt-2">Check Out</button>
        </form>

    {{-- CASE 3 — Sudah Check In & Sudah Check Out --}}
    @else
        <p>Waktu Masuk : {{ $absenHariIni->waktu_masuk ? $absenHariIni->waktu_masuk->format('Y-m-d H:i:s') : '-' }}</p>
        <p>Waktu Pulang: {{ $absenHariIni->waktu_pulang ? $absenHariIni->waktu_pulang->format('Y-m-d H:i:s') : '-' }}</p>
        <div class="alert alert-info">Sudah selesai absensi hari ini ✅</div>
    @endif

</div>
@endsection
