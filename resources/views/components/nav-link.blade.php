@props(['active' => false])

<a class="{{ $active ? 'text-orange-500 font-extrabold' : 'text-gray-700'}} hover-line font-lato rounded-md py-2 px-0 mr-1 ml-1 text-sm font-semibold hover:text-orange-400 transition-colors duration-200"
   aria-current="{{$active ? 'page' : 'false'}}"
    {{ $attributes }}
>{{$slot}}
</a>
