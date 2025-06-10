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
    public $timestamps = false;
    protected $fillable = [
        'appointment_id',
        'appointment_date',
        'appointment_time',
        'status',
        'created_at',
        'updated_at',
        'services_id',
        'users_id',
        'patients_id',
        'notifications_id',
        'specialties_id',
        'doctors_id',
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

     public function doctors(){
        return $this->belongsTo(Doctor::class, 'doctors_id', 'doctor_id');
    }

     public function specialties(){
        return $this->belongsTo(Specialty::class, 'specialties_id', 'specialty_id');
    }
}
