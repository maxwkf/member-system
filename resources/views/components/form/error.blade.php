@props(['name'])


@php

$name = preg_replace("/\[|\]/", '', $name);

@endphp

@error("$name")
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
@enderror