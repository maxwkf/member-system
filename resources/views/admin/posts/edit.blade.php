<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <div class="flex-1">
            <x-panel>
                <form method="post" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <x-form.input name="title" :value="old('title', $post->title)" />
                    <x-form.input name="slug" :value="old('slug', $post->slug)"/>
                    <x-form.select name="category_id" title="Category" :options="\App\Models\Category::all()" :value="old('category_id', $post->category_id)" />

                    <div class="flex mt-6">
                        <x-form.input name="thumbnail" type="file" class="flex-1" />
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" class="rounded-full ml-6" alt="" width="100"/>
                    </div>

                    <x-form.input name="excerpt" :value="old('excerpt', $post->excerpt)" />
                    <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

                    <x-form.button>Update</x-form.button>
                </form>
                
            </x-panel>
        </div>
    </x-setting>
    
</x-layout>