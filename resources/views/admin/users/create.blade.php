<x-layout>
    <x-setting heading="Create New User">
        <x-panel>
            <form method="post" action="/admin/users" class="mt-10">
                @csrf
                <x-form.input name="name" />
                <x-form.input name="email" />
                <x-form.input name="username" />
                <x-form.input name="password" type="password" />
                <x-form.select name="roles[]" :options="$roleOptions" multiple />
                <x-form.button>Register</x-form.button>

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