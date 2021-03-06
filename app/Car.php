<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {

    protected $table = 'car';
    protected $fillable = [
        'created_by', 'content','images', 'title','number_plate', 'status', 'alias', 'ordering', 'post_schedule'
    ];

    public function attributes() {
        return $this->belongsToMany('\App\Attribute', 'car_attribute', 'car_id', 'attribute_id')->withPivot('value');
    }

    public function categories() {
        return $this->belongsToMany('\App\Category', 'car_category', 'car_id', 'category_id');
    }

    public function car_attributes() {
        return $this->hasMany('App\CarAttribute', 'car_id');
    }

    public function getPostSchedule() {
        return date('d/m/Y', strtotime($this->post_schedule != '0000-00-00 00:00:00' ?: $this->created_at));
    }

    public function getImage() {
        $image_arr = explode(',', $this->images);
        return $image_arr[0];
    }

    public function getPrice() {
        return $this->price > 0 ? number_format($this->price) . ' đ' : 'Liên hệ';
    }

    public function getSalePrice() {
        return number_format($this->sale_price) . ' đ';
    }

    public function createdBy() {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function url() {
        return route('car.detail', ['alias' => $this->alias]);
    }
}
