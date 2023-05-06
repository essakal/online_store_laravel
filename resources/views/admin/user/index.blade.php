@extends('layouts.dashboard.admin.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-primary">
        Gestion des users
    </h3>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        name
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        email
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        role
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        blocked
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        {{-- actions --}}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $d->name }}
                        </th>
                        <th scope="row"
                            class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $d->email }}
                            {{-- {{ $d->count }} --}}
                        </th>
                        <th scope="row"
                            class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{-- {{ $d->count }} --}}
                            {{ $d->is_admin ? 'admin' : 'client' }}
                            {{-- {{ $d->is_admin }} --}}
                        </th>
                        <th scope="row"
                            class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{-- {{ $d->count }} --}}
                            {{ $d->is_blocked ? 'oui' : 'non' }}
                            {{-- {{ $d->is_blocked  }} --}}
                        </th>

                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('admin.users.edit', $d->id) }}"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                edit
                            </a>

                            {{-- <a href="{{ route('admin.categories.delete', $d->id) }}"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">delete</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
