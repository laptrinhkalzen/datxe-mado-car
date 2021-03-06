<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model {



    protected $table = 'expert';
    protected $fillable = [
        'name','phone', 'address','image', 'birthday', 'sex','email','company_id','country'
    ];

   

    public function checkactivation($key) {
        return $this->model->where('activation', $key)->first();
    }
}
