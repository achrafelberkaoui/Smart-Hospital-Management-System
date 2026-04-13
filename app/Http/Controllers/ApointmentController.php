<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Http\Requests\UpadteAppointmentRequest;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use App\services\AppointmentService;
use Carbon\Carbon;

class ApointmentController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        if($user->role === 'doctor'){
            $appointments = Appointment::where('doctor_id', $user->id)->get();
        }
        $appointments = Appointment::with(['patient', 'doctor', 'service'])->latest()->paginate(10);
        return view('appointment.index', compact('appointments'));
    }

public function create()
{
    $patients = Patient::all();
    $doctors = User::where('role', 'doctor')->get();
    $services = Service::all();

    $startTime = Carbon::createFromTime(9, 0);
    $endTime = Carbon::createFromTime(17, 0);
    $slots = [];
    while($startTime->lt($endTime)){
        $slots[] = $startTime->format('H:i');
        $startTime->addHour();
    }

    return view('appointment.create', compact('patients', 'doctors', 'services', 'slots'));
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

    $startTime = Carbon::createFromTime(9, 0);
    $endTime = Carbon::createFromTime(17, 0);
    $slots = [];
    while($startTime->lt($endTime)){
        $slots[] = $startTime->format('H:i');
        $startTime->addHour();
    }

    $taken = Appointment::where('doctor_id', $appointment->doctor_id)
        ->where('date', $appointment->date)
        ->where('id', '!=', $appointment->id)
        ->pluck('time')
        ->toArray();

    return view('appointment.edit', compact('appointment', 'patients', 'doctors', 'services', 'slots', 'taken'));
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
