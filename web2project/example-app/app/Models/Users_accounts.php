<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users_accounts extends Model
{
    protected $primaryKey = 'user_id';
    public $timestamps = false;
     use HasFactory;
protected $table = 'users_accounts';
protected $fillable = ['name', 'email','password','role'];
public function doctor()
{
    return $this->hasOne(Doctors::class, 'users_id', 'user_id');
}


}
