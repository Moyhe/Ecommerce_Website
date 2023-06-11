@props(['href'])

@php
    $classes = "text-gray-800 hover:gray-400 transition";
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>{{$slot}}</a>
