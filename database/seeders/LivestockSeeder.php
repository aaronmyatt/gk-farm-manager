<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LivestockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Livestock::factory(100)->create();
    }
}
