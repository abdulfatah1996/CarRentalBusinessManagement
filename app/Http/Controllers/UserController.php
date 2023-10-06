<?php

namespace App\Http\Controllers;

use App\Models\Notefaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Strings;

class UserController extends Controller
{
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
        // $users = User::latest()->paginate(15);
        $users = User::orderBy('balance', 'DESC')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
            'bio' => ['required'],
            'picture' => ['required'],
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->bio = $request->bio;
        if ($request->hasFile('picture')) {
            $file_extension = $request->picture->getClientOriginalExtension();
            $file_name = 'user_' . date('Ymdhis') . '.' . $file_extension;
            $path = 'img/users';
            $request->picture->move($path, $file_name);
            $img_url = $path . '/' . $file_name;
            $user->picture = $img_url;
        }
        $notefaction = new Notefaction();
        $notefaction->title = "User Added";
        $notefaction->notification = "The user has been added successfully";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();
        $user->save();
        return redirect()->route('users.index')->with('success', 'The user has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'bio' => ['required'],
        ]);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->bio = $request->bio;

        if ($request->hasFile('picture')) {
            $file_extension = $request->picture->getClientOriginalExtension();
            $file_name = 'user_' . date('Ymdhis') . '.' . $file_extension;
            $path = 'img/users';
            $request->picture->move($path, $file_name);
            $img_url = $path . '/' . $file_name;
            $user->picture = $img_url;
        }

        $notefaction = new Notefaction();
        $notefaction->title = "User Updated";
        $notefaction->notification = "The user has been updated successfully";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();

        $user->save();
        return redirect()->back()->with('success', 'The user has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        $notefaction = new Notefaction();
        $notefaction->title = "User Deleted";
        $notefaction->notification = "The user has been deleted successfully";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();
        return redirect()->back()->with('error', 'The user has been deleted successfully');
    }

    /**
     * active or inactive user.
     */
    public function active(string $id)
    {
        $user = User::Find($id);
        if ($user->status == "active") {
            $user->status = "inactive";
            $notefaction = new Notefaction();
            $notefaction->title = "User Inactive";
            $notefaction->notification = "The user has been inactivated successfully";
            $notefaction->user_id = $user->id;
            $notefaction->save();
            $user->save();
            return redirect()->back()->with('success', 'The user has been inactivated successfully');
        } else {
            $user->status = "active";
            $notefaction = new Notefaction();
            $notefaction->title = "User Active";
            $notefaction->notification = "The user has been activated successfully";
            $notefaction->user_id = $user->id;
            $notefaction->save();
            $user->save();
            return redirect()->back()->with('success', 'The user has been activated successfully');
        }
    }

    public function changeEmail(Request $request, User $user)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $user->email = $request->email;
        $notefaction = new Notefaction();
        $notefaction->title = "E-mail Updated";
        $notefaction->notification = "The user has been email changed successfully";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();
        $user->save();
        return redirect()->back()->with('success', 'The user has been email changed successfully');
    }
    public function changePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user->password = Hash::make($request->password);
        $notefaction = new Notefaction();
        $notefaction->title = "Password Updated";
        $notefaction->notification = "The user has been password changed successfully";
        $notefaction->user_id = Auth::user()->id;
        $notefaction->save();
        $user->save();
        return redirect()->back()->with('success', 'The user has been password changed successfully');
    }
}
