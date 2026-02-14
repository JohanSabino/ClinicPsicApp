@props(['active' => false])

@php
$classes = ($active ?? false)
  ? 'toggleColour inline-block py-2 px-4 font-bold no-underline text-white'
  : 'toggleColour inline-block py-2 px-4 no-underline hover:underline text-white hover:text-gray-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
