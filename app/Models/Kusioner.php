<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kusioner extends Model
{
    use HasFactory;
    protected $table = 'kusioner';
    protected $fillable = [
        'kepala_keluarga_id',
        'kriteria_id',
        'bobot_kriteria',
        'bobot_jawaban'
    ];
}
