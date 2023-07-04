
<x-app-layout>
    <x-product.breadcrumb />
    <x-product.product-details :product="$product" :stockLevel="$stockLevel"  />
    <x-product.product-description :product="$product"/>
    <x-product.related-product :relatedProducts="$relatedProducts" />
    <x-home.footer />
</x-app-layout>

