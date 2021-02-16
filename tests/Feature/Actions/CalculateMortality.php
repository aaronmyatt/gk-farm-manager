<?php

namespace Tests\Feature\Actions;

use App\Models\Livestock;
use App\Events\LivestockSaved;
use App\Actions\CalculateMortality;
use App\Models\Tanks;
use App\Models\User;
use Illuminate\Support\Carbon;

use function PHPUnit\Framework\assertTrue;

it('sets mortality to zero if first record', function () {
    $this->actingAs(User::factory()->create());

    $livestock = Livestock::factory([
        'gender' => 'female',
        'tank_id' => Tanks::all()->last()->id,
        'created_at' => Carbon::now()->subDays(1),
        'updated_at' => Carbon::now()->subDays(1)
    ])->make();
    $livestock->saveQuietly();

    $event = new LivestockSaved($livestock);
    $action = new CalculateMortality();
    $livestock = $action->handle($event);

    assertTrue($livestock->mortality === 0);
});

it('sets mortality to a negative number when number_of_pieces increases', function () {
    $this->actingAs(User::factory()->create());

    Livestock::factory([
        'gender' => 'female',
        'tank_id' => Tanks::all()->last()->id,
        'created_at' => Carbon::now()->subDays(1),
        'updated_at' => Carbon::now()->subDays(1)
    ])->create();

    $livestock = Livestock::factory([
        'gender' => 'female',
        'tank_id' => Tanks::all()->last()->id,
        'number_of_pieces' => 600,
    ])->make();

    $livestock->saveQuietly();

    $event = new LivestockSaved($livestock);
    $action = new CalculateMortality();
    $livestock = $action->handle($event);
    assertTrue($livestock->mortality === -100);
});

it('sets mortality based on previous entry', function () {
    $this->actingAs(User::factory()->create());

    Livestock::factory([
        'gender' => 'female',
        'tank_id' => Tanks::all()->last()->id,
        'created_at' => Carbon::now()->subDays(1),
        'updated_at' => Carbon::now()->subDays(1)
    ])->create();

    $livestock = Livestock::factory([
        'gender' => 'female',
        'tank_id' => Tanks::all()->last()->id,
        'number_of_pieces' => '400'
    ])->make();
    $livestock->saveQuietly();

    $event = new LivestockSaved($livestock);
    $action = new CalculateMortality();
    $livestock = $action->handle($event);
    assertTrue($livestock->mortality === 100);
});

it('bails early when number of pieces not set', function () {
    $this->actingAs(User::factory()->create());

    $livestock = Livestock::factory([
        'number_of_pieces' => null,
    ])->make();
    $livestock->saveQuietly();

    $event = new LivestockSaved($livestock);
    $action = new CalculateMortality();
    $livestock = $action->handle($event);

    assertTrue($livestock->mortality === null);
});

it('bails early when number of pieces AND mortality set', function () {
    $this->actingAs(User::factory()->create());

    Livestock::factory([
        'gender' => 'female',
        'tank_id' => Tanks::all()->last()->id,
        'created_at' => Carbon::now()->subDays(1),
        'updated_at' => Carbon::now()->subDays(1)
    ])->create();

    $livestock = Livestock::factory([
        'number_of_pieces' => 123,
        'mortality' => 3,
    ])->make();
    $livestock->save();

    $event = new LivestockSaved($livestock);
    $action = new CalculateMortality();
    $livestock = $action->handle($event);

    $this->assertEquals($livestock->mortality, 3);
});
