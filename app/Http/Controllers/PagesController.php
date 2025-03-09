<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;


class PagesController extends Controller
{
    public function dashboard(){
        $cars = Car::get()->all();
        return view('dashboard', compact('cars'));
    }
    public function showPage($id)
    {
        $car = Car::where('id', $id)->first();
        return view('cars.show',compact('car'));
    }
}
