<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
    protected $table = "car_category";
    protected $fillable = [
        'car_id', 'category_id'
    ];
}
