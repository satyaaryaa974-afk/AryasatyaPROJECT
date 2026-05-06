<?php

namespace Database\Seeders;

use App\Models\Bangunan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    $faker = Faker::create(
        'id_ID'
    );
    for ($i=0; $i < 200; $i++) {
        Bangunan::create([
            'alamat' => $faker->address(),
            'luas_kamar' => $faker->randomFloat(2, 0, 100),
            'jenis_kamar' => $faker->randomElement(['campuran', 'laki-laki', 'perempuan']),
            'is_full' => $faker->boolean(),
            'harga' => $faker->randomNumber(5, true),
        ]);
    }
    }
}
