<?php

namespace App\Http\Controllers;

use App\Http\Requests\DossierMedicalRequest;
use App\Models\DossierMedical;
use App\Models\Patient;

class DossierMedicalController extends Controller
{

    public function create($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        if ($patient->dossierMedical) {
            return redirect()->route('dossier.show', $patient->id);
        }

        return view('medical.create', compact('patient'));
    }

    public function store(DossierMedicalRequest $request)
    {
        $request->validated();
        DossierMedical::create([
        'patient_id' => $request->patient_id,
        'doctor_id' => auth()->id(),
        'diagnostic' => $request->diagnostic,
        'traitement' => $request->traitement
        ]);
        return back()->with('success', 'Dossier cree');
    }

    public function show($patientId)
    {
        $patient = Patient::with('dossierMedical')->findOrFail($patientId);
        return view('medical.show', compact('patient'));
    }

    public function edit($id)
    {
        $dossier = DossierMedical::findOrFail($id);
        return view('medical.edit', compact('dossier'));
    }

    public function update(DossierMedicalRequest $request, $id)
    {
        $dossier = DossierMedical::findOrFail($id);

        $dossier->update([
            'diagnostic' => $request->validated('diagnostic'),
            'traitement' => $request->validated('traitement'),
        ]);

        return back()->with('success', 'Mise a jour');
    }

}
