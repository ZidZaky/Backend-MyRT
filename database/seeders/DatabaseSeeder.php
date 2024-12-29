<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DataKartuKeluargaSeeder::class, // Ensure this matches the file name
            AnggotaKeluargaSeeder::class,  // Ensure this matches the file name
        ]);
    }
}
