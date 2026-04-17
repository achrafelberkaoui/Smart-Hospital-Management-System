<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DossierMedicalRequest extends FormRequest
{

    public function authorize(): bool
    {
         return auth()->check() && auth()->user()->role === 'doctor';
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
            'diagnostic' => 'required|string',
            'traitement' => 'required|string',
        ];
    }
}
