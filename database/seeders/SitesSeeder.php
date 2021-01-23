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
        $sites = \App\Models\Sites::factory(2)->create();
        $parent = $sites->first();
        $parent_name = $parent->name;

        \App\Models\Sites::factory(1)->create([
            'name' =>  "$parent_name Building One",
            'parent_id' => $parent->id
        ]);
    }
}
