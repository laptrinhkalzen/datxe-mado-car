<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarAttribute extends Model
{
    protected $table = 'car_attribute';
    protected $fillable = [
        'car_id','attribute_id'
    ];
}
