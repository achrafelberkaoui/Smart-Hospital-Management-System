<?php

namespace App\Http\Controllers;

use App\Http\Requests\DossierMedicalRequest;
use App\Models\DossierMedical;
use App\Models\Patient;
use App\Services\DossierMedicalService;
use App\Services\LogService;

class DossierMedicalController extends Controller
{
    public function __construct(private DossierMedicalService $dossierServ)
    {
    }

    public function create($patientId)
    {
        if(auth()->user()->role !== 'doctor'){
            abort(403);
        }
        $patient = Patient::findOrFail($patientId);
        if ($patient->dossierMedical) {
            return redirect()->route('dossier.show', $patient->id);
        }
        return view('medical.create', compact('patient'));
    }

    public function store(DossierMedicalRequest $request)
    {
        if(auth()->user()->role !== 'doctor'){
            abort(403);
        }
        $dossier = $this->dossierServ->create($request->validated());
        LogService::record('create', 'Created dossier Name '.$dossier->name);
        return back()->with('success', 'Dossier cree');
    }

    public function show($patientId)
    {
    $patient = Patient::with('dossierMedical.service')->findOrFail($patientId);
    return view('medical.show', compact('patient'));
    }

    public function edit($id)
    {
        $dossier = DossierMedical::where('service_id', auth()->user()->service_id)->findOrFail($id);
        return view('medical.edit', compact('dossier'));
    }

    public function update(DossierMedicalRequest $request, $id)
    {
        if(auth()->user()->role !== 'doctor'){
            abort(403);
        }
        $dossier = DossierMedical::where('service_id', auth()->user()->service_id)->findOrFail($id);

    $this->dossierServ->update($dossier, $request->validated());
     LogService::record('update', 'Update dossier Name '.$dossier->name);
        return back()->with('success', 'Mise a jour');
    }

}
