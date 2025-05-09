@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#DBD2AF] text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-[#DBD2AF] transition duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-[#DBD2AF] dark:hover:border-[#DBD2AF] focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-[#DBD2AF] dark:focus:border-[#DBD2AF] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>