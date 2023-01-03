<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list()
    {
        //return view('backend.pages.customerList');
        $Customer = Customer::all();
        return view('backend.pages.customerList', compact('Customer'));
    }


    public function createForm()
    {
        return view('backend.pages.customerCreateForm');
    }



    public function submitForm(Request $request)
    {
        Customer::create([
            'customer_name' => $request->customer_name,
            'customer_status' => $request->customer_status,
            'customer_details' => $request->customer_details,
            'customer_price' => $request->customer_price
         
        ]);
        return redirect()->route('customer.list');
    }



    public function deleteCustomer($id)
    {
        $Customer = Customer::find($id)->delete();
        return redirect()->back();
    }


    public function editCustomer($id)
    {
        $Customer = Customer::find($id);
        return view('backend.pages.customerEdit', compact('Customer'));
    }

}
