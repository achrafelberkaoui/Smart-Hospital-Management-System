<?php

namespace App\Services;

use App\Http\Requests\DossierMedicalRequest;
use App\Models\DossierMedical;

class DossierMedicalService
{
    public function create(DossierMedicalRequest $request)
    {
        return DossierMedical::create([
        'patient_id' => $request['patient_id'],
        'doctor_id' => auth()->id(),
        'service_id' => auth()->user()->service_id,
        'diagnostic' => $request['diagnostic'],
        'traitement' => $request['traitement']
        ]);
    }

    public function update($dossier, DossierMedicalRequest $request)
    {
        return $dossier->update([
            'diagnostic' => $request['diagnostic'],
             'traitement' => $request['traitement']
        ]);
    }
}