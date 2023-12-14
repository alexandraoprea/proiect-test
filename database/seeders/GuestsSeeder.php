<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            \DB::table('guests')->insert([
                'invitation_id' => $i,
                'name' => 'Guest ' . $i,
                'confirmation' => "Da",
                'adults_number' => rand(1, 3),
                'kids_number' => rand(0, 2),
                'image1' => '/images/catel.jpg',
                'need_accommodation' => rand(0, 1) == 1,
            ]);
        }
    }
}
