<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
class DataKartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        $dummyData = [];
        for ($i = 1; $i <= 10; $i++) {
            $dummyData[] = [
                'NoKK' => $faker->unique()->randomNumber(9, true),
                'alamat' => $faker->address,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('data_kartu_keluargas')->insert($dummyData);
    }
}
