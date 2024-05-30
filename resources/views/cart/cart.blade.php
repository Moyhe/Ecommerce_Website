
<x-app-layout>
    <x-cart.breadcrumb />
    <x-cart.sidebar :discount="$discount" :newTotal="$newTotal" :newTax="$newTax" :newSubTotal="$newSubTotal" />
    <x-home.footer></x-home.footer>
</x-app-layout>
