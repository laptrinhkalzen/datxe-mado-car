<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {



    protected $table = 'company';
    protected $fillable = [
        'name','mobile', 'address','tax_code', 'fax', 'contacter', 'contacter_mobile','email'
    ];

    public function categories() {
        return $this->belongsToMany('\App\Category', 'company_category', 'drive_id', 'category_id');
    }

    public function validateCreate() {
        return $rules = [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required'
            

        ];
    }

    public function validateUpdate($id) {
        return $rules = [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required'
            
        ];
    }
    public function checkactivation($key) {
        return $this->model->where('activation', $key)->first();
    }
}
