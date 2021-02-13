<?php

namespace App\Actions;

use App\Events\LivestockSaved;
use App\Models\Livestock;
use Lorisleiva\Actions\Concerns\AsAction;

class CalculateMortality
{
    use AsAction;

    public function handle(LivestockSaved $livestockSaved): void
    {
        $livestock = $livestockSaved->livestock;

        $previousEntry = Livestock::where('updated_at', '<', $livestock->updated_at)
            ->where('tank_id', $livestock->tank_id)
            ->where('gender', $livestock->gender)
            ->latest('updated_at')
            ->limit(1)
            ->first();
        
        if($previousEntry){
            $livestock->mortality = abs($previousEntry->number_of_pieces - $livestock->number_of_pieces);
        } else {
            $livestock->mortality = $livestock->number_of_pieces;
        }
        $livestock->saveQuietly();
    }
}
