<x-layout>
    <x-slot name="content">
        @foreach ($posts as $post)
            <h1><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h1>
            <p>{{ $post->excerpt }}</p>
        @endforeach
    </x-slot>
</x-layout>