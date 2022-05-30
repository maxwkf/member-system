<form method="post" action="/posts/{{ $post->slug }}/comment">
    @csrf
    <div class="border border-gray-200 rounded-xl p-6 space-x-4">
        <div class="flex space-x-4">
            <div class="flex-shrink-0">
                <img src="https://i.pravatar.cc/40?u={{ auth()->user()->id }}" width="40" height="40" class="rounded-full" />
            </div>
            <div class="w-full">
                <textarea name="body" class="w-full" rows="5" placeholder="Leave your comment here"></textarea>
            </div>
        </div>

        @error('body')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror

        <x-submit-button>Post</x-submit-button>
    </div>
</form>