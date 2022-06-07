<x-layout>
    <x-setting heading="Create New Role">
        <div class="flex-1">
            <x-panel>
                <form method="post" action="/admin/roles" enctype="multipart/form-data">
                    @csrf
                    <x-form.input name="name" />

                    <x-form.button>Add</x-form.button>
                </form>
                
            </x-panel>
        </div>
    </x-setting>
</x-layout>