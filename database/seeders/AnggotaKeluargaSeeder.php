<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
class AnggotaKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        $dummyData = [];
        for ($i = 1; $i <= 50; $i++) { // Create 50 members
            $dummyData[] = [
                'NIK' => $faker->unique()->numerify('################'),
                'NamaLengkap' => $faker->name,
                'JenisKelamin' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                'TempatLahir' => $faker->city,
                'Agama' => $faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha', 'Konghucu']),
                'Pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA', 'S1', 'S2']),
                'Pekerjaan' => $faker->jobTitle,
                'StatusPernikahan' => $faker->randomElement(['Belum Menikah', 'Menikah', 'Duda', 'Janda']),
                'StatusDalamKeluarga' => $faker->randomElement(['Kepala Keluarga', 'Istri', 'Anak', 'Cucu']),
                'Kewarganegaraan' => 'Indonesia',
                'NamaAyah' => $faker->name('male'),
                'NamaIbu' => $faker->name('female'),
                'NoKK' => DB::table('data_kartu_keluargas')->inRandomOrder()->value('NoKK'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('anggota_keluargas')->insert($dummyData);
    }
}
