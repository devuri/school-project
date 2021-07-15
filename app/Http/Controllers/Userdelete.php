<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;




class Userdelete extends Controller
{ 
    public function store(Request $request){
        // $info=$request->all();
        $request->validate([
            'First_Name'=>'required | max: 50 | alpha', 
            'Last_Name'=> 'required | max: 50 | alpha', 
            'username'=>'required | max: 20', 
            'user_type'=>'required', 
            'gender'=>'required', 
            'address'=>'required', 
            'subject'=>'required',
            'email'=>'required | string |regex:/(.+)@(.+)\.(.+)/i',
            'telephone'=>'required'
        ]);

        $user= new User ;
        $user-> firstname = $request-> First_Name;
        $user-> lastname = $request-> Last_Name;
        $user-> username = $request-> username;
        $user-> gender = $request-> gender;
        $user-> address = $request-> address;
        $user-> subject = $request-> subject;
        $user-> email = $request-> email;
        $user-> telephone = $request-> telephone;
        $user->save();
        return redirect('/admin')->with('success','New Student Added');

    }
    function display(){
        
        $data= User::all();
        return view('admin',['users'=>$data]);
    }
    function delete(Request $request)
    {
        $id = $request->id;
    $data1=User::find($id);
    $data1->delete();
    $data= User::all();

    return back()->with('admin',[
        'users'=>$data
    ]);
    }
function edit($id)
{
    return User::find($id);
}

}