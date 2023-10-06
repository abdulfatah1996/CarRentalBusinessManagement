<?php

namespace App\Http\Controllers;

use App\Models\Notefaction;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'administrator') {
            $suggestions = Suggestion::latest()->get();
            return view('suggestions.index', compact('suggestions'));
        } else {
            $suggestions = Suggestion::latest()->where('user_id', Auth::user()->id)->get();
            return view('suggestions.index', compact('suggestions'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suggestions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $suggestion = new Suggestion();
        $suggestion->title =  $request->title;
        $suggestion->content =  $request->content;
        $suggestion->user_id =  Auth::user()->id;

        $suggestion->save();

        $notefaction = new Notefaction();
        $notefaction->title = "Suggestion created";
        $notefaction->notification = "The suggestion has been created successfully";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();

        return redirect()->back()->with('success', 'The suggestion has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suggestion $suggestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suggestion $suggestion)
    {
        return view('suggestions.edit', compact('suggestion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suggestion $suggestion)
    {
        $suggestion->title =  $request->title;
        $suggestion->content =  $request->content;
        $suggestion->user_id =  Auth::user()->id;

        $suggestion->save();

        $notefaction = new Notefaction();
        $notefaction->title = "Suggestion Updated";
        $notefaction->notification = "The suggestion has been updated successfully";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();

        return redirect()->route('suggestions.index')->with('success', 'The suggestion has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $suggestion = Suggestion::find($id);
        $notefaction = new Notefaction();
        $notefaction->title = "Suggestion deleted";
        $notefaction->notification = "The suggestion has been deleted successfully";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();
        $suggestion->delete();
        return response()->json(['success' => 'The suggestion has been deleted successfully'], 201);
    }
}
