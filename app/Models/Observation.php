<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    protected $fillable = [
        'dossier_medical_id',
        'user_id',
        'type',
        'value',
        'note'
    ];
    
    public function dossier()
    {
        return $this->belongsTo(DossierMedical::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
