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
                <h4 class="text-gray-800 font-medium">John Doe</h4>
            </div>
        </div>

        <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
            <div class="space-y-1 pl-8">
                <div href="#" class="block font-medium capitalize transition cursor-pointer hover:text-primary">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-regular fa-address-card"></i>
                    </span>
                   <span> <i class="fa-solid fa-user"></i> </span>    <span class="mx-2"> Manage account</span>
                </div>
                <a href="#" class="relative hover:text-primary block capitalize transition">
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
                <a href="#" class="relative hover:text-primary block capitalize transition">
                    My returns
                </a>
                <a href="#" class="relative hover:text-primary block capitalize transition">
                    My Cancellations
                </a>
                <a href="#" class="relative hover:text-primary block capitalize transition">
                    My reviews
                </a>
            </div>

            <div class="space-y-1 pl-8 pt-4">
                <a href="#" class="relative hover:text-primary block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-regular fa-credit-card"></i>
                    </span>
                    Payment methods
                </a>
                <a href="#" class="relative hover:text-primary block capitalize transition">
                    voucher
                </a>
            </div>

            <div class="space-y-1 pl-8 pt-4">
                <a href="#" class="relative text-primary block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-regular fa-heart"></i>
                    </span>
                    My wishlist
                </a>
            </div>



        </div>
    </div>
    <!-- ./sidebar -->

    <x-cart.cart-list />

</x-cart.wrapper>
