<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    protected $fillable = [
        'patient_id','doctor_id','service_id','notes','status','created_by','date','time'
    ];

public function patient()
{
    return $this->BelongsTo(Patient::class);
}

public function doctor()
{
    return $this->belongsTo(User::class, 'doctor_id');
}

public function service()
{
    return $this->belongsTo(Service::class);
}

public function createdBy()
{
    return $this->belongsTo(User::class, 'created_by');
}

}
