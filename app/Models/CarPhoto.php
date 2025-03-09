<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarPhoto extends Model
{
    protected $table = 'car_photos';


    //без цього оновлення не працює
    protected $fillable = ['car_id', 'photo_path'];
}
