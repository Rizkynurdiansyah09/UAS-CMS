<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'titel1',
    ];

    // Jika nama tabel berbeda dengan nama model, Anda bisa menentukan nama tabel di sini
    // protected $table = 'languages';
}
