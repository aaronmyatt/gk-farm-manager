<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanks extends Model
{
    use HasFactory;

    public function site()
    {
        return $this->belongsTo(Sites::class);
    }

    public function measurements()
    {
        return $this->hasMany(Measurements::class, 'tank_id');
    }

    public function livestock()
    {
        return $this->hasMany(Livestock::class, 'tank_id');
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
