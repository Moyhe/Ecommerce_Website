<div class="flex items-center  space-x-8">

    <a href="{{ route('cart') }}" class="text-center text-gray-700 hover:text-primary transition relative">
        <div class="text-2xl">
            <i class="fa-solid fa-cart-arrow-down"></i>
        </div>
        <div class="text-xs leading-3">Cart</div>
        @if (Cart::instance('default')->count() > 0)
        <div
          class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs">
         {{ Cart::instance('default')->count() }}
       </div>
        @endif
    </a>

    <a href="{{ route('wishlist') }}" class="text-center text-gray-700 hover:text-primary transition relative">
        <div class="text-2xl">
            <i class="fa-regular fa-heart"></i>
        </div>
        <div class="text-xs leading-3">Wishlist</div>
        @if (Cart::instance('wishlist')->count() > 0)
        <div
        class="absolute right-0 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs">
           {{ Cart::instance('wishlist')->count() }}
        </div>
        @endif
    </a>


</div>
