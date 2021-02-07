<?php

namespace Database\Factories;

use App\Models\Measurements;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeasurementsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Measurements::class;

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
            'ph' => $this->faker->randomFloat(NULL, 6, 9),
            'alkalinity' => $this->faker->numberBetween(60,120),
            'nh3' => $this->faker->randomFloat(NULL, 0,1),
            'no2' => $this->faker->randomFloat(NULL, 0,1),
            'no3' => $this->faker->numberBetween(0,160),
            'fe' => $this->faker->randomFloat(NULL, 0, 0.10),
            'temperature' => $this->faker->numberBetween(20,30),
            'salinity' => $this->faker->numberBetween(2,6),
            'remark' => $this->faker->paragraph(3, true)
        ];
    }
}
