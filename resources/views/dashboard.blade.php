<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    {{ __("Details of Users in database") }}
                    <table class="min-w-full divide-y divide-gray-200 mt-6 ">
                        <thead>
                            <tr>
                                <th class="px-6 py-3  text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3  text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">View</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Update</th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Delete</th>
                            </tr>
                        </thead>
                        <tbody class=" divide-y divide-gray-200">
                            @foreach($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <a href="{{ route('users.show', $user) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        @if (Auth::id() === $user->id)
                                            <a href="{{ route('users.edit', $user) }}" class="ml-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                        @else
                                            <span class="text-gray-400">Not Allowed</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        @if (Auth::id() === $user->id)
                                        <form action="{{ route('users.delete', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-2 text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                        @else
                                            <span class="text-gray-400">Not Allowed</span>
                                        @endif
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
