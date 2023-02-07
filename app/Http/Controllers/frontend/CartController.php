<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function cartDetails()
    {

        return view('frontend.cart.cartDetails');
    }

    public function addCartPage($id)
    {
        $Products = Product::find($id);


        //case1:add new product to cart

        $cart[$id] = [
            'product_name' => $Products->product_name,
            'product_price' => $Products->product_price,
            'product_quantity' => 1,
            'subtotal' => $Products->product_price,
            'product_image' => $Products->product_image
        ];

        session()->put('myCart', $cart);

        notify()->success('Product Cart Successfully');
        return redirect()->back();
    }
}
