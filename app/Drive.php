<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drive extends Model {



    protected $table = 'drive';
    protected $fillable = [
        'name','phone', 'address','image', 'birthday', 'status', 'sex','email', 'manufacturer_id','point','country_id','id_card','manufacturer_name','country_name','created_at','updated_at'
    ];

    // public function categories() {
    //     return $this->belongsToMany('\App\Category', 'drive_category', 'drive_id', 'category_id');
    // }

    public function validateCreate() {
        return $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|min:9',
            'address' => 'required',
            'birthday' => 'required',
            'manufacturer_id' => 'required',
            'id_card' =>'required'
        ];
    }

    // public function checkactivation($key) {
    //     return $this->model->where('activation', $key)->first();
    // }
}
