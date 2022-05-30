@props(['comment'])

<article class="flex border border-gray-200 bg-gray-100 rounded-xl p-6 space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{ $comment->author->id }}" width="60" height="60" />
    </div>
    <div class="space-y-4">
        <header>
            <div class="text-xl font-semibold">{{ $comment->author->name }}</div>
            <div class="text-sm"><time>{{ $comment->created_at->format('F j, Y') }}</time></div>
        </header>
        <main>{{ $comment->body }}</main>
    </div>
</article>