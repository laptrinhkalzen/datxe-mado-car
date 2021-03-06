<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriveCategory extends Model
{
    protected $table = "drive_category";
    protected $fillable = [
        'drive_id', 'category_id'
    ];
}
