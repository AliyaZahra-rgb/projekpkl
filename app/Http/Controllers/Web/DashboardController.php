<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;

class DashboardController extends Controller
{
   public function index()
    {
        $karyawans = Karyawan::orderBy('created_at', 'desc')->get();
        return view('admin.admin', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|string|max:20|unique:karyawans,karyawan_id',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'usia' => 'required|integer|min:18',
            'tanggal_mulai_aktif' => 'required|date',
            'gaji' => 'required|numeric|min:0',
        ]);

        Karyawan::create($validated);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }
}
