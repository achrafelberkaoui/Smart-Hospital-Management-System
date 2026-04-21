<?php

namespace Database\Factories;

use App\Models\DossierMedical;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Observation>
 */
class ObservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    return [
        'dossier_medical_id' =>DossierMedical::inRandomOrder()->first()->id,
        'user_id' =>User::inRandomOrder()->first()->id,
        'note' => fake()->paragraph(),
    ];
    }
}
