<a href="{{ route('shop') }}" {{ $attributes->merge(['class' => 'bg-primary border border-primary text-white px-8 py-3 font-medium
    rounded-md hover:bg-transparent hover:text-primary']) }} >{{ $slot }}</a>
