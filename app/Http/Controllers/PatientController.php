<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function index()
    {
        $patients = Patient::all();
        return view('patients.index',compact('patients'));
    }


    public function create()
    {
        return view('patients.create');
    }


    public function store(PatientRequest $request)
    {
        Patient::create($request->validated());
        return redirect()->route('patients.index')->with('success', 'Patient ajoute avec succes');
    }

    public function show(Patient $patient)
    {
        
    }


    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }


    public function update(Request $request, Patient $patient)
    {
        $patient->update($request->validated());
        return redirect()->route('patients.index')->with('success', 'Patient Modifier avec succes');
    }


    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient supprime avec succes');
    }
}
