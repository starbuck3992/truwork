<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Admin;
use App\Mail\User;
use Throwable;

class ContactController extends Controller
{
    public function contact(ContactRequest $request)
    {
        if (!$request->title) {
            try {
                $mail_data = [
                    'name' => $request->name,
                    'surname' => $request->surname,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'subject' => $request->subject,
                    'message' => $request->message,
                    'logo' => asset('storage/images/logo.png'),
                ];

                Mail::to('admins@truwork.cz')
                    ->send(new Admins($mail_data));

                Mail::to($mail_data['email'])
                    ->send(new Users($mail_data));

            } catch (Throwable $e) {
                report($e);
                return response()->json([
                    'errors' => [
                        'exception' => ['Došlo k chybě při odesílání zprávy']
                    ]], 500);
            }

        }
        return response()->json('Zpráva byla odeslána');
    }
}
