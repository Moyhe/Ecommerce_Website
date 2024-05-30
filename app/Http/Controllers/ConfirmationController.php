<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = request()->query();
        $success = $data['success'];

        if ($success)   return view('thankyou.thanks');

        $products = Product::query()->latest()->take(8)->inRandomOrder()->filter(request(['search', 'category']))->get();
        $categories = Category::query()->take(6)->get();

        return view('home.home', compact(['products', 'categories']));
    }
}
