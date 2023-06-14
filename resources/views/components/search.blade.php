   <!-- Search -->
<div class="py-2  bg-white">
    <div class="container flex items-center justify-between">
        <div class="w-full max-w-xl relative flex">
            <span class="absolute left-4 top-3 text-lg text-gray-400">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
          <form action="" method="get">
            @csrf
            <input type="text" name="search" id="search"
            class="w-full   border border-primary  pl-12 py-3 pr-3 rounded focus:outline-none hidden md:flex"
            placeholder="search">
          </form>
        </div>
    </div>
</div>
