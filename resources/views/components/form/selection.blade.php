@props(['name', 'title', 'options' => []])

@php
    $title = $title ?? $name;
@endphp

<x-form.field>
    <x-form.label name="{{ $title }}" />

    <select name="{{ $name }}" id="{{ $name }}" class="border border-gray-400 p-2 w-full">
        @foreach($options as $option)
            <option value="{{ $option->id }}" {{ $option->id == old($name) ? ' selected="selected"' : '' }}>{{ ucwords($option->name) }}</option>
        @endforeach
    </select>
</x-form.field>