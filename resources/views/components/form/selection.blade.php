@props(['name', 'title', 'value', 'options' => []])

@php
    $title = $title ?? $name;
    $selectedOptionId = old($name) ?? $value ?? "";
@endphp

<x-form.field>
    <x-form.label name="{{ $title }}" />

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        class="border border-gray-400 p-2 w-full"
        {{ $attributes }}
        >
        @foreach($options as $option)
            <option value="{{ $option->id }}" {{ $option->id == $selectedOptionId ? ' selected="selected"' : '' }}>{{ ucwords($option->name) }}</option>
        @endforeach
    </select>
</x-form.field>