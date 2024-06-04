<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveForLaterController extends Controller
{

    public function switchToCart(string $id)
    {
        $product = Cart::instance('saveForLater')->get($id);

        Cart::instance('saveForLater')->remove($id);

        $duplicateItem = Cart::instance('default')->search(function ($cartItem,) use ($product) {
            return $cartItem->id === $product->id;
        });

        if($duplicateItem->isNotEmpty())  return redirect()->route('cart')->with('success', 'Product is already in your cart!');

            Cart::instance('default')->add($product->id, $product->name, 1, $product->price)->associate('App\Models\Product');

            return redirect()->route('cart')->with('success', 'Product was added to your cart!');
    }


    public function destroy(string $id)
    {
        Cart::instance('saveForLater')->remove($id);

        return back()->with('success', 'Product has been removed!');
    }


}
