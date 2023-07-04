<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('cart.index');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Product $product)
    {

        $duplicateItem = Cart::search(function ($cartItem,) use ($product) {
            return $cartItem->id === $product->id;
        });

        if($duplicateItem->isNotEmpty())
        {
            return redirect()->route('cart')->with('success', 'Product is already in your cart!');

        } else {

            Cart::add($product->id, $product->name, 1, $product->price, ['quantity'=> $product->quantity])->associate('App\Models\Product');

            return redirect()->route('cart')->with('success', 'Product was added to your cart!');

         }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove($id);
        return back()->with('success', 'Product has been removed!');
    }
}
