<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function  store(Request $request)
    {

        Contact::create([

            'name' => $request->name,
            'subject' => $request->subject,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message

        ]);
        flash()->addSuccess("Message Sended Sucessfully");
        return redirect('/');
    }
}
