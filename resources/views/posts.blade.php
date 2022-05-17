<x-layout>
    <x-slot name="content">
        @foreach ($posts as $post)
        <h1><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h1>
        <p>Author: <a href="/authors/{{ $post->author->id }}">{{ $post->author->name }}</a></p>
            @if ($loop->first)
                <div style='text-decoration: underline'>Last checkout the <b>first</b> record</div>
            @elseif ($loop->last)
                <div style='text-decoration: underline'>Last checkout the <b>last</b> record</div>
            @endif
            <p>{{ $post->excerpt }}</p>
            <p>Category: <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
        @endforeach
    </x-slot>
</x-layout>