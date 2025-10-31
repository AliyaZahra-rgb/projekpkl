<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use App\Models\Karyawan;
use Carbon\Carbon;

class AbsensiController extends Controller
{

    public function index()
    {
        $karyawanId = Auth::user()->karyawan_id;

        $absenHariIni = Absensi::where('karyawan_id', $karyawanId)
            ->whereDate('created_at', now()->toDateString())
            ->first();

            dd('index dipanggil', $absenHariIni);

        // kirim ke view
        return view('absensi.scan', compact('absenHariIni'));
    }

    public function scan()
    {
        return view('absensi.scan'); // pastikan ada view-nya
    }


    public function checkIn(Request $request)
{
    if (!Auth::check()) {
    return redirect()->route('auth.login')->with('error', 'Silakan login terlebih dahulu.');
}
    $karyawanId = Auth::user()->karyawan_id;

    $exists = Absensi::where('karyawan_id', $karyawanId)
        ->whereDate('created_at', now()->toDateString())
        ->exists();

    if ($exists) {
        return back()->with('error', 'Kamu sudah Check In hari ini!');
    }

    Absensi::create([
        'karyawan_id' => $karyawanId,
        'waktu_masuk' => now(),
        'status'      => 'hadir',
    ]);

    return back()->with('success', 'Check In berhasil!');
}


    // CHECK OUT
    public function checkOut(Request $request)
    {
        // cari absen hari ini dari user yg sama
        $absen = Absensi::where('karyawan_id', auth()->id())
            ->whereDate('created_at', now()->toDateString())
            ->first();

        // kalau belum checkin
        if (!$absen) {
            return back()->with('error', 'Kamu belum Check In hari ini!');
        }

        // update waktu pulang
        $absen->update([
            'waktu_pulang' => now(),
        ]);

        return back()->with('success', 'Berhasil Check Out!');
    }
}
