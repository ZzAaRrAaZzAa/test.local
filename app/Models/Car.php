<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    protected $table = 'cars';


    //без цього оновлення не працює
    protected $fillable = ['title', 'brand','model','year','price', 'description'];

    public function photos(){
        return $this->hasMany(CarPhoto::class, 'car_id', 'id');
    }
}
