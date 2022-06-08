@props(['name', 'title', 'value', 'options' => []])

@php
    $title = preg_replace("/\[|\]/", '', $title ?? $name);
    $selectedOptionId = old($name) ?? $value ?? "";
@endphp

<x-form.field>
    <x-form.label name="{{ $title }}" />

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        class="border border-gray-400 p-2 w-full rounded-xl p-2"
        {{ $attributes }}
        >
        @foreach($options as $option)
            <option value="{{ $option->id }}" {{ $option->id == $selectedOptionId ? ' selected="selected"' : '' }}>{{ ucwords($option->name) }}</option>
        @endforeach
    </select>
    <x-form.error name="{{ $name }}" />
</x-form.field>