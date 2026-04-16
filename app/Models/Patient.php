<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'email',
        'telephone'
    ];

    public function dossierMedical()
    {
        return $this->hasOne(DossierMedical::class);
    }
}
