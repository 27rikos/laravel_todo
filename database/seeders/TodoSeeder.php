<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) { // Membuat 20 data todo
            Todo::create([
                'todo' => $faker->sentence, // Teks acak untuk todo
                'is_complete' => $faker->boolean(50), // Nilai acak true/false dengan probabilitas 50%
            ]);
        }
    }
}