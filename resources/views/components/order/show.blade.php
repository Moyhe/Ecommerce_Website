<x-order.breadcrumb />

<x-order.wrapperShow>


    <div class="col-span-11 space-y-4">
        <div class="flex items-center justify-between  border-b border-gray-300 gap-4 p-4 ">

            <div>
                <h3 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Order Details</h3>

                 <span class="">Order Number</span>
                 <span class="font-medium">  </span>
                 <span class="mx-8"> created at </span>

            </div>


            <div class="text-gray-600 cursor-pointer hover:text-primary">
                <a href="" class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition  font-roboto font-medium">
                 View Invoice
                </a>
             </div>

          </div>
    </div>

    <div class="col-span-5 h-96 ">
    <img src="{{ asset('images/banner-bg.jpg') }}" alt="" class="h-96">
    </div>

    <div class="col-span-7 space-y-4 ">
      <div class="flex items-center justify-between  gap-6  rounded">
        <div class="pb-3 px-4">
            <p>
                <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"></h4>
            </p>
            <div class="flex items-baseline mb-1 space-x-2">
                <p class="text-xl text-primary font-semibold"></p>
                <p class="text-sm text-gray-400 line-through">$55.90</p>

            </div>

            <div class="mt-4">
                <p>

                </p>
            </div>

            <div class="flex items-center justify-between  gap-6 mt-16 rounded">
               <div class="font-semibold">
                <h3>delivery address</h3>
               </div>

            </div>
        </div>
      </div>
    </div>

    <div class="col-span-11 mt-8 space-y-4">
        <div class="flex items-center justify-between bg-slate-50 gap-4 p-4  rounded">

            <div class="w-48">
                <h3 class="text-sm text-gray-800 -mt-16 mb-1">Billing address</h3>
                <p class="text-gray-500 text-sm">

                </p>
            </div>

            <div class="w-48">

              <h3 class="text-sm text-gray-800  -mt-16 mb-1">Payment information</h3>
              <p class="text-gray-500 text-sm">

              </p>
            </div>

            <div class="-mt-4 col-span-7 w-3/5 p-4 rounded">

                <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                    <p>subtotal</p>
                    <p>$23</p>
                </div>

                <div class="flex justify-between border-b  border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                    <p>shipping</p>
                    <p>Free</p>
                </div>

                <div class="flex justify-between text-gray-800 font-medium py-3 uppercas">
                    <p class="font-semibold">Total</p>
                    <p>$23</p>
                </div>
            </div>

        </div>
    </div>


</x-order.wrapperShow>


