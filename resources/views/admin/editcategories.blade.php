@extends('layouts.dashboard.admin.dashboard')
@section('content')
    <h3 class="mb-2 mt-0 text-3xl font-medium leading-tight text-primary">
        Gestion des categories
    </h3>
    @if ($message = Session::get('danger'))
        <div class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-700" role="alert">
            {{ $message }}
        </div>
    @endif
    <form class="my-6" action="{{ route('admin.categories.update', $data->id) }}" method="Post">
        @csrf
        <div class="mb-6">
            {{-- {{ route('todo.update', $data->id) }} --}}
            {{-- <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label> --}}
            <input type="text" name="name" value="{{$data->name}}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="categorie..." required>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">update
            categorie</button>
    </form>
    {{-- {{$data}} --}}
@endsection
