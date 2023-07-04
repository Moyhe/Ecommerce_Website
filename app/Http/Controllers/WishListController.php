<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {

        return view('wishList.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Product $product)
    {

        $duplicateItem = Cart::instance('wishlist')->search(function ($cartItem,) use ($product) {
            return $cartItem->id === $product->id;
        });

        if($duplicateItem->isNotEmpty())
        {
            return redirect()->route('wishlist')->with('success', 'Product is already in your cart!');

        } else {

            Cart::instance('wishlist')->add($product->id, $product->name, 1, $product->price, ['quantity'=> $product->quantity])->associate('App\Models\Product');

            return redirect()->route('wishlist')->with('success', 'Product was added to your cart!');

         }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::instance('wishlist')->remove($id);
        return back()->with('success', 'Product has been removed!');

    }
}
