<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users_accounts extends Model
{
     use HasFactory;
protected $table = 'users_accounts';
protected $fillable = ['name', 'email','password','role'];


}
