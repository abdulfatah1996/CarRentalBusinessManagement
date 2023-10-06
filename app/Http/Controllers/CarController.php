<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Notefaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('active');
        $this->middleware('merchant');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::where('user_id', Auth::user()->id)->latest()->get();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'year' => ['required', 'numeric'],
            'numberDoors' => ['required', 'numeric'],
            'size' => ['required', 'string', 'max:255'],
            'rentalCost' => ['required', 'numeric'],
            'fuelType' => ['required', 'string', 'max:255'],
            'picture' => ['required'],
        ]);
        if ($request->hasFile('picture')) {
            // save img in cars folder
            $file_extension = $request->picture->getClientOriginalExtension();
            $file_name = 'car_' . date('Ymdhis') . '.' . $file_extension;
            $path = 'img/cars';
            $request->picture->move($path, $file_name);
            $img_url = $path . '/' . $file_name;
        }

        $car = new Car();
        $car->name = $request->name;
        $car->company = $request->company;
        $car->year = $request->year;
        $car->numberDoors = $request->numberDoors;
        $car->size = $request->size;
        $car->rentalCost = $request->rentalCost;
        $car->fuelType = $request->fuelType;
        $car->picture = $img_url;
        $car->user_id = Auth::user()->id;
        $car->save();
        $notefaction = new Notefaction();
        $notefaction->title = "Car added";
        $notefaction->notification = "The car has been added successfully";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();
        return redirect()->route('cars.index')->with('success', 'The car has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'year' => ['required', 'numeric'],
            'numberDoors' => ['required', 'numeric'],
            'size' => ['required', 'string', 'max:255'],
            'rentalCost' => ['required', 'numeric'],
            'fuelType' => ['required', 'string', 'max:255'],
        ]);

        if ($request->hasFile('picture')) {
            File::delete($car->picture);
            // save img in cars folder
            $file_extension = $request->picture->getClientOriginalExtension();
            $file_name = 'car_' . date('Ymdhis') . '.' . $file_extension;
            $path = 'img/cars';
            $request->picture->move($path, $file_name);
            $img_url = $path . '/' . $file_name;
            $car->picture = $img_url;
        }

        $car->name = $request->name;
        $car->company = $request->company;
        $car->year = $request->year;
        $car->numberDoors = $request->numberDoors;
        $car->size = $request->size;
        $car->rentalCost = $request->rentalCost;
        $car->fuelType = $request->fuelType;
        $car->user_id = Auth::user()->id;
        $car->save();
        $notefaction = new Notefaction();
        $notefaction->title = "Car updated";
        $notefaction->notification = "The car has been updated successfully";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();
        return redirect()->route('cars.index')->with('success', 'The car has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        File::delete($car->picture);
        $car->delete();
        $notefaction = new Notefaction();
        $notefaction->title = "Car Deleted";
        $notefaction->notification = "The car has been deleted successfully";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();
        return redirect()->route('cars.index')->with('success', 'The car has been deleted successfully');
    }
}
