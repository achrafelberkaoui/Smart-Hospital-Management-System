<?php

namespace App\Http\Controllers;

use App\Http\Requests\DossierMedicalRequest;
use App\Models\DossierMedical;
use App\Models\Patient;
use App\Services\DossierMedicalService;

class DossierMedicalController extends Controller
{
    public function __construct(private DossierMedicalService $dossierServ)
    {
    }

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
        $this->dossierServ->create($request->validated());
        return back()->with('success', 'Dossier cree');
    }

    public function show($patientId)
    {
        $user = auth()->user();
        $patient = Patient::whereHas('dossierMedical', function($q) use ($user)
        {
            $q->where('service_id', $user->service_id);
        })
        ->with('dossierMedical')
        ->findOrFail($patientId);
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

    $this->dossierServ->update($dossier, $request->validated());
        return back()->with('success', 'Mise a jour');
    }

}
