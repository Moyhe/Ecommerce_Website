<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::all();

        if (request()->sort == 'low-high') {
            $products = Product::query()->orderBy('price')->paginate(6)->withQueryString();
        } elseif (request()->sort == 'high-low') {
            $products = Product::query()->orderByDesc('price')->paginate(6)->withQueryString();
        } else {
            $products = Product::query()->latest()->take(6)->inRandomOrder()->filter(request(['search', 'category']))->paginate(6)->withQueryString();

        }

        return view('shop.index', compact(['products', 'categories']));
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

         $relatedProducts = Product::query()->where('slug', '!=', $product->slug)->otherProducts();
         $stockLevel = $product->getStockLevel($product->quantity);

         return view('product.index', compact('product', 'relatedProducts', 'stockLevel'));
    }



}
