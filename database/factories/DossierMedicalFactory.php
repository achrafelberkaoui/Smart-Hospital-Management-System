<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DossierMedical>
 */
class DossierMedicalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    return [
        'patient_id' => Patient::inRandomOrder()->first()->id,
        'service_id' => Service::inRandomOrder()->first()->id,
        'doctor_id' => User::where('role','doctor')->inRandomOrder()->first()?->id,
        'diagnostic' => fake()->sentence(),
        'traitement' => fake()->sentence(),
    ];
    }
}
