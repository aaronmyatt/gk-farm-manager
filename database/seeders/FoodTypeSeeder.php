<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FoodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\FoodType::factory(1)->create([
            'name' =>  "Fish",
        ]);
        \App\Models\FoodType::factory(1)->create([
            'name' =>  "Corn",
        ]);
        \App\Models\FoodType::factory(1)->create([
            'name' =>  "Bloodworm Cubes",
            "pieces" => true,
            "per_piece" => 4.1
        ]);
    }
}
