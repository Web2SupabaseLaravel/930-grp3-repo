<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_accounts extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $table = 'users_accounts';

    protected $fillable = ['user_id', 'name', 'email', 'password', 'role'];

    public $timestamps = false;

    public function doctor()
    {
        return $this->hasOne(Doctors::class, 'users_id', 'user_id');
    }
}
