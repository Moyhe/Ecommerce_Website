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
    <div class="text-primary  text-lg font-semibold">${{ $discount }}</div>

 </div>

 <div class="flex items-center  justify-between border gap-6 p-4 border-gray-200 rounded">

    <div class="w-2/3">
        <h2 class="text-gray-800 text-xl font-medium "> new subTotal </h2>
        <br>
        <form action="{{ route('coupon.destroy') }}" method="POST">
           @csrf
           @method('DELETE')
           <button
           class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary rounded-full transition uppercase font-roboto font-medium">Remove</button>

        </form>

    </div>
    <div class="text-primary  text-lg font-semibold">${{ $newSubTotal }}</div>

 </div>

 <div class="flex items-center  justify-between border gap-6 p-4 border-gray-200 rounded">

    <div class="w-2/3">
        <h2 class="text-gray-800 text-xl font-medium ">Taxes ({{config('cart.tax')}}%)</h2>
    </div>
    <div class="text-primary  text-lg font-semibold">${{ Cart::tax() }}</div>

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

   <div class="flex items-center absolute mx-auto justify-between border gap-3 p-4 border-gray-200 rounded">

       <a href="#"
       class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">process to checkout</a>


      <a href="{{ route('shop') }}"
      class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">continue shopping

     </a>

   </div>


<!-- ./cartList -->

</div>
