<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Karyawan;
use Illuminate\Support\Str;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // contoh 5 karyawan dummy
        $karyawanData = [
            [
                'nama' => 'Budi Santoso',
                'karyawan_id' => '345678',
                'jabatan' => 'Manager',
                'usia' => 35,
                'tanggal_mulai_aktif' => '2020-01-10',
                'gaji' => 12000000,
            ],
            [
                'nama' => 'Siti Aminah',
                'karyawan_id' => '778866',
                'jabatan' => 'Staff HR',
                'usia' => 28,
                'tanggal_mulai_aktif' => '2021-03-15',
                'gaji' => 8000000,
            ],
            [
                'nama' => 'Andi Prasetyo',
                'karyawan_id' => '98900',
                'jabatan' => 'Staff IT',
                'usia' => 30,
                'tanggal_mulai_aktif' => '2019-07-01',
                'gaji' => 9000000,
            ],
            [
                'nama' => 'Rina Kurnia',
                'karyawan_id' => '222234',
                'jabatan' => 'Staff Keuangan',
                'usia' => 27,
                'tanggal_mulai_aktif' => '2022-02-20',
                'gaji' => 8500000,
            ],
            [
                'nama' => 'Agus Haryanto',
                'karyawan_id' => '4455366',
                'jabatan' => 'Supervisor',
                'usia' => 40,
                'tanggal_mulai_aktif' => '2018-11-05',
                'gaji' => 13000000, 
            ],
        ];

        foreach ($karyawanData as $k) {
            Karyawan::create($k);
        }
    
    }
}
