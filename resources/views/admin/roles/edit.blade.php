<x-layout>
    <x-setting :heading="'Edit Role: ' . $role->name">
        <div class="flex-1">
            <x-panel>
                <form method="post" action="/admin/roles/{{ $role->id }}">
                    @csrf
                    @method('PATCH')
                    <x-form.input name="name" value="{{ $role->name }}" />

                    <x-form.button>Update</x-form.button>
                </form>
                
            </x-panel>
        </div>
    </x-setting>
</x-layout>