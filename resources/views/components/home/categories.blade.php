@props(['categories'])

   <!-- categories -->
   <div class="container py-16">
    <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">shop by category</h2>
    <div class="grid grid-cols-3 gap-3">
         @foreach ($categories as $category)
         <div class="relative rounded-sm overflow-hidden group">
            <img src="{{ asset('storage/' . $category->thumbnail) }}"  alt="category 1" class="w-full h-80">
            <a href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}"
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">{{$category->name}}</a>
        </div>
         @endforeach
    </div>
</div>
<!-- ./categories -->
