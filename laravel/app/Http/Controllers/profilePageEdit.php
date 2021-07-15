<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profilePageEdit extends Controller
{
    public function edit(Request $request ){
        $request->validate([
            'profileImage'=>'required | min: 0 | max: 5048 | mimes: png, jpeg, jpg ',
            'first_name'=>'required | alpha ',
            'last_name'=>'required',
            'phone'=>'required | numeric',
            'email'=>'required ',
            'subject'=>'required',
            'address'=>'required',
            'password'=>'required | comfirmed ',
            'password2'=>'required',

            
        ]);
    }
}
