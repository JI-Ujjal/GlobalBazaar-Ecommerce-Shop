<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        //return view('backend.pages.productList');
        $Product = Product::all();
        return view('backend.pages.productList', compact('Product'));
    }


    public function createForm()
    {
        return view('backend.pages.productCreateForm');
    }


    public function submitForm(Request $request)
    {
        Product::create([
            'email_address' => $request->email_address,
            'password' => $request->password
        ]);
        return redirect()->route('product.list')->with('message','Product Create Successfully');
    }

    public function editProduct($id)
    {
        $Product = Product::find($id);
        return view('backend.pages.productEdit', compact('Product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $Product = Product::find($id)->update([
            'email_address' => $request->email_address,
            'password' => $request->password
        ]);
        return redirect()->route('product.list')->with('message','Product Update Successfully');
    }

    public function viewProduct($id)
    {
        $Product = Product::find($id);
        return view('backend.pages.productView', compact('Product'));
    }

    public function deleteProduct($id)
    {
        $Product = Product::find($id)->delete();
        return redirect()->back();
    }
}
