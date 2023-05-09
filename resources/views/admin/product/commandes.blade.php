@extends('layouts.dashboard.admin.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-primary">
        Gestion des commandes
    </h3>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-4">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            id</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            user</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            date</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            status</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            action</th>

                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($cart as $c)
                        <tr class="items-center justify-between py-4 text-center">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-800">{{ $c->id }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-800">{{ $c->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-800">{{ $c->created_at }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-800">{{ $c->status_name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-800">
                                    <a href="{{ route('admin.commandes.details', $c->id) }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Details</a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="flex items-center justify-between px-4 py-2 bg-gray-200">
            <div class="text-gray-600">Total: ${{$total}}</div>
            <a href="{{route('client.produit.confirmer')}}">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        confirmer
                    </button>
                </a>
        </div> --}}
    </div>
@endsection
