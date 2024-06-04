<button
  {{
    $attributes->class([
      'py-4 px-6 md:px-9 lg:px-6 xl:px-9 rounded leading-normal border inline-block transition bg-primary border-primary text-white hover:bg-opacity-80',

    ])
  }}
>
  {{$slot}}
</button>
