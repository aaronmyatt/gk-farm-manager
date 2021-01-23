<?php

namespace Database\Factories;

use App\Models\Tanks;
use Illuminate\Database\Eloquent\Factories\Factory;

class TanksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tanks::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->buildingNumber(),
            'created_by' => \App\Models\User::first(),
            'updated_by' => \App\Models\User::first(),
            'site_id' => \App\Models\Sites::first(),
        ];
    }
}
