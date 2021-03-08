<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $table = 'payment';
    protected $fillable = ['trip_id', 'type', 'cost'];

    // public function created_at() {
    //     return date("d/m/Y", strtotime($this->created_at));
    // }

}
