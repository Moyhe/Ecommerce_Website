<x-mail::message>

# Order Details

Thank you for your order.

**Order ID:** {{ $order->order_number }}

**Order Email:** {{ $order->email }}

**Order Name:**  {{ $order->firstName }}

**Order Total:**  ${{ $order->totalPrice }}

**Products Ordered**

@foreach ($order->products as $product)

Name: {{ $product->name }} <br>
Price: ${{ $product->price }} <br>
Quantity: {{ $product->pivot->quantity }} <br>

@endforeach

<x-mail::button :url="config('app.url')"  color="success">
Go To Main Page
</x-mail::button>


Thank you again for choosing us.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
