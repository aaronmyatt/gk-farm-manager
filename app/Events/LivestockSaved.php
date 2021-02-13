<?php

namespace App\Events;

use App\Models\Livestock;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LivestockSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Livestock $livestock;

    public function __construct(Livestock $livestock)
    {
        $this->livestock = $livestock;
    }
}
