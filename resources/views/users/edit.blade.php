<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="name" class="block  dark:text-gray-100">Name</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 block w-full rounded-md border-gray-800 shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block  dark:text-gray-100">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="mt-1 block w-full rounded-md border-gray-800 shadow-sm">
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="button" onclick="history.back()" class="bg-gray-500 text-white px-4 py-2 rounded-md">
                                Back
                            </button>
                            <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded-md">Update</button>

                        </div>
                        {{-- <div class="flex items-start justify-start">
                            <button type="button" onclick="history.back()" class="bg-gray-500 text-white px-4 py-2 rounded-md">
                                Back
                            </button>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
