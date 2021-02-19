<?php

namespace Tests\Feature\Livewire;

use App\Events\LivestockSaved;
use App\Http\Livewire\Livestock\Form;
use App\Models\Livestock;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Event;
use Livewire\Livewire;

it('redirects to livestock page', function () {
    
    Event::fake();
    $this->actingAs(User::factory()->create());

    Livewire::test(Form::class)
        ->set('livestock.tank_id', 1)
        ->set('livestock.body_weight_grams', 15)
        ->set('livestock.number_of_pieces', 15)
        ->set('livestock.gender', 'male')
        ->call('save')
        ->assertRedirect();
        
    Event::assertDispatched(LivestockSaved::class);
});

it('saves one new livestock row', function () {
    Event::fake();
    $this->actingAs(User::factory()->create());
    $count = Livestock::count();

    Livewire::test(Form::class)
        ->set('livestock.tank_id', 1)
        ->set('livestock.body_weight_grams', 15)
        ->set('livestock.number_of_pieces', 15)
        ->set('livestock.gender', 'male')
        ->call('save');

    Ray(Livestock::count())->red();
    $this->assertTrue(Livestock::count() === ($count + 1));
    Event::assertDispatched(LivestockSaved::class);
});

it('sets recorded_at date to today', function () {
    Event::fake();
    $this->actingAs(User::factory()->create());

    Livewire::test(Form::class)
        ->set('livestock.tank_id', 1)
        ->set('livestock.body_weight_grams', 15)
        ->set('livestock.number_of_pieces', 15)
        ->set('livestock.gender', 'male')
        ->call('save');

    $this->assertEquals(Livestock::first()->recorded_at, Carbon::today());
    Event::assertDispatched(LivestockSaved::class);
});