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
        'option_id',
    ];

    public function getWarga()
    {
        return $this->hasOne('App\Models\Warga', 'id', 'kepala_keluarga_id');
    }

    public function getKriteria()
    {
        return $this->hasOne('App\Models\Criteria', 'id', 'kriteria_id');
    }

    public function getOptions()
    {
        return $this->hasOne('App\Models\Options', 'id', 'option_id');
    }


}
