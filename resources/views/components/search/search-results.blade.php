
<x-search.breadcrumb />


@props(['products'])

        <!-- new arrival -->

<div class="container pb-16">
    <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Search Results ({{ $products->count() }})</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        @foreach ($products as $product)
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="product 1" class="w-full h-48">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="{{ route('shop.show', $product->slug) }}"
                        class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                        title="view product">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    @if ($product->quantity > 0)
                    <form action="{{ route('wihslist.store', $product) }}" method="post">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="quantity" value="{{ $product->quantity }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">

                       <button type="submit"
                       title="add to wishlist"
                       class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition">
                       <i class="fa-solid fa-heart"></i>
                    </button>
                   </form>

                   @endif
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="#">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                        {{ $product->name }}
                    </h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">${{ $product->price }}</p>
                    <p class="text-sm text-gray-400 line-through">$55.90</p>
                </div>
                <div class="flex items-center">
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">(150)</div>
                </div>
            </div>
            @if ($product->quantity > 0)
            <form action="{{ route('cart.store', $product) }}" method="post">
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="quantity" value="{{ $product->quantity }}">
                <input type="hidden" name="price" value="{{ $product->price }}">

               <button type="submit"
               class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">
               Add to cart
            </button>
           </form>

           @endif
        </div>
        @endforeach

    </div>
</div>
<!-- ./new arrival -->

