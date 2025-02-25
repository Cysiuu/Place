@props(['active' => false])

<a class="{{ $active ? 'bg-orange-500 text-white font-extrabold' : 'bg-transparent text-gray-700' }} font-lato block rounded-md px-3 py-2 text-base hover:bg-orange-400 hover:text-white transition-colors duration-200"
   aria-current="{{$active ? 'page' : 'false'}}"
    {{ $attributes }}
>{{$slot}}
</a>
