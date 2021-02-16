<?php

namespace Tests\Feature\Actions;

use App\Models\Livestock;
use App\Events\LivestockSaved;
use App\Actions\CalculateNumberOfPieces;
use App\Models\Tanks;
use App\Models\User;
use Illuminate\Support\Carbon;

use function PHPUnit\Framework\assertTrue;

it('sets NoPieces based on previous entry', function () {
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
        'number_of_pieces' => null,
        'mortality' => 10,
    ])->make();
    $livestock->saveQuietly();

    $event = new LivestockSaved($livestock);
    $action = new CalculateNumberOfPieces();
    $livestock = $action->handle($event);
    $this->assertEquals($livestock->number_of_pieces, 490);
});

it('bails early when mortality not set', function () {
    $this->actingAs(User::factory()->create());

    $livestock = Livestock::factory()->make();
    $livestock->saveQuietly();

    $event = new LivestockSaved($livestock);
    $action = new CalculateNumberOfPieces();
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
    $action = new CalculateNumberOfPieces();
    $livestock = $action->handle($event);

    $this->assertEquals($livestock->number_of_pieces, 123);
});