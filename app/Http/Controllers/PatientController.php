<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use App\Services\LogService;

class PatientController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        // if($user->role === 'reception'){
            $patients = Patient::latest()->paginate(10);
            return view('patients.index',compact('patients'));
    //     }else{
    // $patients = Patient::whereHas('dossierMedical', function($q) use ($user) {
    //     $q->where('service_id', $user->service_id);
    // })->with('dossierMedical.service')->paginate(10);        
    // return view('patients.index',compact('patients'));
    // }
    }


    public function create()
    {
        return view('patients.create');
    }


    public function store(PatientRequest $request)
    {
        $patient = Patient::create($request->validated());
        LogService::record('create', 'Created Patient Name '.$patient->name);
        return redirect()->route('patients.index')->with('success', 'Patient ajoute avec succes');
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }


    public function update(PatientRequest $request, Patient $patient)
    {
        $patient->update($request->validated());
        LogService::record('update', 'Update Patient Name '.$patient->name);
        return redirect()->route('patients.index')->with('success', 'Patient Modifier avec succes');
    }


    public function destroy(Patient $patient)
    {
        $patient->delete();
        LogService::record('delete', 'Delete patient Name '.$patient->name);
        return redirect()->route('patients.index')->with('success', 'Patient supprime avec succes');
    }
}
