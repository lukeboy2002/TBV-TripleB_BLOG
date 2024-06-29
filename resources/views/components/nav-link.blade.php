@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center text-white bg-orange-500 hover:bg-orange-600 focus:ring-1 focus:ring-orange-100 font-medium rounded-lg text-sm px-5 py-2 my-3 focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center dark:text-white bg-gray-200 dark:bg-gray-600 hover:bg-orange-500 dark:hover:bg-orange-500 focus:ring-1 focus:ring-orange-100 font-medium rounded-lg text-sm px-5 py-2 my-3 hover:text-white focus:outline-none focus:text-white transition duration-150 ease-in-out';
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
