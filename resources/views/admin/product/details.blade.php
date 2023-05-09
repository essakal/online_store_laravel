@extends('layouts.dashboard.admin.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-primary">
        details commande
        {{-- "{{$search}}" --}}
    </h3>
    @if ($message = Session::get('success'))
        <div class="mb-4 mt-6 rounded-lg bg-success-100 px-6 py-5 text-base text-success-700" role="alert">
            {{ $message }}
        </div>
    @endif
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-4">
            <div class="mb-6">
                <a href="{{ route('admin.generatePDF', $cart[0]->commande_id) }}"
                    class="mr-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    download facture
                </a>
            </div>
            <div class="mb-6 flex items-center">
                <form action="{{ route('admin.changestatus', $cart[0]->commande_id) }}" method="Post">
                    @csrf
                    <span class="mr-4 font-medium text-gray-700 dark:text-gray-300">Change status:</span>
                    <select
                        class="border w-48 border-gray-400 py-2 px-3 rounded-md text-gray-700 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 focus:outline-none focus:ring focus:ring-blue-300"
                        name="status" id="">
                        @foreach ($status as $statu)
                            <option value="{{ $statu->id }}"
                                {{ $statu->name == $cart[0]->status_name ? 'selected' : '' }}>{{ $statu->name }}</option>
                            {{-- status_name --}}
                        @endforeach
                    </select>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        change status
                    </button>
                </form>
            </div>


            <div class="flex items-center justify-between px-4 py-2 bg-gray-200">
                <div class="text-gray-600"><span class="text-gray-900 font-medium">status:</span>
                    {{ $cart[0]->status_name }}
                </div>
            </div>
            <div class="flex items-center justify-between px-4 py-2 bg-gray-200">
                <div class="text-gray-600"><span class="text-gray-900 font-medium">name:</span> {{ $cart[0]->user_name }}
                </div>
            </div>
            <div class="flex items-center justify-between px-4 py-2 bg-gray-200">
                <div class="text-gray-600"><span class="text-gray-900 font-medium">email:</span> {{ $cart[0]->user_email }}
                </div>
            </div>
            <div class="flex items-center justify-between px-4 py-2 bg-gray-200">
                <div class="text-gray-600"><span class="text-gray-900 font-medium">date:</span> {{ $cart[0]->cmddate }}
                </div>
            </div>
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Image</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantity</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            price*qte</th>
                        {{-- <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            status</th> --}}
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($cart as $c)
                        <tr class="items-center justify-between py-4 text-center">
                            <td class="px-6 py-4 whitespace-nowrap flex justify-center">
                                <img class="h-20 w-20 rounded-full" src="{{ asset('storage/images/' . $c->image) }}"
                                    alt="">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-800">{{ $c->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-gray-600">${{ $c->prix }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-800">{{ $c->qte }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-gray-600">${{ $c->qte * $c->prix }}</div>
                            </td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-gray-600">{{ $c->status_name }}</div>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between px-4 py-2 bg-gray-200">
            <div class="text-gray-600">Total: ${{ $total }}</div>
            {{-- <a href="{{ route('client.produit.confirmer') }}">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    confirmer
                </button>
            </a> --}}
        </div>
        {{-- <div class="flex items-center justify-between px-4 py-2 bg-gray-200">
            <div class="text-gray-600">status: {{ $cart[0]->status_name }}</div>
        </div> --}}
    </div>
@endsection


{{-- @section('categories')
    @foreach ($cat as $c)
        <a href="{{ route('client.produit.category', $c->id) }}" aria-current="true"
            class="block w-full border-b border-neutral-200 px-6 py-2 transition duration-150 ease-in-out hover:bg-neutral-50 hover:text-neutral-700 dark:border-neutral-500 dark:hover:bg-neutral-800 dark:hover:text-white">
            {{ $c->name }} ({{ $c->count }})
        </a>
    @endforeach
@endsection --}}
