<?php

namespace App\Http\Controllers\backend;

use App\Models\DOT;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DeliveryMan;
use App\Models\Order;

class DeliveryOrderTrackingController extends Controller
{
    public function dOrderTracking()
    {
        $dots = DOT::paginate(5);
        return view('backend.deliveryOrderTracking.dOTList', compact('dots'));
    }

    public function dOTCreate()
    {

        $Orders = Order::all();
        $deliverymans = DeliveryMan::all();
        return view('backend.deliveryOrderTracking.dOTCreate', compact('Orders', 'deliverymans'));
    }

    public function dOTEdit($id)
    {
        $dots = DOT::find($id);
        $Orders = Order::all();
        $deliverymans = DeliveryMan::all();
        return view('backend.deliveryOrderTracking.dOTEdit', compact('dots', 'Orders', 'deliverymans'));
    }

    public function dOTSubmit(Request $request)
    {

        DOT::create([
            'order_id' => $request->order_id,
            'delivery_man_id' => $request->man_name,
            'status' => $request->status

        ]);
        return redirect()->route('dot.list')->with('message', 'Delivery Order Tracking Create Successfully.');
    }

    public function dOTUpdate(Request $request, $id)
    {
        $dots = DOT::find($id);
        $dots->update([
            'order_id' => $request->order_id,
            'delivery_man_id' => $request->man_name,
            'status' => $request->status

        ]);
        return redirect()->route('dot.list')->with('message', 'Delivery Order Tracking Create Successfully.');
    }
}
