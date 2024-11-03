<?php

namespace Database\Factories;

use App\Models\Building;
use App\Models\City;
use App\Models\Street;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Building>
 */
class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => 1,
            'number' => fake()->buildingNumber(),
            'street' => fake()->streetName(),
            'postcode' => fake()->postcode(),
            'city_id' => City::factory(),
        ];
    }
}
