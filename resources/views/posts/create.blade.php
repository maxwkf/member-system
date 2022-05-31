<x-layout>

    <x-panel>
        <h1 class="text-center font-bold text-xl">Make a Post</h1>
        <form method="post" action="/admin/posts">
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="border border-gray-400 p-2 w-full" value="{{ old("title") }}" />
                @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">Slug</label>
                <input type="text" name="slug" id="slug" class="border border-gray-400 p-2 w-full" value="{{ old("slug") }}" />
                @error('slug')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                <select name="category_id" id="category_id" class="border border-gray-400 p-2 w-full">
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old("category_id") ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
                <input type="text" name="excerpt" id="excerpt" class="border border-gray-400 p-2 w-full" value="{{ old("excerpt") }}" />
                @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                <textarea name="body" id="body" class="border border-gray-400 p-2 w-full">{{ old("body") }}</textarea>
                @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <x-submit-button>Publish</x-submit-button>
        </form>
        
    </x-panel>

</x-layout>