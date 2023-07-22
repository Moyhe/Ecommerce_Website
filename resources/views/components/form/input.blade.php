@props(['name'])


<input class="input-box"
       name="{{ $name }}"
       id="{{ $name }}"
       {{$name}} == 'email' ? type="email" : type="text"
       {{ $attributes(['value' => old($name)]) }}
>

<x-form.error name="{{ $name }}"/>
