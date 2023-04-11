<?php

namespace App\Http\Controllers\frontend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function contact(){
        
        return view('frontend.headermenu.contact.contact');
    }

    public function contactSubmit(Request $request){

        $request->validate([

            'name'      => 'required',
            'email'     => 'required',
            'details'   => 'required',
        ]);

        Contact::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'details'   => $request->details
        ]);

    return redirect()->back();
}
}
