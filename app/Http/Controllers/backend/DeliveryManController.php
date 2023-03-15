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

    public function updateCustomer(Request $request, $id)
    {
        $request->validate([

            'customer_name' => 'required',
            'customer_image' => 'required',
            'customer_order' => 'required',
            'customer_address' => 'required'

        ]);
        $updateCustomer = DeliveryMan::find($id);

        $fileName = null;
        if ($request->hasFile('customer_image')) {
            $fileName = 'BOYZOBD' . '.' . date('Ymdhmsis') . '.' . $request->file('customer_image')->getClientOriginalExtension();
            $request->file('customer_image')->storeAs('uploads/customer', $fileName);
        }

        // dd($fileName);


        $updateCustomer->update([
            'customer_name' => $request->customer_name,
            'customer_image' => $fileName,
            'customer_order' => $request->customer_order,
            'customer_address' => $request->customer_address

        ]);
        return redirect()->route('customer.list')->with('message', 'Customer Updated Successfully');
    }


    public function editCustomer($id)
    {
        $Customer = Customer::find($id);
        return view('backend.pages.customer.customerEdit', compact('Customer'));
    }


    public function viewCustomer($id)
    {

        $Customer = Customer::find($id);
        return view('backend.pages.customer.customerView', compact('Customer'));
    }


    public function deleteCustomer($id)
    {
        $Customer = Customer::find($id)->delete();
        return redirect()->back();
    }

}
