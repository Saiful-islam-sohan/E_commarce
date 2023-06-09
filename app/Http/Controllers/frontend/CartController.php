<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function cartPage()
    {
        $carts = Cart::content();
        //return $carts;
        return view('frontend.pages.shopping_cart',compact('carts'));
    }

    public function AddTocart(Request $request)
    {
           // dd($request->all());

           $product_slug = $request->product_slug;
           $order_qty = $request->order_qty;

           $product = Product::whereSlug($product_slug)->first();
           Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->product_price,
            'weight' => 0,
            'product_stock' => $product->product_stock,
            'qty' => $order_qty,
            'options' => [
                'product_image' => $product->product_image
            ]
        ]);

        Toastr::success('Product Added in to Cart');
        return back();
    }
    public function removeFromCart($cart_id)
    {
         //dd($cart_id);
        Cart::remove($cart_id);
        Toastr::info('Product Removed from Cart!!');
        return back();
    }
}
