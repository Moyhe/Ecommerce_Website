<x-app-layout>

     <x-checkout.breadcrumb />
     <x-checkout.buy-order :discount="$discount" :newTotal="$newTotal" :token="$token" :newTax="$newTax" :newSubTotal="$newSubTotal" />
     <x-home.footer></x-home.footer>
 </x-app-layout>
