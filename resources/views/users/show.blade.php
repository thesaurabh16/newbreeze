<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    {{-- <p><strong>Created At:</strong> {{ $user->created_at }}</p>
                    <p><strong>Updated At:</strong> {{ $user->updated_at }}</p> --}}
                    <p><strong>Deleted At:</strong> {{ $user->deleted_at }}</p>
                </div>

            </div>
            <div class="flex items-start justify-start mt-6">
                <button type="button" onclick="history.back()" class="bg-gray-500 text-white px-4 py-2 rounded-md">
                    Back
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
