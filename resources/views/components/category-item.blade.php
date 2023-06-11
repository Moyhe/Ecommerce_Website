@props(['href', 'image'])

@php
    $classes = "flex items-center px-6 py-3 hover:bg-gray-400 transition";
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>

    <img src="{{ $image }}" alt="terrace" class="w-5 h-5 object-contain">

    <span class="ml-6 text-gray-600 text-sm">
        {{ $slot }}
    </span>


</a>
