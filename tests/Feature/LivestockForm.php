<?php

use App\Http\Livewire\Livestock\Form;
use App\Models\Livestock;
use App\Models\User;
use Livewire\Livewire;

it('redirects to livestock page', function () {
    
    $this->actingAs(User::factory()->create());

    Livewire::test(Form::class)
        ->set('livestock.site_id', 1)
        ->set('livestock.tank_id', 1)
        ->set('livestock.body_weight_grams', 15)
        ->set('livestock.number_of_pieces', 15)
        ->set('livestock.gender', 'male')
        ->call('save')
        ->assertRedirect();
});

it('saves one new livestock row', function () {
    $this->actingAs(User::factory()->create());
    $count = Livestock::count();

    Livewire::test(Form::class)
        ->set('livestock.site_id', 1)
        ->set('livestock.tank_id', 1)
        ->set('livestock.body_weight_grams', 15)
        ->set('livestock.number_of_pieces', 15)
        ->set('livestock.gender', 'male')
        ->call('save');

    Ray(Livestock::count())->red();
    $this->assertTrue(Livestock::count() === ($count + 1));
});
