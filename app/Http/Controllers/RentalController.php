<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Notefaction;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('active');
    }


    public function rental_show(Car $car)
    {
        return view('rentals.show', compact('car'));
    }

    public function rental(Rental $rental)
    {
        return view('rentals.car_rental', compact('rental'));
    }

    public function rental_contract(Car $car)
    {
        $rental = new Rental();
        $rental->car_id = $car->id;
        $rental->user_id = Auth::user()->id;
        $car->status = "unavailable";
        $car->save();
        $rental->save();
        $notefaction = new Notefaction();
        $notefaction->title = "Car Rental Success";
        $notefaction->notification = "The car has been rentaled successfully";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();
        $notefaction = new Notefaction();
        $notefaction->title = "Car Rental Success";
        $notefaction->notification = "The car has been rentaled successfully";
        $notefaction->user_id = $car->user->id;
        $notefaction->save();
        return redirect()->route('home')->with('success', 'The car has been updated successfully');
    }

    public function cars_rentals()
    {
        $user = Auth::user();
        $rentals = Rental::orderBy('end_rental', 'ASC')->get();
        return view('cars.rentals', compact('rentals'));
    }
    public function rental_submit(Rental $rental)
    {
        $taxRate = $rental->car->rentalCost * 0.1;
        $total = $rental->car->rentalCost + $taxRate;
        $rental->total = $total;
        $rental->car->user->balance = ($rental->car->user->balance + $taxRate);
        $rental->car->user->save();
        $rental->start_rental = now();
        $rental->end_rental = now()->addDays(1);
        $rental->save();
        $notefaction = new Notefaction();
        $notefaction->title = "Rental Submit ";
        $notefaction->notification = "The rental submit has been complete successfully";
        $notefaction->user_id = $rental->car->user->id;
        $notefaction->save();
        $notefaction = new Notefaction();
        $notefaction->title = "Rental Submit ";
        $notefaction->notification = "The rental submit has been complete successfully";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();

        return  redirect()->route('cars.rentals')->with('success', 'The rental submit has been complete successfully');
    }

    public function end_rent(Rental $rental)
    {
        $rental->status = "complete";
        $rental->car->status = "available";
        $rental->car->save();
        $rental->save();
        $notefaction = new Notefaction();
        $notefaction->title = "Rental End ";
        $notefaction->notification = "The rental has been terminated and the car is now available";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();
        return  redirect()->back()->with('success', 'The rental has been terminated and the car is now available');
    }
}
