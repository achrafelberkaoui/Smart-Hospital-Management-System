<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Http\Requests\UpadteAppointmentRequest;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use App\services\AppointmentService;

class ApointmentController extends Controller
{

    public function index()
    {
        $appointments = Appointment::with(['patient', 'doctor', 'service'])->latest()->paginate(10);
        return view('appointment.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = User::where('role', 'doctor')->get();
        $services = Service::all();
        return view('appointment.create', compact('patients', 'services', 'doctors'));
    }

    public function store(AppointmentRequest $request, AppointmentService $service)
    {
        try {
            $service->createAppointment($request->validated());
            return redirect()->route('appointments.index')->with('success', 'Apointment created');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function edit(Appointment $appointment)
    {
        $patients = Patient::all();
        $doctors = User::where('role', 'doctor')->get();
        $services = Service::all();

        return view('appointment.edit', compact('appointment','patients','doctors','services'));
    }

    public function update(UpadteAppointmentRequest $request, Appointment $appointment, AppointmentService $service)
    {
        try {
            $service->UpdateAppointment($appointment, $request->validated());
                return redirect()->route('appointments.index')->with('success', 'Updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->update(
            ['status' => 'cancelled']
        );
        return back()->with('success', 'Deleted');
    }
    
}
