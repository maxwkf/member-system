<x-layout>
    @include('_posts-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count() > 0)
            <x-post-featured-card :post="$posts[0]" />

            @if ($posts->count() > 1)
            
                <div class="lg:grid lg:grid-cols-6">
                    @foreach($posts->skip(1) as $post)
                        <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
                    @endforeach
                </div>
            @endif
        @endif
    </main>
</x-layout>

<!-- <x-layout>
    <x-slot name="content">
        @foreach ($posts as $post)
        <h1><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h1>
        <p>By <a href="/authors/{{ $post->author->id }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a> &#64;{{ $post->created_at ? \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') : '' }}</p>
            @if ($loop->first)
                <div style='text-decoration: underline'>Last checkout the <b>first</b> record</div>
            @elseif ($loop->last)
                <div style='text-decoration: underline'>Last checkout the <b>last</b> record</div>
            @endif
            <p>{{ $post->excerpt }}</p>
        @endforeach
        
    </x-slot>
</x-layout> -->