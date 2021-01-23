<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tanks::factory(10)->create();
    }
}
