<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Admin;

class ContactController extends Controller
{
    public function contact(Request $request){
        $mail_data = [
            'name' => $request->name,
            'subject' => $request->subject,
        ];

        Mail::to(['admin@truwork.cz'])
            ->send(new Admin($mail_data));
    }
}
