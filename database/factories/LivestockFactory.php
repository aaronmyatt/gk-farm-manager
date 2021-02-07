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
        return [
            'created_by' => \App\Models\User::first(),
            'updated_by' => \App\Models\User::first(),
            'site_id' => \App\Models\Sites::first(),
            'tank_id' => \App\Models\Tanks::all()->random(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'body_weight_grams' => $this->faker->numberBetween(40, 50),
            'number_of_pieces' => $this->faker->numberBetween(150, 300),
        ];
    }
}
