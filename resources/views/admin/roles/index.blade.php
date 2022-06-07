<x-layout>
    <x-setting heading="Manage Roles">
        <x-list :headings="['Name', 'Slug', '', '']">
            @foreach ($roles as $role)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $role->name }}
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $role->slug }}
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="/admin/roles/{{ $role->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <form method="POST" action="/admin/roles/{{ $role->id }}">
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