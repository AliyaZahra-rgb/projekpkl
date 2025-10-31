<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('karyawan.index', compact('karyawans'));
    }

    // Menampilkan form tambah karyawan baru
    public function create()
    {
        return view('karyawan.create');
    }

    // Menyimpan data karyawan baru
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

        return redirect()->route('admin.admin')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    // Menampilkan detail satu karyawan
    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.show', compact('karyawan'));
    }

    // Menampilkan form edit karyawan
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    // Update data karyawan
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $validated = $request->validate([
            'karyawan_id' => 'required|string|max:20|unique:karyawans,karyawan_id,' . $karyawan->id,
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'usia' => 'required|integer|min:18',
            'tanggal_mulai_aktif' => 'required|date',
            'gaji' => 'required|numeric|min:0',
        ]);

        $karyawan->update($validated);

        return redirect()->route('admin.admin')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    // Hapus data karyawan
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('admin.admin')->with('success', 'Data karyawan berhasil dihapus.');
    }
    
    public function exportSpreadsheet()
{
    $karyawans = \App\Models\Karyawan::all();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

   // Header kolom
    $sheet->setCellValue('A1', 'Karyawan ID');
    $sheet->setCellValue('B1', 'Nama');
    $sheet->setCellValue('C1', 'Jabatan');
    $sheet->setCellValue('D1', 'Usia');
    $sheet->setCellValue('E1', 'Tanggal Mulai Aktif');
    $sheet->setCellValue('F1', 'Gaji');


    // Data karyawan
    $row = 2;
    foreach ($karyawans as $karyawan) {
        $sheet->setCellValue('A' . $row, $karyawan->karyawan_id);
        $sheet->setCellValue('B' . $row, $karyawan->nama);
        $sheet->setCellValue('C' . $row, $karyawan->jabatan);
        $sheet->setCellValue('D' . $row, $karyawan->usia);
        $sheet->setCellValue('E' . $row, $karyawan->tanggal_mulai_aktif);
        $sheet->setCellValue('F' . $row, $karyawan->gaji);
        $row++;
    }

    // Set header untuk download
    $fileName = 'karyawan.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'. $fileName .'"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}
}
