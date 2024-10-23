@php
    $classes = 'block w-full px-4 py-2 text-start text-sm leading-5 hover:bg-gray/10 hover:text-clrPrimary
        focus:outline-none focus:bg-gray/20 focus:text-clrSecondary transition duration-150 ease-in-out';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>
