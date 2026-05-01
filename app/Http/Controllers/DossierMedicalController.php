<?php

namespace App\Http\Controllers;

use App\Http\Requests\DossierMedicalRequest;
use App\Models\Appointment;
use App\Models\DossierMedical;
use App\Models\Patient;
use App\Services\DossierMedicalService;
use App\Services\LogService;

class DossierMedicalController extends Controller
{
    public function __construct(private DossierMedicalService $dossierServ)
    {
    }

    public function create(int $patientId)
    {
        if(auth()->user()->role !== 'doctor'){
            abort(403);
        }
        $patient = Patient::with(['dossiersMedicaux.doctor','dossiersMedicaux.service','dossiersMedicaux.observations.user'])
        ->findOrFail($patientId);
        return view('medical.create', compact('patient'));
    }

    public function store(DossierMedicalRequest $request)
    {
        if(auth()->user()->role !== 'doctor'){
            abort(403);
        }
        try {
            $dossier = $this->dossierServ->create($request->validated());
            Appointment::where('patient_id', $request->patient_id)->update(
                [
                    'status'=>'Completed'
                ]
            );
            LogService::record('create', 'Created dossier Name '.$dossier->name);
            return back()->with('success', 'Dossier cree');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

    }

    public function show(int $patientId)
    {
        $patient = Patient::with('dossiersMedicaux.service')->findOrFail($patientId);   
        return view('medical.show', compact('patient'));
    }

    public function edit(int $id)
    {
        $dossier = DossierMedical::where('service_id', auth()->user()->service_id)->findOrFail($id);
        return view('medical.edit', compact('dossier'));
    }

    public function update(DossierMedicalRequest $request, int $id)
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
