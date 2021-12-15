<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request){
        return view("contact");
    }

    public function send(Request $request){
        $contact = Contact::create($request->all());
        return redirect()->back();
    }

        
}
