<?php

namespace Database\Factories;

use App\Models\Livestock;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivestockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Livestock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tank = \App\Models\Sites::first()->tanks->first();
        return [
            'created_by' => \App\Models\User::first(),
            'updated_by' => \App\Models\User::first(),
            'tank_id' => $tank,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'body_weight_grams' => $this->faker->numberBetween(40, 50),
            'number_of_pieces' => 500,
        ];
    }
}
