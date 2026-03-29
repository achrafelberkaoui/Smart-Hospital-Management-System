<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{

    public function run(): void
    {
        $services = [
        "SAA service d'accueil et d'admission",
        'Service ORL (Oto-Rhino-Laryngologie)',
        "Service d'urgences",
        'Service de maternité',
        'Service de pédiatrie',
        'Service de réanimation',
        'Service de bloc opératoire',
        'Service de traumatologie',
        'Service de psychiatrie',
        "Service d'ophtalmologie",
    ];

    foreach($services as $service){
        Service::create([
            'name'=>$service
        ]);
    }
    }
}
