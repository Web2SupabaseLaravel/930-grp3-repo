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

    public function service(){
        return $this->belongsTo(Service::class, 'services_id', 'service_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'user_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class, 'patients_id', 'patient_id');
    }

    public function notification(){
        return $this->belongsTo(Notification::class, 'notifications_id', 'notification_id');
    }
}
