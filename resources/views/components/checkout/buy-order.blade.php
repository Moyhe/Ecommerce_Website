@props(['newTotal', 'newSubTotal', 'token'])

<x-checkout.wrapper>

    <x-form.field>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="first-name" class="text-gray-600">First Name <span
                            class="text-primary">*</span></label>
                    {{-- <input type="text" name="first_name" id="first-name"  value="{{ old('first_name') }}" class="input-box"> --}}
                    <x-form.input name="first_name" />
                </div>
                <div>
                    <label for="last-name" class="text-gray-600">Last Name <span
                            class="text-primary">*</span></label>
                    {{-- <input type="text" name="last_name"value="{{ old('last_name') }}" id="last-name" class="input-box"> --}}
                    <x-form.input name="last_name" />
                </div>
            </div>

            <div>
                <label for="country" class="text-gray-600">Country/Region</label>
                {{-- <input type="text" name="country" value="{{ old('country') }}" id="country" class="input-box"> --}}
                <x-form.input name="country" />
            </div>


            <div>
                <label for="address" class="text-gray-600">Street address</label>
                {{-- <input type="text" value="{{ old('address') }}" name="address" id="address" class="input-box"> --}}
                <x-form.input name="address" />
            </div>


            <div>
                <label for="city" class="text-gray-600">City</label>
                {{-- <input type="text" value="{{ old('city') }}" name="city" id="city" class="input-box"> --}}
                <x-form.input name="city" />
            </div>
            <div>
                <label for="phone" class="text-gray-600">Phone number</label>
                {{-- <input type="text" value="{{ old('phone') }}" name="phone" id="phone" class="input-box"> --}}
                <x-form.input name="phone" />
            </div>
            <div>
                <label for="email" class="text-gray-600">Email address</label>
                {{-- <input type="email" value="{{ old('email') }}" name="email" id="email" class="input-box"> --}}
                <x-form.input name="email" />
            </div>

        </x-form.field>


    @if (Cart::instance('default')->count() > 0)
    @if (session()->has('coupon'))
    <div class="col-span-4 border border-gray-200 p-4 rounded">
        <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">order summary</h4>
        <div class="space-y-2">
             @foreach (Cart::instance('default')->content() as $item)

              <div class="flex justify-between">
                <div>
                    <h5 class="text-gray-800 font-medium shrink w-64 ">{{ $item->model->name }}</h5>

                </div>
                <p class="text-gray-600">
                    x{{ $item->qty }}
                </p>
                <p class="text-gray-800 font-medium">${{ $item->model->price }}</p>
            </div>

             @endforeach
        </div>

        <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
            <p>subtotal</p>
            <p>${{ $newSubTotal }}</p>
        </div>

        <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
            <p>shipping</p>
            <p>Free</p>
        </div>

        <div class="flex justify-between text-gray-800 font-medium py-3 uppercas">
            <p class="font-semibold">Total</p>
            <p>${{ $newTotal }}</p>
        </div>
{{--
        <a href="{{ route('payment') }}"
            class="block w-full py-3 px-4 text-center text-white bg-primary border border-primary rounded-md hover:bg-transparent hover:text-primary transition font-medium">Place
            order</a> --}}
    </div>
    @else
    <div class="col-span-4 border border-gray-200 p-4 rounded">
        <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">order summary</h4>
        <div class="space-y-2">
             @foreach (Cart::instance('default')->content() as $item)

              <div class="flex justify-between">
                <div>
                    <h5 class="text-gray-800 font-medium shrink w-64 ">{{ $item->model->name }}</h5>

                </div>
                <p class="text-gray-600">
                    x{{ $item->qty }}
                </p>
                <p class="text-gray-800 font-medium">${{ $item->model->price }}</p>
            </div>

             @endforeach
        </div>

        <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
            <p>subtotal</p>
            <p>${{ Cart::subtotal() }}</p>
        </div>

        <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
            <p>shipping</p>
            <p>Free</p>
        </div>

        <div class="flex justify-between text-gray-800 font-medium py-3 uppercas">
            <p class="font-semibold">Total</p>
            <p>${{ Cart::total() }}</p>
        </div>

       {{-- <a href="{{ route('payment') }}"
            class="block w-full py-3 px-4 text-center text-white bg-primary border border-primary rounded-md hover:bg-transparent hover:text-primary transition font-medium">Place
            order</a> --}}


    </div>

    @endif
    @endif

    <div class="col-span-8 border border-gray-200 p-4 rounded">
        <iframe  width="100%"   height="900" src="https://accept.paymob.com/api/acceptance/iframes/772976?payment_token={{$token}}" frameborder="0"></iframe>
    </div>

</x-checkout.wrapper>
