<x-layout>
    @include('posts._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-post-featured-card :post="$posts[0]" />

            @if ($posts->count() > 1)
            
                <div class="lg:grid lg:grid-cols-6">
                    @foreach($posts->skip(1) as $post)
                        <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
                    @endforeach
                </div>
            @endif

            {{ $posts->links() }}
        @else
            <p class="w-full text-center text-lg">There are no matched posts.</p>
        @endif
    </main>
</x-layout>