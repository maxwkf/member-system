<x-layout>
    <x-slot name="content">
        <-- users -->
        @foreach ($users as $user)
            <p>This is user {{ $user->name }}</p>
        @endforeach
        <-- /users -->
    </x-slot>
</x-layout>