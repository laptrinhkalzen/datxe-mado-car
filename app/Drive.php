<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drive extends Model {



    protected $table = 'drive';
    protected $fillable = [
        'name','phone', 'address','image', 'birthday', 'status', 'sex','email'
    ];

    public function categories() {
        return $this->belongsToMany('\App\Category', 'drive_category', 'drive_id', 'category_id');
    }

    public function validateCreate() {
        return $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'category_id' => 'required'

        ];
    }

    public function validateUpdate($id) {
        return $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'birthday' => 'required'
        ];
    }
    public function checkactivation($key) {
        return $this->model->where('activation', $key)->first();
    }
}
