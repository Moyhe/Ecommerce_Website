
<x-app-layout >
 <x-home.banner />
 <x-home.features />
 <x-home.categories :categories="$categories" />
 <x-home.new :products="$products" />
 <x-home.MoreToLove  :products="$products" />
 <x-home.footer />
 <x-top-button />
</x-app-layout>






