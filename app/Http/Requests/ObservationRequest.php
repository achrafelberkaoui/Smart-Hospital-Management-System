<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
       return in_array(auth()->user()->role, ['doctor','infirmier']);    
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'dossier_medical_id' => 'required|exists:dossier_medicals,id',
        'type' => 'nullable|string',
        'value' => 'nullable',
        'note' => 'nullable|string|max:500',
        ];
    }
}
