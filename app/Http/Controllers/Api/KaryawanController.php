<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class KaryawanController extends Controller
{
    public function index()
    {
        return response()->json(Karyawan::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'usia' => 'required|integer|min:18',
            'tanggal_mulai_aktif' => 'required|date',
            'gaji' => 'required|numeric',
            'foto' => 'nullable|image|max:2048',
        ]);

        // Simpan foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/foto_karyawan');
        }

        // Buat data karyawan
        $karyawan = Karyawan::create([
            'user_id' => $validated['user_id'],
            'nama' => $validated['nama'],
            'jabatan' => $validated['jabatan'],
            'usia' => $validated['usia'],
            'tanggal_mulai_aktif' => $validated['tanggal_mulai_aktif'],
            'gaji' => $validated['gaji'],
            'foto' => $fotoPath ? basename($fotoPath) : null,
        ]);

        // Generate QR code berdasarkan ID karyawan
        $qrCodePath = 'public/qrcode/' . $karyawan->id . '.png';
        $qrCodeImage = QrCode::format('png')
            ->size(200)
            ->generate('Karyawan ID: ' . $karyawan->id);
        Storage::put($qrCodePath, $qrCodeImage);

        // Simpan path QR ke database
        $karyawan->update([
            'qr' => basename($qrCodePath),
        ]);

        return response()->json([
            'message' => 'Karyawan berhasil ditambahkan',
            'data' => $karyawan
        ], 201);
    }

    public function show($id)
    {
        return response()->json(Karyawan::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());
        return response()->json($karyawan);
    }

    public function destroy($id)
    {
        Karyawan::destroy($id);
        return response()->json(['message' => 'Karyawan berhasil dihapus']);
    }
}
