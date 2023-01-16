<?php

namespace App\Http\Controllers;

use App\Models\Data29;
use App\Models\User;
use Illuminate\Http\Request;

class Register29Controller extends Controller
{
    public function register29(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users29',
            'password' => 'required|min:8',
            'repassword' => 'required|same:password',
        ]);

        $userData = $request->all();
        $userData["password"] = bcrypt($request->password);
        $userData["is_active"] = 0;

        $user = new User();
        $user->fill($userData);
        $save = $user->save();

        $detailUser = new Data29();
        $detailUser->id_user = $user->id;
        $detailUser->save();

        if ($save && $detailUser) {
            return redirect('/login29')->with('success', 'Register Success');
        } else {
            return back()->with('error', 'Register failed!');
        }
    }

}
