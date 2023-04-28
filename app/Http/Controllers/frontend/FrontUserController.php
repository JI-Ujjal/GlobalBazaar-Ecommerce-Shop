<?php

namespace App\Http\Controllers\frontend;


use App\Models\User;
use App\Models\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\DOT;

class FrontUserController extends Controller
{
    public function frontUserProfile()
    {
        
        $Categories = Category::all();
        $Orders = Order::where("customer_id", auth('customer')->user()->id)->where('status', 'pending')->orWhere('status', 'processing')->get();
        return view('frontend.frontUser.frontUser', compact('Orders', 'Categories'));
    }

    public function frontUserProfileUpdate(Request $request)
    {


        $fileName = (auth('customer')->user()->image);
        if ($request->hasFile('image')) {
            $fileName = 'BOYZOBD' . '.' . date('Ymdhmsis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads/frontUser', $fileName);
        }

        Customer::find(auth('customer')->user()->id)->update([
            'image' => $fileName,
            'name' => $request->name,
            'email' => $request->email,

        ]);

        toastr()->success('Profile', 'Update Successfully');

        return redirect()->back();
    }


    public function frontUserOrderTrack($id)
    {

        $order=Order::find($id);
        return view('frontend.frontUser.frontUserOrder', compact('order'));
    }



    public function cancelOrder($id)
    {
        $order = Order::find($id)->update([
            'status' => 'cancel',
        ]);
        toastr()->success('success', 'Order has been canceled!');
        return redirect()->back();
    }
}
