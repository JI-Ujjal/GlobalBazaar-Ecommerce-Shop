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
        
        $products = Product::find($id);

        $myCart=session()->get('myCart'); //get, put, has, flush, forget
        if(!$myCart)
        {
            //case1: cart is empty
            //solution: add product to cart

           $cart[$id] = [
            'product_name' => $products->product_name,
            'product_price' => $products->product_price,
            'product_quantity' => 1,
            'subtotal' => $products->product_price * 1,
            'product_image' => $products->product_image
        ];
           session()->put('myCart',$cart);
        }else
        {
            //case2: cart not empty but product not exist,
            // solution: add product to cart

            if(!array_key_exists($id,$myCart))
            {
                $myCart[$id] = [
                    'product_name' => $products->product_name,
                    'product_price' => $products->product_price,
                    'product_quantity' => 1,
                    'subtotal' => $products->product_price * 1,
                    'product_image' => $products->product_image
                ];
                session()->put('myCart',$myCart);
            }else{
                //case3: cart not empty but product exist
                //solution: increment the quantity

                $myCart[$id]['product_quantity']=$myCart[$id]['product_quantity']+1;// pre increment and post increment

                $myCart[$id]['subtotal']= $myCart[$id]['product_price'] * $myCart[$id]['product_quantity'];
                session()->put('myCart',$myCart);
            }
        }

        notify()->success('Product Added to Cart Successfully');
        return redirect()->back();

        
    }

    public function deleteCartItem($id)
    {
       $newCart=session()->get('myCart');
        unset($newCart[$id]);
        session()->put('myCart',$newCart);

        notify()->success('Item deleted from cart.');
        return redirect()->back();
    }

}
