<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userDisplayController extends Controller
{
    public function show()
    {
        $data= User::all();
        return view('profilepagedisplay',['users'=>$data]);
    }
}
