@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-block py-2 px-4 text-black font-bold no-underline'
            : 'inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
