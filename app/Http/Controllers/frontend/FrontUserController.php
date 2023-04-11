<?php

namespace App\Http\Controllers\frontend;


use App\Models\User;
use App\Models\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\DOT;

class FrontUserController extends Controller
{
    public function frontUserProfile()
    {
       
        $dots = DOT::all();
        $Orders = Order::where("customer_id", auth('customer')->user()->id)->whereNot("status", "cancel")->get();

        $recentorders = Order::where("customer_id", auth('customer')->user()->id)->whereDate("updated_at", "=", date('Y-m-d'))->get();
        return view('frontend.frontUser.frontUser', compact('Orders', 'recentorders', 'dots'));
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

        notify()->success('Profile', 'Update Successfully');

        return redirect()->back();
    }


    public function frontUserOrderTrack($id)
    {
        $dots = DOT::all();
        $order = DOT::where("order_id", $id)->first();
        // dd($order);
        $status = ["Process", "Shipped", "Way", "Arrived"];
        $ind = array_search($order->status, $status);


        return view('frontend.frontUser.frontUserOrder', compact('ind','dots'));
    }



    public function cancelOrder($id)
    {
        $order = Order::find($id)->update([
            'status' => 'cancel',
        ]);
        notify()->success('success', 'Order has been canceled!');
        return redirect()->back();
    }
}
