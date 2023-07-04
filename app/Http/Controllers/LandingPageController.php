<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;


class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->latest()->take(8)->inRandomOrder()->filter(request(['search', 'category']))->get();
        $categories = Category::query()->take(6)->get();

         return view('home.index', compact(['products', 'categories']));
    }


}
