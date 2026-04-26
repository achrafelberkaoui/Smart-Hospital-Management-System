<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\DossierMedical;
use Exception;

class DossierMedicalService
{
    public function create(array $data)
    {
        if(!Appointment::where('patient_id', $data['patient_id'])->first())
            {
                throw new Exception("Aucun rendez-vous");
            };

        return DossierMedical::create([
        'patient_id' => $data['patient_id'],
        'doctor_id' => auth()->id(),
        'service_id' => auth()->user()->service_id,
        'diagnostic' => $data['diagnostic'],
        'traitement' => $data['traitement']
        ]);
    }

    public function update($dossier, array $data)
    {
        return $dossier->update([
            'diagnostic' => $data['diagnostic'],
             'traitement' => $data['traitement']
        ]);
    }
}