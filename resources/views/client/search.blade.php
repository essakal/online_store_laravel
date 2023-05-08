@extends('layouts.dashboard.client.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-primary">
        search "{{$search}}"
    </h3>

    <div class="mt-6 flex flex-wrap justify-around gap-4">
        @if(count($dd)==0)
        <h5 class="py-4 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
            no products
        </h5>
        @endif
        @foreach ($dd as $d)
            <div class="max-w-sm rounded overflow-hidden shadow-lg w-96">
                <a href="{{ route('guest.produit.show', $d->id) }}">
                    <div style="background-image: url('{{ asset('storage/images/' . $d->image) }}');"
                        class="bg-hero bg-no-repeat bg-cover bg-center  w-full h-64">
                    </div>

                </a>
                {{-- {{$d->id}} --}}
                <div class="px-5 pb-5">
                    <h5 class="py-4 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                        {{ $d->name }}
                    </h5>
                    <span
                        class=" inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $d->category }}</span>
                    <div class="my-5 flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">${{ $d->prix }}</span>
                        <div>
                            <a href="{{ route('client.produit.cart', $d->id) }}"
                                class="mr-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                add to cart
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection


@section('categories')
    @foreach ($cat as $c)
        <a href="{{ route('guest.produit.category', $c->id) }}" aria-current="true"
            class="block w-full border-b border-neutral-200 px-6 py-2 transition duration-150 ease-in-out hover:bg-neutral-50 hover:text-neutral-700 dark:border-neutral-500 dark:hover:bg-neutral-800 dark:hover:text-white">
            {{ $c->name }} ({{$c->count}})
        </a>
    @endforeach
@endsection
