<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Admin;
use App\Mail\User;

class ContactController extends Controller
{
    public function contact(Request $request){
        $mail_data = [
            'name' => $request->name,
            'surname' => $request->surname,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'logo'    => asset('storage/images/logo.png'),
        ];

        Mail::to(['admins@truwork.cz'])
            ->send(new Admin($mail_data));

        Mail::to($mail_data['email'])
            ->send(new User($mail_data));
    }
}
