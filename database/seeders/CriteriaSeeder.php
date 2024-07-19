<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('criteria')->insert([
            [
                'nama_kriteria' => 'Kriteria 1',
                'pernyataan' => 'Penghasilan Perbulan',
                'tipe' => 'Benefit',
                'Bobot' => 5,
            ],
            [
                'nama_kriteria' => 'Kriteria 2',
                'pernyataan' => 'Jumlah Anggota Keluarga',
                'tipe' => 'Cost',
                'bobot' => 5
            ],
            [
                'nama_kriteria' => 'Kriteria 3',
                'pernyataan' => 'Pekerjaan',
                'tipe' => 'Benefit',
                'bobot' => 4
            ],
            [
                'nama_kriteria' => 'Kriteria 4',
                'pernyataan' => 'Jenis Lantai',
                'tipe' => 'Benefit',
                'bobot' => 4
            ],
            [
                'nama_kriteria' => 'Kriteria 5',
                'pernyataan' => 'Jenis Dinding',
                'tipe' => 'Benefit',
                'bobot' => 5
            ],
            
        ]);
    }
}
