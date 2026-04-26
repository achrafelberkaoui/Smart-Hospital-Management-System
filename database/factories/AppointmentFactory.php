<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
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
        'doctor_id' => User::where('role','doctor')->inRandomOrder()->first()?->id,
        'service_id' => Service::inRandomOrder()->first()->id,
        'date' => fake()->date(),
        'time' => fake()->time('H:i'),
        'status' => fake()->randomElement(['pending','confirmed','cancelled']),
    ];
    }
}
