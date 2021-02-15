<?php

namespace App\Http\Livewire;

use App\Models\Livestock;
use App\Models\Tanks;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LivestockDatatable extends LivewireDatatable
{

    public $beforeTableSlot='components.datatables.table-stats';

    public function builder()
    {
        return Livestock::whereLessThanOneYearAgo();
    }

    public function columns()
    {
        return [
            Column::name('livestock.id')
                ->label('#ID'),
            DateColumn::name('created_at as month_group')
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

            Column::name('gender')
                ->label('Gender')
                ->filterable(['male', 'female']),

            NumberColumn::name('body_weight_grams')
                ->label('Body Weight (g)'),

            NumberColumn::name('number_of_pieces')
                ->label('Number of Pieces'),

            NumberColumn::name('mortality')
                ->label('Mortality'),

        ];
    }
}
