<x-layout>
    <x-setting heading="Manage Users">
        <x-list :headings="['Username', 'Email', 'Display Name', 'Roles', '', '']">
            @foreach ($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $user->username }}
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $user->email }}
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $user->name }}
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                {{ implode(", ", $user->roles->sort()->pluck('name')->toArray()) }}
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="/admin/users/{{ $user->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <form method="user" action="/admin/users/{{ $user->id }}">
                            @csrf
                            @method('DELETE')

                            <button class="text-xs text-gray-400">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </x-list>
    </x-setting>
</x-layout>
