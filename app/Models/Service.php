<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $primaryKey = 'service_id';

    public $incrementing = false;

    protected $keyType = 'int';

    public $timestamps = false; 

    protected $fillable = [
       
        'doctors_id',
        'service_name',
        'description',
        'fees',
        'duration'
    ];
}
