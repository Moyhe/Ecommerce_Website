<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\ElseIf_;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Coupon $coupon)
    {
        $discount = $coupon->getCoupon()->get('discount');
        $newSubTotal = $coupon->getCoupon()->get('newSubtotal');
        $newTax = $coupon->getCoupon()->get('newTax');
        $newTotal = $coupon->getCoupon()->get('newTotal');


        return view('cart.index', compact(['discount', 'newSubTotal', 'newTax', 'newTotal']));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Product $product)
    {

        $duplicateItem = Cart::search(function ($cartItem,) use ($product) {
            return $cartItem->id === $product->id;
        });

        if($duplicateItem->isNotEmpty())  return redirect()->route('cart')->with('success', 'Product is already in your cart!');

            Cart::add($product->id, $product->name, 1, $product->price)->associate('App\Models\Product');

            return redirect()->route('cart')->with('success', 'Product was added to your cart!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

       $validator = Validator::make($request->all(), [
          'quantity' => ['required', 'numeric', 'between:1,7']
       ]);

        if($validator->fails()) {

            session()->flash('errors', collect(['Quantity must be between 1 and 7.']));
        } elseif($request->quantity > $request->productQuantity) {

            session()->flash('errors', collect(['We currently do not have enough items in stock.']));
            return response()->json(['success' => false], 400);
        }

             Cart::update($id, $request->quantity);
            session()->flash('success', 'Quantity was updated successfully!');
            return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove($id);
        return back()->with('success', 'Product has been removed!');
    }


    public function switchToSaveForLater(string $id)
    {
        $product = Cart::get($id);
        Cart::remove($id);

        $duplicateItem = Cart::instance('saveForLater')->search(function ($cartItem,) use ($product) {
            return $cartItem->id === $product->id;
        });

        if($duplicateItem->isNotEmpty())  return redirect()->route('cart')->with('success', 'Product is already in your save for later!');

        Cart::instance('saveForLater')->add($product->id, $product->name, 1, $product->price)->associate('App\Models\Product');

        return redirect()->route('cart')->with('success', 'Product was added to save for later!');
    }
}
