<?php

namespace Database\Factories;

use App\Models\Family;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'middle_names' => $this->getMiddleNames(),
            'family_id' => Family::factory(),
            'project_id' => Project::factory(),
        ];
    }

    private function getMiddleNames(): array {
        $random_count = random_int(0, 3);
        $names = [];

        for ($i = 0; $i < $random_count; $i++) {
            $names[] = $this->faker->name();
        }

        return $names;
    }
}
