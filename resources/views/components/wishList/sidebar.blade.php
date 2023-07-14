<x-wishList.wrapper>
         <!-- sidebar -->
    <div class="col-span-3">
        <div class="px-4 py-3 shadow flex items-center gap-4">
            <div class="flex-shrink-0">
                <img src="images/products/product6.jpg" alt="profile"
                    class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
            </div>
            <div class="flex-grow">
                <p class="text-gray-600">Hello,</p>
                <h4 class="text-gray-800 font-medium">
                    {{ request()->user()->name }}
                </h4>
            </div>
        </div>

        <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
            <div class="space-y-1 z-8 ">
                <div href="#" class="block font-medium capitalize transition cursor-pointer hover:text-primary">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-regular fa-address-card"></i>
                    </span>
                   <span> <i class="fa-solid  fa-user"></i> </span>    <span class="mx-2"> Manage account</span>
                </div>
                <a href="#" class="relative hover:text-primary block left-6 capitalize transition">
                    Profile information
                </a>
            </div>

            <div class="space-y-1 pl-8 pt-4">
                <a href="{{route('order')}}" class="relative hover:text-primary block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-solid fa-box-archive"></i>
                    </span>
                    My order history
                </a>

            </div>
            <div class="space-y-1 pl-8 pt-4">
                <a href="{{ route('cart') }}" class="relative text-primary block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-regular fa-heart"></i>
                    </span>
                   My Cart
                </a>
            </div>
        </div>
    </div>
    <!-- ./sidebar -->

    <!-- wishlist -->
    @props(['stockLevel', 'product'])
<div class="col-span-9 space-y-4">

     @if (Cart::instance('wishlist')->count() > 0)

    @foreach (Cart::instance('wishlist')->content() as $item)
    <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
        <div class="w-28">
            <img src="{{ asset('storage/' . $item->model->thumbnail) }}" alt="product 6" class="w-full h-24">
        </div>
        <div class="w-1/3">
            <h2 class="text-gray-800 text-xl font-medium uppercase">{{ $item->model->name }}</h2>
            <p class="text-gray-500 text-sm">Availability: <span class="text-green-600">
                @if ($item->model->quantity > 6)
                <span class="text-green-600">In Stock</span>
                @endif

                @if ($item->model->quantity  <= 6 && $item->model->quantity  > 0)
                <span class="text-yellow-600">Low Stock</span>
                @endif

               @if ($item->model->quantity  == 0)
               <span class="text-green-600">Out Of Stock</span>
               @endif
            </span></p>
        </div>
        <div class="text-primary text-lg font-semibold">${{ $item->model->price }}</div>
            @if ($item->model->quantity > 0)
            <form action="{{ route('cart.store', $item->model) }}" method="post">
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="quantity" value="{{ $product->quantity }}">
                <input type="hidden" name="price" value="{{ $product->price }}">

               <button type="submit"
               class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">
              Add to cart
            </button>
           </form>

           @endif

        <div class="text-gray-600 cursor-pointer hover:text-primary">
            <form action="{{ route('wihslist.store', $item->rowId) }}" method="post">
                @csrf
                @method('DELETE')
                 <button type="submit" class="cart-options"><i class="fa-solid fa-trash"></i></button>
             </form>
        </div>
    </div>
    @endforeach
     @else
     <div class="flex items-center justify-center">
        <div class="text-center text-indigo-950 rounded-full bg-gray-200 p-5 m-5 ">
            You WishList Is Empty
          </div>

           <div class="w-80">

            <img  src="{{asset('images/wishlist.avif')}}" alt="" class="h-80 rounded-full">
            </div>
       </div>
     @endif

</div>
<!-- ./wishlist -->

 <x-flash />
</x-wishList.wrapper>
