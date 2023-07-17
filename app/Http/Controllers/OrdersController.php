<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $orders = auth()->user()->orders ?? null;
         return view('orders.index', compact('orders'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
       if(auth()->user() != $order->user_id) return back()->withErrors('you do not have permissions to this');

       $products = $order->products;

       return view('orders.show', compact('products', 'order'));

    }


}
