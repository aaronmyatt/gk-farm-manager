<?php

use App\Http\Livewire\Measurements\Form;
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
