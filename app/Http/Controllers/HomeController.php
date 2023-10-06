<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Payment;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('active');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::orderBy('balance', 'DESC')->take(5)->get();
        $cars = Car::latest()->take(5)->get();
        $rentals = Rental::latest()->take(5)->get();
        $my_cars = Car::where('user_id', Auth::user()->id)->latest()->take(5)->get();
        $all_cars = Car::where('status', "available")->latest()->get();
        $rentals = Rental::all();
        $payments = Payment::latest()->orderBy('payment', 'DESC')->get();


        return view('home', compact('rentals', 'payments', 'users', 'all_cars', 'cars', 'my_cars', 'rentals'));
    }
}
