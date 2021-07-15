<?php

namespace App\Http\Controllers;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
   
    public function sendEmail(){
        $details =[
            'title'=> 'Congratulations',
            'body'=>'You are successful in php'
        ];
        Mail::to('marston7angella@gmail.com')->send(new TestMail($details));
        return "Email sent";
    }
}
