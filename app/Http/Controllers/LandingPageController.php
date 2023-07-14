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

        $products = Product::query()->latest()->take(8)->inRandomOrder()->get();
        $categories = Category::query()->take(6)->get();

         return view('home.index', compact(['products', 'categories']));
    }


    public function search()
    {
        $products = Product::query()->filter(request(['search', 'category']))->get();

        return view('search.index', compact('products'));
    }
}
