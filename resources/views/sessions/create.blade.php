<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl border border-gray-200">
            <h1 class="text-center font-bold text-xl">Log In</h1>
            <form method="post" action="/login" class="mt-10">
                @csrf

                <x-form.input name="username" value="max-admin" />
                <x-form.input name="password" type="password" value="rootroot" />
                
                <x-form.button>Login</x-form.button>    



                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)

                            <li class="text-red-500 text-xs mt-2">{{ $error }}</li>
                            
                        @endforeach
                    </ul>
                @endif

            </form>
        </main>
    </section>
</x-layout>