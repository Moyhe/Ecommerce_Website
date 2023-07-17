<x-order.breadcrumb />

<x-order.wrapper>



    <div class="col-span-11 mb-12 space-y-4">

        <div>
            <h3 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Order history</h3>
          <p>

          </p>
        </div>
    </div>

 {{-- @foreach ($orders as $order) --}}
<div class="col-span-12 space-y-4">
  <div class="flex items-center justify-between bg-slate-50 gap-4 p-4  rounded">

    <div class="w-28">
        <h3 class="text-sm text-gray-800  mb-1">Date Placed</h3>
        <p class="text-gray-500 text-sm">
         {{-- {{ $order->created_at }} --}}
        </p>
    </div>

    <div>

      <h3 class="text-sm text-gray-800  mb-1">Order Number</h3>
      <p class="text-gray-500 text-sm">
       {{-- {{$order->order_number}} --}}
      </p>
    </div>

    <div class="w-1/3">
        <h3 class="text-sm text-gray-800  mb-1">Total Amount</h3>
        <p class="text-gray-500 text-sm">
       {{-- {{ $order->totalPirce }} --}}
        </p>
    </div>


    <div class="text-gray-600 cursor-pointer hover:text-primary">
       <a href="" class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition  font-roboto font-medium">
        View Invoice
       </a>
    </div>

</div>


<div class="flex items-center justify-between  border-b border-gray-300 gap-4 p-4 ">

    <div class="w-28 ">
        <h3 class="text-sm text-gray-800  mb-4">Product</h3>
    </div>

    <div>

      <h3 class="text-sm text-gray-800  mb-4">Price</h3>

    </div>

    <div class="w-1/3">
        <h3 class="text-sm text-gray-800  mb-4">Status</h3>

    </div>

    <div class="text-gray-600  hover:text-primary">
        <h3 class="text-sm text-gray-800  mb-4">Info</h3>
    </div>

  </div>

{{-- @foreach ($order->products as $product) --}}

<div class="flex items-center justify-between  border-b border-gray-300 gap-4 p-4 ">

    <div class="w-28 ">
        <p class="text-gray-500 text-sm">
            {{-- {{ $order->totalPirce }} --}}
       </p>
    </div>

    <div>

        <p class="text-gray-500 mx-32 text-sm">
            {{-- {{ $order->totalPirce }} --}}
        </p>

    </div>

    <div class="w-1/3">
        <p class="text-gray-500 text-sm">
            {{-- {{ $order->totalPirce }} --}}
         </p>

    </div>


    <div class="text-gray-600  cursor-pointer hover:text-primary">

    {{-- <a href="{{route('order.show', $order->id)}}" class="px-6  py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition  font-roboto font-medium">
        View Product
        </a> --}}
    </div>
  </div>

{{-- @endforeach --}}

</div>

  {{-- @endforeach --}}

</x-order.wrapper>


