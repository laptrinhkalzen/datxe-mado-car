<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model {



    protected $table = 'expert';
    protected $fillable = [
        'name','mobile', 'address','images', 'birthday', 'sex','email','company_id','country','payment_type','point_total'
    ];
    public function validateCreate() {
        return $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            

        ];
    }

    public function validateUpdate($id) {
        return $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            
        ];
    }
   

    public function checkactivation($key) {
        return $this->model->where('activation', $key)->first();
    }
}
