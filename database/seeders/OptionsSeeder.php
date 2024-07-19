<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
    
    // @elseif ($index == 2)
    //     <option value="5">Tidak Bekerja</option>
    //     <option value="4">Buruh</option>
    //     <option value="3">Pedagang</option>
    //     <option value="2">Petani</option>
    //     <option value="1">Wiraswasta</option>
    // @elseif ($index == 3)
    //     <option value="5">Tanah</option>
    //     <option value="4">Kayu</option>
    //     <option value="3">Semen</option>
    //     <option value="2">Tanah Tanpa Plester</option>
    //     <option value="1">Lantai Plester</option>
    // @elseif ($index == 4)
    //     <option value="3">Bambu</option>
    //     <option value="2">Kayu</option>
    //     <option value="1">Tembok Tanpa Plester</option>
    // @endif
        DB::table('options')->insert([
            [
                'opsi' => '< 100.000',
                'kriteria_id' => 1,
                'Bobot' => 5,
            ],
            [
                'opsi' => '100.000 - 400.000',
                'kriteria_id' => 1,
                'Bobot' => 4,
            ],
            [
                'opsi' => '400.000 - 900.000',
                'kriteria_id' => 1,
                'Bobot' => 3
            ],
            [
                'opsi' => '900.000 - 1.400.000',
                'kriteria_id' => 1,
                'Bobot' => 2
            ],
            [
                'opsi' => '> 1.400.000 - 2.500.000',
                'kriteria_id' => 1,
                'Bobot' => 1
            ],

            //kriteria 2
            [
                'opsi' => '8 Orang',
                'kriteria_id' => 2,
                'Bobot' => 5
            ],
            [
                'opsi' => '7 Orang',
                'kriteria_id' => 2,
                'Bobot' => 4
            ],
            [
                'opsi' => '4 - 6 Orang',
                'kriteria_id' => 2,
                'Bobot' => 3
            ],
            [
                'opsi' => '2 - 3 Orang',
                'kriteria_id' => 2,
                'Bobot' => 2
            ],
            [
                'opsi' => '1 Orang',
                'kriteria_id' => 2,
                'Bobot' => 1
            ],

            //kriteria 3
            [
                'opsi' => 'Tidak Bekerja',
                'kriteria_id' => 3,
                'Bobot' => 5
            ],
            [
                'opsi' => 'Buruh',
                'kriteria_id' => 3,
                'Bobot' => 4
            ],
            [
                'opsi' => 'Pedagang',
                'kriteria_id' => 3,
                'Bobot' => 3
            ],
            [
                'opsi' => 'Petani',
                'kriteria_id' => 3,
                'Bobot' => 2
            ],
            [
                'opsi' => 'Wiraswasta',
                'kriteria_id' => 3,
                'Bobot' => 1
            ],

            //kriteria 4
            [
                'opsi' => 'Tanah',
                'kriteria_id' => 4,
                'Bobot' => 5
            ],
            [
                'opsi' => 'Kayu',
                'kriteria_id' => 4,
                'Bobot' => 4
            ],
            [
                'opsi' => 'Semen',
                'kriteria_id' => 4,
                'Bobot' => 3
            ],
            [
                'opsi' => 'Lantai Tanpa Plester',
                'kriteria_id' => 4,
                'Bobot' => 2
            ],
            [
                'opsi' => 'Lantai Plester',
                'kriteria_id' => 4,
                'Bobot' => 1
            ],

            //kriteria 5
            [
                'opsi' => 'Bambu',
                'kriteria_id' => 5,
                'Bobot' => 5
            ],
            [
                'opsi' => 'Kayu',
                'kriteria_id' => 5,
                'Bobot' => 4
            ],
            [
                'opsi' => 'Tembok Tanpa Plester',
                'kriteria_id' => 5,
                'Bobot' => 3
            ],

            
        ]);
    }
}
