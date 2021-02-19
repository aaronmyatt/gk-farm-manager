<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Measurements extends Model
{
    use HasFactory;

    protected $fillable = [
        'ph',
        'alkalinity',
        'nh3',
        'no2',
        'no3',
        'fe',
        'salinity',
        'temperature',
        'remark'
    ];

    protected $casts = [
        'recorded_at' => 'date:Y-m-d',
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

    public function scopeWhereLessThanOneYearAgo($query){
        return $query->where('measurements.created_at', '>', Carbon::today()->subYears(1));
    }

    public function scopeExtractMonthFrom($query, $column='measurements.recorded_at', $as='month'){
        // Stolen from:
        // https://database.guide/get-the-month-name-from-a-date-in-postgresql/#:~:text=You%20can%20get%20the%20month,pattern%20you%20provide%20as%20arguments.
        return $query->addSelect(DB::raw("TO_CHAR($column, 'month') AS $as"));
    }

    public function scopeWhereMonth($query, $month){

        $months = array(
            'january',
            'february',
            'march',
            'april',
            'may',
            'june',
            'july',
            'august',
            'september',
            'october',
            'november',
            'december'
          );
          $index = array_search($month, $months);
          if($index === 0 || $index >= 1){
            $monthIndex = $index + 1;
            return $query->whereRaw("EXTRACT(month from measurements.recorded_at) = $monthIndex");
          }
    }
}
