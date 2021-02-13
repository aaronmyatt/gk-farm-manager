<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $nopSequence = array_map(function($n){ return [ 'number_of_pieces' => $n ]; }, range(500,0,3));
        $nopSequence = array_map(function($nop, $n){ 
            return array_merge($nop ? $nop : [], [ 'updated_at' => Carbon::now()->subYear(2)->addWeek($n) ]); 
        }, $nopSequence, range(0, count($nopSequence)));
        \App\Models\Livestock::factory(100)
            ->sequence(...$nopSequence)
            ->create();
    }
}
