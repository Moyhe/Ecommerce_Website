
@props(['discount', 'newSubTotal', 'newTotal', 'newTax'])

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
                <a href="{{route('order')}}" class="relative hover:text-primary block font-medium capitalize transition">
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
        <div x-cloak  x-data="{

          count: '{{ $item->qty }}',
          id : '{{ $item->rowId }}',
          productQuantity: '{{ $item->model->quantity }}',

       async increament() {

            await axios.patch(`/cart/${this.id}`, {
                quantity: ++this.count,
                productQuantity: this.productQuantity,
                })
                .then(function (response) {
                window.location.href = '{{ route('cart') }}'
                })
                .catch(function (error) {
                window.location.href = '{{ route('cart') }}'
                });
            },

        async decreament() {

                await axios.patch(`/cart/${this.id}`, {
                quantity: --this.count,
                productQuantity: this.productQuantity,
                })
                .then(function (response) {
                window.location.href = '{{ route('cart') }}'
                })
                .catch(function (error) {
                window.location.href = '{{ route('cart') }}'
                });
            },

        }">

          <h3 class="text-sm text-gray-800 uppercase mb-1">Quantity</h3>
            <div :value="id" class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                <button  @click.prevent="decreament" :class="count == 1 ? 'pointer-events-none @disabled(true)' : '' "  class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</button>
                <input   :value="count"  class="h-8 w-8 bg-gray-100  text-center flex items-center justify-center quantity" @disabled(true) />
                <button  @click.prevent="increament"  class="h-8 w-8  text-xl flex items-center justify-center cursor-pointer select-none">+</button>
            </div>
        </div>

        <div class="w-1/3">
            <h2 class="text-gray-800 text-xl font-medium uppercase">{{$item->model->name}}</h2>
            <p class="text-gray-500 text-sm">Availability: <span class="text-green-600">

                @if ($item->model->quantity > config('cart.threshold'))
                <span class="text-green-600">In Stock</span>
                @endif

                @if ($item->model->quantity  <= config('cart.threshold') && $item->model->quantity  > 0)
                <span class="text-yellow-600">Low Stock</span>
                @endif

                @if ($item->model->quantity  == 0)
                <span class="text-green-600">Out Of Stock</span>
                @endif

            </span></p>
        </div>
        <div class="text-primary text-lg font-semibold">${{ $item->model->price }}</div>
         <form action="{{ route('cart.saveForLater', $item->rowId) }}" method="POST">
            @csrf
            <button type="submit"
            class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">save for later</button>
         </form>

        <div class="text-gray-600 cursor-pointer hover:text-primary">
            <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
               @csrf
               @method('DELETE')
                <button type="submit" class="cart-options"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

      @endforeach

   @if (Cart::count() > 0 && !session()->has('coupon'))
   <div class="">
    <p class="mb-4 md:flex justify-end italic">If you have a coupon code, please enter it in the box below</p>
    <div class="justify-end md:flex">
      <form action="{{ route('coupon.store') }}" method="POST">
        @csrf
          <div class="flex items-center w-full h-13 pl-3  bg-gray-200 border rounded-full">
            <input type="coupon" name="code" id="coupon" placeholder="Apply coupon"
                    class="w-full bg-gray-200 outline-none appearance-none focus:outline-none active:outline-none"/>
              <button type="submit" class="text-sm flex items-center px-3 py-1 text-white bg-gray-800 rounded-full outline-none md:px-4 hover:bg-gray-700 focus:outline-none active:outline-none">
                <svg aria-hidden="true" data-prefix="fas" data-icon="gift" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm256 32h160c17.7 0 32-14.3 32-32V320H288v160zm192-320h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40z"/></svg>
                <span class="font-medium">Apply coupon</span>
              </button>
          </div>
      </form>
    </div>
  </div>
   @endif


  @if (Cart::count() > 0)
  <div >

    <br>

    <div class="flex items-center  justify-between border gap-6 p-4 border-gray-200 rounded">

       <div class="w-2/3">
           <h2 class="text-gray-800 text-xl font-medium ">SubTotal</h2>
       </div>
       <div class="text-primary  text-lg font-semibold">${{ Cart::subtotal() }}</div>

    </div>


    @if (session()->has('coupon'))
    <div class="flex items-center  justify-between border gap-6 p-4 border-gray-200 rounded">

        <div class="w-2/3">
            <h2 class="text-gray-800 text-xl font-medium ">Code ({{ session()->get('coupon')['name'] }})</h2>
            <br>

            <form action="{{ route('coupon.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <button
                class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary rounded-full transition uppercase font-roboto font-medium">Remove</button>

             </form>


        </div>
        <div class="text-primary  text-lg font-semibold">-${{ $discount }}</div>

     </div>

     <div class="flex items-center  justify-between border gap-6 p-4 border-gray-200 rounded">

        <div class="w-2/3">
            <h2 class="text-gray-800 text-xl font-medium "> new subTotal </h2>

        </div>
        <div class="text-primary  text-lg font-semibold">${{ $newSubTotal }}</div>

     </div>

     <div class="flex items-center  justify-between border gap-6 p-4 border-gray-200 rounded">

        <div class="w-2/3">
            <h2 class="text-gray-800 text-xl font-medium ">Taxes ({{config('cart.tax')}}%)</h2>
        </div>
        <div class="text-primary  text-lg font-semibold">{{ $newTax }}</div>

     </div>

     <div class="flex items-center  justify-between border gap-6 p-4 border-gray-200 rounded">

        <div class="w-2/3">
            <h2 class="text-gray-800 text-xl font-medium ">New Total Price</h2>
        </div>
        <div class="text-primary  text-lg font-semibold">${{ $newTotal }}</div>

     </div>

    @else

    <div class="flex items-center  justify-between border gap-6 p-4 border-gray-200 rounded">

       <div class="w-2/3">
           <h2 class="text-gray-800 text-xl font-medium ">Taxes ({{config('cart.tax')}}%)</h2>
       </div>
       <div class="text-primary  text-lg font-semibold">${{ Cart::tax() }}</div>

    </div>

    <div class="flex items-center  justify-between border gap-6 p-4 border-gray-200 rounded">

       <div class="w-2/3">
           <h2 class="text-gray-800 text-xl font-medium ">Total Price</h2>
       </div>
       <div class="text-primary  text-lg font-semibold">${{ Cart::total() }}</div>

    </div>

    @endif

       <div class="flex items-center absolute mx-auto justify-between border gap-3 mt-4 p-4 border-gray-200 rounded">

           <a href="{{ route('checkout') }}"
           class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">process to checkout</a>

