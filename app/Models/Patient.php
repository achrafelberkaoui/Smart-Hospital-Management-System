<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
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
