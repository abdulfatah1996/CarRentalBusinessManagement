<?php

namespace App\Http\Controllers;

use App\Models\Notefaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('active');
    }


    public function profile_edit()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
    public function profile_update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:255'],
        ]);
        if ($request->hasFile('picture')) {
            File::delete($user->picture);
            $file_extension = $request->picture->getClientOriginalExtension();
            $file_name = 'user_' . date('Ymdhis') . '.' . $file_extension;
            $path = 'img/users';
            $request->picture->move($path, $file_name);
            $img_url = $path . '/' . $file_name;
            $user->picture = $img_url;
        }

        $user->name = $request->name;
        $user->bio = $request->bio;
        if ($user->email != $request->email) {
            $user->email = $request->email;
        }


        $notefaction = new Notefaction();
        $notefaction->title = "Profile Changes";
        $notefaction->notification = "You have made an edit to your profile";
        $notefaction->user_id = $user->id;
        $notefaction->save();
        $user->save();
        return redirect()->back()->with('success', 'The user has been updated successfully');
    }

    public function settings_edit()
    {
        $user = Auth::user();
        return view('settings', compact('user'));
    }
    public function settings_update(Request $request, User $user)
    {
        if (!$request->password == null) {
            $request->validate([
                'password' => ['string', 'min:8', 'confirmed'],
            ]);
            $user->password = $request->password;
        }
        if ($request->notification == null) {
            $user->notification = "off";
        } else {
            $user->notification = "on";
        }
        $notefaction = new Notefaction();
        $notefaction->title = "Settings Changes";
        $notefaction->notification = "You have made an edit to your settings";
        $notefaction->user_id = $user->id;
        $notefaction->save();
        $user->save();
        return redirect()->back()->with('success', 'The user has been updated successfully');
    }
}
