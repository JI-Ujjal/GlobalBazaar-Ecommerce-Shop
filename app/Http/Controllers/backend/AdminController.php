<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {

        return view('backend.dashboard');
    }
    public function master()
    {

        return view('backend.master');
    }
    public function newPage()
    {
        $totalCustomer = User::get()->count();
        $totalOrder = Order::get()->count();
        $Orders = Order::all();
        return view('backend.pages.newPage', compact('Orders', 'totalOrder', 'totalCustomer'));
    }


    public function orderList(){
        $Orders = Order::all();
        return view('backend.pages.order.orderlist', compact('Orders'));
    }

    public function orderEdit($id){
        $Order = Order::find($id);
        return view('backend.pages.newPage', compact('Order'));
    }

    public function orderUpdate($id){
        $Order = Order::find($id);

        $Order->update([
            "status"=>"Approved"
        ]);
        return redirect()->back();
    } 
}
