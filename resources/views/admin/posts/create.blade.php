<x-layout>
    <x-setting heading="Create New Post">
        <div class="flex-1">
            <x-panel>
                <form method="post" action="/admin/posts" enctype="multipart/form-data">
                    @csrf
                    <x-form.input name="title" />
                    <x-form.input name="slug" />
                    <x-form.select name="category_id" title="Category" :options="\App\Models\Category::all()" />
                    <x-form.input name="thumbnail" type="file" />
                    <x-form.input name="excerpt" />
                    <x-form.textarea name="body" />

                    <x-form.button>Publish</x-form.button>
                </form>
                
            </x-panel>
        </div>
    </x-setting>
</x-layout>