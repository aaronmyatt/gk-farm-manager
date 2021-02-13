<?php

namespace App\Models;

use App\Events\LivestockSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Livestock extends Model
{
    use HasFactory;

    protected $table = 'livestock';

    protected $dispatchesEvents = [
        'saved' => LivestockSaved::class
    ];

    protected $attributes = [
        'gender' => 'female'
    ];

    public function tank()
    {
        return $this->belongsTo(Tanks::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
