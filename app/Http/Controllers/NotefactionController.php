<?php

namespace App\Http\Controllers;

use App\Models\Notefaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotefactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('active');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $notefactions = Notefaction::where('user_id', '=', $user_id)->latest()->paginate(10);
        $notifications_count = $notefactions->where('status', '=', 'closed')->count();
        return view('notefactions.index', compact('notefactions', 'notifications_count'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Notefaction $notefaction)
    {
        $notefaction->status = "open";
        $notefaction->save();
        return view('notefactions.show', compact('notefaction'));
    }
    public function notefactions_all()
    {
        $user_id = Auth::user()->id;
        $notefactions = Notefaction::where('user_id', '=', $user_id)->latest()->paginate(10);
        $notifications_count = $notefactions->where('status', '=', 'closed')->count();
        return response()->json(['notefactions' => $notefactions, 'notifications_count' => $notifications_count]);
    }
}
