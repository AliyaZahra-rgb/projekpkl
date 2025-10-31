<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
       'waktu_masuk',
       'waktu_pulang',
        'status',
];

    public function karyawan()
    {
        return $this->belongsTo(User::class);
    }
}
