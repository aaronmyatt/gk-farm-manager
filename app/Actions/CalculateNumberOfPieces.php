<?php

namespace App\Actions;

use App\Events\LivestockSaved;
use App\Models\Livestock;
use Lorisleiva\Actions\Concerns\AsAction;

class CalculateNumberOfPieces
{
    use AsAction;

    public function handle(LivestockSaved $livestockSaved): Livestock
    {
        $livestock = $livestockSaved->livestock;

        if(is_null($livestock->mortality)){
            return $livestock;
        }

        $previousEntry = Livestock::where('updated_at', '<', $livestock->updated_at)
            ->where('tank_id', $livestock->tank_id)
            ->where('gender', $livestock->gender)
            ->latest('updated_at')
            ->limit(1)
            ->first();
        
        if($previousEntry){
            $livestock->number_of_pieces = $previousEntry->number_of_pieces - $livestock->mortality;
        }
        $livestock->saveQuietly();
        return $livestock;
    }
}
