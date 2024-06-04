
<span class="text-white">
    <i class="fa-solid fa-bars"></i>
</span>
<a class="capitalize ml-2 text-white" href="{{route('home')}}">
    {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
</a>

<div class="absolute lg:w-50 overflow-auto z-40  rounded  w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">

<x-category-item

    href="/?{{ http_build_query(request()->except('category')) }}"
    :active="request()->routeIs('home') && is_null(request()->getQueryString())">

  All
</x-category-item>

    @foreach($categories as $category)
    <x-category-item
    :active='request()->fullUrlIs("*?category={$category->slug}*")'
     href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}">
        {{ ucwords($category->name) }}
    </x-category-item>
    @endforeach
</div>
