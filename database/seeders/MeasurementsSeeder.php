<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MeasurementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Measurements::factory(100)->create();
    }
}
