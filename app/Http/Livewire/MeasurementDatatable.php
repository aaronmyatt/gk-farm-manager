<?php

namespace App\Http\Livewire;

use App\Models\Measurements;
use App\Models\Tanks;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class MeasurementDatatable extends LivewireDatatable
{

    public function builder()
    {
        return Measurements::whereLessThanOneYearAgo();
    }

    public function columns()
    {
        return [
            DateColumn::name('measurements.recorded_at')
                ->format('F')
                ->label('Month')
                ->filterable(array(
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
                ), 'whereMonth'),

            Column::name('tank.name')
                ->label('Tank')
                ->filterable(Tanks::pluck('name')),

            Column::scope('selectRowAsJson', 'json_row')->view('components.stat-grid'),

            Column::callback(['id'], function ($id) {
                return view('components.datatable.measurement-actions', ['id' => $id]);
            }),

        ];
    }
}
