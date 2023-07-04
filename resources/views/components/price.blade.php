

<span class="text-white">
    <i class="fa-solid fa-bars"></i>
</span>
<span class="capitalize w-full ml-2 text-white">
  products Prices
</span>

<div class="absolute lg:w-full overflow-auto rounded z-40  w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">


    <x-price-item >

        <x-slot name="low" >

            {{ __('Low To High') }}

        </x-slot>

    <x-slot name="high">

        {{ __('High To Low') }}

    </x-slot>

    </x-price-item>


</div>
