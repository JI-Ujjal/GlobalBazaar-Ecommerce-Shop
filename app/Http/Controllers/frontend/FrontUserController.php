<?php

namespace App\Http\Controllers\frontend;

use App\Models\DOT;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetails;

class FrontUserController extends Controller
{
    public function frontUserProfile()
    {
        $dots = DOT::all();
        $Orders =Order::all();
        $order_details = OrderDetails::all();
        return view('frontend.frontUser.frontUser', compact('Orders', 'dots', 'order_details'));
    }

    public function frontUserProfileUpdate(Request $request)
    {


        $fileName = (auth()->user()->image);
        if ($request->hasFile('image')) {
            $fileName = 'BOYZOBD' . '.' . date('Ymdhmsis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads/frontUser', $fileName);
        }

        $User = User::find(auth()->user()->id)->update([
            'image' => $fileName,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone

        ]);

        notify()->success('Profile', 'Update Successfully');

        return redirect()->back();
    }
}
