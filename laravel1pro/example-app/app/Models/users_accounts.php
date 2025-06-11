<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_accounts extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $table = 'users_accounts';

    protected $fillable = ['user_id', 'email', 'password', 'role', 'name'];

    public $timestamps = false;
}
