<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

    protected $table = "review";
    protected $fillable =[
        'trip_id', 'user', 'content','type'
    ];

    public function trip() {
        return $this->belongsTo('\App\Trip');
    }


    public function created_at() {
        return date('d/m/Y', strtotime($this->created_at));
    }

}
