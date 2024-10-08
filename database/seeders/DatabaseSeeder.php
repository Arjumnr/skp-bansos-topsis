<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       //run UserSeeder and CriteriaSeeder
        $this->call([
            UserSeeder::class,
            CriteriaSeeder::class,
            WargaSeeder::class,
            OptionsSeeder::class
        ]);
    }
}
