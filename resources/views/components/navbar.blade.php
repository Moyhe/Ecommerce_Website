
<div class="flex items-center justify-between flex-grow md:pl-12 py-5">
    <div class="flex  items-center space-x-8 capitalize">
        @foreach($navigationItems as $item)
        <x-navbar-item :href="$item['href']">{{ $item['label'] }}</x-navbar-item>
      @endforeach

    </div>
</div>
