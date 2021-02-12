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
        $nopSequence = array_map(function($n){ return [ 'number_of_pieces' => $n ]; } ,range(500,0,3));
        \App\Models\Livestock::factory(100)
            ->sequence(...$nopSequence)
            ->create();
    }
}
