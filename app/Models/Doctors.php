<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Doctors extends Model
{
    protected $primaryKey = 'doctor_id';
    public $timestamps = false;
    use HasFactory;
protected $table = 'doctors';
 
protected $fillable = ['users_id','medical_field', 'phone'];

   public function user()
{
    return $this->belongsTo(Users_accounts::class, 'users_id', 'user_id');
    
}

public function appointments()
{
    return $this->hasMany(Appointment::class,'appointments_id','appointment_id');
}


}
