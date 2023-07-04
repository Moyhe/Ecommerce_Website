
<x-cart.wrapper>

    <!-- sidebar -->
    <div class="col-span-3">
        <div class="px-4 py-3 shadow flex items-center gap-4">
            <div class="flex-shrink-0">
                <img src="images/products/product6.jpg" alt="profile"
                    class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
            </div>
            <div class="flex-grow">
                <p class="text-gray-600">Hello,</p>
                <h4 class="text-gray-800 font-medium">{{ request()->user()->name }}</h4>
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
                <a href="{{ route('profile.edit') }}" class="relative hover:text-primary block left-6 capitalize transition">
                    Profile information
                </a>
            </div>

            <div class="space-y-1 pl-8 pt-4">
                <a href="#" class="relative hover:text-primary block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-solid fa-box-archive"></i>
                    </span>
                    My order history
                </a>
            </div>

            <div class="space-y-1 pl-8 pt-4">
                <a href="{{ route('wishlist') }}" class="relative text-primary block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-regular fa-heart"></i>
                    </span>
                    My wishlist
                </a>
            </div>



        </div>
    </div>
    <!-- ./sidebar -->

<!-- cartList -->
@props(['stockLevel'])

<div class="col-span-9 space-y-4">
      @foreach (Cart::content() as $item)
      <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
        <div class="w-28">
            {{-- <img src="images/products/product5.jpg" alt="product 6" class="w-full"> --}}
            <img src="{{ asset('storage/' . $item->model->thumbnail) }}" alt="product 6" class="w-full h-24">
        </div>
        <div class="" x-data="{count: '{{ $item->model->quantity }}'}">
            <h3 class="text-sm text-gray-800 uppercase mb-1">Quantity</h3>
            <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                <div @click="count = count > 0 ? count-1 : count"  class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</div>
                <div x-text="count" class="h-8 w-8 text-base flex items-center justify-center">

                </div>
                <div @click="count++" class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</div>
            </div>
        </div>

        <div class="w-1/3">
            <h2 class="text-gray-800 text-xl font-medium uppercase">{{$item->model->name}}</h2>
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
        <a href="#"
            class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">save for later</a>

        <div class="text-gray-600 cursor-pointer hover:text-primary">
            <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
               @csrf
               @method('DELETE')
                <button type="submit" class="cart-options"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

      @endforeach


  <x-cart.cart-list></x-cart.cart-list>


</div>
<!-- ./cartList -->


</x-cart.wrapper>
