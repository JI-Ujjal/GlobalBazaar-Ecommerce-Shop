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
        $Customers = Customer::paginate(4);
        return view('backend.pages.customer.customerList', compact('Customers'));
    }


    public function createForm()
    {
        return view('backend.pages.customer.customerCreateForm');
    }

    //Create

    public function submitForm(Request $request)
    {
        //validation
        $request->validate([

            'customer_name' => 'required',
            'customer_image' => 'required',
            'customer_order' => 'required',
            'customer_address' => 'required'

        ]);

        $fileName = null;
        if ($request->hasFile('customer_image')) {
            $fileName = 'BOYZOBD' . '.' . date('Ymdhmsis') . '.' . $request->file('customer_image')->getClientOriginalExtension();
            $request->file('customer_image')->storeAs('uploads/customer', $fileName);
        }

        // dd($fileName);


        Customer::create([
            'customer_name' => $request->customer_name,
            'customer_image' => $fileName,
            'customer_order' => $request->customer_order,
            'customer_address' => $request->customer_address

        ]);
        return redirect()->route('customer.list')->with('message', 'Customer Created Successfully.');
    }


    //update

    public function updateCustomer(Request $request, $id)
    {
        $request->validate([

            'customer_name' => 'required',
            'customer_image' => 'required',
            'customer_order' => 'required',
            'customer_address' => 'required'

        ]);
        $updateCustomer = Customer::find($id);

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
