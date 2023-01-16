<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Agama29;


class Halo29Controller extends Controller
{
    public function halo29()
    {
        $user = User::where('role', 'user')->get();
        $agama = Agama29::all();

        return view('welcome', ['data' => $user, 'agama' => $agama]);
    }


}
