<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [
        'humidity', 'temperature', 'on_off1', 'on_off2', 'up_days_ar1', 'up_days_ar2', 'date'
    ];
}
