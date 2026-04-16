<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DossierMedical extends Model
{
    protected $fillable = [
        "patient_id",
        "doctor_id",
        "diagnostic",
        "traitement"
    ];

    public function patient()
    {
    return $this->belongsTo(Patient::class);
    }
}
