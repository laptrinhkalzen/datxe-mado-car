<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model {

    protected $table = 'trip';
    protected $fillable = [
        'driver_id', 'expert_id','car_id', 'departure','destination', 'date_time', 'km_number','postage','total','total_point'
    ];

    // public function attributes() {
    //     return $this->belongsToMany('\App\Attribute', 'car_attribute', 'car_id', 'attribute_id')->withPivot('value');
    // }

    // public function categories() {
    //     return $this->belongsToMany('\App\Category', 'car_category', 'car_id', 'category_id');
    // }

    // public function car_attributes() {
    //     return $this->hasMany('App\CarAttribute', 'car_id');
    // }

   
    public function createdBy() {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function url() {
        return route('trip.detail', ['alias' => $this->alias]);
    }
}
