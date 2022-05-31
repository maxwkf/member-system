<x-layout>

    <x-panel>
        <h1 class="text-center font-bold text-xl">Make a Post</h1>
        <form method="post" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.selection name="category_id" title="Category" :options="\App\Models\Category::all()" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.input name="excerpt" />
            <x-form.textarea name="body" />

            <x-form.button>Publish</x-form.button>
        </form>
        
    </x-panel>

</x-layout>