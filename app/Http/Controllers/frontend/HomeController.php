<?php

namespace App\Http\Controllers\frontend;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function frontendHome()
    {

        $Products = Product::all();
        return view('frontend.pages.home', compact('Products'));
    }

    public function registerSubmitForm(Request $request)
    {

        $Customer = Customer::create([
            'name' => $request->name,
            'image' => $request->image,
            'email' => $request->email,
            'password' => bcrypt($request['password'])


        ]);

        notify()->success('Customer Registration Successfully');
        return back();
    }

    public function loginSubmitForm(Request $request)
    {

        $credentials = $request->except('_token');
        $authentication = auth::guard('customer')->attempt($credentials);
        if ($authentication) {
            // dd($authentication);
            notify()->success('login Successfully!');
            if (auth('customer')->check()) {
                return to_route('home');
            }
            return to_route('admin.newPage');
        } else {
            notify()->error('Email or Password Not Matched!');
            return to_route('home');
        }
    }


    public function frontPassUpdate(Request $request)
    {
        $Customer = Customer::find(auth('customer')->user()->id)->update([
            'password' => bcrypt($request->password)
        ]);
        notify()->success('Password updated Successfuly');
        return redirect()->back();
    }


    public function frontLogout()
    {
        auth()->logout();
        session()->flush();
        notify()->success('logout Successfully');
        return to_route('home');
    }
}
