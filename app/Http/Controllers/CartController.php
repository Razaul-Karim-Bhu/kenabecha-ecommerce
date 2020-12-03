<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $product = Product::find($request->product_id);
        Cart::add(array(
            'id' => $product->id, // inique row ID
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => $request->product_quantity,
            'attributes' => array(
                'product_image' => $product->product_image,
            )
        ));
        return redirect()->route('product_show_by_category', ['id' => $product->category_id]);
        // return Cart::getContent();
    }
    public function remove_cart($id)
    {
        Cart::remove($id);
        return back();
    }
    public function cart_update(Request $request)
    {
        $id = $request->product_id;
        Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->product_quantity,
            ),
        ));
        return back();
    }
}
