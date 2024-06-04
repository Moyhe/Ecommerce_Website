@props(['active' => false, 'low', 'high'])

@php
    $classes = "flex items-center px-6 py-3 hover:bg-gray-200 rounded transition ";
    if ($active) $classes .= ' bg-gray-200 text-white';
@endphp

<a href="{{ route('shop', ['sort' => 'low-high']) }}" {{ $attributes->merge(['class' => $classes]) }}>
    <span class="flex flex:wrap text-gray-600 text-sm">
        {{ $low }}
    </span>

</a>

<a href="{{route('shop', ['sort' => 'high-low'])}}" {{ $attributes->merge(['class' => $classes]) }}>
    <span class="flex flex:wrap text-gray-600 text-sm">
        {{ $high }}
    </span>

</a>
