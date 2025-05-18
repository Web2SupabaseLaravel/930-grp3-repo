<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    use HasFactory;
    protected $table = 'appointments';
    protected $primaryKey = 'appointment_id';

    protected $fillable = [
        'appointment_date',
        'appointment_time',
        'status',
        'created_at',
        'services_id',
        'users_id',
        'patients_id',
        'notifications_id',
    ];
}
