<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'telephone'=> 'required|string|max:20',
            'email'=> 'required|string|email|unique:patients,email'
        ];
    }
    public function message() : array
    {
        return [
            'name' => 'nom de patient obligatoire',
            'telephone'=> 'numero de telephone obligatoire',
            'email'=> 'nullable|string|email|unique:patients,email'
        ];
    }
}
