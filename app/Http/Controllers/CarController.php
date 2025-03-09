<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\CarPhoto;
use Illuminate\Support\Facades\Storage;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();

        return view('admin.car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
            'images' => 'nullable|array',  // Перевірка на масив файлів
            'images.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048',  // Перевірка для кожного файлу
        ]);


        $car = new Car();
        $car->brand = $request->brand;   
        $car->model = $request->model;   
        $car->year = $request->year;   
        $car->price = $request->price;   
        $car->description = $request->description;   
        $car->save();


        if ($request->hasFile('images')) {
            
            
            foreach ($request->file('images') as $file) {
                $this->photo($file, $car->id);
            }
            
        }
        return redirect()->route('admin.car.index')->with('success', 'Car created successfully!');

    
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('admin.car.show',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('admin.car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
        ]);
        $car::updateOrCreate(
            ['id' => $car->id],
            [
                'brand' => $request->brand,
                'model' => $request->model,
                'year' => $request->year,
                'price' => $request->price,
                'description' => $request->description,
            ]
        );
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
{
    // Перевіряємо, чи існує автомобіль
    if (!$car) {
        return redirect()->back()->with('error', 'Car not found.');
    }

    // Отримуємо всі фотографії автомобіля
    $photos = $car->photos;  // Припускаємо, що є відношення до фотографій через `photos`

    // Видаляємо кожну фотографію
    foreach ($photos as $photo) {
        $this->destroyPhoto($photo->id);
    }

    // Видаляємо сам автомобіль
    $car->delete();

    // Повертаємо повідомлення про успішне видалення
    return redirect()->route('admin.car.index')->with('success', 'Car and its photos deleted successfully.');
}

    public function storePhotos(Request $request){
        if ($request->hasFile('images')) {

            $id = $request->id;
            foreach ($request->file('images') as $file) {
                $this->photo($file, $id);
            }
            
        }
        return redirect()->back();
    }
    
    public function destroyPhoto($id)
{
    $photo = CarPhoto::find($id);

    // Перевірка, чи існує фото
    if (!$photo) {
        return redirect()->back()->with('error', 'Photo not found.');
    }

    // Формуємо шлях до файлу
    $file_path = 'photos/' . $photo->photo_path;

    // Перевіряємо, чи існує файл на диску public
    if (Storage::disk('public')->exists($file_path)) {
        // Видаляємо файл
        Storage::disk('public')->delete($file_path);
    } else {
        return redirect()->back()->with('error', 'File does not exist.');
    }

    // Видаляємо запис з бази даних
    $photo->delete();

    // Повертаємо повідомлення про успішне видалення
    return redirect()->back()->with('success', 'Sample deleted successfully.');
}

    

    public function photo($photo , $id){


        $path = $this->upload($photo);

        $car_photo = new CarPhoto();
        $car_photo->car_id = $id;
        $car_photo->photo_path = $path;
        $car_photo->save();

    }

    public function upload($photo){

        
        $uuid = Str::uuid();

        $extension = $photo->getClientOriginalExtension();

        $name = $uuid . '.' . $extension;

        $path = 'photos/' . mb_strcut($name, 0, 2);

        $fullname = mb_strcut($name, 0, 2) . '/' . $name;


        $store = Storage::disk('public')->putFileAs($path, $photo, $name);

        if ($store){
            return $fullname;
        }

    }

}
