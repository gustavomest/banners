@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-1 pt-1 border-b-2 font-bold border-clrPrimary  focus:outline-none focus:border-clrPrimary transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 font-bold border-transparent focus:outline-none focus:text-clrSecondary hover:border-clrPrimary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
