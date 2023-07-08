<div >

<br>

<div class="flex items-center  justify-between border gap-6 p-4 border-gray-200 rounded">

   <div class="w-2/3">
       <h2 class="text-gray-800 text-xl font-medium ">SubTotal</h2>
   </div>
   <div class="text-primary  text-lg font-semibold">${{ Cart::subtotal() }}</div>

</div>

<div class="flex items-center  justify-between border gap-6 p-4 border-gray-200 rounded">

   <div class="w-2/3">
       <h2 class="text-gray-800 text-xl font-medium ">Taxes</h2>
   </div>
   <div class="text-primary  text-lg font-semibold">${{ Cart::tax() }}</div>

</div>

<div class="flex items-center  justify-between border gap-6 p-4 border-gray-200 rounded">

   <div class="w-2/3">
       <h2 class="text-gray-800 text-xl font-medium ">Total Price</h2>
   </div>
   <div class="text-primary  text-lg font-semibold">${{ Cart::total() }}</div>

</div>


   <div class="flex items-center absolute mx-auto justify-between border gap-3 p-4 border-gray-200 rounded">

       <a href="#"
       class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">process to checkout</a>


      <a href="{{ route('shop') }}"
      class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">continue shopping

     </a>

   </div>


<!-- ./cartList -->

</div>
