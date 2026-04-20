<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
   public function index()
{
    $user = auth()->user();

    if ($user->role === 'admin') {
        return view('admin.dashboard', [
            'patients' => Patient::count(),
            'doctors' => User::where('role','doctor')->count(),
            'services' => Service::count(),
            'appointments' => 0,
            'users' => User::count()
        ]);
    }

    if ($user->role === 'doctor') {
        return view('appointment.dashboard', [
        'total' => Appointment::where('doctor_id', $user->id)->count(),
        'pending' => Appointment::where('doctor_id', $user->id)->where('status','pending')->count(),
        'confirmed' => Appointment::where('doctor_id', $user->id)->where('status','confirmed')->count(),
        'today' => Appointment::where('doctor_id', $user->id)->whereDate('date', Carbon::today())->count(),

        'appointments' => Appointment::where('doctor_id', $user->id)->latest()->take(5)->get()

        ]);
    }

    if ($user->role === 'reception') {
        return view('appointment.dashboard', [
        'total' => Appointment::count(),
        'pending' => Appointment::where('status','pending')->count(),
        'confirmed' => Appointment::where('status','confirmed')->count(),
        'today' => Appointment::whereDate('date', Carbon::today())->count(),

        'appointments' => Appointment::latest()->take(5)->get()
        ]);
    }

    if ($user->role === 'infirmier') {
        $patients = Patient::whereHas('dossierMedical')->latest()->get();
    return view('infirmier.dashboard',compact('patients'));
    }
}
}
