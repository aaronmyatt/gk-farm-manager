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

        // Don't override existing values if they are already calculated
        if($livestock->number_of_pieces > 0 && $livestock->mortality > 0){
            return $livestock;
        }

        $previousEntry = Livestock::where('created_at', '<', $livestock->created_at)
            ->where('tank_id', $livestock->tank_id)
            ->where('gender', $livestock->gender)
            ->latest('created_at')
            ->limit(1)
            ->first();
        
        if($previousEntry){
            $livestock->number_of_pieces = $previousEntry->number_of_pieces - $livestock->mortality;
        }
        $livestock->saveQuietly();
        return $livestock;
    }
}
