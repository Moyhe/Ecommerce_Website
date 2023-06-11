<div class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">

    @foreach($categories as $category)
    <x-category-item :href="$category['href']">
      <x-slot name="image">
         {{ $category['image'] }}
      </x-slot>
      {{ $category['label'] }}
    </x-category-item>
    @endforeach
</div>
