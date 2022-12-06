<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    
    /**
    * fillable
    *
    * @var array
    */
    protected $fillable = [
        'nama_pengguna',
        'email',
        'password',
        'jenis_kelamin',
        'alamat',
        'no_hp',
    ];
}
