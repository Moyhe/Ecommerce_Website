@props(['name'])

<label for="{{$name}}" class="text-gray-600"> {{ ucwords($name) }}
    @if ($name == 'First Name' || $name == 'Last Name')
    <span
    class="text-primary">*</span>
    @endif

</label>
