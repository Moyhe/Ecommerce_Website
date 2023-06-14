<!-- cartList -->
<div class="col-span-9 space-y-4">
    <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
        <div class="w-28">
            <img src="images/products/product6.jpg" alt="product 6" class="w-full">
        </div>

        <div class="" x-data="{count:0}">
            <h3 class="text-sm text-gray-800 uppercase mb-1">Quantity</h3>
            <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                <div @click="count = count > 0 ? count-1 : count"  class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</div>
                <div x-text="count" class="h-8 w-8 text-base flex items-center justify-center">

                </div>
                <div @click="count++" class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</div>
            </div>
        </div>

        <div class="w-1/3">
            <h2 class="text-gray-800 text-xl font-medium uppercase">Italian L shape</h2>
            <p class="text-gray-500 text-sm">Availability: <span class="text-green-600">In Stock</span></p>
        </div>



        <div class="text-primary text-lg font-semibold">$320.00</div>
    <a href="#"
        class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">save for later</a>

        <div class="text-gray-600 cursor-pointer hover:text-primary">
           <i class="fa-solid fa-trash"></i>
        </div>
    </div>

    <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
        <div class="w-28">
            <img src="images/products/product5.jpg" alt="product 6" class="w-full">
        </div>
        <div class="" x-data="{count:0}">
            <h3 class="text-sm text-gray-800 uppercase mb-1">Quantity</h3>
            <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                <div @click="count = count > 0 ? count-1 : count"  class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</div>
                <div x-text="count" class="h-8 w-8 text-base flex items-center justify-center">

                </div>
                <div @click="count++" class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</div>
            </div>
        </div>

        <div class="w-1/3">
            <h2 class="text-gray-800 text-xl font-medium uppercase">Dining Table</h2>
            <p class="text-gray-500 text-sm">Availability: <span class="text-green-600">In Stock</span></p>
        </div>
        <div class="text-primary text-lg font-semibold">$320.00</div>
        <a href="#"
            class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">save for later</a>

        <div class="text-gray-600 cursor-pointer hover:text-primary">
            <i class="fa-solid fa-trash"></i>
        </div>
    </div>

    <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
        <div class="w-28">
            <img src="images/products/product10.jpg" alt="product 6" class="w-full">
        </div>
        <div class="" x-data="{count:0}">
            <h3 class="text-sm text-gray-800 uppercase mb-1">Quantity</h3>
            <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                <div @click="count = count > 0 ? count-1 : count"  class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</div>
                <div x-text="count" class="h-8 w-8 text-base flex items-center justify-center">

                </div>
                <div @click="count++" class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</div>
            </div>
        </div>

        <div class="w-1/3">
            <h2 class="text-gray-800 text-xl font-medium uppercase">Sofa</h2>
            <p class="text-gray-500 text-sm">Availability: <span class="text-red-600">Out of Stock</span></p>
        </div>
        <div class="text-primary text-lg font-semibold">$320.00</div>
        <a href="#"
            class="cursor-not-allowed px-6 py-2 text-center text-sm text-white bg-red-400 border border-red-400 rounded transition uppercase font-roboto font-medium">save for later</a>

        <div class="text-gray-600 cursor-pointer hover:text-primary">
            <i class="fa-solid fa-trash"></i>
        </div>
    </div>

<br>

    <div class="flex items-center  justify-between border gap-6 p-4 border-gray-200 rounded">

        <div class="w-2/3">
            <h2 class="text-gray-800 text-xl font-medium uppercase">Total Price</h2>
        </div>
        <div class="text-primary  text-lg font-semibold">$320.00</div>

    </div>

    <div class="flex items-center absolute mx-auto justify-between border gap-3 p-4 border-gray-200 rounded">

        <a href="#"
        class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">process to checkout</a>


       <a href="#"
       class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">continue shopping</a>


    </div>

</div>
<!-- ./cartList -->
