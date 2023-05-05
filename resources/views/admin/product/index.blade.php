@extends('layouts.dashboard.admin.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-primary">
        Gestion des produits
    </h3>
    <div class="">
        <a href="{{ route('admin.products.create') }}"
            class="mr-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            add new produit
        </a>
        <a href="{{ route('users.export') }}"
            class="mr-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            exprot produits
        </a>
        <a href="{{ route('users.export') }}"
            class="mr-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            import produits
        </a>
    </div>
    @if ($message = Session::get('success'))
        <div class="mb-4 mt-6 rounded-lg bg-success-100 px-6 py-5 text-base text-success-700" role="alert">
            {{ $message }}
        </div>
    @endif
    {{-- {{dd($dd)}} --}}
    {{-- <div class="grid gap-4 grid-cols-1 lg:grid-cols-2 xl:grid-cols-3"> --}}
    <div class="mt-6 flex flex-wrap justify-around gap-4">
        @foreach ($dd as $d)
            <div class="max-w-sm rounded overflow-hidden shadow-lg w-96">
                <a href="#">
                    <div style="background-image: url('{{ asset('storage/images/' . $d->image) }}');"
                        class="bg-hero bg-no-repeat bg-cover bg-center  w-full h-64">
                    </div>

                </a>
                <div class="px-5 pb-5">
                    <h5 class="py-4 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                        {{ $d->name }}
                    </h5>
                    <span
                        class=" inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $d->category }}</span>
                    <div class="my-5 flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">${{ $d->prix }}</span>
                        <div>
                            <a href="{{ route('admin.products.edit', $d->id) }}"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">edit</a>

                            <a href="{{ route('admin.products.delete', $d->id) }}"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">delete</a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>

    </div>
@endsection
