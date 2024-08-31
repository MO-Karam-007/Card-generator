@props(['active'=>false])

<a {{$attributes}}
    class=" {{ $active ? 'dark:text-white' :'dark:text-gray-400'  }} block py-2 pr-4 pl-3 text-gray-700 rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 ">{{$slot}}</a>