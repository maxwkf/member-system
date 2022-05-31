<x-layout>
    <section class="px-6 py-8">
        <x-panel>
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form method="post" action="/register" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
                    <input type="text" class="border border-gray-400 p-2 w-full" name="name" id="name" value="{{ old('name') }}" placeholder="Name" required />
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
                    <input type="email" class="border border-gray-400 p-2 w-full" name="email" id="email" value="{{ old('email') }}"placeholder="Email" required />
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">Username</label>
                    <input type="text" class="border border-gray-400 p-2 w-full" name="username" id="username" value="{{ old('username') }}"placeholder="Username" required />
                    @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
                    <input type="password" class="border border-gray-400 p-2 w-full" name="password" id="password" placeholder="Password" required />
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4">Submit</button>
                </div>



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