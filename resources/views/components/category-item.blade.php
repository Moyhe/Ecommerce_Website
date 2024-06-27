@props(['active' => false, 'href'])

@php
    $classes = "flex items-center px-6 py-3 hover:bg-gray-200 rounded transition";
    if ($active) $classes .= ' bg-gray-200 text-white';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    <span class="flex flex:wrap text-gray-600 text-sm">
        {{ $slot }}
    </span>

</a>


