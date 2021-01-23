<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site = \App\Models\Sites::factory(2)->create();
        \App\Models\Sites::factory(1)->create([
            'parent_id' => $site->first()->id
        ]);
    }
}
