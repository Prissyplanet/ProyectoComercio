<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function sendEmail(){
        $data['code']="rand(1000,9999)";
        $to="soniaaarodriguez29@gmail.com";
        $subject="Verification Code";
        Mail::send('mails.verification',$data,function($message) use ($to,$subject){
            $message->to($to,'Mi tienda online')->subject($subject);
                $message->from('xxelferxx14@gmail.com',"Bienvenido a mi tienda online");
        });
        echo "Se envió el correo";
    }

}