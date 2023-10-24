<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $options = ['income', 'expense'];

        // Buat 25 artikel dummy
        for ($i = 0; $i < 25; $i++) {
            $id = $faker->unique()->numberBetween(1, 100);

            $amout = rand(100000, 100000000);

            $type = $options[rand(0, 1)];

            $category = 'uncategorized';
            $notes = $faker->paragraph(20);

            $created_at = $faker->dateTimeBetween('-3 months', 'now');

            DB::table('transaction')->insert([
                'id' => $id,
                'amout' => $amout,
                'type' => $type,
                'category' => $category,
                'notes' => $notes,
                'created_at' => $created_at,
                'updated_at' => $created_at,
            ]);
        }
    }
}
