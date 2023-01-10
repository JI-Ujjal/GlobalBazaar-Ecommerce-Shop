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
        $Products = Product::paginate(3);
        return view('backend.pages.product.productList', compact('Products'));
    }


    public function createForm()
    {
        //$categories = Catego
        return view('backend.pages.product.productCreateForm');
    }


    public function submitForm(Request $request)
    {


        $fileName = null;
        if ($request->hasFile('product_image')) {
            $fileName = 'BOYZOBD' . '.' . date('Ymdhmsis') . '.' . $request->file('product_image')->getClientOriginalExtension();
            $request->file('product_image')->storeAs('uploads/product', $fileName);
        }


        Product::create([
            'product_name' => $request->product_name,
            'product_image' => $fileName,
            'product_details' => $request->product_details,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'product_status' => $request->product_status
            
        ]);
        return redirect()->route('product.list')->with('message','Product Create Successfully');
    }

    public function editProduct($id)
    {
        $Product = Product::find($id);
        return view('backend.pages.product.productEdit', compact('Product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $Product = Product::find($id)->update([
            'product_name' => $request->product_name,
            'product_image' => $request->product_image,
            'product_details' => $request->product_details,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'product_status' => $request->product_status
        ]);
        return redirect()->route('product.list')->with('message','Product Update Successfully');
    }

    public function viewProduct($id)
    {
        $Product = Product::find($id);
        return view('backend.pages.product.productView', compact('Product'));
    }

    public function deleteProduct($id)
    {
        $Product = Product::find($id)->delete();
        return redirect()->back();
    }
}
