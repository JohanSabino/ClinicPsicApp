@props(['active' => false])

@php
$classes = ($active ?? false)
            ? 'toggleColour text-white inline-block py-2 px-4 font-bold no-underline'
            : 'toggleColour text-white inline-block py-2 px-4 no-underline hover:underline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
