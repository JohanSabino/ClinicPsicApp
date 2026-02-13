@props(['active' => false])

@php
$classes = ($active ?? false)
  ? 'toggleColour inline-block py-2 px-4 font-bold no-underline text-gray-800 lg:text-white'
  : 'toggleColour inline-block py-2 px-4 no-underline hover:underline text-gray-800 lg:text-white lg:hover:text-gray-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>
