<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Product::class;

    public function definition(): array
    {
        $name = fake()->realText(50);

        return [
            'name' => $name,
           'slug' => Str::slug($name),
           'thumbnail' => fake()->imageUrl,
           'description' => fake()->realText(5000),
           'quantity' => 5,
           'price' => fake()->numberBetween(100, 1000),

        ];
    }
}
