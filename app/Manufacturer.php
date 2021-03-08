<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model {



    protected $table = 'manufacturer';
    protected $fillable = [
        'name','mobile', 'address','tax_code','contacter','email','contacter_mobile','status','created_at','updated_at'
    ];
    public $timestamps = false;
    public function validateCreate() {
        return $rules = [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'tax_code' => 'required',
            'contacter' => 'required',
            'contacter_mobile' => 'required'
        ];
    }

    public function validateUpdate($id) {
        return $rules = [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'tax_code' => 'required',
            'contacter' => 'required',
            'contacter_mobile' => 'required'
        ];
    }
}
