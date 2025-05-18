<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Doctors extends Model
{
    use HasFactory;
protected $table = 'doctors';
 
protected $fillable = ['medical_field', 'phone'];

    


}
