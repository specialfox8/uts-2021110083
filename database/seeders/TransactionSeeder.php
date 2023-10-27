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



        // Buat 25 artikel dummy
        for ($i = 0; $i <= 100; $i++) {

            $amout = $faker->randomFloat(2, 0, 1000);
            $type = $faker->randomElement(['income', 'expense']);
            $category = $faker->randomElement(['wage', 'bonus', 'gift', 'food & drinks', 'shopping', 'charity', 'housing', 'insurance', 'taxes', 'transportation']);
            $notes = $faker->paragraph(20);
            $created_at = $faker->dateTimeBetween('-3 months', 'now');

            DB::table('transaction')->insert([

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
