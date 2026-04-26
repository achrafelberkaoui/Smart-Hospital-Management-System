<?php

namespace App\Services;
use App\Models\Observation;

class ObservationService
{
    public function create(array $data): Observation
    {
        return Observation::create([
        'dossier_medical_id' => $data['dossier_medical_id'],
        'user_id'=> auth()->id(),
        'type'=> $data['type']?? null,
        'value'=> $data['value']?? null,
        'note'=> $data['note'] ?? null,
        ]);
    }
}