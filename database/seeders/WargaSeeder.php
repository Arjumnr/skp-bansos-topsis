<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('warga')->insert([
            [
                'nik' => '212019219201',
                'kepala_keluarga' => 'Enre',
                'rt' => '01',
                'rw' => '01',
            ],
            [
                'nik' => '212121212',
                'kepala_keluarga' => 'Ahmad',
                'rt' => '02',
                'rw' => '02',
            ],
            
        ]);
    }
}
