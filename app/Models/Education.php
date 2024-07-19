<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_mulai',
        'tahun_selesai',
        'sekolah',
        'lokasi',
        'status_kelulusan',
        'jurusan',
        'deskripsi',
    ];
}
