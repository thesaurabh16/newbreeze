<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Deleted Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Deleted Users") }}
                    <table class="min-w-full divide-y divide-gray-200 mt-6">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Restore</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($deletedUsers as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <form action="{{ route('users.restore1', $user) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="ml-2 text-green-600 hover:text-green-900">Restore</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
