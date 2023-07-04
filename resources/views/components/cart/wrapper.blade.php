<div {{ $attributes->merge(['class' => "container grid grid-cols-12 items-start gap-6 pt-4 pb-28"]) }}>

    {{ $slot }}

    <x-flash />
</div>
