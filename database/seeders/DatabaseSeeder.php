<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\DossierMedical;
use App\Models\Observation;
use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    
    $this->call([
        ServiceSeeder::class,
    ]);
        // User::factory(10)->create();
       User::create([
        'name' => 'achraf',
        'email' => 'achraf@gmail.com',
        'password' => Hash::make('achraf123'),
        'role' => 'admin',
        'date_naissance' => '2001\10\05',
        'service_id' => 1
       ]);
       User::create([
        'name' => 'hamza',
        'email' => 'hamza@gmail.com',
        'password' => Hash::make('hamza123'),
        'role' => 'doctor',
        'date_naissance' => '2001\10\05',
        'service_id' => 3
       ]);
       User::create([
        'name' => 'simo',
        'email' => 'simo@gmail.com',
        'password' => Hash::make('simo123'),
        'role' => 'reception',
        'date_naissance' => '2001\10\05',
        'service_id' => 3
       ]);
       User::create([
        'name' => 'rajae',
        'email' => 'rajae@gmail.com',
        'password' => Hash::make('rajae123'),
        'role' => 'infirmier',
        'date_naissance' => '2001\10\05',
        'service_id' => 3
       ]);
    // Service::factory(5)->create();
    // User::factory(10)->create();
    // Patient::factory(20)->create();
    // foreach (Patient::all() as $patient) {
    //         DossierMedical::factory()->create([
    //             'patient_id' => $patient->id,
    //         ]);
    //     }
    // Observation::factory(30)->create();
    // Appointment::factory(25)->create();
    }

}
