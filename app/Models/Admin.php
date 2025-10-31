<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use Notifiable;
    protected $fillable = [
        'karyawan_id',
        'name',
        'email',
        'password',
        'role',
    
    ];
}
