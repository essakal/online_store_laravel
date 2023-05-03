@extends('layouts.dashboard.components.container')

@section('head')
    @include('layouts.dashboard.components.head')
@endsection

@section('body')

    @yield('sidebar')                           {{-- sidebar --}}

    <div class="p-0 text-left" id="content">

        <div class="bg-slate-600">
            @yield('navbar')                    {{-- navbar --}}
        </div>

        <div class="bg-red-600 m-4 p-4">
            <div>
                @yield('elements')              {{-- content --}}
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
@endsection
