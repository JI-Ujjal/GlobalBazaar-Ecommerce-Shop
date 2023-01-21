<?php

namespace App\Http\Controllers\frontend;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function frontendHome()
    {
        return view('frontend.pages.home');
    }

    public function registerSubmitForm(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request['password'])


        ]);

        notify()->success('Laravel Notify is awesome!');
        return back();
    }

    public function loginSubmitForm(Request $request)
    {

        $credentials = $request->except('_token');
        $authentication = auth()->attempt($credentials);
        if ($authentication) {
            // dd($authentication);
            notify()->success('login Successfully!');

            if (auth()->user()->role == 'admin') {
                return to_route('admin.newPage');
            }
            return to_route('home');
        } else {
            notify()->success('Email or Password Not Matched!');
            return to_route('home');
        }
    }

    public function frontLogout()
    {
        auth()->logout();
        notify()->success('logout Successfully');
        return to_route('home');
    }
}
