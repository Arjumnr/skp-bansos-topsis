<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    use HasFactory;
    protected $table = 'options';
    protected $fillable = [
        'opsi',
        'kriteria_id',
        'bobot',
    ];

    public function getKriteria()
    {
        return $this->hasOne('App\Models\Criteria', 'id', 'kriteria_id');
    }
}
