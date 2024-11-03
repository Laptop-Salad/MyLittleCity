<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\City;
use App\Models\Family;
use App\Models\Person;
use App\Models\PersonAddress;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $project = Project::factory()->create(['user_id' => $user->id]);
        $cities = City::factory()->count(100)->create([
            'project_id' => $project->id,
            'user_id' => $user->id,
        ]);

        foreach ($cities as $city) {
            for ($y = 0; $y < rand(5, 100); $y++) {
                $street = fake()->streetName;
                $postcode = fake()->postcode;

                // how many buildings on this street
                $buildings_on_street = random_int(3, 20);

                for ($x = 0; $x < $buildings_on_street; $x++) {
                    // how many people are living at this address
                    $people_at_address = random_int(0, 5);

                    // are they in the same family (0 - 4 (yes), 5 - 6 no)
                    $same_family = random_int(0, 6);

                    $family = null;

                    $building = Building::factory()->create([
                        'city_id' => $city->id,
                    ]);

                    if ($same_family >= 0 && $same_family < 4) {
                        $family = Family::factory()->create();
                    }

                    for ($pa = 0; $pa < $people_at_address; $pa++) {
                        if (!$family) {
                            $person = Person::factory()->create([
                                'family_id' => Family::factory()->create()->id,
                            ]);
                        } else {
                            $person = Person::factory()->create([
                                'family_id' => $family->id,
                            ]);
                        }

                        PersonAddress::create([
                            'person_id' => $person->id,
                            'addressable_id' => $building->id,
                            'addressable_type' => Building::class,
                        ]);
                    }
                }
            }
        }
    }
}
