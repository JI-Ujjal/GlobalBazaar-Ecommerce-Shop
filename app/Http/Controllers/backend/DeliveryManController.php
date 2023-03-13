<?php

namespace App\Http\Controllers\backend;

use App\Models\DeliveryMan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryManController extends Controller
{
    public function dManList(){
        $deliverymans = DeliveryMan::paginate(10);
        return view('backend.deliveryMan.dManList', compact('deliverymans'));
    }

    public function dManCreate()
    {
        return view('backend.deliveryMan.dManCreate');
    }

    //Create

    public function dManSubmit(Request $request)
    {
       
        $fileName = null;
        if ($request->hasFile('man_image')) {
            $fileName = 'BOYZOBD' . '.' . date('Ymdhmsis') . '.' . $request->file('man_image')->getClientOriginalExtension();
            $request->file('man_image')->storeAs('uploads/deliveryMan', $fileName);
        }

        // dd($fileName);


        DeliveryMan::create([
            'man_name' => $request->man_name,
            'man_email' => $request->man_email,
            'man_number' => $request->man_number,
            'man_image' => $fileName,
            'man_status' => $request->man_status

        ]);
        return redirect()->route('delivery.man.list')->with('message', 'Delivery Man Created Successfully.');
    }

}
