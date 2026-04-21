<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpadteAppointmentRequest extends FormRequest
{

    public function authorize(): bool
    {
       return in_array(auth()->user()->role, ['doctor', 'reception']);    
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:users,id',
            'service_id' => 'nullable|exists:services,id',
            'date' => 'required|date',
            'time' => 'required',
            'status' => 'required|in:pending,confirmed,cancelled,completed',
        ];
    }
}
