@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full p-3 indent-2 inline-flex items-center border-l-4 border-rose-400 bg-rose-200 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-rose-700 transition duration-150 ease-in-out'
            : 'block w-full p-3 inline-flex items-center bg-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
