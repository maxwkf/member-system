<x-layout>
    <x-setting :heading="'Edit User: ' . $user->name">
        <x-panel>
            <form method="POST" action="/admin/users/{{ $user->id }}" class="mt-10">
                @csrf
                @method('PATCH')
                <x-form.input name="name" :value="old('name', $user->name)" />
                <x-form.input name="email" :value="old('email', $user->email)" />
                <x-form.input name="username" value="{{ $user->username }}" disabled />
                <x-form.select name="roles[]" :options="$roleOptions" multiple :value="old('roles', $user->roles()->pluck('slug')->toArray())"></x-form>
                <x-form.button>Update</x-form.button>

                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)

                            <li class="text-red-500 text-xs mt-2">{{ $error }}</li>
                            
                        @endforeach
                    </ul>
                @endif

            </form>
        </x-panel>
    </x-setting>
</x-layout>