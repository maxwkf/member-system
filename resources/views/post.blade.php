<x-layout>
    <x-slot name="content">
        <h1>{{ $post->title }}</h1>
        <p>{!! $post->body !!}</p>
    </x-slot>
</x-layout>