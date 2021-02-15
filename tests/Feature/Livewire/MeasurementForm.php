<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Measurements\Form;
use App\Models\Measurements;
use App\Models\User;
use Livewire\Livewire;

it('has measurementform page', function () {
    $this->actingAs(User::factory()->create());

    Livewire::test(Form::class)
        ->set('measurement.site_id', 1)
        ->set('measurement.tank_id', 1)
        ->set('measurement.ph', 15)
        ->call('save')
        ->assertHasErrors('measurement.ph');
});

it('redirects to Measurement page', function () {
    
    $this->actingAs(User::factory()->create());

    Livewire::test(Form::class)
        ->set('measurement.site_id', 1)
        ->set('measurement.tank_id', 1)
        ->set('measurement.ph', 7)
        ->set('measurement.alkalinity', 15)
        ->set('measurement.nh3', 15)
        ->set('measurement.no2', 15)
        ->set('measurement.no3', 15)
        ->set('measurement.fe', 15)
        ->set('measurement.salinity', 15)
        ->set('measurement.temperature', 15)
        ->set('measurement.remark', "all good")
        ->call('save')
        ->assertRedirect();
});

it('saves one new measurements row', function () {
    $this->actingAs(User::factory()->create());
    $count = Measurements::count();

    Livewire::test(Form::class)
        ->set('measurement.site_id', 1)
        ->set('measurement.tank_id', 1)
        ->set('measurement.ph', 7)
        ->set('measurement.alkalinity', 15)
        ->set('measurement.nh3', 15)
        ->set('measurement.no2', 15)
        ->set('measurement.no3', 15)
        ->set('measurement.fe', 15)
        ->set('measurement.salinity', 15)
        ->set('measurement.temperature', 15)
        ->set('measurement.remark', "all good")
        ->call('save');

    Ray(Measurements::count())->red();
    $this->assertTrue(Measurements::count() === ($count + 1));
});