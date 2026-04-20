<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DossierMedical extends Model
{
    protected $fillable = [
        "patient_id",
        "doctor_id",
        "service_id",
        "diagnostic",
        "traitement"
    ];

    public function patient()
    {
      return $this->belongsTo(Patient::class);
    }
    public function observations()
    {
     return $this->hasMany(Observation::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
