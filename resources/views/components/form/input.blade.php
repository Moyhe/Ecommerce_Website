@props(['name'])

<x-form.label name="{{ $name }}"/>

<input class="input-box"
       name="{{ $name }}"
       id="{{ $name }}"
       {{ $attributes(['value' => old($name)]) }}
>

<x-form.error name="{{ $name }}"/>
