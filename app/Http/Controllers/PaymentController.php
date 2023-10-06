<?php

namespace App\Http\Controllers;

use App\Models\Notefaction;
use App\Models\Payment;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
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
        $this->middleware('administrator');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rental::all();
        $payments = Payment::latest()->orderBy('payment', 'DESC')->get();
        return view('payments.index', compact('payments', 'rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('balance', '!=', 'null')->orderBy('balance', 'DESC')->get();
        return view('payments.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::find($request->id);
        $payment = new Payment();
        $payment->payment = $user->balance;
        $payment->user_id = $user->id;
        $user->balance = 0;

        $user->save();
        $payment->save();
        $notefaction = new Notefaction();
        $notefaction->title = "Payment Pay";
        $notefaction->notification = "The payment has been paid successfully";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();

        $notefaction = new Notefaction();
        $notefaction->title = "Payment Pay";
        $notefaction->notification = "The payment has been paid successfully";
        $notefaction->user_id = $user->id;
        $notefaction->save();

        return redirect()->back()->with('success', 'The payment has been paid successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        return view('payments.print', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function getInfoUser(String $id)
    {
        $user = User::find($id);
        return response()->json(['user' => $user], 201);
    }
}
