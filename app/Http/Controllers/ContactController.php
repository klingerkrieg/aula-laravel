<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Notifications\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function index(Request $request){
        return view("contact");
    }

    public function send(Request $request){
        $contact = Contact::create($request->all());

        #envia o e-mail
        Notification::route("mail", config("mail.from.address"))
                ->notify(new NewContact($contact));


        return redirect()->back();
    }

        
}
