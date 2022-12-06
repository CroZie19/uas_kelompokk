<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    
    /**
    * fillable
    *
    * @var array
    */
    protected $fillable = [
        'nama_pegawai',
        'email',
        'no_pegawai',
        'password',
    ];
}
