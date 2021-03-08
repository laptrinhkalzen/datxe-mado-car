<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $table = 'place';
    protected $fillable = ['user_id', 'name', 'position'];

    // public function created_at() {
    //     return date("d/m/Y", strtotime($this->created_at));
    // }

}
