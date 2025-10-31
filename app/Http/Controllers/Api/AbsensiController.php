<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
      public function checkin(Request $request)
    {
        $karyawan = Karyawan::where('user_id', Auth::id())->firstOrFail();

        // Cek apakah sudah checkin dan belum checkout (per hari)
        $sudahCheckin = Absensi::where('karyawan_id', $karyawan->id)
            ->whereDate('checked_at', now())
            ->where('method', 'gps')
            ->whereNull('metadata->checkout') // belum checkout
            ->first();

        if ($sudahCheckin) {
            return response()->json([
                'message' => 'Anda sudah check-in hari ini dan belum checkout.'
            ], 400);
        }

        $absen = Absensi::create([
            'karyawan_id' => $karyawan->id,
            'method'      => 'gps',
            'checked_at'  => now(),
            'metadata'    => ['lat' => $request->lat, 'lng' => $request->lng],
            'ip_address'  => $request->ip(),
            'device_id'   => $request->userAgent(),
        ]);

        return response()->json(['message' => 'Check-in berhasil', 'data' => $absen]);
    }

    // POST /api/checkout
    public function checkout(Request $request)
    {
        $karyawan = Karyawan::where('user_id', Auth::id())->firstOrFail();

        $absen = Absensi::where('karyawan_id', $karyawan->id)
            ->whereDate('checked_at', now())
            ->whereNull('metadata->checkout')
            ->first();

        if (!$absen) {
            return response()->json([
                'message' => 'Anda belum check-in atau sudah checkout.'
            ], 400);
        }

        $meta = $absen->metadata ?? [];
        $meta['checkout'] = [
            'time' => now(),
            'lat'  => $request->lat,
            'lng'  => $request->lng,
        ];

        $absen->update(['metadata' => $meta]);

        return response()->json(['message' => 'Checkout berhasil', 'data' => $absen]);
    }

    private function haversineDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371000; // meters

        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLng / 2) * sin($dLng / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c;

        return $distance; // in meters
    }
}
