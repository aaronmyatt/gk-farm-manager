<?php

namespace App\Actions;

use App\Events\LivestockSaved;
use App\Models\Livestock;
use Lorisleiva\Actions\Concerns\AsAction;

class CalculateMortality
{
    use AsAction;

    public function handle(LivestockSaved $livestockSaved): Livestock
    {
        $livestock = $livestockSaved->livestock;

        // We can't calculate mortality with comparing number_of_pieces
        if(is_null($livestock->number_of_pieces)){
            return $livestock;
        }

        // Don't override existing values if they are already calculated
        if($livestock->number_of_pieces > 0 && $livestock->mortality > 0){
            return $livestock;
        }

        $previousEntry = Livestock::where('recorded_at', '<', $livestock->recorded_at)
            ->where('tank_id', $livestock->tank_id)
            ->where('gender', $livestock->gender)
            ->latest('recorded_at')
            ->limit(1)
            ->first();
        
        if($previousEntry){
            $livestock->mortality = $previousEntry->number_of_pieces - $livestock->number_of_pieces;
        } else {
            $livestock->mortality = 0;
        }
        $livestock->saveQuietly();
        return $livestock;
    }
}
