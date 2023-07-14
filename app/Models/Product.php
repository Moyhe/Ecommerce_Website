<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $with = ['categories'];

    protected $casts = [
        'thumbnails' => 'array'
    ];

    protected $attributes = [
        'thumbnails' => '[]'
     ];

    /**
     * The categories that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('categories', fn ($query) =>
                $query->where('slug', $category)
            )
        );

    }

    public function scopeOtherProducts($query)
    {
         return $query->inrandomOrder()->take(4)->get();
    }

    public function getStockLevel($quantity)
    {
       if ($quantity > config('cart.threshold')) {
           $stcokLevel = '<span class="text-green-600">In Stock</span>';
       } elseif ($quantity <= config('cart.threshold') && $quantity > 0) {
           $stcokLevel = '<span class="text-yellow-400">Low Stock</span>';
       } else {
        $stcokLevel = '<span class="text-red-600">Out of Stock</span>';
       }

       return $stcokLevel;
    }


}
