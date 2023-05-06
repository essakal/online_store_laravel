@extends('layouts.dashboard.components.master')

{{-- @section('sidebar')
    @include('layouts.dashboard.admin.sidebar')
@endsection --}}

@section('navbar')
    @include('layouts.dashboard.client.navbar')
@endsection

@section('elements')
    @yield('content')
@endsection
