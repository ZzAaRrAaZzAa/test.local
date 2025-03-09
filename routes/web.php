<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PagesController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('car', CarController::class);
    Route::post('car/photo', [CarController::class,'storePhotos'])->name('car.photo.store');
    Route::delete('car/photo/{id}', [CarController::class,'destroyPhoto'])->name('car.photo.destroy');
});

Route::get('/cars/{id}', [PagesController::class, 'showPage'])->name('cars.show');
Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
