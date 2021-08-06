<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <a href="{{ route('users.create') }}" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">
                + Add Users
            </a>
            @if (session()->has('success'))    
                <div class="w-full bg-green-300 text-white rounded-lg p-4 mt-4">
                    {{ session()->get('success') }}
                </div>
            @endif
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col mt-4">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Photo
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($users  as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                @if (!$user->profile_photo_path)
                                                    <div class="h-10 w-10 bg-gray-200 rounded-full"></div>
                                                @else
                                                <img class="h-10 w-10 rounded-full" src="{{ Storage::url($user->profile_photo_path) }}" alt="{{ $user->name }}">
                                                @endif
                                            </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                             <div class="text-sm font-medium text-gray-900">
                                                {{ $user->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $user->roles[0]->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap space-x-3 text-right text-sm font-medium">
                                            @can('update')
                                            <a href="#" class="bg-yellow-400 py-2 px-4 rounded-md hover:bg-yellow-500">Edit</a>
                                            @endcan
                                            @can('delete')
                                            <a href="#" class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700">Delete</a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        
                                    @endforelse
                                    <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>