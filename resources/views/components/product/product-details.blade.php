
 @props(['product', 'stockLevel'])

 <!-- ./description -->

    <!-- product-detail -->
    <div class="container grid grid-cols-2 gap-6">
        <div x-data="{
            imageUrl: '{{ asset('storage/' . $product->thumbnail) }}',

              }">

            <img :src="imageUrl" alt="product" class="w-full h-96" id="currentThumbnail">

            <div class="grid grid-cols-5  gap-4 mt-4">

               @if ($product->thumbnails)

               @foreach ($product->thumbnails as $thumbnail)
               <img  @click="imageUrl = '{{ asset('storage/' . $thumbnail) }}'" src="{{ asset('storage/' . $thumbnail) }}"  alt="product2" class="w-full cursor-pointer border changedThumbnail h-24">
               @endforeach

               @endif

            </div>
        </div>

        <div>
            <h2 class="text-3xl font-medium uppercase mb-2">{{ $product->name }}</h2>
            <div class="flex items-center mb-4">
                <div class="flex gap-1 text-sm text-yellow-400">
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(150 Reviews)</div>
            </div>
            <div class="space-y-2">
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>Availability: </span>
                    {!! $stockLevel !!}
                </p>

                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Category: </span>
                    <span class="text-gray-600">
                      @foreach ($product->categories as $category)
                          {{ $category->name }}
                      @endforeach
                    </span>
                </p>

            </div>
            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                <p class="text-xl text-primary font-semibold">${{ $product->price }}</p>
                <p class="text-base text-gray-400 line-through">$55.00</p>
            </div>

            <div class="mt-6 flex gap-3 border-b border-gray-200 pb-5 pt-5">

                @if ($product->quantity > 0)
                <form action="{{ route('cart.store', $product) }}" method="post">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="quantity" value="{{ $product->quantity }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">

                   <button type="submit"
                   class="bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition">

                   <i class="fa-solid fa-bag-shopping"></i>Add to cart
                </button>
               </form>

               @endif

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
                   class="border border-gray-300 text-gray-600 px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:text-primary transition">
                   <i class="fa-solid fa-heart"></i> Wishlist
                </button>
               </form>

               @endif


            </div>

        </div>
    </div>
    <!-- ./product-detail -->
