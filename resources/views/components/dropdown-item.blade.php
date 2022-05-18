@props(['active' => false])

@php
    $classes = (fn() => "block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white " . ( $active ? 'bg-blue-500 text-white' : '' ))();
@endphp

<a {{ $attributes->merge(["class" => $classes]) }}>
    {{ $slot }}
</a>