{{--
          <a href="{{ route('shop') }}"
          class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">continue shopping

         </a> --}}

       </div>


    <!-- ./cartList -->

    </div>

  @else
   <div class="flex items-center justify-center">
    <div class="text-center text-indigo-950 rounded-full bg-gray-200 p-5 m-5 ">
        You Cart Is Empty
      </div>

       <div class="w-80">

        <img  src="{{asset('images/carts.jpg')}}" alt="" class="h-80 rounded-full">
        </div>
   </div>
  @endif



</div>
<!-- ./cartList -->



</x-cart.wrapper>


<x-cart.wrapper>



  <div class="col-span-3"></div>

    <div class="col-span-9">

        @if (Cart::instance('saveForLater')->count() > 0)
        <h1 class="bg-gray-200 rounded font-bold p-3 flex justify-center">
           <p>   ({{ Cart::instance('saveForLater')->count() }})  items Saved For Later</p>
          </h1>
        @endif

    @foreach (Cart::instance('saveForLater')->content() as $item)
    <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
      <div class="w-28">
          {{-- <img src="images/products/product5.jpg" alt="product 6" class="w-full"> --}}
          <img src="{{ asset('storage/' . $item->model->thumbnail) }}" alt="product 6" class="w-full h-24">
      </div>

      <div class="w-1/3">
          <h2 class="text-gray-800 text-xl font-medium uppercase">{{$item->model->name}}</h2>
          <p class="text-gray-500 text-sm">Availability: <span class="text-green-600">

              @if ($item->model->quantity > config('cart.threshold'))
              <span class="text-green-600">In Stock</span>
              @endif

              @if ($item->model->quantity  <= config('cart.threshold') && $item->model->quantity  > 0)
              <span class="text-yellow-600">Low Stock</span>
              @endif

              @if ($item->model->quantity  == 0)
              <span class="text-green-600">Out Of Stock</span>
              @endif

          </span></p>
      </div>
      <div class="text-primary text-lg font-semibold">${{ $item->model->price }}</div>
       <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="post">
        @csrf
        <button type="submit"
          class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Move To Cart</button>
       </form>

      <div class="text-gray-600 cursor-pointer hover:text-primary">
          <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="post">
             @csrf
             @method('DELETE')
              <button type="submit" class="cart-options"><i class="fa-solid fa-trash"></i></button>
          </form>
      </div>
  </div>

    @endforeach

  </div>
</x-cart.wrapper>
