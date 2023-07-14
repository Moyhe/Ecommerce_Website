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

        return view('orders.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

}
