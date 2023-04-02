<?php

namespace App\Http\Controllers\frontend;


use App\Models\User;
use App\Models\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DOT;

class FrontUserController extends Controller
{
    public function frontUserProfile()
    {
        $Orders = Order::where("user_id", auth()->user()->id)->get();
        $recentorders = Order::where("user_id",auth()->user()->id)->whereDate("updated_at", "=",date('Y-m-d'))->get();
        return view('frontend.frontUser.frontUser', compact('Orders', 'recentorders'));
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


    public function frontUserOrderTrack($id)
    {

        $order = DOT::where("order_id", $id)->first();
        // dd($order);
        $status = ["Process", "Shipped", "Way", "Arrived"];
        $ind = array_search($order->status, $status);
        

        return view('frontend.frontUser.frontUserOrder', compact('ind'));
    }
}
