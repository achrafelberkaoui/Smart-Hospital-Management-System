<?php

namespace App\Services;

use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentService{
    public function createAppointment($data)
    {

        $requestStart = Carbon::parse($data['time']);
        $requestEnd = $requestStart->copy()->addHour();
        $appointments = Appointment::where('doctor_id', $data['doctor_id'])->where('date', $data['date'])->get();
        
        foreach ($appointments as $a) {
            $apptStart = Carbon::parse($a->time);
            $apptEnd = $apptStart->copy()->addHour();
        
            if ($requestStart->between($apptStart, $apptEnd) || $requestEnd->between($apptStart, $apptEnd) || $apptStart->between($requestStart, $requestEnd)) {
                throw new \Exception('Doctor already has appointment!');
            }
        }

        return Appointment::create([
            'patient_id' => $data['patient_id'],
            'doctor_id' => $data['doctor_id'],
            'service_id' => $data['service_id'] ?? null,
            'date' => $data['date'],
            'time' => $data['time'],
            'status' => 'pending',
            'notes' => $data['notes'] ?? null,
            'created_by' => auth()->id(),
        ]);
    }

    public function UpdateAppointment(Appointment $appointment, $data)
    {
        $exists = Appointment::where('doctor_id', $data['doctor_id'])->where('date', $data['date'])->where('time', $data['time'])
        ->where('id', '!=', $appointment->id)->exists();

        if ($exists) {
            throw new \Exception('Doctor already busy!');
        }

        $appointment->update($data);
    }
}