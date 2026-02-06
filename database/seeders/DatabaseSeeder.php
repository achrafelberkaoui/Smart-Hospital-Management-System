<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();
       User::create([
        'name' => 'achraf',
        'email' => 'achraf@gmail.com',
        'password' => Hash::make('achraf123'),
        'role' => 'admin',
        'date_naissance' => '2001\10\05'
       ]);
       User::create([
        'name' => 'hamza',
        'email' => 'hamza@gmail.com',
        'password' => Hash::make('hamza123'),
        'role' => 'medecin',
        'date_naissance' => '2001\10\05'
       ]);
       User::create([
        'name' => 'simo',
        'email' => 'simo@gmail.com',
        'password' => Hash::make('simo123'),
        'role' => 'infirmier',
        'date_naissance' => '2001\10\05'
       ]);
    }
}
