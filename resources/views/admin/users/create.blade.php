<x-layout>
    <section class="px-6 py-8">
        <x-panel>
            <h1 class="text-center font-bold text-xl">Create New User</h1>
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
    </section>
</x-layout>